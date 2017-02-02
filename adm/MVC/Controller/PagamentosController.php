<?php
/** @package    admP::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/Pagamentos.php");

/**
 * PagamentosController is the controller class for the Pagamentos object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package admP::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class PagamentosController extends AppBaseController
{

	/**
	 * Override here for any controller-specific functionality
	 *
	 * @inheritdocs
	 */
	protected function Init()
	{
		parent::Init();

		// TODO: add controller-wide bootstrap code
		
		// TODO: if authentiation is required for this entire controller, for example:
		// $this->RequirePermission(ExampleUser::$PERMISSION_USER,'SecureExample.LoginForm');
	}

	/**
	 * Displays a list view of Pagamentos objects
	 */
	public function ListView()
	{
		$this->Render();
	}

	/**
	 * API Method queries for Pagamentos records and render as JSON
	 */
	public function Query()
	{
		try
		{
			$criteria = new PagamentosCriteria();
			
			// TODO: this will limit results based on all properties included in the filter list 
			$filter = RequestUtil::Get('filter');
			if ($filter) $criteria->AddFilter(
				new CriteriaFilter('IdPag,Tipo,IdAlu,IdTur,Parcela,Especie,Bandeira,Banco,Cheque,Titular,Vencimento,Pago,Valor,Extenso,Desconto,Apagar,EnvioBoleto,Situacao'
				, '%'.$filter.'%')
			);

			// TODO: this is generic query filtering based only on criteria properties
			foreach (array_keys($_REQUEST) as $prop)
			{
				$prop_normal = ucfirst($prop);
				$prop_equals = $prop_normal.'_Equals';

				if (property_exists($criteria, $prop_normal))
				{
					$criteria->$prop_normal = RequestUtil::Get($prop);
				}
				elseif (property_exists($criteria, $prop_equals))
				{
					// this is a convenience so that the _Equals suffix is not needed
					$criteria->$prop_equals = RequestUtil::Get($prop);
				}
			}

			$output = new stdClass();

			// if a sort order was specified then specify in the criteria
 			$output->orderBy = RequestUtil::Get('orderBy');
 			$output->orderDesc = RequestUtil::Get('orderDesc') != '';
 			if ($output->orderBy) $criteria->SetOrder($output->orderBy, $output->orderDesc);

			$page = RequestUtil::Get('page');

			if ($page != '')
			{
				// if page is specified, use this instead (at the expense of one extra count query)
				$pagesize = $this->GetDefaultPageSize();

				$pagamentoses = $this->Phreezer->Query('Pagamentos',$criteria)->GetDataPage($page, $pagesize);
				$output->rows = $pagamentoses->ToObjectArray(true,$this->SimpleObjectParams());
				$output->totalResults = $pagamentoses->TotalResults;
				$output->totalPages = $pagamentoses->TotalPages;
				$output->pageSize = $pagamentoses->PageSize;
				$output->currentPage = $pagamentoses->CurrentPage;
			}
			else
			{
				// return all results
				$pagamentoses = $this->Phreezer->Query('Pagamentos',$criteria);
				$output->rows = $pagamentoses->ToObjectArray(true, $this->SimpleObjectParams());
				$output->totalResults = count($output->rows);
				$output->totalPages = 1;
				$output->pageSize = $output->totalResults;
				$output->currentPage = 1;
			}


			$this->RenderJSON($output, $this->JSONPCallback());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method retrieves a single Pagamentos record and render as JSON
	 */
	public function Read()
	{
		try
		{
			$pk = $this->GetRouter()->GetUrlParam('idPag');
			$pagamentos = $this->Phreezer->Get('Pagamentos',$pk);
			$this->RenderJSON($pagamentos, $this->JSONPCallback(), true, $this->SimpleObjectParams());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method inserts a new Pagamentos record and render response as JSON
	 */
	public function Create()
	{
		try
		{
						
			$json = json_decode(RequestUtil::GetBody());

			if (!$json)
			{
				throw new Exception('The request body does not contain valid JSON');
			}

			$pagamentos = new Pagamentos($this->Phreezer);

			// TODO: any fields that should not be inserted by the user should be commented out

			// this is an auto-increment.  uncomment if updating is allowed
			// $pagamentos->IdPag = $this->SafeGetVal($json, 'idPag');

			$pagamentos->Tipo = $this->SafeGetVal($json, 'tipo');
			$pagamentos->IdAlu = $this->SafeGetVal($json, 'idAlu');
			$pagamentos->IdTur = $this->SafeGetVal($json, 'idTur');
			$pagamentos->Parcela = $this->SafeGetVal($json, 'parcela');
			$pagamentos->Especie = $this->SafeGetVal($json, 'especie');
			$pagamentos->Bandeira = $this->SafeGetVal($json, 'bandeira');
			$pagamentos->Banco = $this->SafeGetVal($json, 'banco');
			$pagamentos->Cheque = $this->SafeGetVal($json, 'cheque');
			$pagamentos->Titular = $this->SafeGetVal($json, 'titular');
			$pagamentos->Vencimento = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'vencimento')));
			$pagamentos->Pago = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'pago')));
			$pagamentos->Valor = $this->SafeGetVal($json, 'valor');
			$pagamentos->Extenso = $this->SafeGetVal($json, 'extenso');
			$pagamentos->Desconto = $this->SafeGetVal($json, 'desconto');
			$pagamentos->Apagar = $this->SafeGetVal($json, 'apagar');
			$pagamentos->EnvioBoleto = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'envioBoleto')));
			$pagamentos->Situacao = $this->SafeGetVal($json, 'situacao');

			$pagamentos->Validate();
			$errors = $pagamentos->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$pagamentos->Save();
				$this->RenderJSON($pagamentos, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method updates an existing Pagamentos record and render response as JSON
	 */
	public function Update()
	{
		try
		{
						
			$json = json_decode(RequestUtil::GetBody());

			if (!$json)
			{
				throw new Exception('The request body does not contain valid JSON');
			}

			$pk = $this->GetRouter()->GetUrlParam('idPag');
			$pagamentos = $this->Phreezer->Get('Pagamentos',$pk);

			// TODO: any fields that should not be updated by the user should be commented out

			// this is a primary key.  uncomment if updating is allowed
			// $pagamentos->IdPag = $this->SafeGetVal($json, 'idPag', $pagamentos->IdPag);

			$pagamentos->Tipo = $this->SafeGetVal($json, 'tipo', $pagamentos->Tipo);
			$pagamentos->IdAlu = $this->SafeGetVal($json, 'idAlu', $pagamentos->IdAlu);
			$pagamentos->IdTur = $this->SafeGetVal($json, 'idTur', $pagamentos->IdTur);
			$pagamentos->Parcela = $this->SafeGetVal($json, 'parcela', $pagamentos->Parcela);
			$pagamentos->Especie = $this->SafeGetVal($json, 'especie', $pagamentos->Especie);
			$pagamentos->Bandeira = $this->SafeGetVal($json, 'bandeira', $pagamentos->Bandeira);
			$pagamentos->Banco = $this->SafeGetVal($json, 'banco', $pagamentos->Banco);
			$pagamentos->Cheque = $this->SafeGetVal($json, 'cheque', $pagamentos->Cheque);
			$pagamentos->Titular = $this->SafeGetVal($json, 'titular', $pagamentos->Titular);
			$pagamentos->Vencimento = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'vencimento', $pagamentos->Vencimento)));
			$pagamentos->Pago = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'pago', $pagamentos->Pago)));
			$pagamentos->Valor = $this->SafeGetVal($json, 'valor', $pagamentos->Valor);
			$pagamentos->Extenso = $this->SafeGetVal($json, 'extenso', $pagamentos->Extenso);
			$pagamentos->Desconto = $this->SafeGetVal($json, 'desconto', $pagamentos->Desconto);
			$pagamentos->Apagar = $this->SafeGetVal($json, 'apagar', $pagamentos->Apagar);
			$pagamentos->EnvioBoleto = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'envioBoleto', $pagamentos->EnvioBoleto)));
			$pagamentos->Situacao = $this->SafeGetVal($json, 'situacao', $pagamentos->Situacao);

			$pagamentos->Validate();
			$errors = $pagamentos->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$pagamentos->Save();
				$this->RenderJSON($pagamentos, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}


		}
		catch (Exception $ex)
		{


			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method deletes an existing Pagamentos record and render response as JSON
	 */
	public function Delete()
	{
		try
		{
						
			// TODO: if a soft delete is prefered, change this to update the deleted flag instead of hard-deleting

			$pk = $this->GetRouter()->GetUrlParam('idPag');
			$pagamentos = $this->Phreezer->Get('Pagamentos',$pk);

			$pagamentos->Delete();

			$output = new stdClass();

			$this->RenderJSON($output, $this->JSONPCallback());

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}
}

?>

<?php
/** @package    admP::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/Pagamento.php");

/**
 * PagamentoController is the controller class for the Pagamento object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package admP::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class PagamentoController extends AppBaseController
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
	 * Displays a list view of Pagamento objects
	 */
	public function ListView()
	{
		$this->Render();
	}

	/**
	 * API Method queries for Pagamento records and render as JSON
	 */
	public function Query()
	{
		try
		{
			$criteria = new PagamentoCriteria();
			
			// TODO: this will limit results based on all properties included in the filter list 
			$filter = RequestUtil::Get('filter');
			if ($filter) $criteria->AddFilter(
				new CriteriaFilter('IdPag,IdCli,IdPedido,Tipo,DataCri,HoraCri,Tid,ValorTotal,DataHoraRetorno,Bandeira,TipoVenda,Parcelas,Status,UrlAutenticacao,CodAutorizacao,Mensagem,DataHoraAutorizacao,Lr,Arp'
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

				$pagamentos = $this->Phreezer->Query('Pagamento',$criteria)->GetDataPage($page, $pagesize);
				$output->rows = $pagamentos->ToObjectArray(true,$this->SimpleObjectParams());
				$output->totalResults = $pagamentos->TotalResults;
				$output->totalPages = $pagamentos->TotalPages;
				$output->pageSize = $pagamentos->PageSize;
				$output->currentPage = $pagamentos->CurrentPage;
			}
			else
			{
				// return all results
				$pagamentos = $this->Phreezer->Query('Pagamento',$criteria);
				$output->rows = $pagamentos->ToObjectArray(true, $this->SimpleObjectParams());
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
	 * API Method retrieves a single Pagamento record and render as JSON
	 */
	public function Read()
	{
		try
		{
			$pk = $this->GetRouter()->GetUrlParam('idPag');
			$pagamento = $this->Phreezer->Get('Pagamento',$pk);
			$this->RenderJSON($pagamento, $this->JSONPCallback(), true, $this->SimpleObjectParams());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method inserts a new Pagamento record and render response as JSON
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

			$pagamento = new Pagamento($this->Phreezer);

			// TODO: any fields that should not be inserted by the user should be commented out

			// this is an auto-increment.  uncomment if updating is allowed
			// $pagamento->IdPag = $this->SafeGetVal($json, 'idPag');

			$pagamento->IdCli = $this->SafeGetVal($json, 'idCli');
			$pagamento->IdPedido = $this->SafeGetVal($json, 'idPedido');
			$pagamento->Tipo = $this->SafeGetVal($json, 'tipo');
			$pagamento->DataCri = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'dataCri')));
			$pagamento->HoraCri = date('H:i:s',strtotime('1970-01-01 ' . $this->SafeGetVal($json, 'horaCri')));
			$pagamento->Tid = $this->SafeGetVal($json, 'tid');
			$pagamento->ValorTotal = $this->SafeGetVal($json, 'valorTotal');
			$pagamento->DataHoraRetorno = $this->SafeGetVal($json, 'dataHoraRetorno');
			$pagamento->Bandeira = $this->SafeGetVal($json, 'bandeira');
			$pagamento->TipoVenda = $this->SafeGetVal($json, 'tipoVenda');
			$pagamento->Parcelas = $this->SafeGetVal($json, 'parcelas');
			$pagamento->Status = $this->SafeGetVal($json, 'status');
			$pagamento->UrlAutenticacao = $this->SafeGetVal($json, 'urlAutenticacao');
			$pagamento->CodAutorizacao = $this->SafeGetVal($json, 'codAutorizacao');
			$pagamento->Mensagem = $this->SafeGetVal($json, 'mensagem');
			$pagamento->DataHoraAutorizacao = $this->SafeGetVal($json, 'dataHoraAutorizacao');
			$pagamento->Lr = $this->SafeGetVal($json, 'lr');
			$pagamento->Arp = $this->SafeGetVal($json, 'arp');

			$pagamento->Validate();
			$errors = $pagamento->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$pagamento->Save();
				$this->RenderJSON($pagamento, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method updates an existing Pagamento record and render response as JSON
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
			$pagamento = $this->Phreezer->Get('Pagamento',$pk);

			// TODO: any fields that should not be updated by the user should be commented out

			// this is a primary key.  uncomment if updating is allowed
			// $pagamento->IdPag = $this->SafeGetVal($json, 'idPag', $pagamento->IdPag);

			$pagamento->IdCli = $this->SafeGetVal($json, 'idCli', $pagamento->IdCli);
			$pagamento->IdPedido = $this->SafeGetVal($json, 'idPedido', $pagamento->IdPedido);
			$pagamento->Tipo = $this->SafeGetVal($json, 'tipo', $pagamento->Tipo);
			$pagamento->DataCri = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'dataCri', $pagamento->DataCri)));
			$pagamento->HoraCri = date('Y-m-d H:i:s',strtotime('1970-01-01 ' . $this->SafeGetVal($json, 'horaCri', $pagamento->HoraCri)));
			$pagamento->Tid = $this->SafeGetVal($json, 'tid', $pagamento->Tid);
			$pagamento->ValorTotal = $this->SafeGetVal($json, 'valorTotal', $pagamento->ValorTotal);
			$pagamento->DataHoraRetorno = $this->SafeGetVal($json, 'dataHoraRetorno', $pagamento->DataHoraRetorno);
			$pagamento->Bandeira = $this->SafeGetVal($json, 'bandeira', $pagamento->Bandeira);
			$pagamento->TipoVenda = $this->SafeGetVal($json, 'tipoVenda', $pagamento->TipoVenda);
			$pagamento->Parcelas = $this->SafeGetVal($json, 'parcelas', $pagamento->Parcelas);
			$pagamento->Status = $this->SafeGetVal($json, 'status', $pagamento->Status);
			$pagamento->UrlAutenticacao = $this->SafeGetVal($json, 'urlAutenticacao', $pagamento->UrlAutenticacao);
			$pagamento->CodAutorizacao = $this->SafeGetVal($json, 'codAutorizacao', $pagamento->CodAutorizacao);
			$pagamento->Mensagem = $this->SafeGetVal($json, 'mensagem', $pagamento->Mensagem);
			$pagamento->DataHoraAutorizacao = $this->SafeGetVal($json, 'dataHoraAutorizacao', $pagamento->DataHoraAutorizacao);
			$pagamento->Lr = $this->SafeGetVal($json, 'lr', $pagamento->Lr);
			$pagamento->Arp = $this->SafeGetVal($json, 'arp', $pagamento->Arp);

			$pagamento->Validate();
			$errors = $pagamento->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$pagamento->Save();
				$this->RenderJSON($pagamento, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}


		}
		catch (Exception $ex)
		{


			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method deletes an existing Pagamento record and render response as JSON
	 */
	public function Delete()
	{
		try
		{
						
			// TODO: if a soft delete is prefered, change this to update the deleted flag instead of hard-deleting

			$pk = $this->GetRouter()->GetUrlParam('idPag');
			$pagamento = $this->Phreezer->Get('Pagamento',$pk);

			$pagamento->Delete();

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

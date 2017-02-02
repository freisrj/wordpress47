<?php
/** @package    admP::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/Despesas.php");

/**
 * DespesasController is the controller class for the Despesas object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package admP::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class DespesasController extends AppBaseController
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
	 * Displays a list view of Despesas objects
	 */
	public function ListView()
	{
		$this->Render();
	}

	/**
	 * API Method queries for Despesas records and render as JSON
	 */
	public function Query()
	{
		try
		{
			$criteria = new DespesasCriteria();
			
			// TODO: this will limit results based on all properties included in the filter list 
			$filter = RequestUtil::Get('filter');
			if ($filter) $criteria->AddFilter(
				new CriteriaFilter('IdDes,Conta,Descricao,Valor,Vencimento,Pago,Datapg,AulasWandall'
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

				$despesases = $this->Phreezer->Query('Despesas',$criteria)->GetDataPage($page, $pagesize);
				$output->rows = $despesases->ToObjectArray(true,$this->SimpleObjectParams());
				$output->totalResults = $despesases->TotalResults;
				$output->totalPages = $despesases->TotalPages;
				$output->pageSize = $despesases->PageSize;
				$output->currentPage = $despesases->CurrentPage;
			}
			else
			{
				// return all results
				$despesases = $this->Phreezer->Query('Despesas',$criteria);
				$output->rows = $despesases->ToObjectArray(true, $this->SimpleObjectParams());
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
	 * API Method retrieves a single Despesas record and render as JSON
	 */
	public function Read()
	{
		try
		{
			$pk = $this->GetRouter()->GetUrlParam('idDes');
			$despesas = $this->Phreezer->Get('Despesas',$pk);
			$this->RenderJSON($despesas, $this->JSONPCallback(), true, $this->SimpleObjectParams());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method inserts a new Despesas record and render response as JSON
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

			$despesas = new Despesas($this->Phreezer);

			// TODO: any fields that should not be inserted by the user should be commented out

			// this is an auto-increment.  uncomment if updating is allowed
			// $despesas->IdDes = $this->SafeGetVal($json, 'idDes');

			$despesas->Conta = $this->SafeGetVal($json, 'conta');
			$despesas->Descricao = $this->SafeGetVal($json, 'descricao');
			$despesas->Valor = $this->SafeGetVal($json, 'valor');
			$despesas->Vencimento = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'vencimento')));
			$despesas->Pago = $this->SafeGetVal($json, 'pago');
			$despesas->Datapg = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'datapg')));
			$despesas->AulasWandall = $this->SafeGetVal($json, 'aulasWandall');

			$despesas->Validate();
			$errors = $despesas->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$despesas->Save();
				$this->RenderJSON($despesas, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method updates an existing Despesas record and render response as JSON
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

			$pk = $this->GetRouter()->GetUrlParam('idDes');
			$despesas = $this->Phreezer->Get('Despesas',$pk);

			// TODO: any fields that should not be updated by the user should be commented out

			// this is a primary key.  uncomment if updating is allowed
			// $despesas->IdDes = $this->SafeGetVal($json, 'idDes', $despesas->IdDes);

			$despesas->Conta = $this->SafeGetVal($json, 'conta', $despesas->Conta);
			$despesas->Descricao = $this->SafeGetVal($json, 'descricao', $despesas->Descricao);
			$despesas->Valor = $this->SafeGetVal($json, 'valor', $despesas->Valor);
			$despesas->Vencimento = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'vencimento', $despesas->Vencimento)));
			$despesas->Pago = $this->SafeGetVal($json, 'pago', $despesas->Pago);
			$despesas->Datapg = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'datapg', $despesas->Datapg)));
			$despesas->AulasWandall = $this->SafeGetVal($json, 'aulasWandall', $despesas->AulasWandall);

			$despesas->Validate();
			$errors = $despesas->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$despesas->Save();
				$this->RenderJSON($despesas, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}


		}
		catch (Exception $ex)
		{


			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method deletes an existing Despesas record and render response as JSON
	 */
	public function Delete()
	{
		try
		{
						
			// TODO: if a soft delete is prefered, change this to update the deleted flag instead of hard-deleting

			$pk = $this->GetRouter()->GetUrlParam('idDes');
			$despesas = $this->Phreezer->Get('Despesas',$pk);

			$despesas->Delete();

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

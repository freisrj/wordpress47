<?php
/** @package    admP::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/PesquisaDiaria.php");

/**
 * PesquisaDiariaController is the controller class for the PesquisaDiaria object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package admP::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class PesquisaDiariaController extends AppBaseController
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
	 * Displays a list view of PesquisaDiaria objects
	 */
	public function ListView()
	{
		$this->Render();
	}

	/**
	 * API Method queries for PesquisaDiaria records and render as JSON
	 */
	public function Query()
	{
		try
		{
			$criteria = new PesquisaDiariaCriteria();
			
			// TODO: this will limit results based on all properties included in the filter list 
			$filter = RequestUtil::Get('filter');
			if ($filter) $criteria->AddFilter(
				new CriteriaFilter('IdDia,Data,Hora,IdCur,Fone,Wzap,Local'
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

				$pesquisadiarias = $this->Phreezer->Query('PesquisaDiaria',$criteria)->GetDataPage($page, $pagesize);
				$output->rows = $pesquisadiarias->ToObjectArray(true,$this->SimpleObjectParams());
				$output->totalResults = $pesquisadiarias->TotalResults;
				$output->totalPages = $pesquisadiarias->TotalPages;
				$output->pageSize = $pesquisadiarias->PageSize;
				$output->currentPage = $pesquisadiarias->CurrentPage;
			}
			else
			{
				// return all results
				$pesquisadiarias = $this->Phreezer->Query('PesquisaDiaria',$criteria);
				$output->rows = $pesquisadiarias->ToObjectArray(true, $this->SimpleObjectParams());
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
	 * API Method retrieves a single PesquisaDiaria record and render as JSON
	 */
	public function Read()
	{
		try
		{
			$pk = $this->GetRouter()->GetUrlParam('idDia');
			$pesquisadiaria = $this->Phreezer->Get('PesquisaDiaria',$pk);
			$this->RenderJSON($pesquisadiaria, $this->JSONPCallback(), true, $this->SimpleObjectParams());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method inserts a new PesquisaDiaria record and render response as JSON
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

			$pesquisadiaria = new PesquisaDiaria($this->Phreezer);

			// TODO: any fields that should not be inserted by the user should be commented out

			// this is an auto-increment.  uncomment if updating is allowed
			// $pesquisadiaria->IdDia = $this->SafeGetVal($json, 'idDia');

			$pesquisadiaria->Data = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'data')));
			$pesquisadiaria->Hora = date('H:i:s',strtotime('1970-01-01 ' . $this->SafeGetVal($json, 'hora')));
			$pesquisadiaria->IdCur = $this->SafeGetVal($json, 'idCur');
			$pesquisadiaria->Fone = $this->SafeGetVal($json, 'fone');
			$pesquisadiaria->Wzap = $this->SafeGetVal($json, 'wzap');
			$pesquisadiaria->Local = $this->SafeGetVal($json, 'local');

			$pesquisadiaria->Validate();
			$errors = $pesquisadiaria->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$pesquisadiaria->Save();
				$this->RenderJSON($pesquisadiaria, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method updates an existing PesquisaDiaria record and render response as JSON
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

			$pk = $this->GetRouter()->GetUrlParam('idDia');
			$pesquisadiaria = $this->Phreezer->Get('PesquisaDiaria',$pk);

			// TODO: any fields that should not be updated by the user should be commented out

			// this is a primary key.  uncomment if updating is allowed
			// $pesquisadiaria->IdDia = $this->SafeGetVal($json, 'idDia', $pesquisadiaria->IdDia);

			$pesquisadiaria->Data = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'data', $pesquisadiaria->Data)));
			$pesquisadiaria->Hora = date('Y-m-d H:i:s',strtotime('1970-01-01 ' . $this->SafeGetVal($json, 'hora', $pesquisadiaria->Hora)));
			$pesquisadiaria->IdCur = $this->SafeGetVal($json, 'idCur', $pesquisadiaria->IdCur);
			$pesquisadiaria->Fone = $this->SafeGetVal($json, 'fone', $pesquisadiaria->Fone);
			$pesquisadiaria->Wzap = $this->SafeGetVal($json, 'wzap', $pesquisadiaria->Wzap);
			$pesquisadiaria->Local = $this->SafeGetVal($json, 'local', $pesquisadiaria->Local);

			$pesquisadiaria->Validate();
			$errors = $pesquisadiaria->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$pesquisadiaria->Save();
				$this->RenderJSON($pesquisadiaria, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}


		}
		catch (Exception $ex)
		{


			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method deletes an existing PesquisaDiaria record and render response as JSON
	 */
	public function Delete()
	{
		try
		{
						
			// TODO: if a soft delete is prefered, change this to update the deleted flag instead of hard-deleting

			$pk = $this->GetRouter()->GetUrlParam('idDia');
			$pesquisadiaria = $this->Phreezer->Get('PesquisaDiaria',$pk);

			$pesquisadiaria->Delete();

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

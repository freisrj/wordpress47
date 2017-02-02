<?php
/** @package    admP::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/PedidoCertPre.php");

/**
 * PedidoCertPreController is the controller class for the PedidoCertPre object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package admP::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class PedidoCertPreController extends AppBaseController
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
	 * Displays a list view of PedidoCertPre objects
	 */
	public function ListView()
	{
		$this->Render();
	}

	/**
	 * API Method queries for PedidoCertPre records and render as JSON
	 */
	public function Query()
	{
		try
		{
			$criteria = new PedidoCertPreCriteria();
			
			// TODO: this will limit results based on all properties included in the filter list 
			$filter = RequestUtil::Get('filter');
			if ($filter) $criteria->AddFilter(
				new CriteriaFilter('IdPcer,IdPed,Qped,Data,IdAlu,Turma,Curso'
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

				$pedidocertpres = $this->Phreezer->Query('PedidoCertPre',$criteria)->GetDataPage($page, $pagesize);
				$output->rows = $pedidocertpres->ToObjectArray(true,$this->SimpleObjectParams());
				$output->totalResults = $pedidocertpres->TotalResults;
				$output->totalPages = $pedidocertpres->TotalPages;
				$output->pageSize = $pedidocertpres->PageSize;
				$output->currentPage = $pedidocertpres->CurrentPage;
			}
			else
			{
				// return all results
				$pedidocertpres = $this->Phreezer->Query('PedidoCertPre',$criteria);
				$output->rows = $pedidocertpres->ToObjectArray(true, $this->SimpleObjectParams());
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
	 * API Method retrieves a single PedidoCertPre record and render as JSON
	 */
	public function Read()
	{
		try
		{
			$pk = $this->GetRouter()->GetUrlParam('idPcer');
			$pedidocertpre = $this->Phreezer->Get('PedidoCertPre',$pk);
			$this->RenderJSON($pedidocertpre, $this->JSONPCallback(), true, $this->SimpleObjectParams());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method inserts a new PedidoCertPre record and render response as JSON
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

			$pedidocertpre = new PedidoCertPre($this->Phreezer);

			// TODO: any fields that should not be inserted by the user should be commented out

			// this is an auto-increment.  uncomment if updating is allowed
			// $pedidocertpre->IdPcer = $this->SafeGetVal($json, 'idPcer');

			$pedidocertpre->IdPed = $this->SafeGetVal($json, 'idPed');
			$pedidocertpre->Qped = $this->SafeGetVal($json, 'qped');
			$pedidocertpre->Data = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'data')));
			$pedidocertpre->IdAlu = $this->SafeGetVal($json, 'idAlu');
			$pedidocertpre->Turma = $this->SafeGetVal($json, 'turma');
			$pedidocertpre->Curso = $this->SafeGetVal($json, 'curso');

			$pedidocertpre->Validate();
			$errors = $pedidocertpre->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$pedidocertpre->Save();
				$this->RenderJSON($pedidocertpre, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method updates an existing PedidoCertPre record and render response as JSON
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

			$pk = $this->GetRouter()->GetUrlParam('idPcer');
			$pedidocertpre = $this->Phreezer->Get('PedidoCertPre',$pk);

			// TODO: any fields that should not be updated by the user should be commented out

			// this is a primary key.  uncomment if updating is allowed
			// $pedidocertpre->IdPcer = $this->SafeGetVal($json, 'idPcer', $pedidocertpre->IdPcer);

			$pedidocertpre->IdPed = $this->SafeGetVal($json, 'idPed', $pedidocertpre->IdPed);
			$pedidocertpre->Qped = $this->SafeGetVal($json, 'qped', $pedidocertpre->Qped);
			$pedidocertpre->Data = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'data', $pedidocertpre->Data)));
			$pedidocertpre->IdAlu = $this->SafeGetVal($json, 'idAlu', $pedidocertpre->IdAlu);
			$pedidocertpre->Turma = $this->SafeGetVal($json, 'turma', $pedidocertpre->Turma);
			$pedidocertpre->Curso = $this->SafeGetVal($json, 'curso', $pedidocertpre->Curso);

			$pedidocertpre->Validate();
			$errors = $pedidocertpre->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$pedidocertpre->Save();
				$this->RenderJSON($pedidocertpre, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}


		}
		catch (Exception $ex)
		{


			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method deletes an existing PedidoCertPre record and render response as JSON
	 */
	public function Delete()
	{
		try
		{
						
			// TODO: if a soft delete is prefered, change this to update the deleted flag instead of hard-deleting

			$pk = $this->GetRouter()->GetUrlParam('idPcer');
			$pedidocertpre = $this->Phreezer->Get('PedidoCertPre',$pk);

			$pedidocertpre->Delete();

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

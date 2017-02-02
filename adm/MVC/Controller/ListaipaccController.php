<?php
/** @package    admP::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/Listaipacc.php");

/**
 * ListaipaccController is the controller class for the Listaipacc object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package admP::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class ListaipaccController extends AppBaseController
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
	 * Displays a list view of Listaipacc objects
	 */
	public function ListView()
	{
		$this->Render();
	}

	/**
	 * API Method queries for Listaipacc records and render as JSON
	 */
	public function Query()
	{
		try
		{
			$criteria = new ListaipaccCriteria();
			
			// TODO: this will limit results based on all properties included in the filter list 
			$filter = RequestUtil::Get('filter');
			if ($filter) $criteria->AddFilter(
				new CriteriaFilter('Id,Site,DataCad,HoraCad,Ip,Referer'
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

				$listaipaccs = $this->Phreezer->Query('Listaipacc',$criteria)->GetDataPage($page, $pagesize);
				$output->rows = $listaipaccs->ToObjectArray(true,$this->SimpleObjectParams());
				$output->totalResults = $listaipaccs->TotalResults;
				$output->totalPages = $listaipaccs->TotalPages;
				$output->pageSize = $listaipaccs->PageSize;
				$output->currentPage = $listaipaccs->CurrentPage;
			}
			else
			{
				// return all results
				$listaipaccs = $this->Phreezer->Query('Listaipacc',$criteria);
				$output->rows = $listaipaccs->ToObjectArray(true, $this->SimpleObjectParams());
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
	 * API Method retrieves a single Listaipacc record and render as JSON
	 */
	public function Read()
	{
		try
		{
			$pk = $this->GetRouter()->GetUrlParam('id');
			$listaipacc = $this->Phreezer->Get('Listaipacc',$pk);
			$this->RenderJSON($listaipacc, $this->JSONPCallback(), true, $this->SimpleObjectParams());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method inserts a new Listaipacc record and render response as JSON
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

			$listaipacc = new Listaipacc($this->Phreezer);

			// TODO: any fields that should not be inserted by the user should be commented out

			// this is an auto-increment.  uncomment if updating is allowed
			// $listaipacc->Id = $this->SafeGetVal($json, 'id');

			$listaipacc->Site = $this->SafeGetVal($json, 'site');
			$listaipacc->DataCad = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'dataCad')));
			$listaipacc->HoraCad = date('H:i:s',strtotime('1970-01-01 ' . $this->SafeGetVal($json, 'horaCad')));
			$listaipacc->Ip = $this->SafeGetVal($json, 'ip');
			$listaipacc->Referer = $this->SafeGetVal($json, 'referer');

			$listaipacc->Validate();
			$errors = $listaipacc->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$listaipacc->Save();
				$this->RenderJSON($listaipacc, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method updates an existing Listaipacc record and render response as JSON
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

			$pk = $this->GetRouter()->GetUrlParam('id');
			$listaipacc = $this->Phreezer->Get('Listaipacc',$pk);

			// TODO: any fields that should not be updated by the user should be commented out

			// this is a primary key.  uncomment if updating is allowed
			// $listaipacc->Id = $this->SafeGetVal($json, 'id', $listaipacc->Id);

			$listaipacc->Site = $this->SafeGetVal($json, 'site', $listaipacc->Site);
			$listaipacc->DataCad = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'dataCad', $listaipacc->DataCad)));
			$listaipacc->HoraCad = date('Y-m-d H:i:s',strtotime('1970-01-01 ' . $this->SafeGetVal($json, 'horaCad', $listaipacc->HoraCad)));
			$listaipacc->Ip = $this->SafeGetVal($json, 'ip', $listaipacc->Ip);
			$listaipacc->Referer = $this->SafeGetVal($json, 'referer', $listaipacc->Referer);

			$listaipacc->Validate();
			$errors = $listaipacc->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$listaipacc->Save();
				$this->RenderJSON($listaipacc, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}


		}
		catch (Exception $ex)
		{


			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method deletes an existing Listaipacc record and render response as JSON
	 */
	public function Delete()
	{
		try
		{
						
			// TODO: if a soft delete is prefered, change this to update the deleted flag instead of hard-deleting

			$pk = $this->GetRouter()->GetUrlParam('id');
			$listaipacc = $this->Phreezer->Get('Listaipacc',$pk);

			$listaipacc->Delete();

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

<?php
/** @package    admP::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/WdPesquisa.php");

/**
 * WdPesquisaController is the controller class for the WdPesquisa object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package admP::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class WdPesquisaController extends AppBaseController
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
	 * Displays a list view of WdPesquisa objects
	 */
	public function ListView()
	{
		$this->Render();
	}

	/**
	 * API Method queries for WdPesquisa records and render as JSON
	 */
	public function Query()
	{
		try
		{
			$criteria = new WdPesquisaCriteria();
			
			// TODO: this will limit results based on all properties included in the filter list 
			$filter = RequestUtil::Get('filter');
			if ($filter) $criteria->AddFilter(
				new CriteriaFilter('Curso,Nome,IdCur,IdTip,Pesquisa,Banner'
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

				$wdpesquisas = $this->Phreezer->Query('WdPesquisa',$criteria)->GetDataPage($page, $pagesize);
				$output->rows = $wdpesquisas->ToObjectArray(true,$this->SimpleObjectParams());
				$output->totalResults = $wdpesquisas->TotalResults;
				$output->totalPages = $wdpesquisas->TotalPages;
				$output->pageSize = $wdpesquisas->PageSize;
				$output->currentPage = $wdpesquisas->CurrentPage;
			}
			else
			{
				// return all results
				$wdpesquisas = $this->Phreezer->Query('WdPesquisa',$criteria);
				$output->rows = $wdpesquisas->ToObjectArray(true, $this->SimpleObjectParams());
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
	 * API Method retrieves a single WdPesquisa record and render as JSON
	 */
	public function Read()
	{
		try
		{
			$pk = $this->GetRouter()->GetUrlParam('idCur');
			$wdpesquisa = $this->Phreezer->Get('WdPesquisa',$pk);
			$this->RenderJSON($wdpesquisa, $this->JSONPCallback(), true, $this->SimpleObjectParams());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method inserts a new WdPesquisa record and render response as JSON
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

			$wdpesquisa = new WdPesquisa($this->Phreezer);

			// TODO: any fields that should not be inserted by the user should be commented out

			$wdpesquisa->Curso = $this->SafeGetVal($json, 'curso');
			$wdpesquisa->Nome = $this->SafeGetVal($json, 'nome');
			// this is an auto-increment.  uncomment if updating is allowed
			// $wdpesquisa->IdCur = $this->SafeGetVal($json, 'idCur');

			$wdpesquisa->IdTip = $this->SafeGetVal($json, 'idTip');
			$wdpesquisa->Pesquisa = $this->SafeGetVal($json, 'pesquisa');
			$wdpesquisa->Banner = $this->SafeGetVal($json, 'banner');

			$wdpesquisa->Validate();
			$errors = $wdpesquisa->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$wdpesquisa->Save();
				$this->RenderJSON($wdpesquisa, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method updates an existing WdPesquisa record and render response as JSON
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

			$pk = $this->GetRouter()->GetUrlParam('idCur');
			$wdpesquisa = $this->Phreezer->Get('WdPesquisa',$pk);

			// TODO: any fields that should not be updated by the user should be commented out

			$wdpesquisa->Curso = $this->SafeGetVal($json, 'curso', $wdpesquisa->Curso);
			$wdpesquisa->Nome = $this->SafeGetVal($json, 'nome', $wdpesquisa->Nome);
			// this is a primary key.  uncomment if updating is allowed
			// $wdpesquisa->IdCur = $this->SafeGetVal($json, 'idCur', $wdpesquisa->IdCur);

			$wdpesquisa->IdTip = $this->SafeGetVal($json, 'idTip', $wdpesquisa->IdTip);
			$wdpesquisa->Pesquisa = $this->SafeGetVal($json, 'pesquisa', $wdpesquisa->Pesquisa);
			$wdpesquisa->Banner = $this->SafeGetVal($json, 'banner', $wdpesquisa->Banner);

			$wdpesquisa->Validate();
			$errors = $wdpesquisa->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$wdpesquisa->Save();
				$this->RenderJSON($wdpesquisa, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}


		}
		catch (Exception $ex)
		{


			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method deletes an existing WdPesquisa record and render response as JSON
	 */
	public function Delete()
	{
		try
		{
						
			// TODO: if a soft delete is prefered, change this to update the deleted flag instead of hard-deleting

			$pk = $this->GetRouter()->GetUrlParam('idCur');
			$wdpesquisa = $this->Phreezer->Get('WdPesquisa',$pk);

			$wdpesquisa->Delete();

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

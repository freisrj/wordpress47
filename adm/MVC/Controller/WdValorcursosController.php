<?php
/** @package    admP::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/WdValorcursos.php");

/**
 * WdValorcursosController is the controller class for the WdValorcursos object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package admP::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class WdValorcursosController extends AppBaseController
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
	 * Displays a list view of WdValorcursos objects
	 */
	public function ListView()
	{
		$this->Render();
	}

	/**
	 * API Method queries for WdValorcursos records and render as JSON
	 */
	public function Query()
	{
		try
		{
			$criteria = new WdValorcursosCriteria();
			
			// TODO: this will limit results based on all properties included in the filter list 
			$filter = RequestUtil::Get('filter');
			if ($filter) $criteria->AddFilter(
				new CriteriaFilter('IdVar,IdCur,Valor,Desconto,Material,Desc0,Desc1,Desc2,Desc3,Avista1,Desc11,Desc12,Desc13,Desc14,Desc15,Desc16,Avista2,Desc21,Desc22,Desc23,Desc24,Desc25,Desc26'
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

				$wdvalorcursoses = $this->Phreezer->Query('WdValorcursos',$criteria)->GetDataPage($page, $pagesize);
				$output->rows = $wdvalorcursoses->ToObjectArray(true,$this->SimpleObjectParams());
				$output->totalResults = $wdvalorcursoses->TotalResults;
				$output->totalPages = $wdvalorcursoses->TotalPages;
				$output->pageSize = $wdvalorcursoses->PageSize;
				$output->currentPage = $wdvalorcursoses->CurrentPage;
			}
			else
			{
				// return all results
				$wdvalorcursoses = $this->Phreezer->Query('WdValorcursos',$criteria);
				$output->rows = $wdvalorcursoses->ToObjectArray(true, $this->SimpleObjectParams());
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
	 * API Method retrieves a single WdValorcursos record and render as JSON
	 */
	public function Read()
	{
		try
		{
			$pk = $this->GetRouter()->GetUrlParam('idVar');
			$wdvalorcursos = $this->Phreezer->Get('WdValorcursos',$pk);
			$this->RenderJSON($wdvalorcursos, $this->JSONPCallback(), true, $this->SimpleObjectParams());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method inserts a new WdValorcursos record and render response as JSON
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

			$wdvalorcursos = new WdValorcursos($this->Phreezer);

			// TODO: any fields that should not be inserted by the user should be commented out

			// this is an auto-increment.  uncomment if updating is allowed
			// $wdvalorcursos->IdVar = $this->SafeGetVal($json, 'idVar');

			$wdvalorcursos->IdCur = $this->SafeGetVal($json, 'idCur');
			$wdvalorcursos->Valor = $this->SafeGetVal($json, 'valor');
			$wdvalorcursos->Desconto = $this->SafeGetVal($json, 'desconto');
			$wdvalorcursos->Material = $this->SafeGetVal($json, 'material');
			$wdvalorcursos->Desc0 = $this->SafeGetVal($json, 'desc0');
			$wdvalorcursos->Desc1 = $this->SafeGetVal($json, 'desc1');
			$wdvalorcursos->Desc2 = $this->SafeGetVal($json, 'desc2');
			$wdvalorcursos->Desc3 = $this->SafeGetVal($json, 'desc3');
			$wdvalorcursos->Avista1 = $this->SafeGetVal($json, 'avista1');
			$wdvalorcursos->Desc11 = $this->SafeGetVal($json, 'desc11');
			$wdvalorcursos->Desc12 = $this->SafeGetVal($json, 'desc12');
			$wdvalorcursos->Desc13 = $this->SafeGetVal($json, 'desc13');
			$wdvalorcursos->Desc14 = $this->SafeGetVal($json, 'desc14');
			$wdvalorcursos->Desc15 = $this->SafeGetVal($json, 'desc15');
			$wdvalorcursos->Desc16 = $this->SafeGetVal($json, 'desc16');
			$wdvalorcursos->Avista2 = $this->SafeGetVal($json, 'avista2');
			$wdvalorcursos->Desc21 = $this->SafeGetVal($json, 'desc21');
			$wdvalorcursos->Desc22 = $this->SafeGetVal($json, 'desc22');
			$wdvalorcursos->Desc23 = $this->SafeGetVal($json, 'desc23');
			$wdvalorcursos->Desc24 = $this->SafeGetVal($json, 'desc24');
			$wdvalorcursos->Desc25 = $this->SafeGetVal($json, 'desc25');
			$wdvalorcursos->Desc26 = $this->SafeGetVal($json, 'desc26');

			$wdvalorcursos->Validate();
			$errors = $wdvalorcursos->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$wdvalorcursos->Save();
				$this->RenderJSON($wdvalorcursos, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method updates an existing WdValorcursos record and render response as JSON
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

			$pk = $this->GetRouter()->GetUrlParam('idVar');
			$wdvalorcursos = $this->Phreezer->Get('WdValorcursos',$pk);

			// TODO: any fields that should not be updated by the user should be commented out

			// this is a primary key.  uncomment if updating is allowed
			// $wdvalorcursos->IdVar = $this->SafeGetVal($json, 'idVar', $wdvalorcursos->IdVar);

			$wdvalorcursos->IdCur = $this->SafeGetVal($json, 'idCur', $wdvalorcursos->IdCur);
			$wdvalorcursos->Valor = $this->SafeGetVal($json, 'valor', $wdvalorcursos->Valor);
			$wdvalorcursos->Desconto = $this->SafeGetVal($json, 'desconto', $wdvalorcursos->Desconto);
			$wdvalorcursos->Material = $this->SafeGetVal($json, 'material', $wdvalorcursos->Material);
			$wdvalorcursos->Desc0 = $this->SafeGetVal($json, 'desc0', $wdvalorcursos->Desc0);
			$wdvalorcursos->Desc1 = $this->SafeGetVal($json, 'desc1', $wdvalorcursos->Desc1);
			$wdvalorcursos->Desc2 = $this->SafeGetVal($json, 'desc2', $wdvalorcursos->Desc2);
			$wdvalorcursos->Desc3 = $this->SafeGetVal($json, 'desc3', $wdvalorcursos->Desc3);
			$wdvalorcursos->Avista1 = $this->SafeGetVal($json, 'avista1', $wdvalorcursos->Avista1);
			$wdvalorcursos->Desc11 = $this->SafeGetVal($json, 'desc11', $wdvalorcursos->Desc11);
			$wdvalorcursos->Desc12 = $this->SafeGetVal($json, 'desc12', $wdvalorcursos->Desc12);
			$wdvalorcursos->Desc13 = $this->SafeGetVal($json, 'desc13', $wdvalorcursos->Desc13);
			$wdvalorcursos->Desc14 = $this->SafeGetVal($json, 'desc14', $wdvalorcursos->Desc14);
			$wdvalorcursos->Desc15 = $this->SafeGetVal($json, 'desc15', $wdvalorcursos->Desc15);
			$wdvalorcursos->Desc16 = $this->SafeGetVal($json, 'desc16', $wdvalorcursos->Desc16);
			$wdvalorcursos->Avista2 = $this->SafeGetVal($json, 'avista2', $wdvalorcursos->Avista2);
			$wdvalorcursos->Desc21 = $this->SafeGetVal($json, 'desc21', $wdvalorcursos->Desc21);
			$wdvalorcursos->Desc22 = $this->SafeGetVal($json, 'desc22', $wdvalorcursos->Desc22);
			$wdvalorcursos->Desc23 = $this->SafeGetVal($json, 'desc23', $wdvalorcursos->Desc23);
			$wdvalorcursos->Desc24 = $this->SafeGetVal($json, 'desc24', $wdvalorcursos->Desc24);
			$wdvalorcursos->Desc25 = $this->SafeGetVal($json, 'desc25', $wdvalorcursos->Desc25);
			$wdvalorcursos->Desc26 = $this->SafeGetVal($json, 'desc26', $wdvalorcursos->Desc26);

			$wdvalorcursos->Validate();
			$errors = $wdvalorcursos->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$wdvalorcursos->Save();
				$this->RenderJSON($wdvalorcursos, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}


		}
		catch (Exception $ex)
		{


			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method deletes an existing WdValorcursos record and render response as JSON
	 */
	public function Delete()
	{
		try
		{
						
			// TODO: if a soft delete is prefered, change this to update the deleted flag instead of hard-deleting

			$pk = $this->GetRouter()->GetUrlParam('idVar');
			$wdvalorcursos = $this->Phreezer->Get('WdValorcursos',$pk);

			$wdvalorcursos->Delete();

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

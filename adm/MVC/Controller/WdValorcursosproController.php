<?php
/** @package    admP::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/WdValorcursospro.php");

/**
 * WdValorcursosproController is the controller class for the WdValorcursospro object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package admP::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class WdValorcursosproController extends AppBaseController
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
	 * Displays a list view of WdValorcursospro objects
	 */
	public function ListView()
	{
		$this->Render();
	}

	/**
	 * API Method queries for WdValorcursospro records and render as JSON
	 */
	public function Query()
	{
		try
		{
			$criteria = new WdValorcursosproCriteria();
			
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

				$wdvalorcursospros = $this->Phreezer->Query('WdValorcursospro',$criteria)->GetDataPage($page, $pagesize);
				$output->rows = $wdvalorcursospros->ToObjectArray(true,$this->SimpleObjectParams());
				$output->totalResults = $wdvalorcursospros->TotalResults;
				$output->totalPages = $wdvalorcursospros->TotalPages;
				$output->pageSize = $wdvalorcursospros->PageSize;
				$output->currentPage = $wdvalorcursospros->CurrentPage;
			}
			else
			{
				// return all results
				$wdvalorcursospros = $this->Phreezer->Query('WdValorcursospro',$criteria);
				$output->rows = $wdvalorcursospros->ToObjectArray(true, $this->SimpleObjectParams());
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
	 * API Method retrieves a single WdValorcursospro record and render as JSON
	 */
	public function Read()
	{
		try
		{
			$pk = $this->GetRouter()->GetUrlParam('idVar');
			$wdvalorcursospro = $this->Phreezer->Get('WdValorcursospro',$pk);
			$this->RenderJSON($wdvalorcursospro, $this->JSONPCallback(), true, $this->SimpleObjectParams());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method inserts a new WdValorcursospro record and render response as JSON
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

			$wdvalorcursospro = new WdValorcursospro($this->Phreezer);

			// TODO: any fields that should not be inserted by the user should be commented out

			// this is an auto-increment.  uncomment if updating is allowed
			// $wdvalorcursospro->IdVar = $this->SafeGetVal($json, 'idVar');

			$wdvalorcursospro->IdCur = $this->SafeGetVal($json, 'idCur');
			$wdvalorcursospro->Valor = $this->SafeGetVal($json, 'valor');
			$wdvalorcursospro->Desconto = $this->SafeGetVal($json, 'desconto');
			$wdvalorcursospro->Material = $this->SafeGetVal($json, 'material');
			$wdvalorcursospro->Desc0 = $this->SafeGetVal($json, 'desc0');
			$wdvalorcursospro->Desc1 = $this->SafeGetVal($json, 'desc1');
			$wdvalorcursospro->Desc2 = $this->SafeGetVal($json, 'desc2');
			$wdvalorcursospro->Desc3 = $this->SafeGetVal($json, 'desc3');
			$wdvalorcursospro->Avista1 = $this->SafeGetVal($json, 'avista1');
			$wdvalorcursospro->Desc11 = $this->SafeGetVal($json, 'desc11');
			$wdvalorcursospro->Desc12 = $this->SafeGetVal($json, 'desc12');
			$wdvalorcursospro->Desc13 = $this->SafeGetVal($json, 'desc13');
			$wdvalorcursospro->Desc14 = $this->SafeGetVal($json, 'desc14');
			$wdvalorcursospro->Desc15 = $this->SafeGetVal($json, 'desc15');
			$wdvalorcursospro->Desc16 = $this->SafeGetVal($json, 'desc16');
			$wdvalorcursospro->Avista2 = $this->SafeGetVal($json, 'avista2');
			$wdvalorcursospro->Desc21 = $this->SafeGetVal($json, 'desc21');
			$wdvalorcursospro->Desc22 = $this->SafeGetVal($json, 'desc22');
			$wdvalorcursospro->Desc23 = $this->SafeGetVal($json, 'desc23');
			$wdvalorcursospro->Desc24 = $this->SafeGetVal($json, 'desc24');
			$wdvalorcursospro->Desc25 = $this->SafeGetVal($json, 'desc25');
			$wdvalorcursospro->Desc26 = $this->SafeGetVal($json, 'desc26');

			$wdvalorcursospro->Validate();
			$errors = $wdvalorcursospro->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$wdvalorcursospro->Save();
				$this->RenderJSON($wdvalorcursospro, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method updates an existing WdValorcursospro record and render response as JSON
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
			$wdvalorcursospro = $this->Phreezer->Get('WdValorcursospro',$pk);

			// TODO: any fields that should not be updated by the user should be commented out

			// this is a primary key.  uncomment if updating is allowed
			// $wdvalorcursospro->IdVar = $this->SafeGetVal($json, 'idVar', $wdvalorcursospro->IdVar);

			$wdvalorcursospro->IdCur = $this->SafeGetVal($json, 'idCur', $wdvalorcursospro->IdCur);
			$wdvalorcursospro->Valor = $this->SafeGetVal($json, 'valor', $wdvalorcursospro->Valor);
			$wdvalorcursospro->Desconto = $this->SafeGetVal($json, 'desconto', $wdvalorcursospro->Desconto);
			$wdvalorcursospro->Material = $this->SafeGetVal($json, 'material', $wdvalorcursospro->Material);
			$wdvalorcursospro->Desc0 = $this->SafeGetVal($json, 'desc0', $wdvalorcursospro->Desc0);
			$wdvalorcursospro->Desc1 = $this->SafeGetVal($json, 'desc1', $wdvalorcursospro->Desc1);
			$wdvalorcursospro->Desc2 = $this->SafeGetVal($json, 'desc2', $wdvalorcursospro->Desc2);
			$wdvalorcursospro->Desc3 = $this->SafeGetVal($json, 'desc3', $wdvalorcursospro->Desc3);
			$wdvalorcursospro->Avista1 = $this->SafeGetVal($json, 'avista1', $wdvalorcursospro->Avista1);
			$wdvalorcursospro->Desc11 = $this->SafeGetVal($json, 'desc11', $wdvalorcursospro->Desc11);
			$wdvalorcursospro->Desc12 = $this->SafeGetVal($json, 'desc12', $wdvalorcursospro->Desc12);
			$wdvalorcursospro->Desc13 = $this->SafeGetVal($json, 'desc13', $wdvalorcursospro->Desc13);
			$wdvalorcursospro->Desc14 = $this->SafeGetVal($json, 'desc14', $wdvalorcursospro->Desc14);
			$wdvalorcursospro->Desc15 = $this->SafeGetVal($json, 'desc15', $wdvalorcursospro->Desc15);
			$wdvalorcursospro->Desc16 = $this->SafeGetVal($json, 'desc16', $wdvalorcursospro->Desc16);
			$wdvalorcursospro->Avista2 = $this->SafeGetVal($json, 'avista2', $wdvalorcursospro->Avista2);
			$wdvalorcursospro->Desc21 = $this->SafeGetVal($json, 'desc21', $wdvalorcursospro->Desc21);
			$wdvalorcursospro->Desc22 = $this->SafeGetVal($json, 'desc22', $wdvalorcursospro->Desc22);
			$wdvalorcursospro->Desc23 = $this->SafeGetVal($json, 'desc23', $wdvalorcursospro->Desc23);
			$wdvalorcursospro->Desc24 = $this->SafeGetVal($json, 'desc24', $wdvalorcursospro->Desc24);
			$wdvalorcursospro->Desc25 = $this->SafeGetVal($json, 'desc25', $wdvalorcursospro->Desc25);
			$wdvalorcursospro->Desc26 = $this->SafeGetVal($json, 'desc26', $wdvalorcursospro->Desc26);

			$wdvalorcursospro->Validate();
			$errors = $wdvalorcursospro->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$wdvalorcursospro->Save();
				$this->RenderJSON($wdvalorcursospro, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}


		}
		catch (Exception $ex)
		{


			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method deletes an existing WdValorcursospro record and render response as JSON
	 */
	public function Delete()
	{
		try
		{
						
			// TODO: if a soft delete is prefered, change this to update the deleted flag instead of hard-deleting

			$pk = $this->GetRouter()->GetUrlParam('idVar');
			$wdvalorcursospro = $this->Phreezer->Get('WdValorcursospro',$pk);

			$wdvalorcursospro->Delete();

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

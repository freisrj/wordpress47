<?php
/** @package    admP::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/WdPalestra.php");

/**
 * WdPalestraController is the controller class for the WdPalestra object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package admP::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class WdPalestraController extends AppBaseController
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
	 * Displays a list view of WdPalestra objects
	 */
	public function ListView()
	{
		$this->Render();
	}

	/**
	 * API Method queries for WdPalestra records and render as JSON
	 */
	public function Query()
	{
		try
		{
			$criteria = new WdPalestraCriteria();
			
			// TODO: this will limit results based on all properties included in the filter list 
			$filter = RequestUtil::Get('filter');
			if ($filter) $criteria->AddFilter(
				new CriteriaFilter('IdPre,Nome,Email,Telefone,Celular,Situacao,Data,Palestra'
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

				$wdpalestras = $this->Phreezer->Query('WdPalestra',$criteria)->GetDataPage($page, $pagesize);
				$output->rows = $wdpalestras->ToObjectArray(true,$this->SimpleObjectParams());
				$output->totalResults = $wdpalestras->TotalResults;
				$output->totalPages = $wdpalestras->TotalPages;
				$output->pageSize = $wdpalestras->PageSize;
				$output->currentPage = $wdpalestras->CurrentPage;
			}
			else
			{
				// return all results
				$wdpalestras = $this->Phreezer->Query('WdPalestra',$criteria);
				$output->rows = $wdpalestras->ToObjectArray(true, $this->SimpleObjectParams());
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
	 * API Method retrieves a single WdPalestra record and render as JSON
	 */
	public function Read()
	{
		try
		{
			$pk = $this->GetRouter()->GetUrlParam('idPre');
			$wdpalestra = $this->Phreezer->Get('WdPalestra',$pk);
			$this->RenderJSON($wdpalestra, $this->JSONPCallback(), true, $this->SimpleObjectParams());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method inserts a new WdPalestra record and render response as JSON
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

			$wdpalestra = new WdPalestra($this->Phreezer);

			// TODO: any fields that should not be inserted by the user should be commented out

			// this is an auto-increment.  uncomment if updating is allowed
			// $wdpalestra->IdPre = $this->SafeGetVal($json, 'idPre');

			$wdpalestra->Nome = $this->SafeGetVal($json, 'nome');
			$wdpalestra->Email = $this->SafeGetVal($json, 'email');
			$wdpalestra->Telefone = $this->SafeGetVal($json, 'telefone');
			$wdpalestra->Celular = $this->SafeGetVal($json, 'celular');
			$wdpalestra->Situacao = $this->SafeGetVal($json, 'situacao');
			$wdpalestra->Data = $this->SafeGetVal($json, 'data');
			$wdpalestra->Palestra = $this->SafeGetVal($json, 'palestra');

			$wdpalestra->Validate();
			$errors = $wdpalestra->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$wdpalestra->Save();
				$this->RenderJSON($wdpalestra, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method updates an existing WdPalestra record and render response as JSON
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

			$pk = $this->GetRouter()->GetUrlParam('idPre');
			$wdpalestra = $this->Phreezer->Get('WdPalestra',$pk);

			// TODO: any fields that should not be updated by the user should be commented out

			// this is a primary key.  uncomment if updating is allowed
			// $wdpalestra->IdPre = $this->SafeGetVal($json, 'idPre', $wdpalestra->IdPre);

			$wdpalestra->Nome = $this->SafeGetVal($json, 'nome', $wdpalestra->Nome);
			$wdpalestra->Email = $this->SafeGetVal($json, 'email', $wdpalestra->Email);
			$wdpalestra->Telefone = $this->SafeGetVal($json, 'telefone', $wdpalestra->Telefone);
			$wdpalestra->Celular = $this->SafeGetVal($json, 'celular', $wdpalestra->Celular);
			$wdpalestra->Situacao = $this->SafeGetVal($json, 'situacao', $wdpalestra->Situacao);
			$wdpalestra->Data = $this->SafeGetVal($json, 'data', $wdpalestra->Data);
			$wdpalestra->Palestra = $this->SafeGetVal($json, 'palestra', $wdpalestra->Palestra);

			$wdpalestra->Validate();
			$errors = $wdpalestra->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$wdpalestra->Save();
				$this->RenderJSON($wdpalestra, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}


		}
		catch (Exception $ex)
		{


			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method deletes an existing WdPalestra record and render response as JSON
	 */
	public function Delete()
	{
		try
		{
						
			// TODO: if a soft delete is prefered, change this to update the deleted flag instead of hard-deleting

			$pk = $this->GetRouter()->GetUrlParam('idPre');
			$wdpalestra = $this->Phreezer->Get('WdPalestra',$pk);

			$wdpalestra->Delete();

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

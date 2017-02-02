<?php
/** @package    admP::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/TurMaterias.php");

/**
 * TurMateriasController is the controller class for the TurMaterias object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package admP::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class TurMateriasController extends AppBaseController
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
	 * Displays a list view of TurMaterias objects
	 */
	public function ListView()
	{
		$this->Render();
	}

	/**
	 * API Method queries for TurMaterias records and render as JSON
	 */
	public function Query()
	{
		try
		{
			$criteria = new TurMateriasCriteria();
			
			// TODO: this will limit results based on all properties included in the filter list 
			$filter = RequestUtil::Get('filter');
			if ($filter) $criteria->AddFilter(
				new CriteriaFilter('IdMat,IdTur,Modulo,Aulas,AulasAdd,Inicio,Termino,Concluida'
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

				$turmateriases = $this->Phreezer->Query('TurMaterias',$criteria)->GetDataPage($page, $pagesize);
				$output->rows = $turmateriases->ToObjectArray(true,$this->SimpleObjectParams());
				$output->totalResults = $turmateriases->TotalResults;
				$output->totalPages = $turmateriases->TotalPages;
				$output->pageSize = $turmateriases->PageSize;
				$output->currentPage = $turmateriases->CurrentPage;
			}
			else
			{
				// return all results
				$turmateriases = $this->Phreezer->Query('TurMaterias',$criteria);
				$output->rows = $turmateriases->ToObjectArray(true, $this->SimpleObjectParams());
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
	 * API Method retrieves a single TurMaterias record and render as JSON
	 */
	public function Read()
	{
		try
		{
			$pk = $this->GetRouter()->GetUrlParam('idMat');
			$turmaterias = $this->Phreezer->Get('TurMaterias',$pk);
			$this->RenderJSON($turmaterias, $this->JSONPCallback(), true, $this->SimpleObjectParams());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method inserts a new TurMaterias record and render response as JSON
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

			$turmaterias = new TurMaterias($this->Phreezer);

			// TODO: any fields that should not be inserted by the user should be commented out

			// this is an auto-increment.  uncomment if updating is allowed
			// $turmaterias->IdMat = $this->SafeGetVal($json, 'idMat');

			$turmaterias->IdTur = $this->SafeGetVal($json, 'idTur');
			$turmaterias->Modulo = $this->SafeGetVal($json, 'modulo');
			$turmaterias->Aulas = $this->SafeGetVal($json, 'aulas');
			$turmaterias->AulasAdd = $this->SafeGetVal($json, 'aulasAdd');
			$turmaterias->Inicio = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'inicio')));
			$turmaterias->Termino = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'termino')));
			$turmaterias->Concluida = $this->SafeGetVal($json, 'concluida');

			$turmaterias->Validate();
			$errors = $turmaterias->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$turmaterias->Save();
				$this->RenderJSON($turmaterias, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method updates an existing TurMaterias record and render response as JSON
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

			$pk = $this->GetRouter()->GetUrlParam('idMat');
			$turmaterias = $this->Phreezer->Get('TurMaterias',$pk);

			// TODO: any fields that should not be updated by the user should be commented out

			// this is a primary key.  uncomment if updating is allowed
			// $turmaterias->IdMat = $this->SafeGetVal($json, 'idMat', $turmaterias->IdMat);

			$turmaterias->IdTur = $this->SafeGetVal($json, 'idTur', $turmaterias->IdTur);
			$turmaterias->Modulo = $this->SafeGetVal($json, 'modulo', $turmaterias->Modulo);
			$turmaterias->Aulas = $this->SafeGetVal($json, 'aulas', $turmaterias->Aulas);
			$turmaterias->AulasAdd = $this->SafeGetVal($json, 'aulasAdd', $turmaterias->AulasAdd);
			$turmaterias->Inicio = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'inicio', $turmaterias->Inicio)));
			$turmaterias->Termino = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'termino', $turmaterias->Termino)));
			$turmaterias->Concluida = $this->SafeGetVal($json, 'concluida', $turmaterias->Concluida);

			$turmaterias->Validate();
			$errors = $turmaterias->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$turmaterias->Save();
				$this->RenderJSON($turmaterias, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}


		}
		catch (Exception $ex)
		{


			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method deletes an existing TurMaterias record and render response as JSON
	 */
	public function Delete()
	{
		try
		{
						
			// TODO: if a soft delete is prefered, change this to update the deleted flag instead of hard-deleting

			$pk = $this->GetRouter()->GetUrlParam('idMat');
			$turmaterias = $this->Phreezer->Get('TurMaterias',$pk);

			$turmaterias->Delete();

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

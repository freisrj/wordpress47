<?php
/** @package    admP::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/WdTurmas.php");

/**
 * WdTurmasController is the controller class for the WdTurmas object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package admP::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class WdTurmasController extends AppBaseController
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
	 * Displays a list view of WdTurmas objects
	 */
	public function ListView()
	{
		$this->Render();
	}

	/**
	 * API Method queries for WdTurmas records and render as JSON
	 */
	public function Query()
	{
		try
		{
			$criteria = new WdTurmasCriteria();
			
			// TODO: this will limit results based on all properties included in the filter list 
			$filter = RequestUtil::Get('filter');
			if ($filter) $criteria->AddFilter(
				new CriteriaFilter('IdTur,IdUni,Due,Aberta,Andamento,IdCur,IdPro,Inicio,Termino,Aulas,Turno,Dias,Horario,Vagas,Pre,Matriculas,Sala,Status'
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

				$wdturmases = $this->Phreezer->Query('WdTurmas',$criteria)->GetDataPage($page, $pagesize);
				$output->rows = $wdturmases->ToObjectArray(true,$this->SimpleObjectParams());
				$output->totalResults = $wdturmases->TotalResults;
				$output->totalPages = $wdturmases->TotalPages;
				$output->pageSize = $wdturmases->PageSize;
				$output->currentPage = $wdturmases->CurrentPage;
			}
			else
			{
				// return all results
				$wdturmases = $this->Phreezer->Query('WdTurmas',$criteria);
				$output->rows = $wdturmases->ToObjectArray(true, $this->SimpleObjectParams());
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
	 * API Method retrieves a single WdTurmas record and render as JSON
	 */
	public function Read()
	{
		try
		{
			$pk = $this->GetRouter()->GetUrlParam('idTur');
			$wdturmas = $this->Phreezer->Get('WdTurmas',$pk);
			$this->RenderJSON($wdturmas, $this->JSONPCallback(), true, $this->SimpleObjectParams());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method inserts a new WdTurmas record and render response as JSON
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

			$wdturmas = new WdTurmas($this->Phreezer);

			// TODO: any fields that should not be inserted by the user should be commented out

			// this is an auto-increment.  uncomment if updating is allowed
			// $wdturmas->IdTur = $this->SafeGetVal($json, 'idTur');

			$wdturmas->IdUni = $this->SafeGetVal($json, 'idUni');
			$wdturmas->Due = $this->SafeGetVal($json, 'due');
			$wdturmas->Aberta = $this->SafeGetVal($json, 'aberta');
			$wdturmas->Andamento = $this->SafeGetVal($json, 'andamento');
			$wdturmas->IdCur = $this->SafeGetVal($json, 'idCur');
			$wdturmas->IdPro = $this->SafeGetVal($json, 'idPro');
			$wdturmas->Inicio = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'inicio')));
			$wdturmas->Termino = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'termino')));
			$wdturmas->Aulas = $this->SafeGetVal($json, 'aulas');
			$wdturmas->Turno = $this->SafeGetVal($json, 'turno');
			$wdturmas->Dias = $this->SafeGetVal($json, 'dias');
			$wdturmas->Horario = $this->SafeGetVal($json, 'horario');
			$wdturmas->Vagas = $this->SafeGetVal($json, 'vagas');
			$wdturmas->Pre = $this->SafeGetVal($json, 'pre');
			$wdturmas->Matriculas = $this->SafeGetVal($json, 'matriculas');
			$wdturmas->Sala = $this->SafeGetVal($json, 'sala');
			$wdturmas->Status = $this->SafeGetVal($json, 'status');

			$wdturmas->Validate();
			$errors = $wdturmas->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$wdturmas->Save();
				$this->RenderJSON($wdturmas, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method updates an existing WdTurmas record and render response as JSON
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

			$pk = $this->GetRouter()->GetUrlParam('idTur');
			$wdturmas = $this->Phreezer->Get('WdTurmas',$pk);

			// TODO: any fields that should not be updated by the user should be commented out

			// this is a primary key.  uncomment if updating is allowed
			// $wdturmas->IdTur = $this->SafeGetVal($json, 'idTur', $wdturmas->IdTur);

			$wdturmas->IdUni = $this->SafeGetVal($json, 'idUni', $wdturmas->IdUni);
			$wdturmas->Due = $this->SafeGetVal($json, 'due', $wdturmas->Due);
			$wdturmas->Aberta = $this->SafeGetVal($json, 'aberta', $wdturmas->Aberta);
			$wdturmas->Andamento = $this->SafeGetVal($json, 'andamento', $wdturmas->Andamento);
			$wdturmas->IdCur = $this->SafeGetVal($json, 'idCur', $wdturmas->IdCur);
			$wdturmas->IdPro = $this->SafeGetVal($json, 'idPro', $wdturmas->IdPro);
			$wdturmas->Inicio = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'inicio', $wdturmas->Inicio)));
			$wdturmas->Termino = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'termino', $wdturmas->Termino)));
			$wdturmas->Aulas = $this->SafeGetVal($json, 'aulas', $wdturmas->Aulas);
			$wdturmas->Turno = $this->SafeGetVal($json, 'turno', $wdturmas->Turno);
			$wdturmas->Dias = $this->SafeGetVal($json, 'dias', $wdturmas->Dias);
			$wdturmas->Horario = $this->SafeGetVal($json, 'horario', $wdturmas->Horario);
			$wdturmas->Vagas = $this->SafeGetVal($json, 'vagas', $wdturmas->Vagas);
			$wdturmas->Pre = $this->SafeGetVal($json, 'pre', $wdturmas->Pre);
			$wdturmas->Matriculas = $this->SafeGetVal($json, 'matriculas', $wdturmas->Matriculas);
			$wdturmas->Sala = $this->SafeGetVal($json, 'sala', $wdturmas->Sala);
			$wdturmas->Status = $this->SafeGetVal($json, 'status', $wdturmas->Status);

			$wdturmas->Validate();
			$errors = $wdturmas->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$wdturmas->Save();
				$this->RenderJSON($wdturmas, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}


		}
		catch (Exception $ex)
		{


			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method deletes an existing WdTurmas record and render response as JSON
	 */
	public function Delete()
	{
		try
		{
						
			// TODO: if a soft delete is prefered, change this to update the deleted flag instead of hard-deleting

			$pk = $this->GetRouter()->GetUrlParam('idTur');
			$wdturmas = $this->Phreezer->Get('WdTurmas',$pk);

			$wdturmas->Delete();

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

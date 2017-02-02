<?php
/** @package    admP::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/HistoricoAluno.php");

/**
 * HistoricoAlunoController is the controller class for the HistoricoAluno object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package admP::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class HistoricoAlunoController extends AppBaseController
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
	 * Displays a list view of HistoricoAluno objects
	 */
	public function ListView()
	{
		$this->Render();
	}

	/**
	 * API Method queries for HistoricoAluno records and render as JSON
	 */
	public function Query()
	{
		try
		{
			$criteria = new HistoricoAlunoCriteria();
			
			// TODO: this will limit results based on all properties included in the filter list 
			$filter = RequestUtil::Get('filter');
			if ($filter) $criteria->AddFilter(
				new CriteriaFilter('IdHis,IdAlu,IdTur,Data,Hora,Idfun,MatrUnidade,DataTrans,HoraTrans'
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

				$historicoalunos = $this->Phreezer->Query('HistoricoAluno',$criteria)->GetDataPage($page, $pagesize);
				$output->rows = $historicoalunos->ToObjectArray(true,$this->SimpleObjectParams());
				$output->totalResults = $historicoalunos->TotalResults;
				$output->totalPages = $historicoalunos->TotalPages;
				$output->pageSize = $historicoalunos->PageSize;
				$output->currentPage = $historicoalunos->CurrentPage;
			}
			else
			{
				// return all results
				$historicoalunos = $this->Phreezer->Query('HistoricoAluno',$criteria);
				$output->rows = $historicoalunos->ToObjectArray(true, $this->SimpleObjectParams());
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
	 * API Method retrieves a single HistoricoAluno record and render as JSON
	 */
	public function Read()
	{
		try
		{
			$pk = $this->GetRouter()->GetUrlParam('idHis');
			$historicoaluno = $this->Phreezer->Get('HistoricoAluno',$pk);
			$this->RenderJSON($historicoaluno, $this->JSONPCallback(), true, $this->SimpleObjectParams());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method inserts a new HistoricoAluno record and render response as JSON
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

			$historicoaluno = new HistoricoAluno($this->Phreezer);

			// TODO: any fields that should not be inserted by the user should be commented out

			// this is an auto-increment.  uncomment if updating is allowed
			// $historicoaluno->IdHis = $this->SafeGetVal($json, 'idHis');

			$historicoaluno->IdAlu = $this->SafeGetVal($json, 'idAlu');
			$historicoaluno->IdTur = $this->SafeGetVal($json, 'idTur');
			$historicoaluno->Data = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'data')));
			$historicoaluno->Hora = date('H:i:s',strtotime('1970-01-01 ' . $this->SafeGetVal($json, 'hora')));
			$historicoaluno->Idfun = $this->SafeGetVal($json, 'idfun');
			$historicoaluno->MatrUnidade = $this->SafeGetVal($json, 'matrUnidade');
			$historicoaluno->DataTrans = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'dataTrans')));
			$historicoaluno->HoraTrans = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'horaTrans')));

			$historicoaluno->Validate();
			$errors = $historicoaluno->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$historicoaluno->Save();
				$this->RenderJSON($historicoaluno, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method updates an existing HistoricoAluno record and render response as JSON
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

			$pk = $this->GetRouter()->GetUrlParam('idHis');
			$historicoaluno = $this->Phreezer->Get('HistoricoAluno',$pk);

			// TODO: any fields that should not be updated by the user should be commented out

			// this is a primary key.  uncomment if updating is allowed
			// $historicoaluno->IdHis = $this->SafeGetVal($json, 'idHis', $historicoaluno->IdHis);

			$historicoaluno->IdAlu = $this->SafeGetVal($json, 'idAlu', $historicoaluno->IdAlu);
			$historicoaluno->IdTur = $this->SafeGetVal($json, 'idTur', $historicoaluno->IdTur);
			$historicoaluno->Data = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'data', $historicoaluno->Data)));
			$historicoaluno->Hora = date('Y-m-d H:i:s',strtotime('1970-01-01 ' . $this->SafeGetVal($json, 'hora', $historicoaluno->Hora)));
			$historicoaluno->Idfun = $this->SafeGetVal($json, 'idfun', $historicoaluno->Idfun);
			$historicoaluno->MatrUnidade = $this->SafeGetVal($json, 'matrUnidade', $historicoaluno->MatrUnidade);
			$historicoaluno->DataTrans = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'dataTrans', $historicoaluno->DataTrans)));
			$historicoaluno->HoraTrans = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'horaTrans', $historicoaluno->HoraTrans)));

			$historicoaluno->Validate();
			$errors = $historicoaluno->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$historicoaluno->Save();
				$this->RenderJSON($historicoaluno, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}


		}
		catch (Exception $ex)
		{


			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method deletes an existing HistoricoAluno record and render response as JSON
	 */
	public function Delete()
	{
		try
		{
						
			// TODO: if a soft delete is prefered, change this to update the deleted flag instead of hard-deleting

			$pk = $this->GetRouter()->GetUrlParam('idHis');
			$historicoaluno = $this->Phreezer->Get('HistoricoAluno',$pk);

			$historicoaluno->Delete();

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

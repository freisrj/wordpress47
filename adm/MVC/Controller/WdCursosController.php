<?php
/** @package    admP::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/WdCursos.php");

/**
 * WdCursosController is the controller class for the WdCursos object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package admP::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class WdCursosController extends AppBaseController
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
	 * Displays a list view of WdCursos objects
	 */
	public function ListView()
	{
		$this->Render();
	}

	/**
	 * API Method queries for WdCursos records and render as JSON
	 */
	public function Query()
	{
		try
		{
			$criteria = new WdCursosCriteria();
			
			// TODO: this will limit results based on all properties included in the filter list 
			$filter = RequestUtil::Get('filter');
			if ($filter) $criteria->AddFilter(
				new CriteriaFilter('Curso,IdCur,IdTip,Valido,Pesquisa,Objetivo,PreRequisito,Metodologia,Cargahora,Materia1,Idcur1,Cargah1,Conteudo1,Materia2,Idcur2,Conteudo2,Cargah2,Materia3,Idcur3,Conteudo3,Cargah3,Materia4,Idcur4,Conteudo4,Cargah4,Materia5,Idcur5,Conteudo5,Cargah5,Materia6,Idcur6,Conteudo6,Cargah6,Materia7,Idcur7,Conteudo7,Cargah7,Materia8,Idcur8,Conteudo8,Cargah8,Livro,Image,Banner'
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

				$wdcursoses = $this->Phreezer->Query('WdCursos',$criteria)->GetDataPage($page, $pagesize);
				$output->rows = $wdcursoses->ToObjectArray(true,$this->SimpleObjectParams());
				$output->totalResults = $wdcursoses->TotalResults;
				$output->totalPages = $wdcursoses->TotalPages;
				$output->pageSize = $wdcursoses->PageSize;
				$output->currentPage = $wdcursoses->CurrentPage;
			}
			else
			{
				// return all results
				$wdcursoses = $this->Phreezer->Query('WdCursos',$criteria);
				$output->rows = $wdcursoses->ToObjectArray(true, $this->SimpleObjectParams());
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
	 * API Method retrieves a single WdCursos record and render as JSON
	 */
	public function Read()
	{
		try
		{
			$pk = $this->GetRouter()->GetUrlParam('idCur');
			$wdcursos = $this->Phreezer->Get('WdCursos',$pk);
			$this->RenderJSON($wdcursos, $this->JSONPCallback(), true, $this->SimpleObjectParams());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method inserts a new WdCursos record and render response as JSON
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

			$wdcursos = new WdCursos($this->Phreezer);

			// TODO: any fields that should not be inserted by the user should be commented out

			$wdcursos->Curso = $this->SafeGetVal($json, 'curso');
			// this is an auto-increment.  uncomment if updating is allowed
			// $wdcursos->IdCur = $this->SafeGetVal($json, 'idCur');

			$wdcursos->IdTip = $this->SafeGetVal($json, 'idTip');
			$wdcursos->Valido = $this->SafeGetVal($json, 'valido');
			$wdcursos->Pesquisa = $this->SafeGetVal($json, 'pesquisa');
			$wdcursos->Objetivo = $this->SafeGetVal($json, 'objetivo');
			$wdcursos->PreRequisito = $this->SafeGetVal($json, 'preRequisito');
			$wdcursos->Metodologia = $this->SafeGetVal($json, 'metodologia');
			$wdcursos->Cargahora = $this->SafeGetVal($json, 'cargahora');
			$wdcursos->Materia1 = $this->SafeGetVal($json, 'materia1');
			$wdcursos->Idcur1 = $this->SafeGetVal($json, 'idcur1');
			$wdcursos->Cargah1 = $this->SafeGetVal($json, 'cargah1');
			$wdcursos->Conteudo1 = $this->SafeGetVal($json, 'conteudo1');
			$wdcursos->Materia2 = $this->SafeGetVal($json, 'materia2');
			$wdcursos->Idcur2 = $this->SafeGetVal($json, 'idcur2');
			$wdcursos->Conteudo2 = $this->SafeGetVal($json, 'conteudo2');
			$wdcursos->Cargah2 = $this->SafeGetVal($json, 'cargah2');
			$wdcursos->Materia3 = $this->SafeGetVal($json, 'materia3');
			$wdcursos->Idcur3 = $this->SafeGetVal($json, 'idcur3');
			$wdcursos->Conteudo3 = $this->SafeGetVal($json, 'conteudo3');
			$wdcursos->Cargah3 = $this->SafeGetVal($json, 'cargah3');
			$wdcursos->Materia4 = $this->SafeGetVal($json, 'materia4');
			$wdcursos->Idcur4 = $this->SafeGetVal($json, 'idcur4');
			$wdcursos->Conteudo4 = $this->SafeGetVal($json, 'conteudo4');
			$wdcursos->Cargah4 = $this->SafeGetVal($json, 'cargah4');
			$wdcursos->Materia5 = $this->SafeGetVal($json, 'materia5');
			$wdcursos->Idcur5 = $this->SafeGetVal($json, 'idcur5');
			$wdcursos->Conteudo5 = $this->SafeGetVal($json, 'conteudo5');
			$wdcursos->Cargah5 = $this->SafeGetVal($json, 'cargah5');
			$wdcursos->Materia6 = $this->SafeGetVal($json, 'materia6');
			$wdcursos->Idcur6 = $this->SafeGetVal($json, 'idcur6');
			$wdcursos->Conteudo6 = $this->SafeGetVal($json, 'conteudo6');
			$wdcursos->Cargah6 = $this->SafeGetVal($json, 'cargah6');
			$wdcursos->Materia7 = $this->SafeGetVal($json, 'materia7');
			$wdcursos->Idcur7 = $this->SafeGetVal($json, 'idcur7');
			$wdcursos->Conteudo7 = $this->SafeGetVal($json, 'conteudo7');
			$wdcursos->Cargah7 = $this->SafeGetVal($json, 'cargah7');
			$wdcursos->Materia8 = $this->SafeGetVal($json, 'materia8');
			$wdcursos->Idcur8 = $this->SafeGetVal($json, 'idcur8');
			$wdcursos->Conteudo8 = $this->SafeGetVal($json, 'conteudo8');
			$wdcursos->Cargah8 = $this->SafeGetVal($json, 'cargah8');
			$wdcursos->Livro = $this->SafeGetVal($json, 'livro');
			$wdcursos->Image = $this->SafeGetVal($json, 'image');
			$wdcursos->Banner = $this->SafeGetVal($json, 'banner');

			$wdcursos->Validate();
			$errors = $wdcursos->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$wdcursos->Save();
				$this->RenderJSON($wdcursos, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method updates an existing WdCursos record and render response as JSON
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
			$wdcursos = $this->Phreezer->Get('WdCursos',$pk);

			// TODO: any fields that should not be updated by the user should be commented out

			$wdcursos->Curso = $this->SafeGetVal($json, 'curso', $wdcursos->Curso);
			// this is a primary key.  uncomment if updating is allowed
			// $wdcursos->IdCur = $this->SafeGetVal($json, 'idCur', $wdcursos->IdCur);

			$wdcursos->IdTip = $this->SafeGetVal($json, 'idTip', $wdcursos->IdTip);
			$wdcursos->Valido = $this->SafeGetVal($json, 'valido', $wdcursos->Valido);
			$wdcursos->Pesquisa = $this->SafeGetVal($json, 'pesquisa', $wdcursos->Pesquisa);
			$wdcursos->Objetivo = $this->SafeGetVal($json, 'objetivo', $wdcursos->Objetivo);
			$wdcursos->PreRequisito = $this->SafeGetVal($json, 'preRequisito', $wdcursos->PreRequisito);
			$wdcursos->Metodologia = $this->SafeGetVal($json, 'metodologia', $wdcursos->Metodologia);
			$wdcursos->Cargahora = $this->SafeGetVal($json, 'cargahora', $wdcursos->Cargahora);
			$wdcursos->Materia1 = $this->SafeGetVal($json, 'materia1', $wdcursos->Materia1);
			$wdcursos->Idcur1 = $this->SafeGetVal($json, 'idcur1', $wdcursos->Idcur1);
			$wdcursos->Cargah1 = $this->SafeGetVal($json, 'cargah1', $wdcursos->Cargah1);
			$wdcursos->Conteudo1 = $this->SafeGetVal($json, 'conteudo1', $wdcursos->Conteudo1);
			$wdcursos->Materia2 = $this->SafeGetVal($json, 'materia2', $wdcursos->Materia2);
			$wdcursos->Idcur2 = $this->SafeGetVal($json, 'idcur2', $wdcursos->Idcur2);
			$wdcursos->Conteudo2 = $this->SafeGetVal($json, 'conteudo2', $wdcursos->Conteudo2);
			$wdcursos->Cargah2 = $this->SafeGetVal($json, 'cargah2', $wdcursos->Cargah2);
			$wdcursos->Materia3 = $this->SafeGetVal($json, 'materia3', $wdcursos->Materia3);
			$wdcursos->Idcur3 = $this->SafeGetVal($json, 'idcur3', $wdcursos->Idcur3);
			$wdcursos->Conteudo3 = $this->SafeGetVal($json, 'conteudo3', $wdcursos->Conteudo3);
			$wdcursos->Cargah3 = $this->SafeGetVal($json, 'cargah3', $wdcursos->Cargah3);
			$wdcursos->Materia4 = $this->SafeGetVal($json, 'materia4', $wdcursos->Materia4);
			$wdcursos->Idcur4 = $this->SafeGetVal($json, 'idcur4', $wdcursos->Idcur4);
			$wdcursos->Conteudo4 = $this->SafeGetVal($json, 'conteudo4', $wdcursos->Conteudo4);
			$wdcursos->Cargah4 = $this->SafeGetVal($json, 'cargah4', $wdcursos->Cargah4);
			$wdcursos->Materia5 = $this->SafeGetVal($json, 'materia5', $wdcursos->Materia5);
			$wdcursos->Idcur5 = $this->SafeGetVal($json, 'idcur5', $wdcursos->Idcur5);
			$wdcursos->Conteudo5 = $this->SafeGetVal($json, 'conteudo5', $wdcursos->Conteudo5);
			$wdcursos->Cargah5 = $this->SafeGetVal($json, 'cargah5', $wdcursos->Cargah5);
			$wdcursos->Materia6 = $this->SafeGetVal($json, 'materia6', $wdcursos->Materia6);
			$wdcursos->Idcur6 = $this->SafeGetVal($json, 'idcur6', $wdcursos->Idcur6);
			$wdcursos->Conteudo6 = $this->SafeGetVal($json, 'conteudo6', $wdcursos->Conteudo6);
			$wdcursos->Cargah6 = $this->SafeGetVal($json, 'cargah6', $wdcursos->Cargah6);
			$wdcursos->Materia7 = $this->SafeGetVal($json, 'materia7', $wdcursos->Materia7);
			$wdcursos->Idcur7 = $this->SafeGetVal($json, 'idcur7', $wdcursos->Idcur7);
			$wdcursos->Conteudo7 = $this->SafeGetVal($json, 'conteudo7', $wdcursos->Conteudo7);
			$wdcursos->Cargah7 = $this->SafeGetVal($json, 'cargah7', $wdcursos->Cargah7);
			$wdcursos->Materia8 = $this->SafeGetVal($json, 'materia8', $wdcursos->Materia8);
			$wdcursos->Idcur8 = $this->SafeGetVal($json, 'idcur8', $wdcursos->Idcur8);
			$wdcursos->Conteudo8 = $this->SafeGetVal($json, 'conteudo8', $wdcursos->Conteudo8);
			$wdcursos->Cargah8 = $this->SafeGetVal($json, 'cargah8', $wdcursos->Cargah8);
			$wdcursos->Livro = $this->SafeGetVal($json, 'livro', $wdcursos->Livro);
			$wdcursos->Image = $this->SafeGetVal($json, 'image', $wdcursos->Image);
			$wdcursos->Banner = $this->SafeGetVal($json, 'banner', $wdcursos->Banner);

			$wdcursos->Validate();
			$errors = $wdcursos->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$wdcursos->Save();
				$this->RenderJSON($wdcursos, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}


		}
		catch (Exception $ex)
		{


			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method deletes an existing WdCursos record and render response as JSON
	 */
	public function Delete()
	{
		try
		{
						
			// TODO: if a soft delete is prefered, change this to update the deleted flag instead of hard-deleting

			$pk = $this->GetRouter()->GetUrlParam('idCur');
			$wdcursos = $this->Phreezer->Get('WdCursos',$pk);

			$wdcursos->Delete();

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

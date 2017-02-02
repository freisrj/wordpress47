<?php
/** @package    admP::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/Atendimento.php");

/**
 * AtendimentoController is the controller class for the Atendimento object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package admP::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class AtendimentoController extends AppBaseController
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
	 * Displays a list view of Atendimento objects
	 */
	public function ListView()
	{
		$this->Render();
	}

	/**
	 * API Method queries for Atendimento records and render as JSON
	 */
	public function Query()
	{
		try
		{
			$criteria = new AtendimentoCriteria();
			
			// TODO: this will limit results based on all properties included in the filter list 
			$filter = RequestUtil::Get('filter');
			if ($filter) $criteria->AddFilter(
				new CriteriaFilter('IdAte,IdFun,Webmail,Unidade,Dia,Mes,Ano,Hora,Minuto,Nome,Soube,IdCur,Dias,Horario,Turno,Email,Tel1,Tel2,Tel3,Obs'
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

				$atendimentos = $this->Phreezer->Query('Atendimento',$criteria)->GetDataPage($page, $pagesize);
				$output->rows = $atendimentos->ToObjectArray(true,$this->SimpleObjectParams());
				$output->totalResults = $atendimentos->TotalResults;
				$output->totalPages = $atendimentos->TotalPages;
				$output->pageSize = $atendimentos->PageSize;
				$output->currentPage = $atendimentos->CurrentPage;
			}
			else
			{
				// return all results
				$atendimentos = $this->Phreezer->Query('Atendimento',$criteria);
				$output->rows = $atendimentos->ToObjectArray(true, $this->SimpleObjectParams());
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
	 * API Method retrieves a single Atendimento record and render as JSON
	 */
	public function Read()
	{
		try
		{
			$pk = $this->GetRouter()->GetUrlParam('idAte');
			$atendimento = $this->Phreezer->Get('Atendimento',$pk);
			$this->RenderJSON($atendimento, $this->JSONPCallback(), true, $this->SimpleObjectParams());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method inserts a new Atendimento record and render response as JSON
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

			$atendimento = new Atendimento($this->Phreezer);

			// TODO: any fields that should not be inserted by the user should be commented out

			// this is an auto-increment.  uncomment if updating is allowed
			// $atendimento->IdAte = $this->SafeGetVal($json, 'idAte');

			$atendimento->IdFun = $this->SafeGetVal($json, 'idFun');
			$atendimento->Webmail = $this->SafeGetVal($json, 'webmail');
			$atendimento->Unidade = $this->SafeGetVal($json, 'unidade');
			$atendimento->Dia = $this->SafeGetVal($json, 'dia');
			$atendimento->Mes = $this->SafeGetVal($json, 'mes');
			$atendimento->Ano = $this->SafeGetVal($json, 'ano');
			$atendimento->Hora = $this->SafeGetVal($json, 'hora');
			$atendimento->Minuto = $this->SafeGetVal($json, 'minuto');
			$atendimento->Nome = $this->SafeGetVal($json, 'nome');
			$atendimento->Soube = $this->SafeGetVal($json, 'soube');
			$atendimento->IdCur = $this->SafeGetVal($json, 'idCur');
			$atendimento->Dias = $this->SafeGetVal($json, 'dias');
			$atendimento->Horario = $this->SafeGetVal($json, 'horario');
			$atendimento->Turno = $this->SafeGetVal($json, 'turno');
			$atendimento->Email = $this->SafeGetVal($json, 'email');
			$atendimento->Tel1 = $this->SafeGetVal($json, 'tel1');
			$atendimento->Tel2 = $this->SafeGetVal($json, 'tel2');
			$atendimento->Tel3 = $this->SafeGetVal($json, 'tel3');
			$atendimento->Obs = $this->SafeGetVal($json, 'obs');

			$atendimento->Validate();
			$errors = $atendimento->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$atendimento->Save();
				$this->RenderJSON($atendimento, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method updates an existing Atendimento record and render response as JSON
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

			$pk = $this->GetRouter()->GetUrlParam('idAte');
			$atendimento = $this->Phreezer->Get('Atendimento',$pk);

			// TODO: any fields that should not be updated by the user should be commented out

			// this is a primary key.  uncomment if updating is allowed
			// $atendimento->IdAte = $this->SafeGetVal($json, 'idAte', $atendimento->IdAte);

			$atendimento->IdFun = $this->SafeGetVal($json, 'idFun', $atendimento->IdFun);
			$atendimento->Webmail = $this->SafeGetVal($json, 'webmail', $atendimento->Webmail);
			$atendimento->Unidade = $this->SafeGetVal($json, 'unidade', $atendimento->Unidade);
			$atendimento->Dia = $this->SafeGetVal($json, 'dia', $atendimento->Dia);
			$atendimento->Mes = $this->SafeGetVal($json, 'mes', $atendimento->Mes);
			$atendimento->Ano = $this->SafeGetVal($json, 'ano', $atendimento->Ano);
			$atendimento->Hora = $this->SafeGetVal($json, 'hora', $atendimento->Hora);
			$atendimento->Minuto = $this->SafeGetVal($json, 'minuto', $atendimento->Minuto);
			$atendimento->Nome = $this->SafeGetVal($json, 'nome', $atendimento->Nome);
			$atendimento->Soube = $this->SafeGetVal($json, 'soube', $atendimento->Soube);
			$atendimento->IdCur = $this->SafeGetVal($json, 'idCur', $atendimento->IdCur);
			$atendimento->Dias = $this->SafeGetVal($json, 'dias', $atendimento->Dias);
			$atendimento->Horario = $this->SafeGetVal($json, 'horario', $atendimento->Horario);
			$atendimento->Turno = $this->SafeGetVal($json, 'turno', $atendimento->Turno);
			$atendimento->Email = $this->SafeGetVal($json, 'email', $atendimento->Email);
			$atendimento->Tel1 = $this->SafeGetVal($json, 'tel1', $atendimento->Tel1);
			$atendimento->Tel2 = $this->SafeGetVal($json, 'tel2', $atendimento->Tel2);
			$atendimento->Tel3 = $this->SafeGetVal($json, 'tel3', $atendimento->Tel3);
			$atendimento->Obs = $this->SafeGetVal($json, 'obs', $atendimento->Obs);

			$atendimento->Validate();
			$errors = $atendimento->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$atendimento->Save();
				$this->RenderJSON($atendimento, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}


		}
		catch (Exception $ex)
		{


			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method deletes an existing Atendimento record and render response as JSON
	 */
	public function Delete()
	{
		try
		{
						
			// TODO: if a soft delete is prefered, change this to update the deleted flag instead of hard-deleting

			$pk = $this->GetRouter()->GetUrlParam('idAte');
			$atendimento = $this->Phreezer->Get('Atendimento',$pk);

			$atendimento->Delete();

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

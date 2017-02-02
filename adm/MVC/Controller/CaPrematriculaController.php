<?php
/** @package    admP::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/CaPrematricula.php");

/**
 * CaPrematriculaController is the controller class for the CaPrematricula object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package admP::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class CaPrematriculaController extends AppBaseController
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
	 * Displays a list view of CaPrematricula objects
	 */
	public function ListView()
	{
		$this->Render();
	}

	/**
	 * API Method queries for CaPrematricula records and render as JSON
	 */
	public function Query()
	{
		try
		{
			$criteria = new CaPrematriculaCriteria();
			
			// TODO: this will limit results based on all properties included in the filter list 
			$filter = RequestUtil::Get('filter');
			if ($filter) $criteria->AddFilter(
				new CriteriaFilter('IdPre,IdTur,Webmail,Soube,Data,Hora,Nome,Endereco,Cidade,Bairro,Estado,Cep,Email,Telefone,Celular,Nextel,Situacao,Turno,Curso,Resposta,Idfun,Ip'
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

				$caprematriculas = $this->Phreezer->Query('CaPrematricula',$criteria)->GetDataPage($page, $pagesize);
				$output->rows = $caprematriculas->ToObjectArray(true,$this->SimpleObjectParams());
				$output->totalResults = $caprematriculas->TotalResults;
				$output->totalPages = $caprematriculas->TotalPages;
				$output->pageSize = $caprematriculas->PageSize;
				$output->currentPage = $caprematriculas->CurrentPage;
			}
			else
			{
				// return all results
				$caprematriculas = $this->Phreezer->Query('CaPrematricula',$criteria);
				$output->rows = $caprematriculas->ToObjectArray(true, $this->SimpleObjectParams());
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
	 * API Method retrieves a single CaPrematricula record and render as JSON
	 */
	public function Read()
	{
		try
		{
			$pk = $this->GetRouter()->GetUrlParam('idPre');
			$caprematricula = $this->Phreezer->Get('CaPrematricula',$pk);
			$this->RenderJSON($caprematricula, $this->JSONPCallback(), true, $this->SimpleObjectParams());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method inserts a new CaPrematricula record and render response as JSON
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

			$caprematricula = new CaPrematricula($this->Phreezer);

			// TODO: any fields that should not be inserted by the user should be commented out

			// this is an auto-increment.  uncomment if updating is allowed
			// $caprematricula->IdPre = $this->SafeGetVal($json, 'idPre');

			$caprematricula->IdTur = $this->SafeGetVal($json, 'idTur');
			$caprematricula->Webmail = $this->SafeGetVal($json, 'webmail');
			$caprematricula->Soube = $this->SafeGetVal($json, 'soube');
			$caprematricula->Data = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'data')));
			$caprematricula->Hora = date('H:i:s',strtotime('1970-01-01 ' . $this->SafeGetVal($json, 'hora')));
			$caprematricula->Nome = $this->SafeGetVal($json, 'nome');
			$caprematricula->Endereco = $this->SafeGetVal($json, 'endereco');
			$caprematricula->Cidade = $this->SafeGetVal($json, 'cidade');
			$caprematricula->Bairro = $this->SafeGetVal($json, 'bairro');
			$caprematricula->Estado = $this->SafeGetVal($json, 'estado');
			$caprematricula->Cep = $this->SafeGetVal($json, 'cep');
			$caprematricula->Email = $this->SafeGetVal($json, 'email');
			$caprematricula->Telefone = $this->SafeGetVal($json, 'telefone');
			$caprematricula->Celular = $this->SafeGetVal($json, 'celular');
			$caprematricula->Nextel = $this->SafeGetVal($json, 'nextel');
			$caprematricula->Situacao = $this->SafeGetVal($json, 'situacao');
			$caprematricula->Turno = $this->SafeGetVal($json, 'turno');
			$caprematricula->Curso = $this->SafeGetVal($json, 'curso');
			$caprematricula->Resposta = $this->SafeGetVal($json, 'resposta');
			$caprematricula->Idfun = $this->SafeGetVal($json, 'idfun');
			$caprematricula->Ip = $this->SafeGetVal($json, 'ip');

			$caprematricula->Validate();
			$errors = $caprematricula->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$caprematricula->Save();
				$this->RenderJSON($caprematricula, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method updates an existing CaPrematricula record and render response as JSON
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
			$caprematricula = $this->Phreezer->Get('CaPrematricula',$pk);

			// TODO: any fields that should not be updated by the user should be commented out

			// this is a primary key.  uncomment if updating is allowed
			// $caprematricula->IdPre = $this->SafeGetVal($json, 'idPre', $caprematricula->IdPre);

			$caprematricula->IdTur = $this->SafeGetVal($json, 'idTur', $caprematricula->IdTur);
			$caprematricula->Webmail = $this->SafeGetVal($json, 'webmail', $caprematricula->Webmail);
			$caprematricula->Soube = $this->SafeGetVal($json, 'soube', $caprematricula->Soube);
			$caprematricula->Data = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'data', $caprematricula->Data)));
			$caprematricula->Hora = date('Y-m-d H:i:s',strtotime('1970-01-01 ' . $this->SafeGetVal($json, 'hora', $caprematricula->Hora)));
			$caprematricula->Nome = $this->SafeGetVal($json, 'nome', $caprematricula->Nome);
			$caprematricula->Endereco = $this->SafeGetVal($json, 'endereco', $caprematricula->Endereco);
			$caprematricula->Cidade = $this->SafeGetVal($json, 'cidade', $caprematricula->Cidade);
			$caprematricula->Bairro = $this->SafeGetVal($json, 'bairro', $caprematricula->Bairro);
			$caprematricula->Estado = $this->SafeGetVal($json, 'estado', $caprematricula->Estado);
			$caprematricula->Cep = $this->SafeGetVal($json, 'cep', $caprematricula->Cep);
			$caprematricula->Email = $this->SafeGetVal($json, 'email', $caprematricula->Email);
			$caprematricula->Telefone = $this->SafeGetVal($json, 'telefone', $caprematricula->Telefone);
			$caprematricula->Celular = $this->SafeGetVal($json, 'celular', $caprematricula->Celular);
			$caprematricula->Nextel = $this->SafeGetVal($json, 'nextel', $caprematricula->Nextel);
			$caprematricula->Situacao = $this->SafeGetVal($json, 'situacao', $caprematricula->Situacao);
			$caprematricula->Turno = $this->SafeGetVal($json, 'turno', $caprematricula->Turno);
			$caprematricula->Curso = $this->SafeGetVal($json, 'curso', $caprematricula->Curso);
			$caprematricula->Resposta = $this->SafeGetVal($json, 'resposta', $caprematricula->Resposta);
			$caprematricula->Idfun = $this->SafeGetVal($json, 'idfun', $caprematricula->Idfun);
			$caprematricula->Ip = $this->SafeGetVal($json, 'ip', $caprematricula->Ip);

			$caprematricula->Validate();
			$errors = $caprematricula->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$caprematricula->Save();
				$this->RenderJSON($caprematricula, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}


		}
		catch (Exception $ex)
		{


			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method deletes an existing CaPrematricula record and render response as JSON
	 */
	public function Delete()
	{
		try
		{
						
			// TODO: if a soft delete is prefered, change this to update the deleted flag instead of hard-deleting

			$pk = $this->GetRouter()->GetUrlParam('idPre');
			$caprematricula = $this->Phreezer->Get('CaPrematricula',$pk);

			$caprematricula->Delete();

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

<?php
/** @package    admP::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/Alunos.php");

/**
 * AlunosController is the controller class for the Alunos object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package admP::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class AlunosController extends AppBaseController
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
	 * Displays a list view of Alunos objects
	 */
	public function ListView()
	{
		$this->Render();
	}

	/**
	 * API Method queries for Alunos records and render as JSON
	 */
	public function Query()
	{
		try
		{
			$criteria = new AlunosCriteria();
			
			// TODO: this will limit results based on all properties included in the filter list 
			$filter = RequestUtil::Get('filter');
			if ($filter) $criteria->AddFilter(
				new CriteriaFilter('IdAlu,IdTur,Webmail,Nome,Endereco,Cidade,Bairro,Estado,Cep,Email,Nascimento,Cpf,Identidade,Orgao,EstadoCivil,Nacionalidade,Profissao,Telefone,Celular,Nextel,DataMatricula,HoraMatricula,Netbook,Idfun,IdIndica,MatrUnidade'
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

				$alunoses = $this->Phreezer->Query('Alunos',$criteria)->GetDataPage($page, $pagesize);
				$output->rows = $alunoses->ToObjectArray(true,$this->SimpleObjectParams());
				$output->totalResults = $alunoses->TotalResults;
				$output->totalPages = $alunoses->TotalPages;
				$output->pageSize = $alunoses->PageSize;
				$output->currentPage = $alunoses->CurrentPage;
			}
			else
			{
				// return all results
				$alunoses = $this->Phreezer->Query('Alunos',$criteria);
				$output->rows = $alunoses->ToObjectArray(true, $this->SimpleObjectParams());
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
	 * API Method retrieves a single Alunos record and render as JSON
	 */
	public function Read()
	{
		try
		{
			$pk = $this->GetRouter()->GetUrlParam('idAlu');
			$alunos = $this->Phreezer->Get('Alunos',$pk);
			$this->RenderJSON($alunos, $this->JSONPCallback(), true, $this->SimpleObjectParams());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method inserts a new Alunos record and render response as JSON
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

			$alunos = new Alunos($this->Phreezer);

			// TODO: any fields that should not be inserted by the user should be commented out

			// this is an auto-increment.  uncomment if updating is allowed
			// $alunos->IdAlu = $this->SafeGetVal($json, 'idAlu');

			$alunos->IdTur = $this->SafeGetVal($json, 'idTur');
			$alunos->Webmail = $this->SafeGetVal($json, 'webmail');
			$alunos->Nome = $this->SafeGetVal($json, 'nome');
			$alunos->Endereco = $this->SafeGetVal($json, 'endereco');
			$alunos->Cidade = $this->SafeGetVal($json, 'cidade');
			$alunos->Bairro = $this->SafeGetVal($json, 'bairro');
			$alunos->Estado = $this->SafeGetVal($json, 'estado');
			$alunos->Cep = $this->SafeGetVal($json, 'cep');
			$alunos->Email = $this->SafeGetVal($json, 'email');
			$alunos->Nascimento = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'nascimento')));
			$alunos->Cpf = $this->SafeGetVal($json, 'cpf');
			$alunos->Identidade = $this->SafeGetVal($json, 'identidade');
			$alunos->Orgao = $this->SafeGetVal($json, 'orgao');
			$alunos->EstadoCivil = $this->SafeGetVal($json, 'estadoCivil');
			$alunos->Nacionalidade = $this->SafeGetVal($json, 'nacionalidade');
			$alunos->Profissao = $this->SafeGetVal($json, 'profissao');
			$alunos->Telefone = $this->SafeGetVal($json, 'telefone');
			$alunos->Celular = $this->SafeGetVal($json, 'celular');
			$alunos->Nextel = $this->SafeGetVal($json, 'nextel');
			$alunos->DataMatricula = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'dataMatricula')));
			$alunos->HoraMatricula = date('H:i:s',strtotime('1970-01-01 ' . $this->SafeGetVal($json, 'horaMatricula')));
			$alunos->Netbook = $this->SafeGetVal($json, 'netbook');
			$alunos->Idfun = $this->SafeGetVal($json, 'idfun');
			$alunos->IdIndica = $this->SafeGetVal($json, 'idIndica');
			$alunos->MatrUnidade = $this->SafeGetVal($json, 'matrUnidade');

			$alunos->Validate();
			$errors = $alunos->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$alunos->Save();
				$this->RenderJSON($alunos, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method updates an existing Alunos record and render response as JSON
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

			$pk = $this->GetRouter()->GetUrlParam('idAlu');
			$alunos = $this->Phreezer->Get('Alunos',$pk);

			// TODO: any fields that should not be updated by the user should be commented out

			// this is a primary key.  uncomment if updating is allowed
			// $alunos->IdAlu = $this->SafeGetVal($json, 'idAlu', $alunos->IdAlu);

			$alunos->IdTur = $this->SafeGetVal($json, 'idTur', $alunos->IdTur);
			$alunos->Webmail = $this->SafeGetVal($json, 'webmail', $alunos->Webmail);
			$alunos->Nome = $this->SafeGetVal($json, 'nome', $alunos->Nome);
			$alunos->Endereco = $this->SafeGetVal($json, 'endereco', $alunos->Endereco);
			$alunos->Cidade = $this->SafeGetVal($json, 'cidade', $alunos->Cidade);
			$alunos->Bairro = $this->SafeGetVal($json, 'bairro', $alunos->Bairro);
			$alunos->Estado = $this->SafeGetVal($json, 'estado', $alunos->Estado);
			$alunos->Cep = $this->SafeGetVal($json, 'cep', $alunos->Cep);
			$alunos->Email = $this->SafeGetVal($json, 'email', $alunos->Email);
			$alunos->Nascimento = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'nascimento', $alunos->Nascimento)));
			$alunos->Cpf = $this->SafeGetVal($json, 'cpf', $alunos->Cpf);
			$alunos->Identidade = $this->SafeGetVal($json, 'identidade', $alunos->Identidade);
			$alunos->Orgao = $this->SafeGetVal($json, 'orgao', $alunos->Orgao);
			$alunos->EstadoCivil = $this->SafeGetVal($json, 'estadoCivil', $alunos->EstadoCivil);
			$alunos->Nacionalidade = $this->SafeGetVal($json, 'nacionalidade', $alunos->Nacionalidade);
			$alunos->Profissao = $this->SafeGetVal($json, 'profissao', $alunos->Profissao);
			$alunos->Telefone = $this->SafeGetVal($json, 'telefone', $alunos->Telefone);
			$alunos->Celular = $this->SafeGetVal($json, 'celular', $alunos->Celular);
			$alunos->Nextel = $this->SafeGetVal($json, 'nextel', $alunos->Nextel);
			$alunos->DataMatricula = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'dataMatricula', $alunos->DataMatricula)));
			$alunos->HoraMatricula = date('Y-m-d H:i:s',strtotime('1970-01-01 ' . $this->SafeGetVal($json, 'horaMatricula', $alunos->HoraMatricula)));
			$alunos->Netbook = $this->SafeGetVal($json, 'netbook', $alunos->Netbook);
			$alunos->Idfun = $this->SafeGetVal($json, 'idfun', $alunos->Idfun);
			$alunos->IdIndica = $this->SafeGetVal($json, 'idIndica', $alunos->IdIndica);
			$alunos->MatrUnidade = $this->SafeGetVal($json, 'matrUnidade', $alunos->MatrUnidade);

			$alunos->Validate();
			$errors = $alunos->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$alunos->Save();
				$this->RenderJSON($alunos, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}


		}
		catch (Exception $ex)
		{


			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method deletes an existing Alunos record and render response as JSON
	 */
	public function Delete()
	{
		try
		{
						
			// TODO: if a soft delete is prefered, change this to update the deleted flag instead of hard-deleting

			$pk = $this->GetRouter()->GetUrlParam('idAlu');
			$alunos = $this->Phreezer->Get('Alunos',$pk);

			$alunos->Delete();

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

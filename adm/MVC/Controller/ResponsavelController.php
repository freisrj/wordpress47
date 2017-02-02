<?php
/** @package    admP::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/Responsavel.php");

/**
 * ResponsavelController is the controller class for the Responsavel object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package admP::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class ResponsavelController extends AppBaseController
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
	 * Displays a list view of Responsavel objects
	 */
	public function ListView()
	{
		$this->Render();
	}

	/**
	 * API Method queries for Responsavel records and render as JSON
	 */
	public function Query()
	{
		try
		{
			$criteria = new ResponsavelCriteria();
			
			// TODO: this will limit results based on all properties included in the filter list 
			$filter = RequestUtil::Get('filter');
			if ($filter) $criteria->AddFilter(
				new CriteriaFilter('IdRes,IdAlu,Nome,Endereco,Cidade,Bairro,Estado,Cep,Email,Nascimento,Telefone1,Ramal1,Telefone2,Ramal2,Telefone3,Ramal3,Nextel,Cpf,Identidade,Orgao,EstadoCivil,Nacionalidade,Profissao,Ie,Im'
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

				$responsavels = $this->Phreezer->Query('Responsavel',$criteria)->GetDataPage($page, $pagesize);
				$output->rows = $responsavels->ToObjectArray(true,$this->SimpleObjectParams());
				$output->totalResults = $responsavels->TotalResults;
				$output->totalPages = $responsavels->TotalPages;
				$output->pageSize = $responsavels->PageSize;
				$output->currentPage = $responsavels->CurrentPage;
			}
			else
			{
				// return all results
				$responsavels = $this->Phreezer->Query('Responsavel',$criteria);
				$output->rows = $responsavels->ToObjectArray(true, $this->SimpleObjectParams());
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
	 * API Method retrieves a single Responsavel record and render as JSON
	 */
	public function Read()
	{
		try
		{
			$pk = $this->GetRouter()->GetUrlParam('idRes');
			$responsavel = $this->Phreezer->Get('Responsavel',$pk);
			$this->RenderJSON($responsavel, $this->JSONPCallback(), true, $this->SimpleObjectParams());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method inserts a new Responsavel record and render response as JSON
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

			$responsavel = new Responsavel($this->Phreezer);

			// TODO: any fields that should not be inserted by the user should be commented out

			// this is an auto-increment.  uncomment if updating is allowed
			// $responsavel->IdRes = $this->SafeGetVal($json, 'idRes');

			$responsavel->IdAlu = $this->SafeGetVal($json, 'idAlu');
			$responsavel->Nome = $this->SafeGetVal($json, 'nome');
			$responsavel->Endereco = $this->SafeGetVal($json, 'endereco');
			$responsavel->Cidade = $this->SafeGetVal($json, 'cidade');
			$responsavel->Bairro = $this->SafeGetVal($json, 'bairro');
			$responsavel->Estado = $this->SafeGetVal($json, 'estado');
			$responsavel->Cep = $this->SafeGetVal($json, 'cep');
			$responsavel->Email = $this->SafeGetVal($json, 'email');
			$responsavel->Nascimento = $this->SafeGetVal($json, 'nascimento');
			$responsavel->Telefone1 = $this->SafeGetVal($json, 'telefone1');
			$responsavel->Ramal1 = $this->SafeGetVal($json, 'ramal1');
			$responsavel->Telefone2 = $this->SafeGetVal($json, 'telefone2');
			$responsavel->Ramal2 = $this->SafeGetVal($json, 'ramal2');
			$responsavel->Telefone3 = $this->SafeGetVal($json, 'telefone3');
			$responsavel->Ramal3 = $this->SafeGetVal($json, 'ramal3');
			$responsavel->Nextel = $this->SafeGetVal($json, 'nextel');
			$responsavel->Cpf = $this->SafeGetVal($json, 'cpf');
			$responsavel->Identidade = $this->SafeGetVal($json, 'identidade');
			$responsavel->Orgao = $this->SafeGetVal($json, 'orgao');
			$responsavel->EstadoCivil = $this->SafeGetVal($json, 'estadoCivil');
			$responsavel->Nacionalidade = $this->SafeGetVal($json, 'nacionalidade');
			$responsavel->Profissao = $this->SafeGetVal($json, 'profissao');
			$responsavel->Ie = $this->SafeGetVal($json, 'ie');
			$responsavel->Im = $this->SafeGetVal($json, 'im');

			$responsavel->Validate();
			$errors = $responsavel->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$responsavel->Save();
				$this->RenderJSON($responsavel, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method updates an existing Responsavel record and render response as JSON
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

			$pk = $this->GetRouter()->GetUrlParam('idRes');
			$responsavel = $this->Phreezer->Get('Responsavel',$pk);

			// TODO: any fields that should not be updated by the user should be commented out

			// this is a primary key.  uncomment if updating is allowed
			// $responsavel->IdRes = $this->SafeGetVal($json, 'idRes', $responsavel->IdRes);

			$responsavel->IdAlu = $this->SafeGetVal($json, 'idAlu', $responsavel->IdAlu);
			$responsavel->Nome = $this->SafeGetVal($json, 'nome', $responsavel->Nome);
			$responsavel->Endereco = $this->SafeGetVal($json, 'endereco', $responsavel->Endereco);
			$responsavel->Cidade = $this->SafeGetVal($json, 'cidade', $responsavel->Cidade);
			$responsavel->Bairro = $this->SafeGetVal($json, 'bairro', $responsavel->Bairro);
			$responsavel->Estado = $this->SafeGetVal($json, 'estado', $responsavel->Estado);
			$responsavel->Cep = $this->SafeGetVal($json, 'cep', $responsavel->Cep);
			$responsavel->Email = $this->SafeGetVal($json, 'email', $responsavel->Email);
			$responsavel->Nascimento = $this->SafeGetVal($json, 'nascimento', $responsavel->Nascimento);
			$responsavel->Telefone1 = $this->SafeGetVal($json, 'telefone1', $responsavel->Telefone1);
			$responsavel->Ramal1 = $this->SafeGetVal($json, 'ramal1', $responsavel->Ramal1);
			$responsavel->Telefone2 = $this->SafeGetVal($json, 'telefone2', $responsavel->Telefone2);
			$responsavel->Ramal2 = $this->SafeGetVal($json, 'ramal2', $responsavel->Ramal2);
			$responsavel->Telefone3 = $this->SafeGetVal($json, 'telefone3', $responsavel->Telefone3);
			$responsavel->Ramal3 = $this->SafeGetVal($json, 'ramal3', $responsavel->Ramal3);
			$responsavel->Nextel = $this->SafeGetVal($json, 'nextel', $responsavel->Nextel);
			$responsavel->Cpf = $this->SafeGetVal($json, 'cpf', $responsavel->Cpf);
			$responsavel->Identidade = $this->SafeGetVal($json, 'identidade', $responsavel->Identidade);
			$responsavel->Orgao = $this->SafeGetVal($json, 'orgao', $responsavel->Orgao);
			$responsavel->EstadoCivil = $this->SafeGetVal($json, 'estadoCivil', $responsavel->EstadoCivil);
			$responsavel->Nacionalidade = $this->SafeGetVal($json, 'nacionalidade', $responsavel->Nacionalidade);
			$responsavel->Profissao = $this->SafeGetVal($json, 'profissao', $responsavel->Profissao);
			$responsavel->Ie = $this->SafeGetVal($json, 'ie', $responsavel->Ie);
			$responsavel->Im = $this->SafeGetVal($json, 'im', $responsavel->Im);

			$responsavel->Validate();
			$errors = $responsavel->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$responsavel->Save();
				$this->RenderJSON($responsavel, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}


		}
		catch (Exception $ex)
		{


			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method deletes an existing Responsavel record and render response as JSON
	 */
	public function Delete()
	{
		try
		{
						
			// TODO: if a soft delete is prefered, change this to update the deleted flag instead of hard-deleting

			$pk = $this->GetRouter()->GetUrlParam('idRes');
			$responsavel = $this->Phreezer->Get('Responsavel',$pk);

			$responsavel->Delete();

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

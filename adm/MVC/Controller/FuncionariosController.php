<?php
/** @package    admP::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/Funcionarios.php");

/**
 * FuncionariosController is the controller class for the Funcionarios object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package admP::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class FuncionariosController extends AppBaseController
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
	 * Displays a list view of Funcionarios objects
	 */
	public function ListView()
	{
		$this->Render();
	}

	/**
	 * API Method queries for Funcionarios records and render as JSON
	 */
	public function Query()
	{
		try
		{
			$criteria = new FuncionariosCriteria();
			
			// TODO: this will limit results based on all properties included in the filter list 
			$filter = RequestUtil::Get('filter');
			if ($filter) $criteria->AddFilter(
				new CriteriaFilter('IdFun,Apelido,Nome,Telefone,Celular,Endereco,Bairro,Funcao,Cidade,Cep,Uf'
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

				$funcionarioses = $this->Phreezer->Query('Funcionarios',$criteria)->GetDataPage($page, $pagesize);
				$output->rows = $funcionarioses->ToObjectArray(true,$this->SimpleObjectParams());
				$output->totalResults = $funcionarioses->TotalResults;
				$output->totalPages = $funcionarioses->TotalPages;
				$output->pageSize = $funcionarioses->PageSize;
				$output->currentPage = $funcionarioses->CurrentPage;
			}
			else
			{
				// return all results
				$funcionarioses = $this->Phreezer->Query('Funcionarios',$criteria);
				$output->rows = $funcionarioses->ToObjectArray(true, $this->SimpleObjectParams());
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
	 * API Method retrieves a single Funcionarios record and render as JSON
	 */
	public function Read()
	{
		try
		{
			$pk = $this->GetRouter()->GetUrlParam('idFun');
			$funcionarios = $this->Phreezer->Get('Funcionarios',$pk);
			$this->RenderJSON($funcionarios, $this->JSONPCallback(), true, $this->SimpleObjectParams());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method inserts a new Funcionarios record and render response as JSON
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

			$funcionarios = new Funcionarios($this->Phreezer);

			// TODO: any fields that should not be inserted by the user should be commented out

			// this is an auto-increment.  uncomment if updating is allowed
			// $funcionarios->IdFun = $this->SafeGetVal($json, 'idFun');

			$funcionarios->Apelido = $this->SafeGetVal($json, 'apelido');
			$funcionarios->Nome = $this->SafeGetVal($json, 'nome');
			$funcionarios->Telefone = $this->SafeGetVal($json, 'telefone');
			$funcionarios->Celular = $this->SafeGetVal($json, 'celular');
			$funcionarios->Endereco = $this->SafeGetVal($json, 'endereco');
			$funcionarios->Bairro = $this->SafeGetVal($json, 'bairro');
			$funcionarios->Funcao = $this->SafeGetVal($json, 'funcao');
			$funcionarios->Cidade = $this->SafeGetVal($json, 'cidade');
			$funcionarios->Cep = $this->SafeGetVal($json, 'cep');
			$funcionarios->Uf = $this->SafeGetVal($json, 'uf');

			$funcionarios->Validate();
			$errors = $funcionarios->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$funcionarios->Save();
				$this->RenderJSON($funcionarios, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method updates an existing Funcionarios record and render response as JSON
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

			$pk = $this->GetRouter()->GetUrlParam('idFun');
			$funcionarios = $this->Phreezer->Get('Funcionarios',$pk);

			// TODO: any fields that should not be updated by the user should be commented out

			// this is a primary key.  uncomment if updating is allowed
			// $funcionarios->IdFun = $this->SafeGetVal($json, 'idFun', $funcionarios->IdFun);

			$funcionarios->Apelido = $this->SafeGetVal($json, 'apelido', $funcionarios->Apelido);
			$funcionarios->Nome = $this->SafeGetVal($json, 'nome', $funcionarios->Nome);
			$funcionarios->Telefone = $this->SafeGetVal($json, 'telefone', $funcionarios->Telefone);
			$funcionarios->Celular = $this->SafeGetVal($json, 'celular', $funcionarios->Celular);
			$funcionarios->Endereco = $this->SafeGetVal($json, 'endereco', $funcionarios->Endereco);
			$funcionarios->Bairro = $this->SafeGetVal($json, 'bairro', $funcionarios->Bairro);
			$funcionarios->Funcao = $this->SafeGetVal($json, 'funcao', $funcionarios->Funcao);
			$funcionarios->Cidade = $this->SafeGetVal($json, 'cidade', $funcionarios->Cidade);
			$funcionarios->Cep = $this->SafeGetVal($json, 'cep', $funcionarios->Cep);
			$funcionarios->Uf = $this->SafeGetVal($json, 'uf', $funcionarios->Uf);

			$funcionarios->Validate();
			$errors = $funcionarios->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$funcionarios->Save();
				$this->RenderJSON($funcionarios, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}


		}
		catch (Exception $ex)
		{


			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method deletes an existing Funcionarios record and render response as JSON
	 */
	public function Delete()
	{
		try
		{
						
			// TODO: if a soft delete is prefered, change this to update the deleted flag instead of hard-deleting

			$pk = $this->GetRouter()->GetUrlParam('idFun');
			$funcionarios = $this->Phreezer->Get('Funcionarios',$pk);

			$funcionarios->Delete();

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

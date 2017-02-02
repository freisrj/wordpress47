<?php
/** @package    admP::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/Empresas.php");

/**
 * EmpresasController is the controller class for the Empresas object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package admP::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class EmpresasController extends AppBaseController
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
	 * Displays a list view of Empresas objects
	 */
	public function ListView()
	{
		$this->Render();
	}

	/**
	 * API Method queries for Empresas records and render as JSON
	 */
	public function Query()
	{
		try
		{
			$criteria = new EmpresasCriteria();
			
			// TODO: this will limit results based on all properties included in the filter list 
			$filter = RequestUtil::Get('filter');
			if ($filter) $criteria->AddFilter(
				new CriteriaFilter('IdEmp,Empresa,Cnpj,Endereco,Cidade,Bairro,Estado,Cep,Email,Nome,Email1,Tel01,Contato02,Email2,Tel02,Contato03,Email3,Tel03,Obs,Nextel,Id'
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

				$empresases = $this->Phreezer->Query('Empresas',$criteria)->GetDataPage($page, $pagesize);
				$output->rows = $empresases->ToObjectArray(true,$this->SimpleObjectParams());
				$output->totalResults = $empresases->TotalResults;
				$output->totalPages = $empresases->TotalPages;
				$output->pageSize = $empresases->PageSize;
				$output->currentPage = $empresases->CurrentPage;
			}
			else
			{
				// return all results
				$empresases = $this->Phreezer->Query('Empresas',$criteria);
				$output->rows = $empresases->ToObjectArray(true, $this->SimpleObjectParams());
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
	 * API Method retrieves a single Empresas record and render as JSON
	 */
	public function Read()
	{
		try
		{
			$pk = $this->GetRouter()->GetUrlParam('idEmp');
			$empresas = $this->Phreezer->Get('Empresas',$pk);
			$this->RenderJSON($empresas, $this->JSONPCallback(), true, $this->SimpleObjectParams());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method inserts a new Empresas record and render response as JSON
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

			$empresas = new Empresas($this->Phreezer);

			// TODO: any fields that should not be inserted by the user should be commented out

			// this is an auto-increment.  uncomment if updating is allowed
			// $empresas->IdEmp = $this->SafeGetVal($json, 'idEmp');

			$empresas->Empresa = $this->SafeGetVal($json, 'empresa');
			$empresas->Cnpj = $this->SafeGetVal($json, 'cnpj');
			$empresas->Endereco = $this->SafeGetVal($json, 'endereco');
			$empresas->Cidade = $this->SafeGetVal($json, 'cidade');
			$empresas->Bairro = $this->SafeGetVal($json, 'bairro');
			$empresas->Estado = $this->SafeGetVal($json, 'estado');
			$empresas->Cep = $this->SafeGetVal($json, 'cep');
			$empresas->Email = $this->SafeGetVal($json, 'email');
			$empresas->Nome = $this->SafeGetVal($json, 'nome');
			$empresas->Email1 = $this->SafeGetVal($json, 'email1');
			$empresas->Tel01 = $this->SafeGetVal($json, 'tel01');
			$empresas->Contato02 = $this->SafeGetVal($json, 'contato02');
			$empresas->Email2 = $this->SafeGetVal($json, 'email2');
			$empresas->Tel02 = $this->SafeGetVal($json, 'tel02');
			$empresas->Contato03 = $this->SafeGetVal($json, 'contato03');
			$empresas->Email3 = $this->SafeGetVal($json, 'email3');
			$empresas->Tel03 = $this->SafeGetVal($json, 'tel03');
			$empresas->Obs = $this->SafeGetVal($json, 'obs');
			$empresas->Nextel = $this->SafeGetVal($json, 'nextel');
			$empresas->Id = $this->SafeGetVal($json, 'id');

			$empresas->Validate();
			$errors = $empresas->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$empresas->Save();
				$this->RenderJSON($empresas, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method updates an existing Empresas record and render response as JSON
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

			$pk = $this->GetRouter()->GetUrlParam('idEmp');
			$empresas = $this->Phreezer->Get('Empresas',$pk);

			// TODO: any fields that should not be updated by the user should be commented out

			// this is a primary key.  uncomment if updating is allowed
			// $empresas->IdEmp = $this->SafeGetVal($json, 'idEmp', $empresas->IdEmp);

			$empresas->Empresa = $this->SafeGetVal($json, 'empresa', $empresas->Empresa);
			$empresas->Cnpj = $this->SafeGetVal($json, 'cnpj', $empresas->Cnpj);
			$empresas->Endereco = $this->SafeGetVal($json, 'endereco', $empresas->Endereco);
			$empresas->Cidade = $this->SafeGetVal($json, 'cidade', $empresas->Cidade);
			$empresas->Bairro = $this->SafeGetVal($json, 'bairro', $empresas->Bairro);
			$empresas->Estado = $this->SafeGetVal($json, 'estado', $empresas->Estado);
			$empresas->Cep = $this->SafeGetVal($json, 'cep', $empresas->Cep);
			$empresas->Email = $this->SafeGetVal($json, 'email', $empresas->Email);
			$empresas->Nome = $this->SafeGetVal($json, 'nome', $empresas->Nome);
			$empresas->Email1 = $this->SafeGetVal($json, 'email1', $empresas->Email1);
			$empresas->Tel01 = $this->SafeGetVal($json, 'tel01', $empresas->Tel01);
			$empresas->Contato02 = $this->SafeGetVal($json, 'contato02', $empresas->Contato02);
			$empresas->Email2 = $this->SafeGetVal($json, 'email2', $empresas->Email2);
			$empresas->Tel02 = $this->SafeGetVal($json, 'tel02', $empresas->Tel02);
			$empresas->Contato03 = $this->SafeGetVal($json, 'contato03', $empresas->Contato03);
			$empresas->Email3 = $this->SafeGetVal($json, 'email3', $empresas->Email3);
			$empresas->Tel03 = $this->SafeGetVal($json, 'tel03', $empresas->Tel03);
			$empresas->Obs = $this->SafeGetVal($json, 'obs', $empresas->Obs);
			$empresas->Nextel = $this->SafeGetVal($json, 'nextel', $empresas->Nextel);
			$empresas->Id = $this->SafeGetVal($json, 'id', $empresas->Id);

			$empresas->Validate();
			$errors = $empresas->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$empresas->Save();
				$this->RenderJSON($empresas, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}


		}
		catch (Exception $ex)
		{


			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method deletes an existing Empresas record and render response as JSON
	 */
	public function Delete()
	{
		try
		{
						
			// TODO: if a soft delete is prefered, change this to update the deleted flag instead of hard-deleting

			$pk = $this->GetRouter()->GetUrlParam('idEmp');
			$empresas = $this->Phreezer->Get('Empresas',$pk);

			$empresas->Delete();

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

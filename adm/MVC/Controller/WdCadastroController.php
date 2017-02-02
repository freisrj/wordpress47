<?php
/** @package    admP::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/WdCadastro.php");

/**
 * WdCadastroController is the controller class for the WdCadastro object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package admP::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class WdCadastroController extends AppBaseController
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
	 * Displays a list view of WdCadastro objects
	 */
	public function ListView()
	{
		$this->Render();
	}

	/**
	 * API Method queries for WdCadastro records and render as JSON
	 */
	public function Query()
	{
		try
		{
			$criteria = new WdCadastroCriteria();
			
			// TODO: this will limit results based on all properties included in the filter list 
			$filter = RequestUtil::Get('filter');
			if ($filter) $criteria->AddFilter(
				new CriteriaFilter('IdPre,Webmail,Nome,Endereco,Cidade,Bairro,Estado,Cep,Email,Telefone,Celular'
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

				$wdcadastros = $this->Phreezer->Query('WdCadastro',$criteria)->GetDataPage($page, $pagesize);
				$output->rows = $wdcadastros->ToObjectArray(true,$this->SimpleObjectParams());
				$output->totalResults = $wdcadastros->TotalResults;
				$output->totalPages = $wdcadastros->TotalPages;
				$output->pageSize = $wdcadastros->PageSize;
				$output->currentPage = $wdcadastros->CurrentPage;
			}
			else
			{
				// return all results
				$wdcadastros = $this->Phreezer->Query('WdCadastro',$criteria);
				$output->rows = $wdcadastros->ToObjectArray(true, $this->SimpleObjectParams());
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
	 * API Method retrieves a single WdCadastro record and render as JSON
	 */
	public function Read()
	{
		try
		{
			$pk = $this->GetRouter()->GetUrlParam('idPre');
			$wdcadastro = $this->Phreezer->Get('WdCadastro',$pk);
			$this->RenderJSON($wdcadastro, $this->JSONPCallback(), true, $this->SimpleObjectParams());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method inserts a new WdCadastro record and render response as JSON
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

			$wdcadastro = new WdCadastro($this->Phreezer);

			// TODO: any fields that should not be inserted by the user should be commented out

			// this is an auto-increment.  uncomment if updating is allowed
			// $wdcadastro->IdPre = $this->SafeGetVal($json, 'idPre');

			$wdcadastro->Webmail = $this->SafeGetVal($json, 'webmail');
			$wdcadastro->Nome = $this->SafeGetVal($json, 'nome');
			$wdcadastro->Endereco = $this->SafeGetVal($json, 'endereco');
			$wdcadastro->Cidade = $this->SafeGetVal($json, 'cidade');
			$wdcadastro->Bairro = $this->SafeGetVal($json, 'bairro');
			$wdcadastro->Estado = $this->SafeGetVal($json, 'estado');
			$wdcadastro->Cep = $this->SafeGetVal($json, 'cep');
			$wdcadastro->Email = $this->SafeGetVal($json, 'email');
			$wdcadastro->Telefone = $this->SafeGetVal($json, 'telefone');
			$wdcadastro->Celular = $this->SafeGetVal($json, 'celular');

			$wdcadastro->Validate();
			$errors = $wdcadastro->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$wdcadastro->Save();
				$this->RenderJSON($wdcadastro, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method updates an existing WdCadastro record and render response as JSON
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
			$wdcadastro = $this->Phreezer->Get('WdCadastro',$pk);

			// TODO: any fields that should not be updated by the user should be commented out

			// this is a primary key.  uncomment if updating is allowed
			// $wdcadastro->IdPre = $this->SafeGetVal($json, 'idPre', $wdcadastro->IdPre);

			$wdcadastro->Webmail = $this->SafeGetVal($json, 'webmail', $wdcadastro->Webmail);
			$wdcadastro->Nome = $this->SafeGetVal($json, 'nome', $wdcadastro->Nome);
			$wdcadastro->Endereco = $this->SafeGetVal($json, 'endereco', $wdcadastro->Endereco);
			$wdcadastro->Cidade = $this->SafeGetVal($json, 'cidade', $wdcadastro->Cidade);
			$wdcadastro->Bairro = $this->SafeGetVal($json, 'bairro', $wdcadastro->Bairro);
			$wdcadastro->Estado = $this->SafeGetVal($json, 'estado', $wdcadastro->Estado);
			$wdcadastro->Cep = $this->SafeGetVal($json, 'cep', $wdcadastro->Cep);
			$wdcadastro->Email = $this->SafeGetVal($json, 'email', $wdcadastro->Email);
			$wdcadastro->Telefone = $this->SafeGetVal($json, 'telefone', $wdcadastro->Telefone);
			$wdcadastro->Celular = $this->SafeGetVal($json, 'celular', $wdcadastro->Celular);

			$wdcadastro->Validate();
			$errors = $wdcadastro->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$wdcadastro->Save();
				$this->RenderJSON($wdcadastro, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}


		}
		catch (Exception $ex)
		{


			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method deletes an existing WdCadastro record and render response as JSON
	 */
	public function Delete()
	{
		try
		{
						
			// TODO: if a soft delete is prefered, change this to update the deleted flag instead of hard-deleting

			$pk = $this->GetRouter()->GetUrlParam('idPre');
			$wdcadastro = $this->Phreezer->Get('WdCadastro',$pk);

			$wdcadastro->Delete();

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

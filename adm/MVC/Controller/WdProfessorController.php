<?php
/** @package    admP::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/WdProfessor.php");

/**
 * WdProfessorController is the controller class for the WdProfessor object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package admP::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class WdProfessorController extends AppBaseController
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
	 * Displays a list view of WdProfessor objects
	 */
	public function ListView()
	{
		$this->Render();
	}

	/**
	 * API Method queries for WdProfessor records and render as JSON
	 */
	public function Query()
	{
		try
		{
			$criteria = new WdProfessorCriteria();
			
			// TODO: this will limit results based on all properties included in the filter list 
			$filter = RequestUtil::Get('filter');
			if ($filter) $criteria->AddFilter(
				new CriteriaFilter('IdPro,Ativo,Apelido,Nome,Tel,Cel,Email,Senha,Descricao,Certificado1,Certificado2,Certificado3,Certificado4,Certificado5'
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

				$wdprofessors = $this->Phreezer->Query('WdProfessor',$criteria)->GetDataPage($page, $pagesize);
				$output->rows = $wdprofessors->ToObjectArray(true,$this->SimpleObjectParams());
				$output->totalResults = $wdprofessors->TotalResults;
				$output->totalPages = $wdprofessors->TotalPages;
				$output->pageSize = $wdprofessors->PageSize;
				$output->currentPage = $wdprofessors->CurrentPage;
			}
			else
			{
				// return all results
				$wdprofessors = $this->Phreezer->Query('WdProfessor',$criteria);
				$output->rows = $wdprofessors->ToObjectArray(true, $this->SimpleObjectParams());
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
	 * API Method retrieves a single WdProfessor record and render as JSON
	 */
	public function Read()
	{
		try
		{
			$pk = $this->GetRouter()->GetUrlParam('idPro');
			$wdprofessor = $this->Phreezer->Get('WdProfessor',$pk);
			$this->RenderJSON($wdprofessor, $this->JSONPCallback(), true, $this->SimpleObjectParams());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method inserts a new WdProfessor record and render response as JSON
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

			$wdprofessor = new WdProfessor($this->Phreezer);

			// TODO: any fields that should not be inserted by the user should be commented out

			// this is an auto-increment.  uncomment if updating is allowed
			// $wdprofessor->IdPro = $this->SafeGetVal($json, 'idPro');

			$wdprofessor->Ativo = $this->SafeGetVal($json, 'ativo');
			$wdprofessor->Apelido = $this->SafeGetVal($json, 'apelido');
			$wdprofessor->Nome = $this->SafeGetVal($json, 'nome');
			$wdprofessor->Tel = $this->SafeGetVal($json, 'tel');
			$wdprofessor->Cel = $this->SafeGetVal($json, 'cel');
			$wdprofessor->Email = $this->SafeGetVal($json, 'email');
			$wdprofessor->Senha = $this->SafeGetVal($json, 'senha');
			$wdprofessor->Descricao = $this->SafeGetVal($json, 'descricao');
			$wdprofessor->Certificado1 = $this->SafeGetVal($json, 'certificado1');
			$wdprofessor->Certificado2 = $this->SafeGetVal($json, 'certificado2');
			$wdprofessor->Certificado3 = $this->SafeGetVal($json, 'certificado3');
			$wdprofessor->Certificado4 = $this->SafeGetVal($json, 'certificado4');
			$wdprofessor->Certificado5 = $this->SafeGetVal($json, 'certificado5');

			$wdprofessor->Validate();
			$errors = $wdprofessor->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$wdprofessor->Save();
				$this->RenderJSON($wdprofessor, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method updates an existing WdProfessor record and render response as JSON
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

			$pk = $this->GetRouter()->GetUrlParam('idPro');
			$wdprofessor = $this->Phreezer->Get('WdProfessor',$pk);

			// TODO: any fields that should not be updated by the user should be commented out

			// this is a primary key.  uncomment if updating is allowed
			// $wdprofessor->IdPro = $this->SafeGetVal($json, 'idPro', $wdprofessor->IdPro);

			$wdprofessor->Ativo = $this->SafeGetVal($json, 'ativo', $wdprofessor->Ativo);
			$wdprofessor->Apelido = $this->SafeGetVal($json, 'apelido', $wdprofessor->Apelido);
			$wdprofessor->Nome = $this->SafeGetVal($json, 'nome', $wdprofessor->Nome);
			$wdprofessor->Tel = $this->SafeGetVal($json, 'tel', $wdprofessor->Tel);
			$wdprofessor->Cel = $this->SafeGetVal($json, 'cel', $wdprofessor->Cel);
			$wdprofessor->Email = $this->SafeGetVal($json, 'email', $wdprofessor->Email);
			$wdprofessor->Senha = $this->SafeGetVal($json, 'senha', $wdprofessor->Senha);
			$wdprofessor->Descricao = $this->SafeGetVal($json, 'descricao', $wdprofessor->Descricao);
			$wdprofessor->Certificado1 = $this->SafeGetVal($json, 'certificado1', $wdprofessor->Certificado1);
			$wdprofessor->Certificado2 = $this->SafeGetVal($json, 'certificado2', $wdprofessor->Certificado2);
			$wdprofessor->Certificado3 = $this->SafeGetVal($json, 'certificado3', $wdprofessor->Certificado3);
			$wdprofessor->Certificado4 = $this->SafeGetVal($json, 'certificado4', $wdprofessor->Certificado4);
			$wdprofessor->Certificado5 = $this->SafeGetVal($json, 'certificado5', $wdprofessor->Certificado5);

			$wdprofessor->Validate();
			$errors = $wdprofessor->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$wdprofessor->Save();
				$this->RenderJSON($wdprofessor, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}


		}
		catch (Exception $ex)
		{


			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method deletes an existing WdProfessor record and render response as JSON
	 */
	public function Delete()
	{
		try
		{
						
			// TODO: if a soft delete is prefered, change this to update the deleted flag instead of hard-deleting

			$pk = $this->GetRouter()->GetUrlParam('idPro');
			$wdprofessor = $this->Phreezer->Get('WdProfessor',$pk);

			$wdprofessor->Delete();

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

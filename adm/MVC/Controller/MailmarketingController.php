<?php
/** @package    admP::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/Mailmarketing.php");

/**
 * MailmarketingController is the controller class for the Mailmarketing object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package admP::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class MailmarketingController extends AppBaseController
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
	 * Displays a list view of Mailmarketing objects
	 */
	public function ListView()
	{
		$this->Render();
	}

	/**
	 * API Method queries for Mailmarketing records and render as JSON
	 */
	public function Query()
	{
		try
		{
			$criteria = new MailmarketingCriteria();
			
			// TODO: this will limit results based on all properties included in the filter list 
			$filter = RequestUtil::Get('filter');
			if ($filter) $criteria->AddFilter(
				new CriteriaFilter('IdMak,Webmail,Nome,Email,Bairro,Fone,Celular,Enviar,Tipo'
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

				$mailmarketings = $this->Phreezer->Query('Mailmarketing',$criteria)->GetDataPage($page, $pagesize);
				$output->rows = $mailmarketings->ToObjectArray(true,$this->SimpleObjectParams());
				$output->totalResults = $mailmarketings->TotalResults;
				$output->totalPages = $mailmarketings->TotalPages;
				$output->pageSize = $mailmarketings->PageSize;
				$output->currentPage = $mailmarketings->CurrentPage;
			}
			else
			{
				// return all results
				$mailmarketings = $this->Phreezer->Query('Mailmarketing',$criteria);
				$output->rows = $mailmarketings->ToObjectArray(true, $this->SimpleObjectParams());
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
	 * API Method retrieves a single Mailmarketing record and render as JSON
	 */
	public function Read()
	{
		try
		{
			$pk = $this->GetRouter()->GetUrlParam('idMak');
			$mailmarketing = $this->Phreezer->Get('Mailmarketing',$pk);
			$this->RenderJSON($mailmarketing, $this->JSONPCallback(), true, $this->SimpleObjectParams());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method inserts a new Mailmarketing record and render response as JSON
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

			$mailmarketing = new Mailmarketing($this->Phreezer);

			// TODO: any fields that should not be inserted by the user should be commented out

			// this is an auto-increment.  uncomment if updating is allowed
			// $mailmarketing->IdMak = $this->SafeGetVal($json, 'idMak');

			$mailmarketing->Webmail = $this->SafeGetVal($json, 'webmail');
			$mailmarketing->Nome = $this->SafeGetVal($json, 'nome');
			$mailmarketing->Email = $this->SafeGetVal($json, 'email');
			$mailmarketing->Bairro = $this->SafeGetVal($json, 'bairro');
			$mailmarketing->Fone = $this->SafeGetVal($json, 'fone');
			$mailmarketing->Celular = $this->SafeGetVal($json, 'celular');
			$mailmarketing->Enviar = $this->SafeGetVal($json, 'enviar');
			$mailmarketing->Tipo = $this->SafeGetVal($json, 'tipo');

			$mailmarketing->Validate();
			$errors = $mailmarketing->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$mailmarketing->Save();
				$this->RenderJSON($mailmarketing, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method updates an existing Mailmarketing record and render response as JSON
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

			$pk = $this->GetRouter()->GetUrlParam('idMak');
			$mailmarketing = $this->Phreezer->Get('Mailmarketing',$pk);

			// TODO: any fields that should not be updated by the user should be commented out

			// this is a primary key.  uncomment if updating is allowed
			// $mailmarketing->IdMak = $this->SafeGetVal($json, 'idMak', $mailmarketing->IdMak);

			$mailmarketing->Webmail = $this->SafeGetVal($json, 'webmail', $mailmarketing->Webmail);
			$mailmarketing->Nome = $this->SafeGetVal($json, 'nome', $mailmarketing->Nome);
			$mailmarketing->Email = $this->SafeGetVal($json, 'email', $mailmarketing->Email);
			$mailmarketing->Bairro = $this->SafeGetVal($json, 'bairro', $mailmarketing->Bairro);
			$mailmarketing->Fone = $this->SafeGetVal($json, 'fone', $mailmarketing->Fone);
			$mailmarketing->Celular = $this->SafeGetVal($json, 'celular', $mailmarketing->Celular);
			$mailmarketing->Enviar = $this->SafeGetVal($json, 'enviar', $mailmarketing->Enviar);
			$mailmarketing->Tipo = $this->SafeGetVal($json, 'tipo', $mailmarketing->Tipo);

			$mailmarketing->Validate();
			$errors = $mailmarketing->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$mailmarketing->Save();
				$this->RenderJSON($mailmarketing, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}


		}
		catch (Exception $ex)
		{


			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method deletes an existing Mailmarketing record and render response as JSON
	 */
	public function Delete()
	{
		try
		{
						
			// TODO: if a soft delete is prefered, change this to update the deleted flag instead of hard-deleting

			$pk = $this->GetRouter()->GetUrlParam('idMak');
			$mailmarketing = $this->Phreezer->Get('Mailmarketing',$pk);

			$mailmarketing->Delete();

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

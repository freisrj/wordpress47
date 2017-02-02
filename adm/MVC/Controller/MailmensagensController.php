<?php
/** @package    admP::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/Mailmensagens.php");

/**
 * MailmensagensController is the controller class for the Mailmensagens object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package admP::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class MailmensagensController extends AppBaseController
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
	 * Displays a list view of Mailmensagens objects
	 */
	public function ListView()
	{
		$this->Render();
	}

	/**
	 * API Method queries for Mailmensagens records and render as JSON
	 */
	public function Query()
	{
		try
		{
			$criteria = new MailmensagensCriteria();
			
			// TODO: this will limit results based on all properties included in the filter list 
			$filter = RequestUtil::Get('filter');
			if ($filter) $criteria->AddFilter(
				new CriteriaFilter('IdMen,Viss,Saldacao,Vism,Mens,Visn,Visr,Rodape'
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

				$mailmensagenses = $this->Phreezer->Query('Mailmensagens',$criteria)->GetDataPage($page, $pagesize);
				$output->rows = $mailmensagenses->ToObjectArray(true,$this->SimpleObjectParams());
				$output->totalResults = $mailmensagenses->TotalResults;
				$output->totalPages = $mailmensagenses->TotalPages;
				$output->pageSize = $mailmensagenses->PageSize;
				$output->currentPage = $mailmensagenses->CurrentPage;
			}
			else
			{
				// return all results
				$mailmensagenses = $this->Phreezer->Query('Mailmensagens',$criteria);
				$output->rows = $mailmensagenses->ToObjectArray(true, $this->SimpleObjectParams());
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
	 * API Method retrieves a single Mailmensagens record and render as JSON
	 */
	public function Read()
	{
		try
		{
			$pk = $this->GetRouter()->GetUrlParam('idMen');
			$mailmensagens = $this->Phreezer->Get('Mailmensagens',$pk);
			$this->RenderJSON($mailmensagens, $this->JSONPCallback(), true, $this->SimpleObjectParams());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method inserts a new Mailmensagens record and render response as JSON
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

			$mailmensagens = new Mailmensagens($this->Phreezer);

			// TODO: any fields that should not be inserted by the user should be commented out

			// this is an auto-increment.  uncomment if updating is allowed
			// $mailmensagens->IdMen = $this->SafeGetVal($json, 'idMen');

			$mailmensagens->Viss = $this->SafeGetVal($json, 'viss');
			$mailmensagens->Saldacao = $this->SafeGetVal($json, 'saldacao');
			$mailmensagens->Vism = $this->SafeGetVal($json, 'vism');
			$mailmensagens->Mens = $this->SafeGetVal($json, 'mens');
			$mailmensagens->Visn = $this->SafeGetVal($json, 'visn');
			$mailmensagens->Visr = $this->SafeGetVal($json, 'visr');
			$mailmensagens->Rodape = $this->SafeGetVal($json, 'rodape');

			$mailmensagens->Validate();
			$errors = $mailmensagens->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$mailmensagens->Save();
				$this->RenderJSON($mailmensagens, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method updates an existing Mailmensagens record and render response as JSON
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

			$pk = $this->GetRouter()->GetUrlParam('idMen');
			$mailmensagens = $this->Phreezer->Get('Mailmensagens',$pk);

			// TODO: any fields that should not be updated by the user should be commented out

			// this is a primary key.  uncomment if updating is allowed
			// $mailmensagens->IdMen = $this->SafeGetVal($json, 'idMen', $mailmensagens->IdMen);

			$mailmensagens->Viss = $this->SafeGetVal($json, 'viss', $mailmensagens->Viss);
			$mailmensagens->Saldacao = $this->SafeGetVal($json, 'saldacao', $mailmensagens->Saldacao);
			$mailmensagens->Vism = $this->SafeGetVal($json, 'vism', $mailmensagens->Vism);
			$mailmensagens->Mens = $this->SafeGetVal($json, 'mens', $mailmensagens->Mens);
			$mailmensagens->Visn = $this->SafeGetVal($json, 'visn', $mailmensagens->Visn);
			$mailmensagens->Visr = $this->SafeGetVal($json, 'visr', $mailmensagens->Visr);
			$mailmensagens->Rodape = $this->SafeGetVal($json, 'rodape', $mailmensagens->Rodape);

			$mailmensagens->Validate();
			$errors = $mailmensagens->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$mailmensagens->Save();
				$this->RenderJSON($mailmensagens, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}


		}
		catch (Exception $ex)
		{


			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method deletes an existing Mailmensagens record and render response as JSON
	 */
	public function Delete()
	{
		try
		{
						
			// TODO: if a soft delete is prefered, change this to update the deleted flag instead of hard-deleting

			$pk = $this->GetRouter()->GetUrlParam('idMen');
			$mailmensagens = $this->Phreezer->Get('Mailmensagens',$pk);

			$mailmensagens->Delete();

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

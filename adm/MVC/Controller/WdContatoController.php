<?php
/** @package    admP::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/WdContato.php");

/**
 * WdContatoController is the controller class for the WdContato object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package admP::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class WdContatoController extends AppBaseController
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
	 * Displays a list view of WdContato objects
	 */
	public function ListView()
	{
		$this->Render();
	}

	/**
	 * API Method queries for WdContato records and render as JSON
	 */
	public function Query()
	{
		try
		{
			$criteria = new WdContatoCriteria();
			
			// TODO: this will limit results based on all properties included in the filter list 
			$filter = RequestUtil::Get('filter');
			if ($filter) $criteria->AddFilter(
				new CriteriaFilter('IdCot,Webmail,Nome,Email,Mensagem,Data,Resposta,DataResposta'
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

				$wdcontatos = $this->Phreezer->Query('WdContato',$criteria)->GetDataPage($page, $pagesize);
				$output->rows = $wdcontatos->ToObjectArray(true,$this->SimpleObjectParams());
				$output->totalResults = $wdcontatos->TotalResults;
				$output->totalPages = $wdcontatos->TotalPages;
				$output->pageSize = $wdcontatos->PageSize;
				$output->currentPage = $wdcontatos->CurrentPage;
			}
			else
			{
				// return all results
				$wdcontatos = $this->Phreezer->Query('WdContato',$criteria);
				$output->rows = $wdcontatos->ToObjectArray(true, $this->SimpleObjectParams());
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
	 * API Method retrieves a single WdContato record and render as JSON
	 */
	public function Read()
	{
		try
		{
			$pk = $this->GetRouter()->GetUrlParam('idCot');
			$wdcontato = $this->Phreezer->Get('WdContato',$pk);
			$this->RenderJSON($wdcontato, $this->JSONPCallback(), true, $this->SimpleObjectParams());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method inserts a new WdContato record and render response as JSON
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

			$wdcontato = new WdContato($this->Phreezer);

			// TODO: any fields that should not be inserted by the user should be commented out

			// this is an auto-increment.  uncomment if updating is allowed
			// $wdcontato->IdCot = $this->SafeGetVal($json, 'idCot');

			$wdcontato->Webmail = $this->SafeGetVal($json, 'webmail');
			$wdcontato->Nome = $this->SafeGetVal($json, 'nome');
			$wdcontato->Email = $this->SafeGetVal($json, 'email');
			$wdcontato->Mensagem = $this->SafeGetVal($json, 'mensagem');
			$wdcontato->Data = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'data')));
			$wdcontato->Resposta = $this->SafeGetVal($json, 'resposta');
			$wdcontato->DataResposta = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'dataResposta')));

			$wdcontato->Validate();
			$errors = $wdcontato->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$wdcontato->Save();
				$this->RenderJSON($wdcontato, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method updates an existing WdContato record and render response as JSON
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

			$pk = $this->GetRouter()->GetUrlParam('idCot');
			$wdcontato = $this->Phreezer->Get('WdContato',$pk);

			// TODO: any fields that should not be updated by the user should be commented out

			// this is a primary key.  uncomment if updating is allowed
			// $wdcontato->IdCot = $this->SafeGetVal($json, 'idCot', $wdcontato->IdCot);

			$wdcontato->Webmail = $this->SafeGetVal($json, 'webmail', $wdcontato->Webmail);
			$wdcontato->Nome = $this->SafeGetVal($json, 'nome', $wdcontato->Nome);
			$wdcontato->Email = $this->SafeGetVal($json, 'email', $wdcontato->Email);
			$wdcontato->Mensagem = $this->SafeGetVal($json, 'mensagem', $wdcontato->Mensagem);
			$wdcontato->Data = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'data', $wdcontato->Data)));
			$wdcontato->Resposta = $this->SafeGetVal($json, 'resposta', $wdcontato->Resposta);
			$wdcontato->DataResposta = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'dataResposta', $wdcontato->DataResposta)));

			$wdcontato->Validate();
			$errors = $wdcontato->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$wdcontato->Save();
				$this->RenderJSON($wdcontato, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}


		}
		catch (Exception $ex)
		{


			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method deletes an existing WdContato record and render response as JSON
	 */
	public function Delete()
	{
		try
		{
						
			// TODO: if a soft delete is prefered, change this to update the deleted flag instead of hard-deleting

			$pk = $this->GetRouter()->GetUrlParam('idCot');
			$wdcontato = $this->Phreezer->Get('WdContato',$pk);

			$wdcontato->Delete();

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

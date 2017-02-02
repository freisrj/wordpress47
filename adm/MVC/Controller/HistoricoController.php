<?php
/** @package    admP::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/Historico.php");

/**
 * HistoricoController is the controller class for the Historico object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package admP::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class HistoricoController extends AppBaseController
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
	 * Displays a list view of Historico objects
	 */
	public function ListView()
	{
		$this->Render();
	}

	/**
	 * API Method queries for Historico records and render as JSON
	 */
	public function Query()
	{
		try
		{
			$criteria = new HistoricoCriteria();
			
			// TODO: this will limit results based on all properties included in the filter list 
			$filter = RequestUtil::Get('filter');
			if ($filter) $criteria->AddFilter(
				new CriteriaFilter('IdHis,Unidade,IdFun,Apelido,IdCliente,IdServer,Data,Hora'
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

				$historicos = $this->Phreezer->Query('Historico',$criteria)->GetDataPage($page, $pagesize);
				$output->rows = $historicos->ToObjectArray(true,$this->SimpleObjectParams());
				$output->totalResults = $historicos->TotalResults;
				$output->totalPages = $historicos->TotalPages;
				$output->pageSize = $historicos->PageSize;
				$output->currentPage = $historicos->CurrentPage;
			}
			else
			{
				// return all results
				$historicos = $this->Phreezer->Query('Historico',$criteria);
				$output->rows = $historicos->ToObjectArray(true, $this->SimpleObjectParams());
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
	 * API Method retrieves a single Historico record and render as JSON
	 */
	public function Read()
	{
		try
		{
			$pk = $this->GetRouter()->GetUrlParam('idHis');
			$historico = $this->Phreezer->Get('Historico',$pk);
			$this->RenderJSON($historico, $this->JSONPCallback(), true, $this->SimpleObjectParams());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method inserts a new Historico record and render response as JSON
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

			$historico = new Historico($this->Phreezer);

			// TODO: any fields that should not be inserted by the user should be commented out

			// this is an auto-increment.  uncomment if updating is allowed
			// $historico->IdHis = $this->SafeGetVal($json, 'idHis');

			$historico->Unidade = $this->SafeGetVal($json, 'unidade');
			$historico->IdFun = $this->SafeGetVal($json, 'idFun');
			$historico->Apelido = $this->SafeGetVal($json, 'apelido');
			$historico->IdCliente = $this->SafeGetVal($json, 'idCliente');
			$historico->IdServer = $this->SafeGetVal($json, 'idServer');
			$historico->Data = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'data')));
			$historico->Hora = date('H:i:s',strtotime('1970-01-01 ' . $this->SafeGetVal($json, 'hora')));

			$historico->Validate();
			$errors = $historico->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$historico->Save();
				$this->RenderJSON($historico, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method updates an existing Historico record and render response as JSON
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

			$pk = $this->GetRouter()->GetUrlParam('idHis');
			$historico = $this->Phreezer->Get('Historico',$pk);

			// TODO: any fields that should not be updated by the user should be commented out

			// this is a primary key.  uncomment if updating is allowed
			// $historico->IdHis = $this->SafeGetVal($json, 'idHis', $historico->IdHis);

			$historico->Unidade = $this->SafeGetVal($json, 'unidade', $historico->Unidade);
			$historico->IdFun = $this->SafeGetVal($json, 'idFun', $historico->IdFun);
			$historico->Apelido = $this->SafeGetVal($json, 'apelido', $historico->Apelido);
			$historico->IdCliente = $this->SafeGetVal($json, 'idCliente', $historico->IdCliente);
			$historico->IdServer = $this->SafeGetVal($json, 'idServer', $historico->IdServer);
			$historico->Data = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'data', $historico->Data)));
			$historico->Hora = date('Y-m-d H:i:s',strtotime('1970-01-01 ' . $this->SafeGetVal($json, 'hora', $historico->Hora)));

			$historico->Validate();
			$errors = $historico->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$historico->Save();
				$this->RenderJSON($historico, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}


		}
		catch (Exception $ex)
		{


			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method deletes an existing Historico record and render response as JSON
	 */
	public function Delete()
	{
		try
		{
						
			// TODO: if a soft delete is prefered, change this to update the deleted flag instead of hard-deleting

			$pk = $this->GetRouter()->GetUrlParam('idHis');
			$historico = $this->Phreezer->Get('Historico',$pk);

			$historico->Delete();

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

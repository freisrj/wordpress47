<?php
/** @package    admP::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/PedidoCert.php");

/**
 * PedidoCertController is the controller class for the PedidoCert object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package admP::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class PedidoCertController extends AppBaseController
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
	 * Displays a list view of PedidoCert objects
	 */
	public function ListView()
	{
		$this->Render();
	}

	/**
	 * API Method queries for PedidoCert records and render as JSON
	 */
	public function Query()
	{
		try
		{
			$criteria = new PedidoCertCriteria();
			
			// TODO: this will limit results based on all properties included in the filter list 
			$filter = RequestUtil::Get('filter');
			if ($filter) $criteria->AddFilter(
				new CriteriaFilter('IdPcer,IdPed,Qped,Situacao,Quemretirou,Data,Entregue,IdAlu,Turma,Curso'
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

				$pedidocerts = $this->Phreezer->Query('PedidoCert',$criteria)->GetDataPage($page, $pagesize);
				$output->rows = $pedidocerts->ToObjectArray(true,$this->SimpleObjectParams());
				$output->totalResults = $pedidocerts->TotalResults;
				$output->totalPages = $pedidocerts->TotalPages;
				$output->pageSize = $pedidocerts->PageSize;
				$output->currentPage = $pedidocerts->CurrentPage;
			}
			else
			{
				// return all results
				$pedidocerts = $this->Phreezer->Query('PedidoCert',$criteria);
				$output->rows = $pedidocerts->ToObjectArray(true, $this->SimpleObjectParams());
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
	 * API Method retrieves a single PedidoCert record and render as JSON
	 */
	public function Read()
	{
		try
		{
			$pk = $this->GetRouter()->GetUrlParam('idPcer');
			$pedidocert = $this->Phreezer->Get('PedidoCert',$pk);
			$this->RenderJSON($pedidocert, $this->JSONPCallback(), true, $this->SimpleObjectParams());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method inserts a new PedidoCert record and render response as JSON
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

			$pedidocert = new PedidoCert($this->Phreezer);

			// TODO: any fields that should not be inserted by the user should be commented out

			// this is an auto-increment.  uncomment if updating is allowed
			// $pedidocert->IdPcer = $this->SafeGetVal($json, 'idPcer');

			$pedidocert->IdPed = $this->SafeGetVal($json, 'idPed');
			$pedidocert->Qped = $this->SafeGetVal($json, 'qped');
			$pedidocert->Situacao = $this->SafeGetVal($json, 'situacao');
			$pedidocert->Quemretirou = $this->SafeGetVal($json, 'quemretirou');
			$pedidocert->Data = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'data')));
			$pedidocert->Entregue = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'entregue')));
			$pedidocert->IdAlu = $this->SafeGetVal($json, 'idAlu');
			$pedidocert->Turma = $this->SafeGetVal($json, 'turma');
			$pedidocert->Curso = $this->SafeGetVal($json, 'curso');

			$pedidocert->Validate();
			$errors = $pedidocert->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$pedidocert->Save();
				$this->RenderJSON($pedidocert, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method updates an existing PedidoCert record and render response as JSON
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

			$pk = $this->GetRouter()->GetUrlParam('idPcer');
			$pedidocert = $this->Phreezer->Get('PedidoCert',$pk);

			// TODO: any fields that should not be updated by the user should be commented out

			// this is a primary key.  uncomment if updating is allowed
			// $pedidocert->IdPcer = $this->SafeGetVal($json, 'idPcer', $pedidocert->IdPcer);

			$pedidocert->IdPed = $this->SafeGetVal($json, 'idPed', $pedidocert->IdPed);
			$pedidocert->Qped = $this->SafeGetVal($json, 'qped', $pedidocert->Qped);
			$pedidocert->Situacao = $this->SafeGetVal($json, 'situacao', $pedidocert->Situacao);
			$pedidocert->Quemretirou = $this->SafeGetVal($json, 'quemretirou', $pedidocert->Quemretirou);
			$pedidocert->Data = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'data', $pedidocert->Data)));
			$pedidocert->Entregue = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'entregue', $pedidocert->Entregue)));
			$pedidocert->IdAlu = $this->SafeGetVal($json, 'idAlu', $pedidocert->IdAlu);
			$pedidocert->Turma = $this->SafeGetVal($json, 'turma', $pedidocert->Turma);
			$pedidocert->Curso = $this->SafeGetVal($json, 'curso', $pedidocert->Curso);

			$pedidocert->Validate();
			$errors = $pedidocert->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$pedidocert->Save();
				$this->RenderJSON($pedidocert, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}


		}
		catch (Exception $ex)
		{


			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method deletes an existing PedidoCert record and render response as JSON
	 */
	public function Delete()
	{
		try
		{
						
			// TODO: if a soft delete is prefered, change this to update the deleted flag instead of hard-deleting

			$pk = $this->GetRouter()->GetUrlParam('idPcer');
			$pedidocert = $this->Phreezer->Get('PedidoCert',$pk);

			$pedidocert->Delete();

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

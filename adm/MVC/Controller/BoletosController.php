<?php
/** @package    admP::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/Boletos.php");

/**
 * BoletosController is the controller class for the Boletos object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package admP::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class BoletosController extends AppBaseController
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
	 * Displays a list view of Boletos objects
	 */
	public function ListView()
	{
		$this->Render();
	}

	/**
	 * API Method queries for Boletos records and render as JSON
	 */
	public function Query()
	{
		try
		{
			$criteria = new BoletosCriteria();
			
			// TODO: this will limit results based on all properties included in the filter list 
			$filter = RequestUtil::Get('filter');
			if ($filter) $criteria->AddFilter(
				new CriteriaFilter('IdBoleto,IdCli,IdPedido,NossoNumero,Valor,DataCri,HoraCri,DataVenc,Hash'
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

				$boletoses = $this->Phreezer->Query('Boletos',$criteria)->GetDataPage($page, $pagesize);
				$output->rows = $boletoses->ToObjectArray(true,$this->SimpleObjectParams());
				$output->totalResults = $boletoses->TotalResults;
				$output->totalPages = $boletoses->TotalPages;
				$output->pageSize = $boletoses->PageSize;
				$output->currentPage = $boletoses->CurrentPage;
			}
			else
			{
				// return all results
				$boletoses = $this->Phreezer->Query('Boletos',$criteria);
				$output->rows = $boletoses->ToObjectArray(true, $this->SimpleObjectParams());
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
	 * API Method retrieves a single Boletos record and render as JSON
	 */
	public function Read()
	{
		try
		{
			$pk = $this->GetRouter()->GetUrlParam('idBoleto');
			$boletos = $this->Phreezer->Get('Boletos',$pk);
			$this->RenderJSON($boletos, $this->JSONPCallback(), true, $this->SimpleObjectParams());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method inserts a new Boletos record and render response as JSON
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

			$boletos = new Boletos($this->Phreezer);

			// TODO: any fields that should not be inserted by the user should be commented out

			// this is an auto-increment.  uncomment if updating is allowed
			// $boletos->IdBoleto = $this->SafeGetVal($json, 'idBoleto');

			$boletos->IdCli = $this->SafeGetVal($json, 'idCli');
			$boletos->IdPedido = $this->SafeGetVal($json, 'idPedido');
			$boletos->NossoNumero = $this->SafeGetVal($json, 'nossoNumero');
			$boletos->Valor = $this->SafeGetVal($json, 'valor');
			$boletos->DataCri = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'dataCri')));
			$boletos->HoraCri = date('H:i:s',strtotime('1970-01-01 ' . $this->SafeGetVal($json, 'horaCri')));
			$boletos->DataVenc = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'dataVenc')));
			$boletos->Hash = $this->SafeGetVal($json, 'hash');

			$boletos->Validate();
			$errors = $boletos->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$boletos->Save();
				$this->RenderJSON($boletos, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method updates an existing Boletos record and render response as JSON
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

			$pk = $this->GetRouter()->GetUrlParam('idBoleto');
			$boletos = $this->Phreezer->Get('Boletos',$pk);

			// TODO: any fields that should not be updated by the user should be commented out

			// this is a primary key.  uncomment if updating is allowed
			// $boletos->IdBoleto = $this->SafeGetVal($json, 'idBoleto', $boletos->IdBoleto);

			$boletos->IdCli = $this->SafeGetVal($json, 'idCli', $boletos->IdCli);
			$boletos->IdPedido = $this->SafeGetVal($json, 'idPedido', $boletos->IdPedido);
			$boletos->NossoNumero = $this->SafeGetVal($json, 'nossoNumero', $boletos->NossoNumero);
			$boletos->Valor = $this->SafeGetVal($json, 'valor', $boletos->Valor);
			$boletos->DataCri = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'dataCri', $boletos->DataCri)));
			$boletos->HoraCri = date('Y-m-d H:i:s',strtotime('1970-01-01 ' . $this->SafeGetVal($json, 'horaCri', $boletos->HoraCri)));
			$boletos->DataVenc = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'dataVenc', $boletos->DataVenc)));
			$boletos->Hash = $this->SafeGetVal($json, 'hash', $boletos->Hash);

			$boletos->Validate();
			$errors = $boletos->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$boletos->Save();
				$this->RenderJSON($boletos, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}


		}
		catch (Exception $ex)
		{


			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method deletes an existing Boletos record and render response as JSON
	 */
	public function Delete()
	{
		try
		{
						
			// TODO: if a soft delete is prefered, change this to update the deleted flag instead of hard-deleting

			$pk = $this->GetRouter()->GetUrlParam('idBoleto');
			$boletos = $this->Phreezer->Get('Boletos',$pk);

			$boletos->Delete();

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

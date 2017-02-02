<?php
/** @package    admP::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/Caixa.php");

/**
 * CaixaController is the controller class for the Caixa object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package admP::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class CaixaController extends AppBaseController
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
	 * Displays a list view of Caixa objects
	 */
	public function ListView()
	{
		$this->Render();
	}

	/**
	 * API Method queries for Caixa records and render as JSON
	 */
	public function Query()
	{
		try
		{
			$criteria = new CaixaCriteria();
			
			// TODO: this will limit results based on all properties included in the filter list 
			$filter = RequestUtil::Get('filter');
			if ($filter) $criteria->AddFilter(
				new CriteriaFilter('IdCai,Conta,Descricao,Forma,Debito,Credito,Data,Hora,Unidade,IdFun'
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

				$caixas = $this->Phreezer->Query('Caixa',$criteria)->GetDataPage($page, $pagesize);
				$output->rows = $caixas->ToObjectArray(true,$this->SimpleObjectParams());
				$output->totalResults = $caixas->TotalResults;
				$output->totalPages = $caixas->TotalPages;
				$output->pageSize = $caixas->PageSize;
				$output->currentPage = $caixas->CurrentPage;
			}
			else
			{
				// return all results
				$caixas = $this->Phreezer->Query('Caixa',$criteria);
				$output->rows = $caixas->ToObjectArray(true, $this->SimpleObjectParams());
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
	 * API Method retrieves a single Caixa record and render as JSON
	 */
	public function Read()
	{
		try
		{
			$pk = $this->GetRouter()->GetUrlParam('idCai');
			$caixa = $this->Phreezer->Get('Caixa',$pk);
			$this->RenderJSON($caixa, $this->JSONPCallback(), true, $this->SimpleObjectParams());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method inserts a new Caixa record and render response as JSON
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

			$caixa = new Caixa($this->Phreezer);

			// TODO: any fields that should not be inserted by the user should be commented out

			// this is an auto-increment.  uncomment if updating is allowed
			// $caixa->IdCai = $this->SafeGetVal($json, 'idCai');

			$caixa->Conta = $this->SafeGetVal($json, 'conta');
			$caixa->Descricao = $this->SafeGetVal($json, 'descricao');
			$caixa->Forma = $this->SafeGetVal($json, 'forma');
			$caixa->Debito = $this->SafeGetVal($json, 'debito');
			$caixa->Credito = $this->SafeGetVal($json, 'credito');
			$caixa->Data = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'data')));
			$caixa->Hora = date('H:i:s',strtotime('1970-01-01 ' . $this->SafeGetVal($json, 'hora')));
			$caixa->Unidade = $this->SafeGetVal($json, 'unidade');
			$caixa->IdFun = $this->SafeGetVal($json, 'idFun');

			$caixa->Validate();
			$errors = $caixa->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$caixa->Save();
				$this->RenderJSON($caixa, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method updates an existing Caixa record and render response as JSON
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

			$pk = $this->GetRouter()->GetUrlParam('idCai');
			$caixa = $this->Phreezer->Get('Caixa',$pk);

			// TODO: any fields that should not be updated by the user should be commented out

			// this is a primary key.  uncomment if updating is allowed
			// $caixa->IdCai = $this->SafeGetVal($json, 'idCai', $caixa->IdCai);

			$caixa->Conta = $this->SafeGetVal($json, 'conta', $caixa->Conta);
			$caixa->Descricao = $this->SafeGetVal($json, 'descricao', $caixa->Descricao);
			$caixa->Forma = $this->SafeGetVal($json, 'forma', $caixa->Forma);
			$caixa->Debito = $this->SafeGetVal($json, 'debito', $caixa->Debito);
			$caixa->Credito = $this->SafeGetVal($json, 'credito', $caixa->Credito);
			$caixa->Data = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'data', $caixa->Data)));
			$caixa->Hora = date('Y-m-d H:i:s',strtotime('1970-01-01 ' . $this->SafeGetVal($json, 'hora', $caixa->Hora)));
			$caixa->Unidade = $this->SafeGetVal($json, 'unidade', $caixa->Unidade);
			$caixa->IdFun = $this->SafeGetVal($json, 'idFun', $caixa->IdFun);

			$caixa->Validate();
			$errors = $caixa->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$caixa->Save();
				$this->RenderJSON($caixa, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}


		}
		catch (Exception $ex)
		{


			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method deletes an existing Caixa record and render response as JSON
	 */
	public function Delete()
	{
		try
		{
						
			// TODO: if a soft delete is prefered, change this to update the deleted flag instead of hard-deleting

			$pk = $this->GetRouter()->GetUrlParam('idCai');
			$caixa = $this->Phreezer->Get('Caixa',$pk);

			$caixa->Delete();

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

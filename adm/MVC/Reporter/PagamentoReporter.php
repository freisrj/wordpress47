<?php
/** @package    WandallCa::Reporter */

/** import supporting libraries */
require_once("verysimple/Phreeze/Reporter.php");

/**
 * This is an example Reporter based on the Pagamento object.  The reporter object
 * allows you to run arbitrary queries that return data which may or may not fith within
 * the data access API.  This can include aggregate data or subsets of data.
 *
 * Note that Reporters are read-only and cannot be used for saving data.
 *
 * @package WandallCa::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class PagamentoReporter extends Reporter
{

	// the properties in this class must match the columns returned by GetCustomQuery().
	// 'CustomFieldExample' is an example that is not part of the `pagamento` table
	public $CustomFieldExample;

	public $IdPag;
	public $IdCli;
	public $IdPedido;
	public $Tipo;
	public $DataCri;
	public $HoraCri;
	public $Tid;
	public $ValorTotal;
	public $DataHoraRetorno;
	public $Bandeira;
	public $TipoVenda;
	public $Parcelas;
	public $Status;
	public $UrlAutenticacao;
	public $CodAutorizacao;
	public $Mensagem;
	public $DataHoraAutorizacao;
	public $Lr;
	public $Arp;

	/*
	* GetCustomQuery returns a fully formed SQL statement.  The result columns
	* must match with the properties of this reporter object.
	*
	* @see Reporter::GetCustomQuery
	* @param Criteria $criteria
	* @return string SQL statement
	*/
	static function GetCustomQuery($criteria)
	{
		$sql = "select
			'custom value here...' as CustomFieldExample
			,`pagamento`.`id_pag` as IdPag
			,`pagamento`.`id_cli` as IdCli
			,`pagamento`.`id_pedido` as IdPedido
			,`pagamento`.`tipo` as Tipo
			,`pagamento`.`data_cri` as DataCri
			,`pagamento`.`hora_cri` as HoraCri
			,`pagamento`.`tid` as Tid
			,`pagamento`.`valor_total` as ValorTotal
			,`pagamento`.`data_hora_retorno` as DataHoraRetorno
			,`pagamento`.`bandeira` as Bandeira
			,`pagamento`.`tipo_venda` as TipoVenda
			,`pagamento`.`parcelas` as Parcelas
			,`pagamento`.`status` as Status
			,`pagamento`.`url_autenticacao` as UrlAutenticacao
			,`pagamento`.`cod_autorizacao` as CodAutorizacao
			,`pagamento`.`mensagem` as Mensagem
			,`pagamento`.`data_hora_autorizacao` as DataHoraAutorizacao
			,`pagamento`.`lr` as Lr
			,`pagamento`.`arp` as Arp
		from `pagamento`";

		// the criteria can be used or you can write your own custom logic.
		// be sure to escape any user input with $criteria->Escape()
		$sql .= $criteria->GetWhere();
		$sql .= $criteria->GetOrder();

		return $sql;
	}
	
	/*
	* GetCustomCountQuery returns a fully formed SQL statement that will count
	* the results.  This query must return the correct number of results that
	* GetCustomQuery would, given the same criteria
	*
	* @see Reporter::GetCustomCountQuery
	* @param Criteria $criteria
	* @return string SQL statement
	*/
	static function GetCustomCountQuery($criteria)
	{
		$sql = "select count(1) as counter from `pagamento`";

		// the criteria can be used or you can write your own custom logic.
		// be sure to escape any user input with $criteria->Escape()
		$sql .= $criteria->GetWhere();

		return $sql;
	}
}

?>
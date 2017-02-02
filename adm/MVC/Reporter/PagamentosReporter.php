<?php
/** @package    WandallCa::Reporter */

/** import supporting libraries */
require_once("verysimple/Phreeze/Reporter.php");

/**
 * This is an example Reporter based on the Pagamentos object.  The reporter object
 * allows you to run arbitrary queries that return data which may or may not fith within
 * the data access API.  This can include aggregate data or subsets of data.
 *
 * Note that Reporters are read-only and cannot be used for saving data.
 *
 * @package WandallCa::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class PagamentosReporter extends Reporter
{

	// the properties in this class must match the columns returned by GetCustomQuery().
	// 'CustomFieldExample' is an example that is not part of the `pagamentos` table
	public $CustomFieldExample;

	public $IdPag;
	public $Tipo;
	public $IdAlu;
	public $IdTur;
	public $Parcela;
	public $Especie;
	public $Bandeira;
	public $Banco;
	public $Cheque;
	public $Titular;
	public $Vencimento;
	public $Pago;
	public $Valor;
	public $Extenso;
	public $Desconto;
	public $Apagar;
	public $EnvioBoleto;
	public $Situacao;

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
			,`pagamentos`.`id_pag` as IdPag
			,`pagamentos`.`tipo` as Tipo
			,`pagamentos`.`id_alu` as IdAlu
			,`pagamentos`.`id_tur` as IdTur
			,`pagamentos`.`parcela` as Parcela
			,`pagamentos`.`especie` as Especie
			,`pagamentos`.`bandeira` as Bandeira
			,`pagamentos`.`banco` as Banco
			,`pagamentos`.`cheque` as Cheque
			,`pagamentos`.`titular` as Titular
			,`pagamentos`.`vencimento` as Vencimento
			,`pagamentos`.`pago` as Pago
			,`pagamentos`.`valor` as Valor
			,`pagamentos`.`extenso` as Extenso
			,`pagamentos`.`desconto` as Desconto
			,`pagamentos`.`apagar` as Apagar
			,`pagamentos`.`envio_boleto` as EnvioBoleto
			,`pagamentos`.`situacao` as Situacao
		from `pagamentos`";

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
		$sql = "select count(1) as counter from `pagamentos`";

		// the criteria can be used or you can write your own custom logic.
		// be sure to escape any user input with $criteria->Escape()
		$sql .= $criteria->GetWhere();

		return $sql;
	}
}

?>
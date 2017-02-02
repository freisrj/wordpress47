<?php
/** @package    WandallCa::Reporter */

/** import supporting libraries */
require_once("verysimple/Phreeze/Reporter.php");

/**
 * This is an example Reporter based on the PedidoCert object.  The reporter object
 * allows you to run arbitrary queries that return data which may or may not fith within
 * the data access API.  This can include aggregate data or subsets of data.
 *
 * Note that Reporters are read-only and cannot be used for saving data.
 *
 * @package WandallCa::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class PedidoCertReporter extends Reporter
{

	// the properties in this class must match the columns returned by GetCustomQuery().
	// 'CustomFieldExample' is an example that is not part of the `pedido_cert` table
	public $CustomFieldExample;

	public $IdPcer;
	public $IdPed;
	public $Qped;
	public $Situacao;
	public $Quemretirou;
	public $Data;
	public $Entregue;
	public $IdAlu;
	public $Turma;
	public $Curso;

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
			,`pedido_cert`.`id_pcer` as IdPcer
			,`pedido_cert`.`id_ped` as IdPed
			,`pedido_cert`.`QPed` as Qped
			,`pedido_cert`.`situacao` as Situacao
			,`pedido_cert`.`quemRetirou` as Quemretirou
			,`pedido_cert`.`data` as Data
			,`pedido_cert`.`entregue` as Entregue
			,`pedido_cert`.`id_alu` as IdAlu
			,`pedido_cert`.`turma` as Turma
			,`pedido_cert`.`curso` as Curso
		from `pedido_cert`";

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
		$sql = "select count(1) as counter from `pedido_cert`";

		// the criteria can be used or you can write your own custom logic.
		// be sure to escape any user input with $criteria->Escape()
		$sql .= $criteria->GetWhere();

		return $sql;
	}
}

?>
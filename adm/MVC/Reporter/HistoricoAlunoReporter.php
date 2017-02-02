<?php
/** @package    WandallCa::Reporter */

/** import supporting libraries */
require_once("verysimple/Phreeze/Reporter.php");

/**
 * This is an example Reporter based on the HistoricoAluno object.  The reporter object
 * allows you to run arbitrary queries that return data which may or may not fith within
 * the data access API.  This can include aggregate data or subsets of data.
 *
 * Note that Reporters are read-only and cannot be used for saving data.
 *
 * @package WandallCa::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class HistoricoAlunoReporter extends Reporter
{

	// the properties in this class must match the columns returned by GetCustomQuery().
	// 'CustomFieldExample' is an example that is not part of the `historico_aluno` table
	public $CustomFieldExample;

	public $IdHis;
	public $IdAlu;
	public $IdTur;
	public $Data;
	public $Hora;
	public $Idfun;
	public $MatrUnidade;
	public $DataTrans;
	public $HoraTrans;

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
			,`historico_aluno`.`id_his` as IdHis
			,`historico_aluno`.`id_alu` as IdAlu
			,`historico_aluno`.`id_tur` as IdTur
			,`historico_aluno`.`data` as Data
			,`historico_aluno`.`hora` as Hora
			,`historico_aluno`.`idfun` as Idfun
			,`historico_aluno`.`matr_unidade` as MatrUnidade
			,`historico_aluno`.`data_trans` as DataTrans
			,`historico_aluno`.`hora_trans` as HoraTrans
		from `historico_aluno`";

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
		$sql = "select count(1) as counter from `historico_aluno`";

		// the criteria can be used or you can write your own custom logic.
		// be sure to escape any user input with $criteria->Escape()
		$sql .= $criteria->GetWhere();

		return $sql;
	}
}

?>
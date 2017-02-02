<?php
/** @package    WandallCa::Reporter */

/** import supporting libraries */
require_once("verysimple/Phreeze/Reporter.php");

/**
 * This is an example Reporter based on the WdTurmas object.  The reporter object
 * allows you to run arbitrary queries that return data which may or may not fith within
 * the data access API.  This can include aggregate data or subsets of data.
 *
 * Note that Reporters are read-only and cannot be used for saving data.
 *
 * @package WandallCa::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class WdTurmasReporter extends Reporter
{

	// the properties in this class must match the columns returned by GetCustomQuery().
	// 'CustomFieldExample' is an example that is not part of the `wd_turmas` table
	public $CustomFieldExample;

	public $IdTur;
	public $IdUni;
	public $Due;
	public $Aberta;
	public $Andamento;
	public $IdCur;
	public $IdPro;
	public $Inicio;
	public $Termino;
	public $Aulas;
	public $Turno;
	public $Dias;
	public $Horario;
	public $Vagas;
	public $Pre;
	public $Matriculas;
	public $Sala;
	public $Status;

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
			,`wd_turmas`.`id_tur` as IdTur
			,`wd_turmas`.`id_uni` as IdUni
			,`wd_turmas`.`due` as Due
			,`wd_turmas`.`aberta` as Aberta
			,`wd_turmas`.`andamento` as Andamento
			,`wd_turmas`.`id_cur` as IdCur
			,`wd_turmas`.`id_pro` as IdPro
			,`wd_turmas`.`inicio` as Inicio
			,`wd_turmas`.`termino` as Termino
			,`wd_turmas`.`aulas` as Aulas
			,`wd_turmas`.`turno` as Turno
			,`wd_turmas`.`dias` as Dias
			,`wd_turmas`.`horario` as Horario
			,`wd_turmas`.`vagas` as Vagas
			,`wd_turmas`.`pre` as Pre
			,`wd_turmas`.`matriculas` as Matriculas
			,`wd_turmas`.`sala` as Sala
			,`wd_turmas`.`status` as Status
		from `wd_turmas`";

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
		$sql = "select count(1) as counter from `wd_turmas`";

		// the criteria can be used or you can write your own custom logic.
		// be sure to escape any user input with $criteria->Escape()
		$sql .= $criteria->GetWhere();

		return $sql;
	}
}

?>
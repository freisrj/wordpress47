<?php
/** @package    WandallCa::Reporter */

/** import supporting libraries */
require_once("verysimple/Phreeze/Reporter.php");

/**
 * This is an example Reporter based on the Atendimento object.  The reporter object
 * allows you to run arbitrary queries that return data which may or may not fith within
 * the data access API.  This can include aggregate data or subsets of data.
 *
 * Note that Reporters are read-only and cannot be used for saving data.
 *
 * @package WandallCa::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class AtendimentoReporter extends Reporter
{

	// the properties in this class must match the columns returned by GetCustomQuery().
	// 'CustomFieldExample' is an example that is not part of the `atendimento` table
	public $CustomFieldExample;

	public $IdAte;
	public $IdFun;
	public $Webmail;
	public $Unidade;
	public $Dia;
	public $Mes;
	public $Ano;
	public $Hora;
	public $Minuto;
	public $Nome;
	public $Soube;
	public $IdCur;
	public $Dias;
	public $Horario;
	public $Turno;
	public $Email;
	public $Tel1;
	public $Tel2;
	public $Tel3;
	public $Obs;

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
			,`atendimento`.`id_ate` as IdAte
			,`atendimento`.`id_fun` as IdFun
			,`atendimento`.`webmail` as Webmail
			,`atendimento`.`unidade` as Unidade
			,`atendimento`.`dia` as Dia
			,`atendimento`.`mes` as Mes
			,`atendimento`.`ano` as Ano
			,`atendimento`.`hora` as Hora
			,`atendimento`.`minuto` as Minuto
			,`atendimento`.`nome` as Nome
			,`atendimento`.`soube` as Soube
			,`atendimento`.`id_cur` as IdCur
			,`atendimento`.`dias` as Dias
			,`atendimento`.`horario` as Horario
			,`atendimento`.`turno` as Turno
			,`atendimento`.`email` as Email
			,`atendimento`.`tel1` as Tel1
			,`atendimento`.`tel2` as Tel2
			,`atendimento`.`tel3` as Tel3
			,`atendimento`.`obs` as Obs
		from `atendimento`";

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
		$sql = "select count(1) as counter from `atendimento`";

		// the criteria can be used or you can write your own custom logic.
		// be sure to escape any user input with $criteria->Escape()
		$sql .= $criteria->GetWhere();

		return $sql;
	}
}

?>
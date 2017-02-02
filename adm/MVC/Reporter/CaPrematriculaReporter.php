<?php
/** @package    WandallCa::Reporter */

/** import supporting libraries */
require_once("verysimple/Phreeze/Reporter.php");

/**
 * This is an example Reporter based on the CaPrematricula object.  The reporter object
 * allows you to run arbitrary queries that return data which may or may not fith within
 * the data access API.  This can include aggregate data or subsets of data.
 *
 * Note that Reporters are read-only and cannot be used for saving data.
 *
 * @package WandallCa::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class CaPrematriculaReporter extends Reporter
{

	// the properties in this class must match the columns returned by GetCustomQuery().
	// 'CustomFieldExample' is an example that is not part of the `ca_prematricula` table
	public $CustomFieldExample;

	public $IdPre;
	public $IdTur;
	public $Webmail;
	public $Soube;
	public $Data;
	public $Hora;
	public $Nome;
	public $Endereco;
	public $Cidade;
	public $Bairro;
	public $Estado;
	public $Cep;
	public $Email;
	public $Telefone;
	public $Celular;
	public $Nextel;
	public $Situacao;
	public $Turno;
	public $Curso;
	public $Resposta;
	public $Idfun;
	public $Ip;

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
			,`ca_prematricula`.`id_pre` as IdPre
			,`ca_prematricula`.`id_tur` as IdTur
			,`ca_prematricula`.`webmail` as Webmail
			,`ca_prematricula`.`soube` as Soube
			,`ca_prematricula`.`data` as Data
			,`ca_prematricula`.`hora` as Hora
			,`ca_prematricula`.`nome` as Nome
			,`ca_prematricula`.`endereco` as Endereco
			,`ca_prematricula`.`cidade` as Cidade
			,`ca_prematricula`.`bairro` as Bairro
			,`ca_prematricula`.`estado` as Estado
			,`ca_prematricula`.`cep` as Cep
			,`ca_prematricula`.`email` as Email
			,`ca_prematricula`.`telefone` as Telefone
			,`ca_prematricula`.`celular` as Celular
			,`ca_prematricula`.`nextel` as Nextel
			,`ca_prematricula`.`situacao` as Situacao
			,`ca_prematricula`.`turno` as Turno
			,`ca_prematricula`.`curso` as Curso
			,`ca_prematricula`.`resposta` as Resposta
			,`ca_prematricula`.`idfun` as Idfun
			,`ca_prematricula`.`ip` as Ip
		from `ca_prematricula`";

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
		$sql = "select count(1) as counter from `ca_prematricula`";

		// the criteria can be used or you can write your own custom logic.
		// be sure to escape any user input with $criteria->Escape()
		$sql .= $criteria->GetWhere();

		return $sql;
	}
}

?>
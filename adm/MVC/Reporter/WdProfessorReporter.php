<?php
/** @package    WandallCa::Reporter */

/** import supporting libraries */
require_once("verysimple/Phreeze/Reporter.php");

/**
 * This is an example Reporter based on the WdProfessor object.  The reporter object
 * allows you to run arbitrary queries that return data which may or may not fith within
 * the data access API.  This can include aggregate data or subsets of data.
 *
 * Note that Reporters are read-only and cannot be used for saving data.
 *
 * @package WandallCa::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class WdProfessorReporter extends Reporter
{

	// the properties in this class must match the columns returned by GetCustomQuery().
	// 'CustomFieldExample' is an example that is not part of the `wd_professor` table
	public $CustomFieldExample;

	public $IdPro;
	public $Ativo;
	public $Apelido;
	public $Nome;
	public $Tel;
	public $Cel;
	public $Email;
	public $Senha;
	public $Descricao;
	public $Certificado1;
	public $Certificado2;
	public $Certificado3;
	public $Certificado4;
	public $Certificado5;

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
			,`wd_professor`.`id_pro` as IdPro
			,`wd_professor`.`ativo` as Ativo
			,`wd_professor`.`apelido` as Apelido
			,`wd_professor`.`nome` as Nome
			,`wd_professor`.`tel` as Tel
			,`wd_professor`.`cel` as Cel
			,`wd_professor`.`email` as Email
			,`wd_professor`.`senha` as Senha
			,`wd_professor`.`descricao` as Descricao
			,`wd_professor`.`certificado1` as Certificado1
			,`wd_professor`.`certificado2` as Certificado2
			,`wd_professor`.`certificado3` as Certificado3
			,`wd_professor`.`certificado4` as Certificado4
			,`wd_professor`.`certificado5` as Certificado5
		from `wd_professor`";

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
		$sql = "select count(1) as counter from `wd_professor`";

		// the criteria can be used or you can write your own custom logic.
		// be sure to escape any user input with $criteria->Escape()
		$sql .= $criteria->GetWhere();

		return $sql;
	}
}

?>
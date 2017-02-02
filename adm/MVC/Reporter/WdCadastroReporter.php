<?php
/** @package    WandallCa::Reporter */

/** import supporting libraries */
require_once("verysimple/Phreeze/Reporter.php");

/**
 * This is an example Reporter based on the WdCadastro object.  The reporter object
 * allows you to run arbitrary queries that return data which may or may not fith within
 * the data access API.  This can include aggregate data or subsets of data.
 *
 * Note that Reporters are read-only and cannot be used for saving data.
 *
 * @package WandallCa::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class WdCadastroReporter extends Reporter
{

	// the properties in this class must match the columns returned by GetCustomQuery().
	// 'CustomFieldExample' is an example that is not part of the `wd_cadastro` table
	public $CustomFieldExample;

	public $IdPre;
	public $Webmail;
	public $Nome;
	public $Endereco;
	public $Cidade;
	public $Bairro;
	public $Estado;
	public $Cep;
	public $Email;
	public $Telefone;
	public $Celular;

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
			,`wd_cadastro`.`id_pre` as IdPre
			,`wd_cadastro`.`webmail` as Webmail
			,`wd_cadastro`.`nome` as Nome
			,`wd_cadastro`.`endereco` as Endereco
			,`wd_cadastro`.`cidade` as Cidade
			,`wd_cadastro`.`bairro` as Bairro
			,`wd_cadastro`.`estado` as Estado
			,`wd_cadastro`.`cep` as Cep
			,`wd_cadastro`.`email` as Email
			,`wd_cadastro`.`telefone` as Telefone
			,`wd_cadastro`.`celular` as Celular
		from `wd_cadastro`";

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
		$sql = "select count(1) as counter from `wd_cadastro`";

		// the criteria can be used or you can write your own custom logic.
		// be sure to escape any user input with $criteria->Escape()
		$sql .= $criteria->GetWhere();

		return $sql;
	}
}

?>
<?php
/** @package    WandallCa::Reporter */

/** import supporting libraries */
require_once("verysimple/Phreeze/Reporter.php");

/**
 * This is an example Reporter based on the Empresas object.  The reporter object
 * allows you to run arbitrary queries that return data which may or may not fith within
 * the data access API.  This can include aggregate data or subsets of data.
 *
 * Note that Reporters are read-only and cannot be used for saving data.
 *
 * @package WandallCa::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class EmpresasReporter extends Reporter
{

	// the properties in this class must match the columns returned by GetCustomQuery().
	// 'CustomFieldExample' is an example that is not part of the `empresas` table
	public $CustomFieldExample;

	public $IdEmp;
	public $Empresa;
	public $Cnpj;
	public $Endereco;
	public $Cidade;
	public $Bairro;
	public $Estado;
	public $Cep;
	public $Email;
	public $Nome;
	public $Email1;
	public $Tel01;
	public $Contato02;
	public $Email2;
	public $Tel02;
	public $Contato03;
	public $Email3;
	public $Tel03;
	public $Obs;
	public $Nextel;
	public $Id;

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
			,`empresas`.`id_emp` as IdEmp
			,`empresas`.`empresa` as Empresa
			,`empresas`.`CNPJ` as Cnpj
			,`empresas`.`endereco` as Endereco
			,`empresas`.`cidade` as Cidade
			,`empresas`.`bairro` as Bairro
			,`empresas`.`estado` as Estado
			,`empresas`.`cep` as Cep
			,`empresas`.`email` as Email
			,`empresas`.`nome` as Nome
			,`empresas`.`email1` as Email1
			,`empresas`.`tel01` as Tel01
			,`empresas`.`contato02` as Contato02
			,`empresas`.`email2` as Email2
			,`empresas`.`tel02` as Tel02
			,`empresas`.`contato03` as Contato03
			,`empresas`.`email3` as Email3
			,`empresas`.`tel03` as Tel03
			,`empresas`.`obs` as Obs
			,`empresas`.`nextel` as Nextel
			,`empresas`.`id` as Id
		from `empresas`";

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
		$sql = "select count(1) as counter from `empresas`";

		// the criteria can be used or you can write your own custom logic.
		// be sure to escape any user input with $criteria->Escape()
		$sql .= $criteria->GetWhere();

		return $sql;
	}
}

?>
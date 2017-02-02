<?php
/** @package    WandallCa::Reporter */

/** import supporting libraries */
require_once("verysimple/Phreeze/Reporter.php");

/**
 * This is an example Reporter based on the Funcionarios object.  The reporter object
 * allows you to run arbitrary queries that return data which may or may not fith within
 * the data access API.  This can include aggregate data or subsets of data.
 *
 * Note that Reporters are read-only and cannot be used for saving data.
 *
 * @package WandallCa::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class FuncionariosReporter extends Reporter
{

	// the properties in this class must match the columns returned by GetCustomQuery().
	// 'CustomFieldExample' is an example that is not part of the `funcionarios` table
	public $CustomFieldExample;

	public $IdFun;
	public $Apelido;
	public $Nome;
	public $Telefone;
	public $Celular;
	public $Endereco;
	public $Bairro;
	public $Funcao;
	public $Cidade;
	public $Cep;
	public $Uf;

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
			,`funcionarios`.`id_fun` as IdFun
			,`funcionarios`.`apelido` as Apelido
			,`funcionarios`.`nome` as Nome
			,`funcionarios`.`telefone` as Telefone
			,`funcionarios`.`Celular` as Celular
			,`funcionarios`.`endereco` as Endereco
			,`funcionarios`.`bairro` as Bairro
			,`funcionarios`.`funcao` as Funcao
			,`funcionarios`.`cidade` as Cidade
			,`funcionarios`.`cep` as Cep
			,`funcionarios`.`uf` as Uf
		from `funcionarios`";

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
		$sql = "select count(1) as counter from `funcionarios`";

		// the criteria can be used or you can write your own custom logic.
		// be sure to escape any user input with $criteria->Escape()
		$sql .= $criteria->GetWhere();

		return $sql;
	}
}

?>
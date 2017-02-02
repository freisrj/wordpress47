<?php
/** @package    WandallCa::Reporter */

/** import supporting libraries */
require_once("verysimple/Phreeze/Reporter.php");

/**
 * This is an example Reporter based on the Responsavel object.  The reporter object
 * allows you to run arbitrary queries that return data which may or may not fith within
 * the data access API.  This can include aggregate data or subsets of data.
 *
 * Note that Reporters are read-only and cannot be used for saving data.
 *
 * @package WandallCa::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class ResponsavelReporter extends Reporter
{

	// the properties in this class must match the columns returned by GetCustomQuery().
	// 'CustomFieldExample' is an example that is not part of the `responsavel` table
	public $CustomFieldExample;

	public $IdRes;
	public $IdAlu;
	public $Nome;
	public $Endereco;
	public $Cidade;
	public $Bairro;
	public $Estado;
	public $Cep;
	public $Email;
	public $Nascimento;
	public $Telefone1;
	public $Ramal1;
	public $Telefone2;
	public $Ramal2;
	public $Telefone3;
	public $Ramal3;
	public $Nextel;
	public $Cpf;
	public $Identidade;
	public $Orgao;
	public $EstadoCivil;
	public $Nacionalidade;
	public $Profissao;
	public $Ie;
	public $Im;

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
			,`responsavel`.`id_res` as IdRes
			,`responsavel`.`id_alu` as IdAlu
			,`responsavel`.`nome` as Nome
			,`responsavel`.`endereco` as Endereco
			,`responsavel`.`cidade` as Cidade
			,`responsavel`.`bairro` as Bairro
			,`responsavel`.`estado` as Estado
			,`responsavel`.`cep` as Cep
			,`responsavel`.`email` as Email
			,`responsavel`.`nascimento` as Nascimento
			,`responsavel`.`telefone1` as Telefone1
			,`responsavel`.`ramal1` as Ramal1
			,`responsavel`.`telefone2` as Telefone2
			,`responsavel`.`ramal2` as Ramal2
			,`responsavel`.`telefone3` as Telefone3
			,`responsavel`.`ramal3` as Ramal3
			,`responsavel`.`nextel` as Nextel
			,`responsavel`.`cpf` as Cpf
			,`responsavel`.`identidade` as Identidade
			,`responsavel`.`orgao` as Orgao
			,`responsavel`.`estado_civil` as EstadoCivil
			,`responsavel`.`nacionalidade` as Nacionalidade
			,`responsavel`.`profissao` as Profissao
			,`responsavel`.`ie` as Ie
			,`responsavel`.`im` as Im
		from `responsavel`";

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
		$sql = "select count(1) as counter from `responsavel`";

		// the criteria can be used or you can write your own custom logic.
		// be sure to escape any user input with $criteria->Escape()
		$sql .= $criteria->GetWhere();

		return $sql;
	}
}

?>
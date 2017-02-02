<?php
/** @package    WandallCa::Reporter */

/** import supporting libraries */
require_once("verysimple/Phreeze/Reporter.php");

/**
 * This is an example Reporter based on the Alunos object.  The reporter object
 * allows you to run arbitrary queries that return data which may or may not fith within
 * the data access API.  This can include aggregate data or subsets of data.
 *
 * Note that Reporters are read-only and cannot be used for saving data.
 *
 * @package WandallCa::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class AlunosReporter extends Reporter
{

	// the properties in this class must match the columns returned by GetCustomQuery().
	// 'CustomFieldExample' is an example that is not part of the `alunos` table
	public $CustomFieldExample;

	public $IdAlu;
	public $IdTur;
	public $Webmail;
	public $Nome;
	public $Endereco;
	public $Cidade;
	public $Bairro;
	public $Estado;
	public $Cep;
	public $Email;
	public $Nascimento;
	public $Cpf;
	public $Identidade;
	public $Orgao;
	public $EstadoCivil;
	public $Nacionalidade;
	public $Profissao;
	public $Telefone;
	public $Celular;
	public $Nextel;
	public $DataMatricula;
	public $HoraMatricula;
	public $Netbook;
	public $Idfun;
	public $IdIndica;
	public $MatrUnidade;

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
			,`alunos`.`id_alu` as IdAlu
			,`alunos`.`id_tur` as IdTur
			,`alunos`.`webmail` as Webmail
			,`alunos`.`nome` as Nome
			,`alunos`.`endereco` as Endereco
			,`alunos`.`cidade` as Cidade
			,`alunos`.`bairro` as Bairro
			,`alunos`.`estado` as Estado
			,`alunos`.`cep` as Cep
			,`alunos`.`email` as Email
			,`alunos`.`nascimento` as Nascimento
			,`alunos`.`cpf` as Cpf
			,`alunos`.`identidade` as Identidade
			,`alunos`.`orgao` as Orgao
			,`alunos`.`estado_civil` as EstadoCivil
			,`alunos`.`nacionalidade` as Nacionalidade
			,`alunos`.`profissao` as Profissao
			,`alunos`.`telefone` as Telefone
			,`alunos`.`celular` as Celular
			,`alunos`.`nextel` as Nextel
			,`alunos`.`data_matricula` as DataMatricula
			,`alunos`.`hora_matricula` as HoraMatricula
			,`alunos`.`netbook` as Netbook
			,`alunos`.`idfun` as Idfun
			,`alunos`.`id_indica` as IdIndica
			,`alunos`.`matr_unidade` as MatrUnidade
		from `alunos`";

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
		$sql = "select count(1) as counter from `alunos`";

		// the criteria can be used or you can write your own custom logic.
		// be sure to escape any user input with $criteria->Escape()
		$sql .= $criteria->GetWhere();

		return $sql;
	}
}

?>
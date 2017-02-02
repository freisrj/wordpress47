<?php
/** @package    WandallCa::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/Criteria.php");

/**
 * FuncionariosCriteria allows custom querying for the Funcionarios object.
 *
 * WARNING: THIS IS AN AUTO-GENERATED FILE
 *
 * This file should generally not be edited by hand except in special circumstances.
 * Add any custom business logic to the ModelCriteria class which is extended from this class.
 * Leaving this file alone will allow easy re-generation of all DAOs in the event of schema changes
 *
 * @inheritdocs
 * @package WandallCa::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class FuncionariosCriteriaDAO extends Criteria
{

	public $IdFun_Equals;
	public $IdFun_NotEquals;
	public $IdFun_IsLike;
	public $IdFun_IsNotLike;
	public $IdFun_BeginsWith;
	public $IdFun_EndsWith;
	public $IdFun_GreaterThan;
	public $IdFun_GreaterThanOrEqual;
	public $IdFun_LessThan;
	public $IdFun_LessThanOrEqual;
	public $IdFun_In;
	public $IdFun_IsNotEmpty;
	public $IdFun_IsEmpty;
	public $IdFun_BitwiseOr;
	public $IdFun_BitwiseAnd;
	public $Apelido_Equals;
	public $Apelido_NotEquals;
	public $Apelido_IsLike;
	public $Apelido_IsNotLike;
	public $Apelido_BeginsWith;
	public $Apelido_EndsWith;
	public $Apelido_GreaterThan;
	public $Apelido_GreaterThanOrEqual;
	public $Apelido_LessThan;
	public $Apelido_LessThanOrEqual;
	public $Apelido_In;
	public $Apelido_IsNotEmpty;
	public $Apelido_IsEmpty;
	public $Apelido_BitwiseOr;
	public $Apelido_BitwiseAnd;
	public $Nome_Equals;
	public $Nome_NotEquals;
	public $Nome_IsLike;
	public $Nome_IsNotLike;
	public $Nome_BeginsWith;
	public $Nome_EndsWith;
	public $Nome_GreaterThan;
	public $Nome_GreaterThanOrEqual;
	public $Nome_LessThan;
	public $Nome_LessThanOrEqual;
	public $Nome_In;
	public $Nome_IsNotEmpty;
	public $Nome_IsEmpty;
	public $Nome_BitwiseOr;
	public $Nome_BitwiseAnd;
	public $Telefone_Equals;
	public $Telefone_NotEquals;
	public $Telefone_IsLike;
	public $Telefone_IsNotLike;
	public $Telefone_BeginsWith;
	public $Telefone_EndsWith;
	public $Telefone_GreaterThan;
	public $Telefone_GreaterThanOrEqual;
	public $Telefone_LessThan;
	public $Telefone_LessThanOrEqual;
	public $Telefone_In;
	public $Telefone_IsNotEmpty;
	public $Telefone_IsEmpty;
	public $Telefone_BitwiseOr;
	public $Telefone_BitwiseAnd;
	public $Celular_Equals;
	public $Celular_NotEquals;
	public $Celular_IsLike;
	public $Celular_IsNotLike;
	public $Celular_BeginsWith;
	public $Celular_EndsWith;
	public $Celular_GreaterThan;
	public $Celular_GreaterThanOrEqual;
	public $Celular_LessThan;
	public $Celular_LessThanOrEqual;
	public $Celular_In;
	public $Celular_IsNotEmpty;
	public $Celular_IsEmpty;
	public $Celular_BitwiseOr;
	public $Celular_BitwiseAnd;
	public $Endereco_Equals;
	public $Endereco_NotEquals;
	public $Endereco_IsLike;
	public $Endereco_IsNotLike;
	public $Endereco_BeginsWith;
	public $Endereco_EndsWith;
	public $Endereco_GreaterThan;
	public $Endereco_GreaterThanOrEqual;
	public $Endereco_LessThan;
	public $Endereco_LessThanOrEqual;
	public $Endereco_In;
	public $Endereco_IsNotEmpty;
	public $Endereco_IsEmpty;
	public $Endereco_BitwiseOr;
	public $Endereco_BitwiseAnd;
	public $Bairro_Equals;
	public $Bairro_NotEquals;
	public $Bairro_IsLike;
	public $Bairro_IsNotLike;
	public $Bairro_BeginsWith;
	public $Bairro_EndsWith;
	public $Bairro_GreaterThan;
	public $Bairro_GreaterThanOrEqual;
	public $Bairro_LessThan;
	public $Bairro_LessThanOrEqual;
	public $Bairro_In;
	public $Bairro_IsNotEmpty;
	public $Bairro_IsEmpty;
	public $Bairro_BitwiseOr;
	public $Bairro_BitwiseAnd;
	public $Funcao_Equals;
	public $Funcao_NotEquals;
	public $Funcao_IsLike;
	public $Funcao_IsNotLike;
	public $Funcao_BeginsWith;
	public $Funcao_EndsWith;
	public $Funcao_GreaterThan;
	public $Funcao_GreaterThanOrEqual;
	public $Funcao_LessThan;
	public $Funcao_LessThanOrEqual;
	public $Funcao_In;
	public $Funcao_IsNotEmpty;
	public $Funcao_IsEmpty;
	public $Funcao_BitwiseOr;
	public $Funcao_BitwiseAnd;
	public $Cidade_Equals;
	public $Cidade_NotEquals;
	public $Cidade_IsLike;
	public $Cidade_IsNotLike;
	public $Cidade_BeginsWith;
	public $Cidade_EndsWith;
	public $Cidade_GreaterThan;
	public $Cidade_GreaterThanOrEqual;
	public $Cidade_LessThan;
	public $Cidade_LessThanOrEqual;
	public $Cidade_In;
	public $Cidade_IsNotEmpty;
	public $Cidade_IsEmpty;
	public $Cidade_BitwiseOr;
	public $Cidade_BitwiseAnd;
	public $Cep_Equals;
	public $Cep_NotEquals;
	public $Cep_IsLike;
	public $Cep_IsNotLike;
	public $Cep_BeginsWith;
	public $Cep_EndsWith;
	public $Cep_GreaterThan;
	public $Cep_GreaterThanOrEqual;
	public $Cep_LessThan;
	public $Cep_LessThanOrEqual;
	public $Cep_In;
	public $Cep_IsNotEmpty;
	public $Cep_IsEmpty;
	public $Cep_BitwiseOr;
	public $Cep_BitwiseAnd;
	public $Uf_Equals;
	public $Uf_NotEquals;
	public $Uf_IsLike;
	public $Uf_IsNotLike;
	public $Uf_BeginsWith;
	public $Uf_EndsWith;
	public $Uf_GreaterThan;
	public $Uf_GreaterThanOrEqual;
	public $Uf_LessThan;
	public $Uf_LessThanOrEqual;
	public $Uf_In;
	public $Uf_IsNotEmpty;
	public $Uf_IsEmpty;
	public $Uf_BitwiseOr;
	public $Uf_BitwiseAnd;

}

?>
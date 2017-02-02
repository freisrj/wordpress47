<?php
/** @package    WandallCa::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/Criteria.php");

/**
 * WdProfessorCriteria allows custom querying for the WdProfessor object.
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
class WdProfessorCriteriaDAO extends Criteria
{

	public $IdPro_Equals;
	public $IdPro_NotEquals;
	public $IdPro_IsLike;
	public $IdPro_IsNotLike;
	public $IdPro_BeginsWith;
	public $IdPro_EndsWith;
	public $IdPro_GreaterThan;
	public $IdPro_GreaterThanOrEqual;
	public $IdPro_LessThan;
	public $IdPro_LessThanOrEqual;
	public $IdPro_In;
	public $IdPro_IsNotEmpty;
	public $IdPro_IsEmpty;
	public $IdPro_BitwiseOr;
	public $IdPro_BitwiseAnd;
	public $Ativo_Equals;
	public $Ativo_NotEquals;
	public $Ativo_IsLike;
	public $Ativo_IsNotLike;
	public $Ativo_BeginsWith;
	public $Ativo_EndsWith;
	public $Ativo_GreaterThan;
	public $Ativo_GreaterThanOrEqual;
	public $Ativo_LessThan;
	public $Ativo_LessThanOrEqual;
	public $Ativo_In;
	public $Ativo_IsNotEmpty;
	public $Ativo_IsEmpty;
	public $Ativo_BitwiseOr;
	public $Ativo_BitwiseAnd;
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
	public $Tel_Equals;
	public $Tel_NotEquals;
	public $Tel_IsLike;
	public $Tel_IsNotLike;
	public $Tel_BeginsWith;
	public $Tel_EndsWith;
	public $Tel_GreaterThan;
	public $Tel_GreaterThanOrEqual;
	public $Tel_LessThan;
	public $Tel_LessThanOrEqual;
	public $Tel_In;
	public $Tel_IsNotEmpty;
	public $Tel_IsEmpty;
	public $Tel_BitwiseOr;
	public $Tel_BitwiseAnd;
	public $Cel_Equals;
	public $Cel_NotEquals;
	public $Cel_IsLike;
	public $Cel_IsNotLike;
	public $Cel_BeginsWith;
	public $Cel_EndsWith;
	public $Cel_GreaterThan;
	public $Cel_GreaterThanOrEqual;
	public $Cel_LessThan;
	public $Cel_LessThanOrEqual;
	public $Cel_In;
	public $Cel_IsNotEmpty;
	public $Cel_IsEmpty;
	public $Cel_BitwiseOr;
	public $Cel_BitwiseAnd;
	public $Email_Equals;
	public $Email_NotEquals;
	public $Email_IsLike;
	public $Email_IsNotLike;
	public $Email_BeginsWith;
	public $Email_EndsWith;
	public $Email_GreaterThan;
	public $Email_GreaterThanOrEqual;
	public $Email_LessThan;
	public $Email_LessThanOrEqual;
	public $Email_In;
	public $Email_IsNotEmpty;
	public $Email_IsEmpty;
	public $Email_BitwiseOr;
	public $Email_BitwiseAnd;
	public $Senha_Equals;
	public $Senha_NotEquals;
	public $Senha_IsLike;
	public $Senha_IsNotLike;
	public $Senha_BeginsWith;
	public $Senha_EndsWith;
	public $Senha_GreaterThan;
	public $Senha_GreaterThanOrEqual;
	public $Senha_LessThan;
	public $Senha_LessThanOrEqual;
	public $Senha_In;
	public $Senha_IsNotEmpty;
	public $Senha_IsEmpty;
	public $Senha_BitwiseOr;
	public $Senha_BitwiseAnd;
	public $Descricao_Equals;
	public $Descricao_NotEquals;
	public $Descricao_IsLike;
	public $Descricao_IsNotLike;
	public $Descricao_BeginsWith;
	public $Descricao_EndsWith;
	public $Descricao_GreaterThan;
	public $Descricao_GreaterThanOrEqual;
	public $Descricao_LessThan;
	public $Descricao_LessThanOrEqual;
	public $Descricao_In;
	public $Descricao_IsNotEmpty;
	public $Descricao_IsEmpty;
	public $Descricao_BitwiseOr;
	public $Descricao_BitwiseAnd;
	public $Certificado1_Equals;
	public $Certificado1_NotEquals;
	public $Certificado1_IsLike;
	public $Certificado1_IsNotLike;
	public $Certificado1_BeginsWith;
	public $Certificado1_EndsWith;
	public $Certificado1_GreaterThan;
	public $Certificado1_GreaterThanOrEqual;
	public $Certificado1_LessThan;
	public $Certificado1_LessThanOrEqual;
	public $Certificado1_In;
	public $Certificado1_IsNotEmpty;
	public $Certificado1_IsEmpty;
	public $Certificado1_BitwiseOr;
	public $Certificado1_BitwiseAnd;
	public $Certificado2_Equals;
	public $Certificado2_NotEquals;
	public $Certificado2_IsLike;
	public $Certificado2_IsNotLike;
	public $Certificado2_BeginsWith;
	public $Certificado2_EndsWith;
	public $Certificado2_GreaterThan;
	public $Certificado2_GreaterThanOrEqual;
	public $Certificado2_LessThan;
	public $Certificado2_LessThanOrEqual;
	public $Certificado2_In;
	public $Certificado2_IsNotEmpty;
	public $Certificado2_IsEmpty;
	public $Certificado2_BitwiseOr;
	public $Certificado2_BitwiseAnd;
	public $Certificado3_Equals;
	public $Certificado3_NotEquals;
	public $Certificado3_IsLike;
	public $Certificado3_IsNotLike;
	public $Certificado3_BeginsWith;
	public $Certificado3_EndsWith;
	public $Certificado3_GreaterThan;
	public $Certificado3_GreaterThanOrEqual;
	public $Certificado3_LessThan;
	public $Certificado3_LessThanOrEqual;
	public $Certificado3_In;
	public $Certificado3_IsNotEmpty;
	public $Certificado3_IsEmpty;
	public $Certificado3_BitwiseOr;
	public $Certificado3_BitwiseAnd;
	public $Certificado4_Equals;
	public $Certificado4_NotEquals;
	public $Certificado4_IsLike;
	public $Certificado4_IsNotLike;
	public $Certificado4_BeginsWith;
	public $Certificado4_EndsWith;
	public $Certificado4_GreaterThan;
	public $Certificado4_GreaterThanOrEqual;
	public $Certificado4_LessThan;
	public $Certificado4_LessThanOrEqual;
	public $Certificado4_In;
	public $Certificado4_IsNotEmpty;
	public $Certificado4_IsEmpty;
	public $Certificado4_BitwiseOr;
	public $Certificado4_BitwiseAnd;
	public $Certificado5_Equals;
	public $Certificado5_NotEquals;
	public $Certificado5_IsLike;
	public $Certificado5_IsNotLike;
	public $Certificado5_BeginsWith;
	public $Certificado5_EndsWith;
	public $Certificado5_GreaterThan;
	public $Certificado5_GreaterThanOrEqual;
	public $Certificado5_LessThan;
	public $Certificado5_LessThanOrEqual;
	public $Certificado5_In;
	public $Certificado5_IsNotEmpty;
	public $Certificado5_IsEmpty;
	public $Certificado5_BitwiseOr;
	public $Certificado5_BitwiseAnd;

}

?>
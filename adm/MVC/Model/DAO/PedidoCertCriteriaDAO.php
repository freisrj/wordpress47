<?php
/** @package    WandallCa::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/Criteria.php");

/**
 * PedidoCertCriteria allows custom querying for the PedidoCert object.
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
class PedidoCertCriteriaDAO extends Criteria
{

	public $IdPcer_Equals;
	public $IdPcer_NotEquals;
	public $IdPcer_IsLike;
	public $IdPcer_IsNotLike;
	public $IdPcer_BeginsWith;
	public $IdPcer_EndsWith;
	public $IdPcer_GreaterThan;
	public $IdPcer_GreaterThanOrEqual;
	public $IdPcer_LessThan;
	public $IdPcer_LessThanOrEqual;
	public $IdPcer_In;
	public $IdPcer_IsNotEmpty;
	public $IdPcer_IsEmpty;
	public $IdPcer_BitwiseOr;
	public $IdPcer_BitwiseAnd;
	public $IdPed_Equals;
	public $IdPed_NotEquals;
	public $IdPed_IsLike;
	public $IdPed_IsNotLike;
	public $IdPed_BeginsWith;
	public $IdPed_EndsWith;
	public $IdPed_GreaterThan;
	public $IdPed_GreaterThanOrEqual;
	public $IdPed_LessThan;
	public $IdPed_LessThanOrEqual;
	public $IdPed_In;
	public $IdPed_IsNotEmpty;
	public $IdPed_IsEmpty;
	public $IdPed_BitwiseOr;
	public $IdPed_BitwiseAnd;
	public $Qped_Equals;
	public $Qped_NotEquals;
	public $Qped_IsLike;
	public $Qped_IsNotLike;
	public $Qped_BeginsWith;
	public $Qped_EndsWith;
	public $Qped_GreaterThan;
	public $Qped_GreaterThanOrEqual;
	public $Qped_LessThan;
	public $Qped_LessThanOrEqual;
	public $Qped_In;
	public $Qped_IsNotEmpty;
	public $Qped_IsEmpty;
	public $Qped_BitwiseOr;
	public $Qped_BitwiseAnd;
	public $Situacao_Equals;
	public $Situacao_NotEquals;
	public $Situacao_IsLike;
	public $Situacao_IsNotLike;
	public $Situacao_BeginsWith;
	public $Situacao_EndsWith;
	public $Situacao_GreaterThan;
	public $Situacao_GreaterThanOrEqual;
	public $Situacao_LessThan;
	public $Situacao_LessThanOrEqual;
	public $Situacao_In;
	public $Situacao_IsNotEmpty;
	public $Situacao_IsEmpty;
	public $Situacao_BitwiseOr;
	public $Situacao_BitwiseAnd;
	public $Quemretirou_Equals;
	public $Quemretirou_NotEquals;
	public $Quemretirou_IsLike;
	public $Quemretirou_IsNotLike;
	public $Quemretirou_BeginsWith;
	public $Quemretirou_EndsWith;
	public $Quemretirou_GreaterThan;
	public $Quemretirou_GreaterThanOrEqual;
	public $Quemretirou_LessThan;
	public $Quemretirou_LessThanOrEqual;
	public $Quemretirou_In;
	public $Quemretirou_IsNotEmpty;
	public $Quemretirou_IsEmpty;
	public $Quemretirou_BitwiseOr;
	public $Quemretirou_BitwiseAnd;
	public $Data_Equals;
	public $Data_NotEquals;
	public $Data_IsLike;
	public $Data_IsNotLike;
	public $Data_BeginsWith;
	public $Data_EndsWith;
	public $Data_GreaterThan;
	public $Data_GreaterThanOrEqual;
	public $Data_LessThan;
	public $Data_LessThanOrEqual;
	public $Data_In;
	public $Data_IsNotEmpty;
	public $Data_IsEmpty;
	public $Data_BitwiseOr;
	public $Data_BitwiseAnd;
	public $Entregue_Equals;
	public $Entregue_NotEquals;
	public $Entregue_IsLike;
	public $Entregue_IsNotLike;
	public $Entregue_BeginsWith;
	public $Entregue_EndsWith;
	public $Entregue_GreaterThan;
	public $Entregue_GreaterThanOrEqual;
	public $Entregue_LessThan;
	public $Entregue_LessThanOrEqual;
	public $Entregue_In;
	public $Entregue_IsNotEmpty;
	public $Entregue_IsEmpty;
	public $Entregue_BitwiseOr;
	public $Entregue_BitwiseAnd;
	public $IdAlu_Equals;
	public $IdAlu_NotEquals;
	public $IdAlu_IsLike;
	public $IdAlu_IsNotLike;
	public $IdAlu_BeginsWith;
	public $IdAlu_EndsWith;
	public $IdAlu_GreaterThan;
	public $IdAlu_GreaterThanOrEqual;
	public $IdAlu_LessThan;
	public $IdAlu_LessThanOrEqual;
	public $IdAlu_In;
	public $IdAlu_IsNotEmpty;
	public $IdAlu_IsEmpty;
	public $IdAlu_BitwiseOr;
	public $IdAlu_BitwiseAnd;
	public $Turma_Equals;
	public $Turma_NotEquals;
	public $Turma_IsLike;
	public $Turma_IsNotLike;
	public $Turma_BeginsWith;
	public $Turma_EndsWith;
	public $Turma_GreaterThan;
	public $Turma_GreaterThanOrEqual;
	public $Turma_LessThan;
	public $Turma_LessThanOrEqual;
	public $Turma_In;
	public $Turma_IsNotEmpty;
	public $Turma_IsEmpty;
	public $Turma_BitwiseOr;
	public $Turma_BitwiseAnd;
	public $Curso_Equals;
	public $Curso_NotEquals;
	public $Curso_IsLike;
	public $Curso_IsNotLike;
	public $Curso_BeginsWith;
	public $Curso_EndsWith;
	public $Curso_GreaterThan;
	public $Curso_GreaterThanOrEqual;
	public $Curso_LessThan;
	public $Curso_LessThanOrEqual;
	public $Curso_In;
	public $Curso_IsNotEmpty;
	public $Curso_IsEmpty;
	public $Curso_BitwiseOr;
	public $Curso_BitwiseAnd;

}

?>
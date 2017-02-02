<?php
/** @package    WandallCa::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/Criteria.php");

/**
 * PagamentoCriteria allows custom querying for the Pagamento object.
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
class PagamentoCriteriaDAO extends Criteria
{

	public $IdPag_Equals;
	public $IdPag_NotEquals;
	public $IdPag_IsLike;
	public $IdPag_IsNotLike;
	public $IdPag_BeginsWith;
	public $IdPag_EndsWith;
	public $IdPag_GreaterThan;
	public $IdPag_GreaterThanOrEqual;
	public $IdPag_LessThan;
	public $IdPag_LessThanOrEqual;
	public $IdPag_In;
	public $IdPag_IsNotEmpty;
	public $IdPag_IsEmpty;
	public $IdPag_BitwiseOr;
	public $IdPag_BitwiseAnd;
	public $IdCli_Equals;
	public $IdCli_NotEquals;
	public $IdCli_IsLike;
	public $IdCli_IsNotLike;
	public $IdCli_BeginsWith;
	public $IdCli_EndsWith;
	public $IdCli_GreaterThan;
	public $IdCli_GreaterThanOrEqual;
	public $IdCli_LessThan;
	public $IdCli_LessThanOrEqual;
	public $IdCli_In;
	public $IdCli_IsNotEmpty;
	public $IdCli_IsEmpty;
	public $IdCli_BitwiseOr;
	public $IdCli_BitwiseAnd;
	public $IdPedido_Equals;
	public $IdPedido_NotEquals;
	public $IdPedido_IsLike;
	public $IdPedido_IsNotLike;
	public $IdPedido_BeginsWith;
	public $IdPedido_EndsWith;
	public $IdPedido_GreaterThan;
	public $IdPedido_GreaterThanOrEqual;
	public $IdPedido_LessThan;
	public $IdPedido_LessThanOrEqual;
	public $IdPedido_In;
	public $IdPedido_IsNotEmpty;
	public $IdPedido_IsEmpty;
	public $IdPedido_BitwiseOr;
	public $IdPedido_BitwiseAnd;
	public $Tipo_Equals;
	public $Tipo_NotEquals;
	public $Tipo_IsLike;
	public $Tipo_IsNotLike;
	public $Tipo_BeginsWith;
	public $Tipo_EndsWith;
	public $Tipo_GreaterThan;
	public $Tipo_GreaterThanOrEqual;
	public $Tipo_LessThan;
	public $Tipo_LessThanOrEqual;
	public $Tipo_In;
	public $Tipo_IsNotEmpty;
	public $Tipo_IsEmpty;
	public $Tipo_BitwiseOr;
	public $Tipo_BitwiseAnd;
	public $DataCri_Equals;
	public $DataCri_NotEquals;
	public $DataCri_IsLike;
	public $DataCri_IsNotLike;
	public $DataCri_BeginsWith;
	public $DataCri_EndsWith;
	public $DataCri_GreaterThan;
	public $DataCri_GreaterThanOrEqual;
	public $DataCri_LessThan;
	public $DataCri_LessThanOrEqual;
	public $DataCri_In;
	public $DataCri_IsNotEmpty;
	public $DataCri_IsEmpty;
	public $DataCri_BitwiseOr;
	public $DataCri_BitwiseAnd;
	public $HoraCri_Equals;
	public $HoraCri_NotEquals;
	public $HoraCri_IsLike;
	public $HoraCri_IsNotLike;
	public $HoraCri_BeginsWith;
	public $HoraCri_EndsWith;
	public $HoraCri_GreaterThan;
	public $HoraCri_GreaterThanOrEqual;
	public $HoraCri_LessThan;
	public $HoraCri_LessThanOrEqual;
	public $HoraCri_In;
	public $HoraCri_IsNotEmpty;
	public $HoraCri_IsEmpty;
	public $HoraCri_BitwiseOr;
	public $HoraCri_BitwiseAnd;
	public $Tid_Equals;
	public $Tid_NotEquals;
	public $Tid_IsLike;
	public $Tid_IsNotLike;
	public $Tid_BeginsWith;
	public $Tid_EndsWith;
	public $Tid_GreaterThan;
	public $Tid_GreaterThanOrEqual;
	public $Tid_LessThan;
	public $Tid_LessThanOrEqual;
	public $Tid_In;
	public $Tid_IsNotEmpty;
	public $Tid_IsEmpty;
	public $Tid_BitwiseOr;
	public $Tid_BitwiseAnd;
	public $ValorTotal_Equals;
	public $ValorTotal_NotEquals;
	public $ValorTotal_IsLike;
	public $ValorTotal_IsNotLike;
	public $ValorTotal_BeginsWith;
	public $ValorTotal_EndsWith;
	public $ValorTotal_GreaterThan;
	public $ValorTotal_GreaterThanOrEqual;
	public $ValorTotal_LessThan;
	public $ValorTotal_LessThanOrEqual;
	public $ValorTotal_In;
	public $ValorTotal_IsNotEmpty;
	public $ValorTotal_IsEmpty;
	public $ValorTotal_BitwiseOr;
	public $ValorTotal_BitwiseAnd;
	public $DataHoraRetorno_Equals;
	public $DataHoraRetorno_NotEquals;
	public $DataHoraRetorno_IsLike;
	public $DataHoraRetorno_IsNotLike;
	public $DataHoraRetorno_BeginsWith;
	public $DataHoraRetorno_EndsWith;
	public $DataHoraRetorno_GreaterThan;
	public $DataHoraRetorno_GreaterThanOrEqual;
	public $DataHoraRetorno_LessThan;
	public $DataHoraRetorno_LessThanOrEqual;
	public $DataHoraRetorno_In;
	public $DataHoraRetorno_IsNotEmpty;
	public $DataHoraRetorno_IsEmpty;
	public $DataHoraRetorno_BitwiseOr;
	public $DataHoraRetorno_BitwiseAnd;
	public $Bandeira_Equals;
	public $Bandeira_NotEquals;
	public $Bandeira_IsLike;
	public $Bandeira_IsNotLike;
	public $Bandeira_BeginsWith;
	public $Bandeira_EndsWith;
	public $Bandeira_GreaterThan;
	public $Bandeira_GreaterThanOrEqual;
	public $Bandeira_LessThan;
	public $Bandeira_LessThanOrEqual;
	public $Bandeira_In;
	public $Bandeira_IsNotEmpty;
	public $Bandeira_IsEmpty;
	public $Bandeira_BitwiseOr;
	public $Bandeira_BitwiseAnd;
	public $TipoVenda_Equals;
	public $TipoVenda_NotEquals;
	public $TipoVenda_IsLike;
	public $TipoVenda_IsNotLike;
	public $TipoVenda_BeginsWith;
	public $TipoVenda_EndsWith;
	public $TipoVenda_GreaterThan;
	public $TipoVenda_GreaterThanOrEqual;
	public $TipoVenda_LessThan;
	public $TipoVenda_LessThanOrEqual;
	public $TipoVenda_In;
	public $TipoVenda_IsNotEmpty;
	public $TipoVenda_IsEmpty;
	public $TipoVenda_BitwiseOr;
	public $TipoVenda_BitwiseAnd;
	public $Parcelas_Equals;
	public $Parcelas_NotEquals;
	public $Parcelas_IsLike;
	public $Parcelas_IsNotLike;
	public $Parcelas_BeginsWith;
	public $Parcelas_EndsWith;
	public $Parcelas_GreaterThan;
	public $Parcelas_GreaterThanOrEqual;
	public $Parcelas_LessThan;
	public $Parcelas_LessThanOrEqual;
	public $Parcelas_In;
	public $Parcelas_IsNotEmpty;
	public $Parcelas_IsEmpty;
	public $Parcelas_BitwiseOr;
	public $Parcelas_BitwiseAnd;
	public $Status_Equals;
	public $Status_NotEquals;
	public $Status_IsLike;
	public $Status_IsNotLike;
	public $Status_BeginsWith;
	public $Status_EndsWith;
	public $Status_GreaterThan;
	public $Status_GreaterThanOrEqual;
	public $Status_LessThan;
	public $Status_LessThanOrEqual;
	public $Status_In;
	public $Status_IsNotEmpty;
	public $Status_IsEmpty;
	public $Status_BitwiseOr;
	public $Status_BitwiseAnd;
	public $UrlAutenticacao_Equals;
	public $UrlAutenticacao_NotEquals;
	public $UrlAutenticacao_IsLike;
	public $UrlAutenticacao_IsNotLike;
	public $UrlAutenticacao_BeginsWith;
	public $UrlAutenticacao_EndsWith;
	public $UrlAutenticacao_GreaterThan;
	public $UrlAutenticacao_GreaterThanOrEqual;
	public $UrlAutenticacao_LessThan;
	public $UrlAutenticacao_LessThanOrEqual;
	public $UrlAutenticacao_In;
	public $UrlAutenticacao_IsNotEmpty;
	public $UrlAutenticacao_IsEmpty;
	public $UrlAutenticacao_BitwiseOr;
	public $UrlAutenticacao_BitwiseAnd;
	public $CodAutorizacao_Equals;
	public $CodAutorizacao_NotEquals;
	public $CodAutorizacao_IsLike;
	public $CodAutorizacao_IsNotLike;
	public $CodAutorizacao_BeginsWith;
	public $CodAutorizacao_EndsWith;
	public $CodAutorizacao_GreaterThan;
	public $CodAutorizacao_GreaterThanOrEqual;
	public $CodAutorizacao_LessThan;
	public $CodAutorizacao_LessThanOrEqual;
	public $CodAutorizacao_In;
	public $CodAutorizacao_IsNotEmpty;
	public $CodAutorizacao_IsEmpty;
	public $CodAutorizacao_BitwiseOr;
	public $CodAutorizacao_BitwiseAnd;
	public $Mensagem_Equals;
	public $Mensagem_NotEquals;
	public $Mensagem_IsLike;
	public $Mensagem_IsNotLike;
	public $Mensagem_BeginsWith;
	public $Mensagem_EndsWith;
	public $Mensagem_GreaterThan;
	public $Mensagem_GreaterThanOrEqual;
	public $Mensagem_LessThan;
	public $Mensagem_LessThanOrEqual;
	public $Mensagem_In;
	public $Mensagem_IsNotEmpty;
	public $Mensagem_IsEmpty;
	public $Mensagem_BitwiseOr;
	public $Mensagem_BitwiseAnd;
	public $DataHoraAutorizacao_Equals;
	public $DataHoraAutorizacao_NotEquals;
	public $DataHoraAutorizacao_IsLike;
	public $DataHoraAutorizacao_IsNotLike;
	public $DataHoraAutorizacao_BeginsWith;
	public $DataHoraAutorizacao_EndsWith;
	public $DataHoraAutorizacao_GreaterThan;
	public $DataHoraAutorizacao_GreaterThanOrEqual;
	public $DataHoraAutorizacao_LessThan;
	public $DataHoraAutorizacao_LessThanOrEqual;
	public $DataHoraAutorizacao_In;
	public $DataHoraAutorizacao_IsNotEmpty;
	public $DataHoraAutorizacao_IsEmpty;
	public $DataHoraAutorizacao_BitwiseOr;
	public $DataHoraAutorizacao_BitwiseAnd;
	public $Lr_Equals;
	public $Lr_NotEquals;
	public $Lr_IsLike;
	public $Lr_IsNotLike;
	public $Lr_BeginsWith;
	public $Lr_EndsWith;
	public $Lr_GreaterThan;
	public $Lr_GreaterThanOrEqual;
	public $Lr_LessThan;
	public $Lr_LessThanOrEqual;
	public $Lr_In;
	public $Lr_IsNotEmpty;
	public $Lr_IsEmpty;
	public $Lr_BitwiseOr;
	public $Lr_BitwiseAnd;
	public $Arp_Equals;
	public $Arp_NotEquals;
	public $Arp_IsLike;
	public $Arp_IsNotLike;
	public $Arp_BeginsWith;
	public $Arp_EndsWith;
	public $Arp_GreaterThan;
	public $Arp_GreaterThanOrEqual;
	public $Arp_LessThan;
	public $Arp_LessThanOrEqual;
	public $Arp_In;
	public $Arp_IsNotEmpty;
	public $Arp_IsEmpty;
	public $Arp_BitwiseOr;
	public $Arp_BitwiseAnd;

}

?>
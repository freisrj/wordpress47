<?php
/** @package    WandallCa::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * PagamentoMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the PagamentoDAO to the pagamento datastore.
 *
 * WARNING: THIS IS AN AUTO-GENERATED FILE
 *
 * This file should generally not be edited by hand except in special circumstances.
 * You can override the default fetching strategies for KeyMaps in _config.php.
 * Leaving this file alone will allow easy re-generation of all DAOs in the event of schema changes
 *
 * @package WandallCa::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class PagamentoMap implements IDaoMap, IDaoMap2
{

	private static $KM;
	private static $FM;
	
	/**
	 * {@inheritdoc}
	 */
	public static function AddMap($property,FieldMap $map)
	{
		self::GetFieldMaps();
		self::$FM[$property] = $map;
	}
	
	/**
	 * {@inheritdoc}
	 */
	public static function SetFetchingStrategy($property,$loadType)
	{
		self::GetKeyMaps();
		self::$KM[$property]->LoadType = $loadType;
	}

	/**
	 * {@inheritdoc}
	 */
	public static function GetFieldMaps()
	{
		if (self::$FM == null)
		{
			self::$FM = Array();
			self::$FM["IdPag"] = new FieldMap("IdPag","pagamento","id_pag",true,FM_TYPE_INT,11,null,true);
			self::$FM["IdCli"] = new FieldMap("IdCli","pagamento","id_cli",false,FM_TYPE_INT,11,null,false);
			self::$FM["IdPedido"] = new FieldMap("IdPedido","pagamento","id_pedido",false,FM_TYPE_INT,11,null,false);
			self::$FM["Tipo"] = new FieldMap("Tipo","pagamento","tipo",false,FM_TYPE_VARCHAR,30,null,false);
			self::$FM["DataCri"] = new FieldMap("DataCri","pagamento","data_cri",false,FM_TYPE_DATE,null,"0000-00-00",false);
			self::$FM["HoraCri"] = new FieldMap("HoraCri","pagamento","hora_cri",false,FM_TYPE_TIME,null,"00:00:00",false);
			self::$FM["Tid"] = new FieldMap("Tid","pagamento","tid",false,FM_TYPE_VARCHAR,50,null,false);
			self::$FM["ValorTotal"] = new FieldMap("ValorTotal","pagamento","valor_total",false,FM_TYPE_DECIMAL,10.2,null,false);
			self::$FM["DataHoraRetorno"] = new FieldMap("DataHoraRetorno","pagamento","data_hora_retorno",false,FM_TYPE_VARCHAR,40,null,false);
			self::$FM["Bandeira"] = new FieldMap("Bandeira","pagamento","bandeira",false,FM_TYPE_VARCHAR,30,null,false);
			self::$FM["TipoVenda"] = new FieldMap("TipoVenda","pagamento","tipo_venda",false,FM_TYPE_CHAR,2,null,false);
			self::$FM["Parcelas"] = new FieldMap("Parcelas","pagamento","parcelas",false,FM_TYPE_CHAR,3,null,false);
			self::$FM["Status"] = new FieldMap("Status","pagamento","status",false,FM_TYPE_CHAR,4,null,false);
			self::$FM["UrlAutenticacao"] = new FieldMap("UrlAutenticacao","pagamento","url_autenticacao",false,FM_TYPE_TEXT,null,null,false);
			self::$FM["CodAutorizacao"] = new FieldMap("CodAutorizacao","pagamento","cod_autorizacao",false,FM_TYPE_CHAR,20,null,false);
			self::$FM["Mensagem"] = new FieldMap("Mensagem","pagamento","mensagem",false,FM_TYPE_CHAR,40,null,false);
			self::$FM["DataHoraAutorizacao"] = new FieldMap("DataHoraAutorizacao","pagamento","data_hora_autorizacao",false,FM_TYPE_CHAR,40,null,false);
			self::$FM["Lr"] = new FieldMap("Lr","pagamento","lr",false,FM_TYPE_CHAR,5,null,false);
			self::$FM["Arp"] = new FieldMap("Arp","pagamento","arp",false,FM_TYPE_CHAR,10,null,false);
		}
		return self::$FM;
	}

	/**
	 * {@inheritdoc}
	 */
	public static function GetKeyMaps()
	{
		if (self::$KM == null)
		{
			self::$KM = Array();
		}
		return self::$KM;
	}

}

?>
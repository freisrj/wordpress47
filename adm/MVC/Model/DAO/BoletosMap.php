<?php
/** @package    WandallCa::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * BoletosMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the BoletosDAO to the boletos datastore.
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
class BoletosMap implements IDaoMap, IDaoMap2
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
			self::$FM["IdBoleto"] = new FieldMap("IdBoleto","boletos","id_boleto",true,FM_TYPE_INT,11,null,true);
			self::$FM["IdCli"] = new FieldMap("IdCli","boletos","id_cli",false,FM_TYPE_INT,11,null,false);
			self::$FM["IdPedido"] = new FieldMap("IdPedido","boletos","id_pedido",false,FM_TYPE_INT,11,null,false);
			self::$FM["NossoNumero"] = new FieldMap("NossoNumero","boletos","nosso_numero",false,FM_TYPE_INT,22,null,false);
			self::$FM["Valor"] = new FieldMap("Valor","boletos","valor",false,FM_TYPE_DECIMAL,10.2,null,false);
			self::$FM["DataCri"] = new FieldMap("DataCri","boletos","data_cri",false,FM_TYPE_DATE,null,null,false);
			self::$FM["HoraCri"] = new FieldMap("HoraCri","boletos","hora_cri",false,FM_TYPE_TIME,null,null,false);
			self::$FM["DataVenc"] = new FieldMap("DataVenc","boletos","data_venc",false,FM_TYPE_DATE,null,null,false);
			self::$FM["Hash"] = new FieldMap("Hash","boletos","hash",false,FM_TYPE_CHAR,50,null,false);
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
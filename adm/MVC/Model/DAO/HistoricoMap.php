<?php
/** @package    WandallCa::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * HistoricoMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the HistoricoDAO to the historico datastore.
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
class HistoricoMap implements IDaoMap, IDaoMap2
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
			self::$FM["IdHis"] = new FieldMap("IdHis","historico","id_his",true,FM_TYPE_INT,10,null,true);
			self::$FM["Unidade"] = new FieldMap("Unidade","historico","unidade",false,FM_TYPE_INT,10,null,false);
			self::$FM["IdFun"] = new FieldMap("IdFun","historico","id_fun",false,FM_TYPE_INT,10,null,false);
			self::$FM["Apelido"] = new FieldMap("Apelido","historico","apelido",false,FM_TYPE_VARCHAR,50,null,false);
			self::$FM["IdCliente"] = new FieldMap("IdCliente","historico","id_cliente",false,FM_TYPE_VARCHAR,15,null,false);
			self::$FM["IdServer"] = new FieldMap("IdServer","historico","id_server",false,FM_TYPE_VARCHAR,15,null,false);
			self::$FM["Data"] = new FieldMap("Data","historico","data",false,FM_TYPE_DATE,null,null,false);
			self::$FM["Hora"] = new FieldMap("Hora","historico","hora",false,FM_TYPE_TIME,null,null,false);
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
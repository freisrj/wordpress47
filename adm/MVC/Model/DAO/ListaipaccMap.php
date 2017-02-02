<?php
/** @package    WandallCa::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * ListaipaccMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the ListaipaccDAO to the listaipacc datastore.
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
class ListaipaccMap implements IDaoMap, IDaoMap2
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
			self::$FM["Id"] = new FieldMap("Id","listaipacc","id",true,FM_TYPE_INT,11,null,true);
			self::$FM["Site"] = new FieldMap("Site","listaipacc","site",false,FM_TYPE_VARCHAR,50,null,false);
			self::$FM["DataCad"] = new FieldMap("DataCad","listaipacc","data_cad",false,FM_TYPE_DATE,null,null,false);
			self::$FM["HoraCad"] = new FieldMap("HoraCad","listaipacc","hora_cad",false,FM_TYPE_TIME,null,null,false);
			self::$FM["Ip"] = new FieldMap("Ip","listaipacc","ip",false,FM_TYPE_VARCHAR,50,null,false);
			self::$FM["Referer"] = new FieldMap("Referer","listaipacc","referer",false,FM_TYPE_VARCHAR,50,null,false);
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
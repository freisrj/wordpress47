<?php
/** @package    WandallCa::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * WdPalestraMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the WdPalestraDAO to the wd_palestra datastore.
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
class WdPalestraMap implements IDaoMap, IDaoMap2
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
			self::$FM["IdPre"] = new FieldMap("IdPre","wd_palestra","id_pre",true,FM_TYPE_INT,11,null,true);
			self::$FM["Nome"] = new FieldMap("Nome","wd_palestra","nome",false,FM_TYPE_VARCHAR,50,null,false);
			self::$FM["Email"] = new FieldMap("Email","wd_palestra","email",false,FM_TYPE_VARCHAR,50,null,false);
			self::$FM["Telefone"] = new FieldMap("Telefone","wd_palestra","telefone",false,FM_TYPE_VARCHAR,13,null,false);
			self::$FM["Celular"] = new FieldMap("Celular","wd_palestra","celular",false,FM_TYPE_VARCHAR,13,null,false);
			self::$FM["Situacao"] = new FieldMap("Situacao","wd_palestra","situacao",false,FM_TYPE_INT,11,null,false);
			self::$FM["Data"] = new FieldMap("Data","wd_palestra","data",false,FM_TYPE_VARCHAR,11,null,false);
			self::$FM["Palestra"] = new FieldMap("Palestra","wd_palestra","palestra",false,FM_TYPE_INT,11,null,false);
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
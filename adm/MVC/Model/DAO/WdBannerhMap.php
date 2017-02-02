<?php
/** @package    WandallCa::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * WdBannerhMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the WdBannerhDAO to the wd_bannerh datastore.
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
class WdBannerhMap implements IDaoMap, IDaoMap2
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
			self::$FM["IdBan"] = new FieldMap("IdBan","wd_bannerh","id_ban",true,FM_TYPE_INT,11,null,true);
			self::$FM["Titulo"] = new FieldMap("Titulo","wd_bannerh","titulo",false,FM_TYPE_VARCHAR,20,null,false);
			self::$FM["Imagem"] = new FieldMap("Imagem","wd_bannerh","imagem",false,FM_TYPE_VARCHAR,30,null,false);
			self::$FM["Lin1"] = new FieldMap("Lin1","wd_bannerh","lin1",false,FM_TYPE_VARCHAR,30,null,false);
			self::$FM["Lin2"] = new FieldMap("Lin2","wd_bannerh","lin2",false,FM_TYPE_VARCHAR,30,null,false);
			self::$FM["Lin3"] = new FieldMap("Lin3","wd_bannerh","lin3",false,FM_TYPE_VARCHAR,30,null,false);
			self::$FM["Lin4"] = new FieldMap("Lin4","wd_bannerh","lin4",false,FM_TYPE_VARCHAR,30,null,false);
			self::$FM["Lin5"] = new FieldMap("Lin5","wd_bannerh","lin5",false,FM_TYPE_VARCHAR,50,null,false);
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
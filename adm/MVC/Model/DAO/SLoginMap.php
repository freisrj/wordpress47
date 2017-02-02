<?php
/** @package    WandallCa::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * SLoginMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the SLoginDAO to the s_login datastore.
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
class SLoginMap implements IDaoMap, IDaoMap2
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
			self::$FM["Id"] = new FieldMap("Id","s_login","id",true,FM_TYPE_INT,11,null,true);
			self::$FM["IdFun"] = new FieldMap("IdFun","s_login","id_fun",false,FM_TYPE_INT,10,null,false);
			self::$FM["Login"] = new FieldMap("Login","s_login","login",false,FM_TYPE_VARCHAR,50,null,false);
			self::$FM["Senha"] = new FieldMap("Senha","s_login","senha",false,FM_TYPE_VARCHAR,8,null,false);
			self::$FM["Acesso"] = new FieldMap("Acesso","s_login","acesso",false,FM_TYPE_INT,11,null,false);
			self::$FM["Unidade"] = new FieldMap("Unidade","s_login","unidade",false,FM_TYPE_INT,10,null,false);
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
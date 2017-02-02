<?php
/** @package    WandallCa::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * PesquisaDiariaMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the PesquisaDiariaDAO to the pesquisa_diaria datastore.
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
class PesquisaDiariaMap implements IDaoMap, IDaoMap2
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
			self::$FM["IdDia"] = new FieldMap("IdDia","pesquisa_diaria","id_dia",true,FM_TYPE_INT,11,null,true);
			self::$FM["Data"] = new FieldMap("Data","pesquisa_diaria","data",false,FM_TYPE_DATE,null,null,false);
			self::$FM["Hora"] = new FieldMap("Hora","pesquisa_diaria","hora",false,FM_TYPE_TIME,null,null,false);
			self::$FM["IdCur"] = new FieldMap("IdCur","pesquisa_diaria","id_cur",false,FM_TYPE_INT,11,null,false);
			self::$FM["Fone"] = new FieldMap("Fone","pesquisa_diaria","fone",false,FM_TYPE_INT,11,null,false);
			self::$FM["Wzap"] = new FieldMap("Wzap","pesquisa_diaria","Wzap",false,FM_TYPE_INT,11,null,false);
			self::$FM["Local"] = new FieldMap("Local","pesquisa_diaria","local",false,FM_TYPE_INT,11,null,false);
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
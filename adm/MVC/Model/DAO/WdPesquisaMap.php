<?php
/** @package    WandallCa::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * WdPesquisaMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the WdPesquisaDAO to the wd_pesquisa datastore.
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
class WdPesquisaMap implements IDaoMap, IDaoMap2
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
			self::$FM["Curso"] = new FieldMap("Curso","wd_pesquisa","curso",false,FM_TYPE_VARCHAR,50,null,false);
			self::$FM["Nome"] = new FieldMap("Nome","wd_pesquisa","nome",false,FM_TYPE_VARCHAR,12,null,false);
			self::$FM["IdCur"] = new FieldMap("IdCur","wd_pesquisa","id_cur",true,FM_TYPE_INT,11,null,true);
			self::$FM["IdTip"] = new FieldMap("IdTip","wd_pesquisa","id_tip",false,FM_TYPE_INT,11,null,false);
			self::$FM["Pesquisa"] = new FieldMap("Pesquisa","wd_pesquisa","pesquisa",false,FM_TYPE_TINYINT,4,null,false);
			self::$FM["Banner"] = new FieldMap("Banner","wd_pesquisa","banner",false,FM_TYPE_VARCHAR,30,null,false);
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
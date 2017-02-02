<?php
/** @package    WandallCa::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * AulasMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the AulasDAO to the aulas datastore.
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
class AulasMap implements IDaoMap, IDaoMap2
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
			self::$FM["IdAul"] = new FieldMap("IdAul","aulas","id_aul",true,FM_TYPE_INT,10,null,true);
			self::$FM["Aula"] = new FieldMap("Aula","aulas","aula",false,FM_TYPE_INT,10,null,false);
			self::$FM["IdAlu"] = new FieldMap("IdAlu","aulas","id_alu",false,FM_TYPE_INT,10,null,false);
			self::$FM["IdTur"] = new FieldMap("IdTur","aulas","id_tur",false,FM_TYPE_INT,10,null,false);
			self::$FM["Modulo"] = new FieldMap("Modulo","aulas","modulo",false,FM_TYPE_INT,10,null,false);
			self::$FM["Ponto"] = new FieldMap("Ponto","aulas","ponto",false,FM_TYPE_CHAR,1,null,false);
			self::$FM["Data"] = new FieldMap("Data","aulas","data",false,FM_TYPE_DATE,null,null,false);
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
<?php
/** @package    WandallCa::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * TurMateriasMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the TurMateriasDAO to the tur_materias datastore.
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
class TurMateriasMap implements IDaoMap, IDaoMap2
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
			self::$FM["IdMat"] = new FieldMap("IdMat","tur_materias","id_mat",true,FM_TYPE_INT,11,null,true);
			self::$FM["IdTur"] = new FieldMap("IdTur","tur_materias","id_tur",false,FM_TYPE_INT,11,null,false);
			self::$FM["Modulo"] = new FieldMap("Modulo","tur_materias","modulo",false,FM_TYPE_INT,11,null,false);
			self::$FM["Aulas"] = new FieldMap("Aulas","tur_materias","aulas",false,FM_TYPE_INT,11,null,false);
			self::$FM["AulasAdd"] = new FieldMap("AulasAdd","tur_materias","aulas_add",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["Inicio"] = new FieldMap("Inicio","tur_materias","inicio",false,FM_TYPE_DATE,null,null,false);
			self::$FM["Termino"] = new FieldMap("Termino","tur_materias","termino",false,FM_TYPE_DATE,null,null,false);
			self::$FM["Concluida"] = new FieldMap("Concluida","tur_materias","concluida",false,FM_TYPE_TINYINT,3,null,false);
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
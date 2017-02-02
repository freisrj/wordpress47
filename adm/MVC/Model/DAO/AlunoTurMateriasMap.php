<?php
/** @package    WandallCa::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * AlunoTurMateriasMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the AlunoTurMateriasDAO to the aluno_tur_materias datastore.
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
class AlunoTurMateriasMap implements IDaoMap, IDaoMap2
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
			self::$FM["IdLig"] = new FieldMap("IdLig","aluno_tur_materias","id_lig",true,FM_TYPE_INT,11,null,true);
			self::$FM["IdTur"] = new FieldMap("IdTur","aluno_tur_materias","id_tur",false,FM_TYPE_INT,11,null,false);
			self::$FM["IdAlu"] = new FieldMap("IdAlu","aluno_tur_materias","id_alu",false,FM_TYPE_INT,11,null,false);
			self::$FM["Materia"] = new FieldMap("Materia","aluno_tur_materias","materia",false,FM_TYPE_INT,11,null,false);
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
<?php
/** @package    WandallCa::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * WdTurmasMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the WdTurmasDAO to the wd_turmas datastore.
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
class WdTurmasMap implements IDaoMap, IDaoMap2
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
			self::$FM["IdTur"] = new FieldMap("IdTur","wd_turmas","id_tur",true,FM_TYPE_INT,11,null,true);
			self::$FM["IdUni"] = new FieldMap("IdUni","wd_turmas","id_uni",false,FM_TYPE_INT,10,"1",false);
			self::$FM["Due"] = new FieldMap("Due","wd_turmas","due",false,FM_TYPE_INT,10,null,false);
			self::$FM["Aberta"] = new FieldMap("Aberta","wd_turmas","aberta",false,FM_TYPE_TINYINT,4,"1",false);
			self::$FM["Andamento"] = new FieldMap("Andamento","wd_turmas","andamento",false,FM_TYPE_TINYINT,3,"1",false);
			self::$FM["IdCur"] = new FieldMap("IdCur","wd_turmas","id_cur",false,FM_TYPE_INT,11,null,false);
			self::$FM["IdPro"] = new FieldMap("IdPro","wd_turmas","id_pro",false,FM_TYPE_INT,11,null,false);
			self::$FM["Inicio"] = new FieldMap("Inicio","wd_turmas","inicio",false,FM_TYPE_DATE,null,null,false);
			self::$FM["Termino"] = new FieldMap("Termino","wd_turmas","termino",false,FM_TYPE_DATE,null,null,false);
			self::$FM["Aulas"] = new FieldMap("Aulas","wd_turmas","aulas",false,FM_TYPE_INT,4,null,false);
			self::$FM["Turno"] = new FieldMap("Turno","wd_turmas","turno",false,FM_TYPE_VARCHAR,10,null,false);
			self::$FM["Dias"] = new FieldMap("Dias","wd_turmas","dias",false,FM_TYPE_VARCHAR,15,null,false);
			self::$FM["Horario"] = new FieldMap("Horario","wd_turmas","horario",false,FM_TYPE_VARCHAR,14,null,false);
			self::$FM["Vagas"] = new FieldMap("Vagas","wd_turmas","vagas",false,FM_TYPE_INT,11,null,false);
			self::$FM["Pre"] = new FieldMap("Pre","wd_turmas","pre",false,FM_TYPE_INT,11,null,false);
			self::$FM["Matriculas"] = new FieldMap("Matriculas","wd_turmas","matriculas",false,FM_TYPE_INT,11,null,false);
			self::$FM["Sala"] = new FieldMap("Sala","wd_turmas","sala",false,FM_TYPE_INT,10,null,false);
			self::$FM["Status"] = new FieldMap("Status","wd_turmas","status",false,FM_TYPE_VARCHAR,20,null,false);
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
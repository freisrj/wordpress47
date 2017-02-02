<?php
/** @package    WandallCa::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * AtendimentoMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the AtendimentoDAO to the atendimento datastore.
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
class AtendimentoMap implements IDaoMap, IDaoMap2
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
			self::$FM["IdAte"] = new FieldMap("IdAte","atendimento","id_ate",true,FM_TYPE_INT,3,null,true);
			self::$FM["IdFun"] = new FieldMap("IdFun","atendimento","id_fun",false,FM_TYPE_INT,1,null,false);
			self::$FM["Webmail"] = new FieldMap("Webmail","atendimento","webmail",false,FM_TYPE_TINYINT,2,"1",false);
			self::$FM["Unidade"] = new FieldMap("Unidade","atendimento","unidade",false,FM_TYPE_INT,10,null,false);
			self::$FM["Dia"] = new FieldMap("Dia","atendimento","dia",false,FM_TYPE_CHAR,2,null,false);
			self::$FM["Mes"] = new FieldMap("Mes","atendimento","mes",false,FM_TYPE_CHAR,2,null,false);
			self::$FM["Ano"] = new FieldMap("Ano","atendimento","ano",false,FM_TYPE_CHAR,4,null,false);
			self::$FM["Hora"] = new FieldMap("Hora","atendimento","hora",false,FM_TYPE_INT,2,null,false);
			self::$FM["Minuto"] = new FieldMap("Minuto","atendimento","minuto",false,FM_TYPE_INT,2,null,false);
			self::$FM["Nome"] = new FieldMap("Nome","atendimento","nome",false,FM_TYPE_VARCHAR,40,null,false);
			self::$FM["Soube"] = new FieldMap("Soube","atendimento","soube",false,FM_TYPE_INT,10,null,false);
			self::$FM["IdCur"] = new FieldMap("IdCur","atendimento","id_cur",false,FM_TYPE_INT,10,null,false);
			self::$FM["Dias"] = new FieldMap("Dias","atendimento","dias",false,FM_TYPE_VARCHAR,12,null,false);
			self::$FM["Horario"] = new FieldMap("Horario","atendimento","horario",false,FM_TYPE_VARCHAR,15,null,false);
			self::$FM["Turno"] = new FieldMap("Turno","atendimento","turno",false,FM_TYPE_VARCHAR,6,null,false);
			self::$FM["Email"] = new FieldMap("Email","atendimento","email",false,FM_TYPE_VARCHAR,50,null,false);
			self::$FM["Tel1"] = new FieldMap("Tel1","atendimento","tel1",false,FM_TYPE_VARCHAR,13,null,false);
			self::$FM["Tel2"] = new FieldMap("Tel2","atendimento","tel2",false,FM_TYPE_VARCHAR,13,null,false);
			self::$FM["Tel3"] = new FieldMap("Tel3","atendimento","tel3",false,FM_TYPE_VARCHAR,13,null,false);
			self::$FM["Obs"] = new FieldMap("Obs","atendimento","obs",false,FM_TYPE_VARCHAR,250,null,false);
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
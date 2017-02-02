<?php
/** @package    WandallCa::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * MailmensagensMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the MailmensagensDAO to the mailmensagens datastore.
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
class MailmensagensMap implements IDaoMap, IDaoMap2
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
			self::$FM["IdMen"] = new FieldMap("IdMen","mailmensagens","id_men",true,FM_TYPE_INT,11,null,true);
			self::$FM["Viss"] = new FieldMap("Viss","mailmensagens","visS",false,FM_TYPE_TINYINT,4,null,false);
			self::$FM["Saldacao"] = new FieldMap("Saldacao","mailmensagens","saldacao",false,FM_TYPE_VARCHAR,30,null,false);
			self::$FM["Vism"] = new FieldMap("Vism","mailmensagens","visM",false,FM_TYPE_TINYINT,4,null,false);
			self::$FM["Mens"] = new FieldMap("Mens","mailmensagens","mens",false,FM_TYPE_LONGTEXT,null,null,false);
			self::$FM["Visn"] = new FieldMap("Visn","mailmensagens","visN",false,FM_TYPE_TINYINT,4,null,false);
			self::$FM["Visr"] = new FieldMap("Visr","mailmensagens","visR",false,FM_TYPE_TINYINT,4,null,false);
			self::$FM["Rodape"] = new FieldMap("Rodape","mailmensagens","rodape",false,FM_TYPE_LONGTEXT,null,null,false);
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
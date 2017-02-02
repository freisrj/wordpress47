<?php
/** @package    WandallCa::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * WdContatoMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the WdContatoDAO to the wd_contato datastore.
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
class WdContatoMap implements IDaoMap, IDaoMap2
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
			self::$FM["IdCot"] = new FieldMap("IdCot","wd_contato","id_cot",true,FM_TYPE_INT,11,null,true);
			self::$FM["Webmail"] = new FieldMap("Webmail","wd_contato","webmail",false,FM_TYPE_TINYINT,2,"1",false);
			self::$FM["Nome"] = new FieldMap("Nome","wd_contato","nome",false,FM_TYPE_VARCHAR,50,null,false);
			self::$FM["Email"] = new FieldMap("Email","wd_contato","email",false,FM_TYPE_VARCHAR,50,null,false);
			self::$FM["Mensagem"] = new FieldMap("Mensagem","wd_contato","mensagem",false,FM_TYPE_LONGTEXT,null,null,false);
			self::$FM["Data"] = new FieldMap("Data","wd_contato","data",false,FM_TYPE_DATE,null,"0000-00-00",false);
			self::$FM["Resposta"] = new FieldMap("Resposta","wd_contato","resposta",false,FM_TYPE_LONGTEXT,null,null,false);
			self::$FM["DataResposta"] = new FieldMap("DataResposta","wd_contato","data_resposta",false,FM_TYPE_DATE,null,"0000-00-00",false);
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
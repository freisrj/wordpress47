<?php
/** @package    WandallCa::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * WdProfessorMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the WdProfessorDAO to the wd_professor datastore.
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
class WdProfessorMap implements IDaoMap, IDaoMap2
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
			self::$FM["IdPro"] = new FieldMap("IdPro","wd_professor","id_pro",true,FM_TYPE_INT,11,null,true);
			self::$FM["Ativo"] = new FieldMap("Ativo","wd_professor","ativo",false,FM_TYPE_TINYINT,3,"1",false);
			self::$FM["Apelido"] = new FieldMap("Apelido","wd_professor","apelido",false,FM_TYPE_VARCHAR,15,null,false);
			self::$FM["Nome"] = new FieldMap("Nome","wd_professor","nome",false,FM_TYPE_VARCHAR,50,null,false);
			self::$FM["Tel"] = new FieldMap("Tel","wd_professor","tel",false,FM_TYPE_VARCHAR,13,null,false);
			self::$FM["Cel"] = new FieldMap("Cel","wd_professor","cel",false,FM_TYPE_VARCHAR,13,null,false);
			self::$FM["Email"] = new FieldMap("Email","wd_professor","email",false,FM_TYPE_VARCHAR,50,null,false);
			self::$FM["Senha"] = new FieldMap("Senha","wd_professor","senha",false,FM_TYPE_VARCHAR,8,null,false);
			self::$FM["Descricao"] = new FieldMap("Descricao","wd_professor","descricao",false,FM_TYPE_LONGTEXT,null,null,false);
			self::$FM["Certificado1"] = new FieldMap("Certificado1","wd_professor","certificado1",false,FM_TYPE_VARCHAR,50,null,false);
			self::$FM["Certificado2"] = new FieldMap("Certificado2","wd_professor","certificado2",false,FM_TYPE_VARCHAR,50,null,false);
			self::$FM["Certificado3"] = new FieldMap("Certificado3","wd_professor","certificado3",false,FM_TYPE_VARCHAR,50,null,false);
			self::$FM["Certificado4"] = new FieldMap("Certificado4","wd_professor","certificado4",false,FM_TYPE_VARCHAR,50,null,false);
			self::$FM["Certificado5"] = new FieldMap("Certificado5","wd_professor","certificado5",false,FM_TYPE_VARCHAR,50,null,false);
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
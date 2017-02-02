<?php
/** @package    WandallCa::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * CaPrematriculaMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the CaPrematriculaDAO to the ca_prematricula datastore.
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
class CaPrematriculaMap implements IDaoMap, IDaoMap2
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
			self::$FM["IdPre"] = new FieldMap("IdPre","ca_prematricula","id_pre",true,FM_TYPE_INT,11,null,true);
			self::$FM["IdTur"] = new FieldMap("IdTur","ca_prematricula","id_tur",false,FM_TYPE_INT,11,null,false);
			self::$FM["Webmail"] = new FieldMap("Webmail","ca_prematricula","webmail",false,FM_TYPE_TINYINT,2,"1",false);
			self::$FM["Soube"] = new FieldMap("Soube","ca_prematricula","soube",false,FM_TYPE_INT,10,null,false);
			self::$FM["Data"] = new FieldMap("Data","ca_prematricula","data",false,FM_TYPE_DATE,null,null,false);
			self::$FM["Hora"] = new FieldMap("Hora","ca_prematricula","hora",false,FM_TYPE_TIME,null,null,false);
			self::$FM["Nome"] = new FieldMap("Nome","ca_prematricula","nome",false,FM_TYPE_VARCHAR,50,null,false);
			self::$FM["Endereco"] = new FieldMap("Endereco","ca_prematricula","endereco",false,FM_TYPE_VARCHAR,50,null,false);
			self::$FM["Cidade"] = new FieldMap("Cidade","ca_prematricula","cidade",false,FM_TYPE_VARCHAR,25,null,false);
			self::$FM["Bairro"] = new FieldMap("Bairro","ca_prematricula","bairro",false,FM_TYPE_VARCHAR,25,null,false);
			self::$FM["Estado"] = new FieldMap("Estado","ca_prematricula","estado",false,FM_TYPE_VARCHAR,2,null,false);
			self::$FM["Cep"] = new FieldMap("Cep","ca_prematricula","cep",false,FM_TYPE_VARCHAR,9,null,false);
			self::$FM["Email"] = new FieldMap("Email","ca_prematricula","email",false,FM_TYPE_VARCHAR,50,null,false);
			self::$FM["Telefone"] = new FieldMap("Telefone","ca_prematricula","telefone",false,FM_TYPE_VARCHAR,13,null,false);
			self::$FM["Celular"] = new FieldMap("Celular","ca_prematricula","celular",false,FM_TYPE_VARCHAR,14,null,false);
			self::$FM["Nextel"] = new FieldMap("Nextel","ca_prematricula","nextel",false,FM_TYPE_VARCHAR,14,null,false);
			self::$FM["Situacao"] = new FieldMap("Situacao","ca_prematricula","situacao",false,FM_TYPE_INT,11,null,false);
			self::$FM["Turno"] = new FieldMap("Turno","ca_prematricula","turno",false,FM_TYPE_CHAR,1,null,false);
			self::$FM["Curso"] = new FieldMap("Curso","ca_prematricula","curso",false,FM_TYPE_INT,11,null,false);
			self::$FM["Resposta"] = new FieldMap("Resposta","ca_prematricula","resposta",false,FM_TYPE_LONGTEXT,null,null,false);
			self::$FM["Idfun"] = new FieldMap("Idfun","ca_prematricula","idfun",false,FM_TYPE_INT,50,null,false);
			self::$FM["Ip"] = new FieldMap("Ip","ca_prematricula","ip",false,FM_TYPE_VARCHAR,20,null,false);
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
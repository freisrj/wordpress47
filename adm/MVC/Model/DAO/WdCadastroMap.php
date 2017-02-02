<?php
/** @package    WandallCa::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * WdCadastroMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the WdCadastroDAO to the wd_cadastro datastore.
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
class WdCadastroMap implements IDaoMap, IDaoMap2
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
			self::$FM["IdPre"] = new FieldMap("IdPre","wd_cadastro","id_pre",true,FM_TYPE_INT,11,null,true);
			self::$FM["Webmail"] = new FieldMap("Webmail","wd_cadastro","webmail",false,FM_TYPE_TINYINT,50,"1",false);
			self::$FM["Nome"] = new FieldMap("Nome","wd_cadastro","nome",false,FM_TYPE_VARCHAR,50,null,false);
			self::$FM["Endereco"] = new FieldMap("Endereco","wd_cadastro","endereco",false,FM_TYPE_VARCHAR,50,null,false);
			self::$FM["Cidade"] = new FieldMap("Cidade","wd_cadastro","cidade",false,FM_TYPE_VARCHAR,25,null,false);
			self::$FM["Bairro"] = new FieldMap("Bairro","wd_cadastro","bairro",false,FM_TYPE_VARCHAR,25,null,false);
			self::$FM["Estado"] = new FieldMap("Estado","wd_cadastro","estado",false,FM_TYPE_VARCHAR,2,null,false);
			self::$FM["Cep"] = new FieldMap("Cep","wd_cadastro","cep",false,FM_TYPE_VARCHAR,9,null,false);
			self::$FM["Email"] = new FieldMap("Email","wd_cadastro","email",false,FM_TYPE_VARCHAR,50,null,false);
			self::$FM["Telefone"] = new FieldMap("Telefone","wd_cadastro","telefone",false,FM_TYPE_VARCHAR,13,null,false);
			self::$FM["Celular"] = new FieldMap("Celular","wd_cadastro","celular",false,FM_TYPE_VARCHAR,13,null,false);
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
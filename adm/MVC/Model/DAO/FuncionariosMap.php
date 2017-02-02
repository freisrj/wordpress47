<?php
/** @package    WandallCa::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * FuncionariosMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the FuncionariosDAO to the funcionarios datastore.
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
class FuncionariosMap implements IDaoMap, IDaoMap2
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
			self::$FM["IdFun"] = new FieldMap("IdFun","funcionarios","id_fun",true,FM_TYPE_INT,10,null,true);
			self::$FM["Apelido"] = new FieldMap("Apelido","funcionarios","apelido",false,FM_TYPE_VARCHAR,10,null,false);
			self::$FM["Nome"] = new FieldMap("Nome","funcionarios","nome",false,FM_TYPE_VARCHAR,50,null,false);
			self::$FM["Telefone"] = new FieldMap("Telefone","funcionarios","telefone",false,FM_TYPE_VARCHAR,14,null,false);
			self::$FM["Celular"] = new FieldMap("Celular","funcionarios","Celular",false,FM_TYPE_VARCHAR,14,null,false);
			self::$FM["Endereco"] = new FieldMap("Endereco","funcionarios","endereco",false,FM_TYPE_VARCHAR,50,null,false);
			self::$FM["Bairro"] = new FieldMap("Bairro","funcionarios","bairro",false,FM_TYPE_VARCHAR,50,null,false);
			self::$FM["Funcao"] = new FieldMap("Funcao","funcionarios","funcao",false,FM_TYPE_VARCHAR,15,null,false);
			self::$FM["Cidade"] = new FieldMap("Cidade","funcionarios","cidade",false,FM_TYPE_VARCHAR,20,null,false);
			self::$FM["Cep"] = new FieldMap("Cep","funcionarios","cep",false,FM_TYPE_VARCHAR,9,null,false);
			self::$FM["Uf"] = new FieldMap("Uf","funcionarios","uf",false,FM_TYPE_VARCHAR,2,null,false);
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
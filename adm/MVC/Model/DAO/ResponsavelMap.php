<?php
/** @package    WandallCa::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * ResponsavelMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the ResponsavelDAO to the responsavel datastore.
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
class ResponsavelMap implements IDaoMap, IDaoMap2
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
			self::$FM["IdRes"] = new FieldMap("IdRes","responsavel","id_res",true,FM_TYPE_INT,11,null,true);
			self::$FM["IdAlu"] = new FieldMap("IdAlu","responsavel","id_alu",false,FM_TYPE_INT,11,null,false);
			self::$FM["Nome"] = new FieldMap("Nome","responsavel","nome",false,FM_TYPE_VARCHAR,50,null,false);
			self::$FM["Endereco"] = new FieldMap("Endereco","responsavel","endereco",false,FM_TYPE_VARCHAR,50,null,false);
			self::$FM["Cidade"] = new FieldMap("Cidade","responsavel","cidade",false,FM_TYPE_VARCHAR,25,null,false);
			self::$FM["Bairro"] = new FieldMap("Bairro","responsavel","bairro",false,FM_TYPE_VARCHAR,25,null,false);
			self::$FM["Estado"] = new FieldMap("Estado","responsavel","estado",false,FM_TYPE_VARCHAR,2,null,false);
			self::$FM["Cep"] = new FieldMap("Cep","responsavel","cep",false,FM_TYPE_VARCHAR,9,null,false);
			self::$FM["Email"] = new FieldMap("Email","responsavel","email",false,FM_TYPE_VARCHAR,50,null,false);
			self::$FM["Nascimento"] = new FieldMap("Nascimento","responsavel","nascimento",false,FM_TYPE_VARCHAR,10,null,false);
			self::$FM["Telefone1"] = new FieldMap("Telefone1","responsavel","telefone1",false,FM_TYPE_VARCHAR,14,null,false);
			self::$FM["Ramal1"] = new FieldMap("Ramal1","responsavel","ramal1",false,FM_TYPE_VARCHAR,5,null,false);
			self::$FM["Telefone2"] = new FieldMap("Telefone2","responsavel","telefone2",false,FM_TYPE_VARCHAR,14,null,false);
			self::$FM["Ramal2"] = new FieldMap("Ramal2","responsavel","ramal2",false,FM_TYPE_VARCHAR,5,null,false);
			self::$FM["Telefone3"] = new FieldMap("Telefone3","responsavel","telefone3",false,FM_TYPE_VARCHAR,14,null,false);
			self::$FM["Ramal3"] = new FieldMap("Ramal3","responsavel","ramal3",false,FM_TYPE_VARCHAR,5,null,false);
			self::$FM["Nextel"] = new FieldMap("Nextel","responsavel","nextel",false,FM_TYPE_VARCHAR,15,null,false);
			self::$FM["Cpf"] = new FieldMap("Cpf","responsavel","cpf",false,FM_TYPE_VARCHAR,19,null,false);
			self::$FM["Identidade"] = new FieldMap("Identidade","responsavel","identidade",false,FM_TYPE_VARCHAR,20,null,false);
			self::$FM["Orgao"] = new FieldMap("Orgao","responsavel","orgao",false,FM_TYPE_VARCHAR,10,null,false);
			self::$FM["EstadoCivil"] = new FieldMap("EstadoCivil","responsavel","estado_civil",false,FM_TYPE_INT,11,null,false);
			self::$FM["Nacionalidade"] = new FieldMap("Nacionalidade","responsavel","nacionalidade",false,FM_TYPE_INT,11,"1",false);
			self::$FM["Profissao"] = new FieldMap("Profissao","responsavel","profissao",false,FM_TYPE_VARCHAR,40,null,false);
			self::$FM["Ie"] = new FieldMap("Ie","responsavel","ie",false,FM_TYPE_VARCHAR,20,null,false);
			self::$FM["Im"] = new FieldMap("Im","responsavel","im",false,FM_TYPE_VARCHAR,20,null,false);
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
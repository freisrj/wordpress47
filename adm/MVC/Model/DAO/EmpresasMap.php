<?php
/** @package    WandallCa::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * EmpresasMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the EmpresasDAO to the empresas datastore.
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
class EmpresasMap implements IDaoMap, IDaoMap2
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
			self::$FM["IdEmp"] = new FieldMap("IdEmp","empresas","id_emp",true,FM_TYPE_INT,11,null,true);
			self::$FM["Empresa"] = new FieldMap("Empresa","empresas","empresa",false,FM_TYPE_VARCHAR,50,null,false);
			self::$FM["Cnpj"] = new FieldMap("Cnpj","empresas","CNPJ",false,FM_TYPE_VARCHAR,18,null,false);
			self::$FM["Endereco"] = new FieldMap("Endereco","empresas","endereco",false,FM_TYPE_VARCHAR,50,null,false);
			self::$FM["Cidade"] = new FieldMap("Cidade","empresas","cidade",false,FM_TYPE_VARCHAR,25,null,false);
			self::$FM["Bairro"] = new FieldMap("Bairro","empresas","bairro",false,FM_TYPE_VARCHAR,25,null,false);
			self::$FM["Estado"] = new FieldMap("Estado","empresas","estado",false,FM_TYPE_VARCHAR,2,null,false);
			self::$FM["Cep"] = new FieldMap("Cep","empresas","cep",false,FM_TYPE_VARCHAR,9,null,false);
			self::$FM["Email"] = new FieldMap("Email","empresas","email",false,FM_TYPE_VARCHAR,50,null,false);
			self::$FM["Nome"] = new FieldMap("Nome","empresas","nome",false,FM_TYPE_VARCHAR,30,null,false);
			self::$FM["Email1"] = new FieldMap("Email1","empresas","email1",false,FM_TYPE_VARCHAR,50,null,false);
			self::$FM["Tel01"] = new FieldMap("Tel01","empresas","tel01",false,FM_TYPE_VARCHAR,13,null,false);
			self::$FM["Contato02"] = new FieldMap("Contato02","empresas","contato02",false,FM_TYPE_VARCHAR,30,null,false);
			self::$FM["Email2"] = new FieldMap("Email2","empresas","email2",false,FM_TYPE_VARCHAR,50,null,false);
			self::$FM["Tel02"] = new FieldMap("Tel02","empresas","tel02",false,FM_TYPE_VARCHAR,13,null,false);
			self::$FM["Contato03"] = new FieldMap("Contato03","empresas","contato03",false,FM_TYPE_VARCHAR,30,null,false);
			self::$FM["Email3"] = new FieldMap("Email3","empresas","email3",false,FM_TYPE_VARCHAR,50,null,false);
			self::$FM["Tel03"] = new FieldMap("Tel03","empresas","tel03",false,FM_TYPE_VARCHAR,13,null,false);
			self::$FM["Obs"] = new FieldMap("Obs","empresas","obs",false,FM_TYPE_LONGTEXT,null,null,false);
			self::$FM["Nextel"] = new FieldMap("Nextel","empresas","nextel",false,FM_TYPE_VARCHAR,13,null,false);
			self::$FM["Id"] = new FieldMap("Id","empresas","id",false,FM_TYPE_VARCHAR,15,null,false);
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
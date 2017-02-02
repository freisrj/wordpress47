<?php
/** @package    WandallCa::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * PedidoCertMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the PedidoCertDAO to the pedido_cert datastore.
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
class PedidoCertMap implements IDaoMap, IDaoMap2
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
			self::$FM["IdPcer"] = new FieldMap("IdPcer","pedido_cert","id_pcer",true,FM_TYPE_INT,11,null,true);
			self::$FM["IdPed"] = new FieldMap("IdPed","pedido_cert","id_ped",false,FM_TYPE_INT,5,null,false);
			self::$FM["Qped"] = new FieldMap("Qped","pedido_cert","QPed",false,FM_TYPE_INT,5,null,false);
			self::$FM["Situacao"] = new FieldMap("Situacao","pedido_cert","situacao",false,FM_TYPE_VARCHAR,1,"A",false);
			self::$FM["Quemretirou"] = new FieldMap("Quemretirou","pedido_cert","quemRetirou",false,FM_TYPE_VARCHAR,20,"Proprio ",false);
			self::$FM["Data"] = new FieldMap("Data","pedido_cert","data",false,FM_TYPE_DATE,null,null,false);
			self::$FM["Entregue"] = new FieldMap("Entregue","pedido_cert","entregue",false,FM_TYPE_DATE,null,null,false);
			self::$FM["IdAlu"] = new FieldMap("IdAlu","pedido_cert","id_alu",false,FM_TYPE_INT,5,null,false);
			self::$FM["Turma"] = new FieldMap("Turma","pedido_cert","turma",false,FM_TYPE_INT,5,null,false);
			self::$FM["Curso"] = new FieldMap("Curso","pedido_cert","curso",false,FM_TYPE_VARCHAR,50,null,false);
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
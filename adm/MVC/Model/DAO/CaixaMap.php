<?php
/** @package    WandallCa::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * CaixaMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the CaixaDAO to the caixa datastore.
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
class CaixaMap implements IDaoMap, IDaoMap2
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
			self::$FM["IdCai"] = new FieldMap("IdCai","caixa","id_cai",true,FM_TYPE_INT,11,null,true);
			self::$FM["Conta"] = new FieldMap("Conta","caixa","conta",false,FM_TYPE_VARCHAR,20,null,false);
			self::$FM["Descricao"] = new FieldMap("Descricao","caixa","descricao",false,FM_TYPE_VARCHAR,200,null,false);
			self::$FM["Forma"] = new FieldMap("Forma","caixa","forma",false,FM_TYPE_INT,1,null,false);
			self::$FM["Debito"] = new FieldMap("Debito","caixa","debito",false,FM_TYPE_DECIMAL,10.2,null,false);
			self::$FM["Credito"] = new FieldMap("Credito","caixa","credito",false,FM_TYPE_DECIMAL,10.2,null,false);
			self::$FM["Data"] = new FieldMap("Data","caixa","data",false,FM_TYPE_DATE,null,null,false);
			self::$FM["Hora"] = new FieldMap("Hora","caixa","hora",false,FM_TYPE_TIME,null,null,false);
			self::$FM["Unidade"] = new FieldMap("Unidade","caixa","unidade",false,FM_TYPE_INT,10,"1",false);
			self::$FM["IdFun"] = new FieldMap("IdFun","caixa","id_fun",false,FM_TYPE_INT,10,null,false);
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
<?php
/** @package    WandallCa::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * DespesasMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the DespesasDAO to the despesas datastore.
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
class DespesasMap implements IDaoMap, IDaoMap2
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
			self::$FM["IdDes"] = new FieldMap("IdDes","despesas","id_des",true,FM_TYPE_INT,11,null,true);
			self::$FM["Conta"] = new FieldMap("Conta","despesas","conta",false,FM_TYPE_VARCHAR,20,null,false);
			self::$FM["Descricao"] = new FieldMap("Descricao","despesas","descricao",false,FM_TYPE_VARCHAR,200,null,false);
			self::$FM["Valor"] = new FieldMap("Valor","despesas","valor",false,FM_TYPE_DECIMAL,10.2,null,false);
			self::$FM["Vencimento"] = new FieldMap("Vencimento","despesas","vencimento",false,FM_TYPE_DATE,null,null,false);
			self::$FM["Pago"] = new FieldMap("Pago","despesas","pago",false,FM_TYPE_DECIMAL,10.2,null,false);
			self::$FM["Datapg"] = new FieldMap("Datapg","despesas","datapg",false,FM_TYPE_DATE,null,null,false);
			self::$FM["AulasWandall"] = new FieldMap("AulasWandall","despesas","aulas_wandall",false,FM_TYPE_DECIMAL,10.2,null,false);
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
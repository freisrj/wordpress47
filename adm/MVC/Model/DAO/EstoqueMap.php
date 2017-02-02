<?php
/** @package    WandallCa::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * EstoqueMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the EstoqueDAO to the estoque datastore.
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
class EstoqueMap implements IDaoMap, IDaoMap2
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
			self::$FM["IdEst"] = new FieldMap("IdEst","estoque","id_est",true,FM_TYPE_INT,10,null,true);
			self::$FM["Unidade"] = new FieldMap("Unidade","estoque","unidade",false,FM_TYPE_INT,10,null,false);
			self::$FM["Tipo"] = new FieldMap("Tipo","estoque","tipo",false,FM_TYPE_VARCHAR,30,null,false);
			self::$FM["Descricao"] = new FieldMap("Descricao","estoque","descricao",false,FM_TYPE_VARCHAR,50,null,false);
			self::$FM["Quant"] = new FieldMap("Quant","estoque","quant",false,FM_TYPE_INT,10,null,false);
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
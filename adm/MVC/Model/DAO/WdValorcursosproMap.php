<?php
/** @package    WandallCa::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * WdValorcursosproMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the WdValorcursosproDAO to the wd_valorcursospro datastore.
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
class WdValorcursosproMap implements IDaoMap, IDaoMap2
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
			self::$FM["IdVar"] = new FieldMap("IdVar","wd_valorcursospro","id_var",true,FM_TYPE_INT,11,null,true);
			self::$FM["IdCur"] = new FieldMap("IdCur","wd_valorcursospro","id_cur",false,FM_TYPE_INT,11,null,false);
			self::$FM["Valor"] = new FieldMap("Valor","wd_valorcursospro","valor",false,FM_TYPE_DECIMAL,10.2,null,false);
			self::$FM["Desconto"] = new FieldMap("Desconto","wd_valorcursospro","desconto",false,FM_TYPE_DECIMAL,5.2,null,false);
			self::$FM["Material"] = new FieldMap("Material","wd_valorcursospro","material",false,FM_TYPE_VARCHAR,30,null,false);
			self::$FM["Desc0"] = new FieldMap("Desc0","wd_valorcursospro","desc0",false,FM_TYPE_VARCHAR,50,null,false);
			self::$FM["Desc1"] = new FieldMap("Desc1","wd_valorcursospro","desc1",false,FM_TYPE_VARCHAR,50,null,false);
			self::$FM["Desc2"] = new FieldMap("Desc2","wd_valorcursospro","desc2",false,FM_TYPE_VARCHAR,50,null,false);
			self::$FM["Desc3"] = new FieldMap("Desc3","wd_valorcursospro","desc3",false,FM_TYPE_VARCHAR,50,null,false);
			self::$FM["Avista1"] = new FieldMap("Avista1","wd_valorcursospro","avista1",false,FM_TYPE_DECIMAL,5.1,"0.0",false);
			self::$FM["Desc11"] = new FieldMap("Desc11","wd_valorcursospro","desc11",false,FM_TYPE_DECIMAL,5.1,"0.0",false);
			self::$FM["Desc12"] = new FieldMap("Desc12","wd_valorcursospro","desc12",false,FM_TYPE_DECIMAL,5.1,"0.0",false);
			self::$FM["Desc13"] = new FieldMap("Desc13","wd_valorcursospro","desc13",false,FM_TYPE_DECIMAL,5.1,"0.0",false);
			self::$FM["Desc14"] = new FieldMap("Desc14","wd_valorcursospro","desc14",false,FM_TYPE_DECIMAL,5.1,"0.0",false);
			self::$FM["Desc15"] = new FieldMap("Desc15","wd_valorcursospro","desc15",false,FM_TYPE_DECIMAL,5.1,"0.0",false);
			self::$FM["Desc16"] = new FieldMap("Desc16","wd_valorcursospro","desc16",false,FM_TYPE_DECIMAL,5.1,"0.0",false);
			self::$FM["Avista2"] = new FieldMap("Avista2","wd_valorcursospro","avista2",false,FM_TYPE_DECIMAL,5.1,"0.0",false);
			self::$FM["Desc21"] = new FieldMap("Desc21","wd_valorcursospro","desc21",false,FM_TYPE_DECIMAL,5.1,"0.0",false);
			self::$FM["Desc22"] = new FieldMap("Desc22","wd_valorcursospro","desc22",false,FM_TYPE_DECIMAL,5.1,"0.0",false);
			self::$FM["Desc23"] = new FieldMap("Desc23","wd_valorcursospro","desc23",false,FM_TYPE_DECIMAL,5.1,"0.0",false);
			self::$FM["Desc24"] = new FieldMap("Desc24","wd_valorcursospro","desc24",false,FM_TYPE_DECIMAL,5.1,"0.0",false);
			self::$FM["Desc25"] = new FieldMap("Desc25","wd_valorcursospro","desc25",false,FM_TYPE_DECIMAL,5.1,"0.0",false);
			self::$FM["Desc26"] = new FieldMap("Desc26","wd_valorcursospro","desc26",false,FM_TYPE_DECIMAL,5.1,"0.0",false);
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
<?php
/** @package    WandallCa::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * HistoricoAlunoMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the HistoricoAlunoDAO to the historico_aluno datastore.
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
class HistoricoAlunoMap implements IDaoMap, IDaoMap2
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
			self::$FM["IdHis"] = new FieldMap("IdHis","historico_aluno","id_his",true,FM_TYPE_INT,11,null,true);
			self::$FM["IdAlu"] = new FieldMap("IdAlu","historico_aluno","id_alu",false,FM_TYPE_INT,11,null,false);
			self::$FM["IdTur"] = new FieldMap("IdTur","historico_aluno","id_tur",false,FM_TYPE_INT,11,null,false);
			self::$FM["Data"] = new FieldMap("Data","historico_aluno","data",false,FM_TYPE_DATE,null,null,false);
			self::$FM["Hora"] = new FieldMap("Hora","historico_aluno","hora",false,FM_TYPE_TIME,null,null,false);
			self::$FM["Idfun"] = new FieldMap("Idfun","historico_aluno","idfun",false,FM_TYPE_INT,10,null,false);
			self::$FM["MatrUnidade"] = new FieldMap("MatrUnidade","historico_aluno","matr_unidade",false,FM_TYPE_INT,10,null,false);
			self::$FM["DataTrans"] = new FieldMap("DataTrans","historico_aluno","data_trans",false,FM_TYPE_DATE,null,null,false);
			self::$FM["HoraTrans"] = new FieldMap("HoraTrans","historico_aluno","hora_trans",false,FM_TYPE_DATE,null,null,false);
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
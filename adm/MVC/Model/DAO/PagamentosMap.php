<?php
/** @package    WandallCa::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * PagamentosMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the PagamentosDAO to the pagamentos datastore.
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
class PagamentosMap implements IDaoMap, IDaoMap2
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
			self::$FM["IdPag"] = new FieldMap("IdPag","pagamentos","id_pag",true,FM_TYPE_INT,11,null,true);
			self::$FM["Tipo"] = new FieldMap("Tipo","pagamentos","tipo",false,FM_TYPE_VARCHAR,1,null,false);
			self::$FM["IdAlu"] = new FieldMap("IdAlu","pagamentos","id_alu",false,FM_TYPE_INT,11,null,false);
			self::$FM["IdTur"] = new FieldMap("IdTur","pagamentos","id_tur",false,FM_TYPE_INT,10,null,false);
			self::$FM["Parcela"] = new FieldMap("Parcela","pagamentos","parcela",false,FM_TYPE_INT,11,null,false);
			self::$FM["Especie"] = new FieldMap("Especie","pagamentos","especie",false,FM_TYPE_VARCHAR,2,null,false);
			self::$FM["Bandeira"] = new FieldMap("Bandeira","pagamentos","bandeira",false,FM_TYPE_VARCHAR,15,null,false);
			self::$FM["Banco"] = new FieldMap("Banco","pagamentos","banco",false,FM_TYPE_VARCHAR,15,null,false);
			self::$FM["Cheque"] = new FieldMap("Cheque","pagamentos","cheque",false,FM_TYPE_VARCHAR,10,null,false);
			self::$FM["Titular"] = new FieldMap("Titular","pagamentos","titular",false,FM_TYPE_VARCHAR,50,null,false);
			self::$FM["Vencimento"] = new FieldMap("Vencimento","pagamentos","vencimento",false,FM_TYPE_DATE,null,null,false);
			self::$FM["Pago"] = new FieldMap("Pago","pagamentos","pago",false,FM_TYPE_DATE,null,null,false);
			self::$FM["Valor"] = new FieldMap("Valor","pagamentos","valor",false,FM_TYPE_DECIMAL,10.2,null,false);
			self::$FM["Extenso"] = new FieldMap("Extenso","pagamentos","extenso",false,FM_TYPE_VARCHAR,80,null,false);
			self::$FM["Desconto"] = new FieldMap("Desconto","pagamentos","desconto",false,FM_TYPE_DECIMAL,10.2,null,false);
			self::$FM["Apagar"] = new FieldMap("Apagar","pagamentos","apagar",false,FM_TYPE_DECIMAL,10.2,null,false);
			self::$FM["EnvioBoleto"] = new FieldMap("EnvioBoleto","pagamentos","envio_boleto",false,FM_TYPE_DATE,null,null,false);
			self::$FM["Situacao"] = new FieldMap("Situacao","pagamentos","situacao",false,FM_TYPE_INT,11,null,false);
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
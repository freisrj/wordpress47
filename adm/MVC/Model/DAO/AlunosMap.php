<?php
/** @package    WandallCa::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * AlunosMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the AlunosDAO to the alunos datastore.
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
class AlunosMap implements IDaoMap, IDaoMap2
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
			self::$FM["IdAlu"] = new FieldMap("IdAlu","alunos","id_alu",true,FM_TYPE_INT,11,null,true);
			self::$FM["IdTur"] = new FieldMap("IdTur","alunos","id_tur",false,FM_TYPE_INT,11,null,false);
			self::$FM["Webmail"] = new FieldMap("Webmail","alunos","webmail",false,FM_TYPE_TINYINT,3,"1",false);
			self::$FM["Nome"] = new FieldMap("Nome","alunos","nome",false,FM_TYPE_VARCHAR,50,null,false);
			self::$FM["Endereco"] = new FieldMap("Endereco","alunos","endereco",false,FM_TYPE_VARCHAR,50,null,false);
			self::$FM["Cidade"] = new FieldMap("Cidade","alunos","cidade",false,FM_TYPE_VARCHAR,25,null,false);
			self::$FM["Bairro"] = new FieldMap("Bairro","alunos","bairro",false,FM_TYPE_VARCHAR,25,null,false);
			self::$FM["Estado"] = new FieldMap("Estado","alunos","estado",false,FM_TYPE_VARCHAR,2,null,false);
			self::$FM["Cep"] = new FieldMap("Cep","alunos","cep",false,FM_TYPE_VARCHAR,9,null,false);
			self::$FM["Email"] = new FieldMap("Email","alunos","email",false,FM_TYPE_VARCHAR,50,null,false);
			self::$FM["Nascimento"] = new FieldMap("Nascimento","alunos","nascimento",false,FM_TYPE_DATE,null,null,false);
			self::$FM["Cpf"] = new FieldMap("Cpf","alunos","cpf",false,FM_TYPE_VARCHAR,19,null,false);
			self::$FM["Identidade"] = new FieldMap("Identidade","alunos","identidade",false,FM_TYPE_VARCHAR,20,null,false);
			self::$FM["Orgao"] = new FieldMap("Orgao","alunos","orgao",false,FM_TYPE_VARCHAR,10,null,false);
			self::$FM["EstadoCivil"] = new FieldMap("EstadoCivil","alunos","estado_civil",false,FM_TYPE_INT,11,null,false);
			self::$FM["Nacionalidade"] = new FieldMap("Nacionalidade","alunos","nacionalidade",false,FM_TYPE_INT,11,"1",false);
			self::$FM["Profissao"] = new FieldMap("Profissao","alunos","profissao",false,FM_TYPE_VARCHAR,40,null,false);
			self::$FM["Telefone"] = new FieldMap("Telefone","alunos","telefone",false,FM_TYPE_VARCHAR,13,null,false);
			self::$FM["Celular"] = new FieldMap("Celular","alunos","celular",false,FM_TYPE_VARCHAR,14,null,false);
			self::$FM["Nextel"] = new FieldMap("Nextel","alunos","nextel",false,FM_TYPE_VARCHAR,15,null,false);
			self::$FM["DataMatricula"] = new FieldMap("DataMatricula","alunos","data_matricula",false,FM_TYPE_DATE,null,null,false);
			self::$FM["HoraMatricula"] = new FieldMap("HoraMatricula","alunos","hora_matricula",false,FM_TYPE_TIME,null,null,false);
			self::$FM["Netbook"] = new FieldMap("Netbook","alunos","netbook",false,FM_TYPE_TINYINT,3,null,false);
			self::$FM["Idfun"] = new FieldMap("Idfun","alunos","idfun",false,FM_TYPE_INT,10,null,false);
			self::$FM["IdIndica"] = new FieldMap("IdIndica","alunos","id_indica",false,FM_TYPE_INT,10,null,false);
			self::$FM["MatrUnidade"] = new FieldMap("MatrUnidade","alunos","matr_unidade",false,FM_TYPE_INT,10,null,false);
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
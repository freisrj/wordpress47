<?php
/** @package    WandallCa::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * WdCursosMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the WdCursosDAO to the wd_cursos datastore.
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
class WdCursosMap implements IDaoMap, IDaoMap2
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
			self::$FM["Curso"] = new FieldMap("Curso","wd_cursos","curso",false,FM_TYPE_VARCHAR,50,null,false);
			self::$FM["IdCur"] = new FieldMap("IdCur","wd_cursos","id_cur",true,FM_TYPE_INT,11,null,true);
			self::$FM["IdTip"] = new FieldMap("IdTip","wd_cursos","id_tip",false,FM_TYPE_INT,11,null,false);
			self::$FM["Valido"] = new FieldMap("Valido","wd_cursos","valido",false,FM_TYPE_TINYINT,4,null,false);
			self::$FM["Pesquisa"] = new FieldMap("Pesquisa","wd_cursos","pesquisa",false,FM_TYPE_TINYINT,4,null,false);
			self::$FM["Objetivo"] = new FieldMap("Objetivo","wd_cursos","objetivo",false,FM_TYPE_LONGTEXT,null,null,false);
			self::$FM["PreRequisito"] = new FieldMap("PreRequisito","wd_cursos","pre_requisito",false,FM_TYPE_LONGTEXT,null,null,false);
			self::$FM["Metodologia"] = new FieldMap("Metodologia","wd_cursos","metodologia",false,FM_TYPE_LONGTEXT,null,null,false);
			self::$FM["Cargahora"] = new FieldMap("Cargahora","wd_cursos","cargaHora",false,FM_TYPE_INT,11,null,false);
			self::$FM["Materia1"] = new FieldMap("Materia1","wd_cursos","materia1",false,FM_TYPE_VARCHAR,30,null,false);
			self::$FM["Idcur1"] = new FieldMap("Idcur1","wd_cursos","idcur1",false,FM_TYPE_INT,10,null,false);
			self::$FM["Cargah1"] = new FieldMap("Cargah1","wd_cursos","cargaH1",false,FM_TYPE_INT,11,null,false);
			self::$FM["Conteudo1"] = new FieldMap("Conteudo1","wd_cursos","conteudo1",false,FM_TYPE_LONGTEXT,null,null,false);
			self::$FM["Materia2"] = new FieldMap("Materia2","wd_cursos","materia2",false,FM_TYPE_VARCHAR,30,null,false);
			self::$FM["Idcur2"] = new FieldMap("Idcur2","wd_cursos","idcur2",false,FM_TYPE_INT,10,null,false);
			self::$FM["Conteudo2"] = new FieldMap("Conteudo2","wd_cursos","conteudo2",false,FM_TYPE_LONGTEXT,null,null,false);
			self::$FM["Cargah2"] = new FieldMap("Cargah2","wd_cursos","cargaH2",false,FM_TYPE_INT,11,null,false);
			self::$FM["Materia3"] = new FieldMap("Materia3","wd_cursos","materia3",false,FM_TYPE_VARCHAR,30,null,false);
			self::$FM["Idcur3"] = new FieldMap("Idcur3","wd_cursos","idcur3",false,FM_TYPE_INT,10,null,false);
			self::$FM["Conteudo3"] = new FieldMap("Conteudo3","wd_cursos","conteudo3",false,FM_TYPE_LONGTEXT,null,null,false);
			self::$FM["Cargah3"] = new FieldMap("Cargah3","wd_cursos","cargaH3",false,FM_TYPE_INT,11,null,false);
			self::$FM["Materia4"] = new FieldMap("Materia4","wd_cursos","materia4",false,FM_TYPE_VARCHAR,30,null,false);
			self::$FM["Idcur4"] = new FieldMap("Idcur4","wd_cursos","idcur4",false,FM_TYPE_INT,10,null,false);
			self::$FM["Conteudo4"] = new FieldMap("Conteudo4","wd_cursos","conteudo4",false,FM_TYPE_LONGTEXT,null,null,false);
			self::$FM["Cargah4"] = new FieldMap("Cargah4","wd_cursos","cargaH4",false,FM_TYPE_INT,11,null,false);
			self::$FM["Materia5"] = new FieldMap("Materia5","wd_cursos","materia5",false,FM_TYPE_VARCHAR,30,null,false);
			self::$FM["Idcur5"] = new FieldMap("Idcur5","wd_cursos","idcur5",false,FM_TYPE_INT,10,null,false);
			self::$FM["Conteudo5"] = new FieldMap("Conteudo5","wd_cursos","conteudo5",false,FM_TYPE_LONGTEXT,null,null,false);
			self::$FM["Cargah5"] = new FieldMap("Cargah5","wd_cursos","cargaH5",false,FM_TYPE_INT,5,null,false);
			self::$FM["Materia6"] = new FieldMap("Materia6","wd_cursos","materia6",false,FM_TYPE_VARCHAR,30,null,false);
			self::$FM["Idcur6"] = new FieldMap("Idcur6","wd_cursos","idcur6",false,FM_TYPE_INT,10,null,false);
			self::$FM["Conteudo6"] = new FieldMap("Conteudo6","wd_cursos","conteudo6",false,FM_TYPE_LONGTEXT,null,null,false);
			self::$FM["Cargah6"] = new FieldMap("Cargah6","wd_cursos","cargaH6",false,FM_TYPE_INT,11,null,false);
			self::$FM["Materia7"] = new FieldMap("Materia7","wd_cursos","materia7",false,FM_TYPE_VARCHAR,30,null,false);
			self::$FM["Idcur7"] = new FieldMap("Idcur7","wd_cursos","idcur7",false,FM_TYPE_INT,10,null,false);
			self::$FM["Conteudo7"] = new FieldMap("Conteudo7","wd_cursos","conteudo7",false,FM_TYPE_LONGTEXT,null,null,false);
			self::$FM["Cargah7"] = new FieldMap("Cargah7","wd_cursos","cargaH7",false,FM_TYPE_INT,11,null,false);
			self::$FM["Materia8"] = new FieldMap("Materia8","wd_cursos","materia8",false,FM_TYPE_VARCHAR,30,null,false);
			self::$FM["Idcur8"] = new FieldMap("Idcur8","wd_cursos","idcur8",false,FM_TYPE_INT,10,null,false);
			self::$FM["Conteudo8"] = new FieldMap("Conteudo8","wd_cursos","conteudo8",false,FM_TYPE_LONGTEXT,null,null,false);
			self::$FM["Cargah8"] = new FieldMap("Cargah8","wd_cursos","cargaH8",false,FM_TYPE_INT,11,null,false);
			self::$FM["Livro"] = new FieldMap("Livro","wd_cursos","livro",false,FM_TYPE_VARCHAR,50,null,false);
			self::$FM["Image"] = new FieldMap("Image","wd_cursos","image",false,FM_TYPE_VARCHAR,30,null,false);
			self::$FM["Banner"] = new FieldMap("Banner","wd_cursos","banner",false,FM_TYPE_VARCHAR,30,null,false);
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
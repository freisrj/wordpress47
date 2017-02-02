<?php
/** @package    WandallCa::Reporter */

/** import supporting libraries */
require_once("verysimple/Phreeze/Reporter.php");

/**
 * This is an example Reporter based on the WdCursos object.  The reporter object
 * allows you to run arbitrary queries that return data which may or may not fith within
 * the data access API.  This can include aggregate data or subsets of data.
 *
 * Note that Reporters are read-only and cannot be used for saving data.
 *
 * @package WandallCa::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class WdCursosReporter extends Reporter
{

	// the properties in this class must match the columns returned by GetCustomQuery().
	// 'CustomFieldExample' is an example that is not part of the `wd_cursos` table
	public $CustomFieldExample;

	public $Curso;
	public $IdCur;
	public $IdTip;
	public $Valido;
	public $Pesquisa;
	public $Objetivo;
	public $PreRequisito;
	public $Metodologia;
	public $Cargahora;
	public $Materia1;
	public $Idcur1;
	public $Cargah1;
	public $Conteudo1;
	public $Materia2;
	public $Idcur2;
	public $Conteudo2;
	public $Cargah2;
	public $Materia3;
	public $Idcur3;
	public $Conteudo3;
	public $Cargah3;
	public $Materia4;
	public $Idcur4;
	public $Conteudo4;
	public $Cargah4;
	public $Materia5;
	public $Idcur5;
	public $Conteudo5;
	public $Cargah5;
	public $Materia6;
	public $Idcur6;
	public $Conteudo6;
	public $Cargah6;
	public $Materia7;
	public $Idcur7;
	public $Conteudo7;
	public $Cargah7;
	public $Materia8;
	public $Idcur8;
	public $Conteudo8;
	public $Cargah8;
	public $Livro;
	public $Image;
	public $Banner;

	/*
	* GetCustomQuery returns a fully formed SQL statement.  The result columns
	* must match with the properties of this reporter object.
	*
	* @see Reporter::GetCustomQuery
	* @param Criteria $criteria
	* @return string SQL statement
	*/
	static function GetCustomQuery($criteria)
	{
		$sql = "select
			'custom value here...' as CustomFieldExample
			,`wd_cursos`.`curso` as Curso
			,`wd_cursos`.`id_cur` as IdCur
			,`wd_cursos`.`id_tip` as IdTip
			,`wd_cursos`.`valido` as Valido
			,`wd_cursos`.`pesquisa` as Pesquisa
			,`wd_cursos`.`objetivo` as Objetivo
			,`wd_cursos`.`pre_requisito` as PreRequisito
			,`wd_cursos`.`metodologia` as Metodologia
			,`wd_cursos`.`cargaHora` as Cargahora
			,`wd_cursos`.`materia1` as Materia1
			,`wd_cursos`.`idcur1` as Idcur1
			,`wd_cursos`.`cargaH1` as Cargah1
			,`wd_cursos`.`conteudo1` as Conteudo1
			,`wd_cursos`.`materia2` as Materia2
			,`wd_cursos`.`idcur2` as Idcur2
			,`wd_cursos`.`conteudo2` as Conteudo2
			,`wd_cursos`.`cargaH2` as Cargah2
			,`wd_cursos`.`materia3` as Materia3
			,`wd_cursos`.`idcur3` as Idcur3
			,`wd_cursos`.`conteudo3` as Conteudo3
			,`wd_cursos`.`cargaH3` as Cargah3
			,`wd_cursos`.`materia4` as Materia4
			,`wd_cursos`.`idcur4` as Idcur4
			,`wd_cursos`.`conteudo4` as Conteudo4
			,`wd_cursos`.`cargaH4` as Cargah4
			,`wd_cursos`.`materia5` as Materia5
			,`wd_cursos`.`idcur5` as Idcur5
			,`wd_cursos`.`conteudo5` as Conteudo5
			,`wd_cursos`.`cargaH5` as Cargah5
			,`wd_cursos`.`materia6` as Materia6
			,`wd_cursos`.`idcur6` as Idcur6
			,`wd_cursos`.`conteudo6` as Conteudo6
			,`wd_cursos`.`cargaH6` as Cargah6
			,`wd_cursos`.`materia7` as Materia7
			,`wd_cursos`.`idcur7` as Idcur7
			,`wd_cursos`.`conteudo7` as Conteudo7
			,`wd_cursos`.`cargaH7` as Cargah7
			,`wd_cursos`.`materia8` as Materia8
			,`wd_cursos`.`idcur8` as Idcur8
			,`wd_cursos`.`conteudo8` as Conteudo8
			,`wd_cursos`.`cargaH8` as Cargah8
			,`wd_cursos`.`livro` as Livro
			,`wd_cursos`.`image` as Image
			,`wd_cursos`.`banner` as Banner
		from `wd_cursos`";

		// the criteria can be used or you can write your own custom logic.
		// be sure to escape any user input with $criteria->Escape()
		$sql .= $criteria->GetWhere();
		$sql .= $criteria->GetOrder();

		return $sql;
	}
	
	/*
	* GetCustomCountQuery returns a fully formed SQL statement that will count
	* the results.  This query must return the correct number of results that
	* GetCustomQuery would, given the same criteria
	*
	* @see Reporter::GetCustomCountQuery
	* @param Criteria $criteria
	* @return string SQL statement
	*/
	static function GetCustomCountQuery($criteria)
	{
		$sql = "select count(1) as counter from `wd_cursos`";

		// the criteria can be used or you can write your own custom logic.
		// be sure to escape any user input with $criteria->Escape()
		$sql .= $criteria->GetWhere();

		return $sql;
	}
}

?>
<?php
/** @package    WandallCa::Reporter */

/** import supporting libraries */
require_once("verysimple/Phreeze/Reporter.php");

/**
 * This is an example Reporter based on the WdValorcursos object.  The reporter object
 * allows you to run arbitrary queries that return data which may or may not fith within
 * the data access API.  This can include aggregate data or subsets of data.
 *
 * Note that Reporters are read-only and cannot be used for saving data.
 *
 * @package WandallCa::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class WdValorcursosReporter extends Reporter
{

	// the properties in this class must match the columns returned by GetCustomQuery().
	// 'CustomFieldExample' is an example that is not part of the `wd_valorcursos` table
	public $CustomFieldExample;

	public $IdVar;
	public $IdCur;
	public $Valor;
	public $Desconto;
	public $Material;
	public $Desc0;
	public $Desc1;
	public $Desc2;
	public $Desc3;
	public $Avista1;
	public $Desc11;
	public $Desc12;
	public $Desc13;
	public $Desc14;
	public $Desc15;
	public $Desc16;
	public $Avista2;
	public $Desc21;
	public $Desc22;
	public $Desc23;
	public $Desc24;
	public $Desc25;
	public $Desc26;

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
			,`wd_valorcursos`.`id_var` as IdVar
			,`wd_valorcursos`.`id_cur` as IdCur
			,`wd_valorcursos`.`valor` as Valor
			,`wd_valorcursos`.`desconto` as Desconto
			,`wd_valorcursos`.`material` as Material
			,`wd_valorcursos`.`desc0` as Desc0
			,`wd_valorcursos`.`desc1` as Desc1
			,`wd_valorcursos`.`desc2` as Desc2
			,`wd_valorcursos`.`desc3` as Desc3
			,`wd_valorcursos`.`avista1` as Avista1
			,`wd_valorcursos`.`desc11` as Desc11
			,`wd_valorcursos`.`desc12` as Desc12
			,`wd_valorcursos`.`desc13` as Desc13
			,`wd_valorcursos`.`desc14` as Desc14
			,`wd_valorcursos`.`desc15` as Desc15
			,`wd_valorcursos`.`desc16` as Desc16
			,`wd_valorcursos`.`avista2` as Avista2
			,`wd_valorcursos`.`desc21` as Desc21
			,`wd_valorcursos`.`desc22` as Desc22
			,`wd_valorcursos`.`desc23` as Desc23
			,`wd_valorcursos`.`desc24` as Desc24
			,`wd_valorcursos`.`desc25` as Desc25
			,`wd_valorcursos`.`desc26` as Desc26
		from `wd_valorcursos`";

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
		$sql = "select count(1) as counter from `wd_valorcursos`";

		// the criteria can be used or you can write your own custom logic.
		// be sure to escape any user input with $criteria->Escape()
		$sql .= $criteria->GetWhere();

		return $sql;
	}
}

?>
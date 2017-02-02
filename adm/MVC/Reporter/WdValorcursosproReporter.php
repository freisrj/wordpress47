<?php
/** @package    WandallCa::Reporter */

/** import supporting libraries */
require_once("verysimple/Phreeze/Reporter.php");

/**
 * This is an example Reporter based on the WdValorcursospro object.  The reporter object
 * allows you to run arbitrary queries that return data which may or may not fith within
 * the data access API.  This can include aggregate data or subsets of data.
 *
 * Note that Reporters are read-only and cannot be used for saving data.
 *
 * @package WandallCa::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class WdValorcursosproReporter extends Reporter
{

	// the properties in this class must match the columns returned by GetCustomQuery().
	// 'CustomFieldExample' is an example that is not part of the `wd_valorcursospro` table
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
			,`wd_valorcursospro`.`id_var` as IdVar
			,`wd_valorcursospro`.`id_cur` as IdCur
			,`wd_valorcursospro`.`valor` as Valor
			,`wd_valorcursospro`.`desconto` as Desconto
			,`wd_valorcursospro`.`material` as Material
			,`wd_valorcursospro`.`desc0` as Desc0
			,`wd_valorcursospro`.`desc1` as Desc1
			,`wd_valorcursospro`.`desc2` as Desc2
			,`wd_valorcursospro`.`desc3` as Desc3
			,`wd_valorcursospro`.`avista1` as Avista1
			,`wd_valorcursospro`.`desc11` as Desc11
			,`wd_valorcursospro`.`desc12` as Desc12
			,`wd_valorcursospro`.`desc13` as Desc13
			,`wd_valorcursospro`.`desc14` as Desc14
			,`wd_valorcursospro`.`desc15` as Desc15
			,`wd_valorcursospro`.`desc16` as Desc16
			,`wd_valorcursospro`.`avista2` as Avista2
			,`wd_valorcursospro`.`desc21` as Desc21
			,`wd_valorcursospro`.`desc22` as Desc22
			,`wd_valorcursospro`.`desc23` as Desc23
			,`wd_valorcursospro`.`desc24` as Desc24
			,`wd_valorcursospro`.`desc25` as Desc25
			,`wd_valorcursospro`.`desc26` as Desc26
		from `wd_valorcursospro`";

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
		$sql = "select count(1) as counter from `wd_valorcursospro`";

		// the criteria can be used or you can write your own custom logic.
		// be sure to escape any user input with $criteria->Escape()
		$sql .= $criteria->GetWhere();

		return $sql;
	}
}

?>
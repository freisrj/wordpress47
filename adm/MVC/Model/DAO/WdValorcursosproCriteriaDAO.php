<?php
/** @package    WandallCa::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/Criteria.php");

/**
 * WdValorcursosproCriteria allows custom querying for the WdValorcursospro object.
 *
 * WARNING: THIS IS AN AUTO-GENERATED FILE
 *
 * This file should generally not be edited by hand except in special circumstances.
 * Add any custom business logic to the ModelCriteria class which is extended from this class.
 * Leaving this file alone will allow easy re-generation of all DAOs in the event of schema changes
 *
 * @inheritdocs
 * @package WandallCa::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class WdValorcursosproCriteriaDAO extends Criteria
{

	public $IdVar_Equals;
	public $IdVar_NotEquals;
	public $IdVar_IsLike;
	public $IdVar_IsNotLike;
	public $IdVar_BeginsWith;
	public $IdVar_EndsWith;
	public $IdVar_GreaterThan;
	public $IdVar_GreaterThanOrEqual;
	public $IdVar_LessThan;
	public $IdVar_LessThanOrEqual;
	public $IdVar_In;
	public $IdVar_IsNotEmpty;
	public $IdVar_IsEmpty;
	public $IdVar_BitwiseOr;
	public $IdVar_BitwiseAnd;
	public $IdCur_Equals;
	public $IdCur_NotEquals;
	public $IdCur_IsLike;
	public $IdCur_IsNotLike;
	public $IdCur_BeginsWith;
	public $IdCur_EndsWith;
	public $IdCur_GreaterThan;
	public $IdCur_GreaterThanOrEqual;
	public $IdCur_LessThan;
	public $IdCur_LessThanOrEqual;
	public $IdCur_In;
	public $IdCur_IsNotEmpty;
	public $IdCur_IsEmpty;
	public $IdCur_BitwiseOr;
	public $IdCur_BitwiseAnd;
	public $Valor_Equals;
	public $Valor_NotEquals;
	public $Valor_IsLike;
	public $Valor_IsNotLike;
	public $Valor_BeginsWith;
	public $Valor_EndsWith;
	public $Valor_GreaterThan;
	public $Valor_GreaterThanOrEqual;
	public $Valor_LessThan;
	public $Valor_LessThanOrEqual;
	public $Valor_In;
	public $Valor_IsNotEmpty;
	public $Valor_IsEmpty;
	public $Valor_BitwiseOr;
	public $Valor_BitwiseAnd;
	public $Desconto_Equals;
	public $Desconto_NotEquals;
	public $Desconto_IsLike;
	public $Desconto_IsNotLike;
	public $Desconto_BeginsWith;
	public $Desconto_EndsWith;
	public $Desconto_GreaterThan;
	public $Desconto_GreaterThanOrEqual;
	public $Desconto_LessThan;
	public $Desconto_LessThanOrEqual;
	public $Desconto_In;
	public $Desconto_IsNotEmpty;
	public $Desconto_IsEmpty;
	public $Desconto_BitwiseOr;
	public $Desconto_BitwiseAnd;
	public $Material_Equals;
	public $Material_NotEquals;
	public $Material_IsLike;
	public $Material_IsNotLike;
	public $Material_BeginsWith;
	public $Material_EndsWith;
	public $Material_GreaterThan;
	public $Material_GreaterThanOrEqual;
	public $Material_LessThan;
	public $Material_LessThanOrEqual;
	public $Material_In;
	public $Material_IsNotEmpty;
	public $Material_IsEmpty;
	public $Material_BitwiseOr;
	public $Material_BitwiseAnd;
	public $Desc0_Equals;
	public $Desc0_NotEquals;
	public $Desc0_IsLike;
	public $Desc0_IsNotLike;
	public $Desc0_BeginsWith;
	public $Desc0_EndsWith;
	public $Desc0_GreaterThan;
	public $Desc0_GreaterThanOrEqual;
	public $Desc0_LessThan;
	public $Desc0_LessThanOrEqual;
	public $Desc0_In;
	public $Desc0_IsNotEmpty;
	public $Desc0_IsEmpty;
	public $Desc0_BitwiseOr;
	public $Desc0_BitwiseAnd;
	public $Desc1_Equals;
	public $Desc1_NotEquals;
	public $Desc1_IsLike;
	public $Desc1_IsNotLike;
	public $Desc1_BeginsWith;
	public $Desc1_EndsWith;
	public $Desc1_GreaterThan;
	public $Desc1_GreaterThanOrEqual;
	public $Desc1_LessThan;
	public $Desc1_LessThanOrEqual;
	public $Desc1_In;
	public $Desc1_IsNotEmpty;
	public $Desc1_IsEmpty;
	public $Desc1_BitwiseOr;
	public $Desc1_BitwiseAnd;
	public $Desc2_Equals;
	public $Desc2_NotEquals;
	public $Desc2_IsLike;
	public $Desc2_IsNotLike;
	public $Desc2_BeginsWith;
	public $Desc2_EndsWith;
	public $Desc2_GreaterThan;
	public $Desc2_GreaterThanOrEqual;
	public $Desc2_LessThan;
	public $Desc2_LessThanOrEqual;
	public $Desc2_In;
	public $Desc2_IsNotEmpty;
	public $Desc2_IsEmpty;
	public $Desc2_BitwiseOr;
	public $Desc2_BitwiseAnd;
	public $Desc3_Equals;
	public $Desc3_NotEquals;
	public $Desc3_IsLike;
	public $Desc3_IsNotLike;
	public $Desc3_BeginsWith;
	public $Desc3_EndsWith;
	public $Desc3_GreaterThan;
	public $Desc3_GreaterThanOrEqual;
	public $Desc3_LessThan;
	public $Desc3_LessThanOrEqual;
	public $Desc3_In;
	public $Desc3_IsNotEmpty;
	public $Desc3_IsEmpty;
	public $Desc3_BitwiseOr;
	public $Desc3_BitwiseAnd;
	public $Avista1_Equals;
	public $Avista1_NotEquals;
	public $Avista1_IsLike;
	public $Avista1_IsNotLike;
	public $Avista1_BeginsWith;
	public $Avista1_EndsWith;
	public $Avista1_GreaterThan;
	public $Avista1_GreaterThanOrEqual;
	public $Avista1_LessThan;
	public $Avista1_LessThanOrEqual;
	public $Avista1_In;
	public $Avista1_IsNotEmpty;
	public $Avista1_IsEmpty;
	public $Avista1_BitwiseOr;
	public $Avista1_BitwiseAnd;
	public $Desc11_Equals;
	public $Desc11_NotEquals;
	public $Desc11_IsLike;
	public $Desc11_IsNotLike;
	public $Desc11_BeginsWith;
	public $Desc11_EndsWith;
	public $Desc11_GreaterThan;
	public $Desc11_GreaterThanOrEqual;
	public $Desc11_LessThan;
	public $Desc11_LessThanOrEqual;
	public $Desc11_In;
	public $Desc11_IsNotEmpty;
	public $Desc11_IsEmpty;
	public $Desc11_BitwiseOr;
	public $Desc11_BitwiseAnd;
	public $Desc12_Equals;
	public $Desc12_NotEquals;
	public $Desc12_IsLike;
	public $Desc12_IsNotLike;
	public $Desc12_BeginsWith;
	public $Desc12_EndsWith;
	public $Desc12_GreaterThan;
	public $Desc12_GreaterThanOrEqual;
	public $Desc12_LessThan;
	public $Desc12_LessThanOrEqual;
	public $Desc12_In;
	public $Desc12_IsNotEmpty;
	public $Desc12_IsEmpty;
	public $Desc12_BitwiseOr;
	public $Desc12_BitwiseAnd;
	public $Desc13_Equals;
	public $Desc13_NotEquals;
	public $Desc13_IsLike;
	public $Desc13_IsNotLike;
	public $Desc13_BeginsWith;
	public $Desc13_EndsWith;
	public $Desc13_GreaterThan;
	public $Desc13_GreaterThanOrEqual;
	public $Desc13_LessThan;
	public $Desc13_LessThanOrEqual;
	public $Desc13_In;
	public $Desc13_IsNotEmpty;
	public $Desc13_IsEmpty;
	public $Desc13_BitwiseOr;
	public $Desc13_BitwiseAnd;
	public $Desc14_Equals;
	public $Desc14_NotEquals;
	public $Desc14_IsLike;
	public $Desc14_IsNotLike;
	public $Desc14_BeginsWith;
	public $Desc14_EndsWith;
	public $Desc14_GreaterThan;
	public $Desc14_GreaterThanOrEqual;
	public $Desc14_LessThan;
	public $Desc14_LessThanOrEqual;
	public $Desc14_In;
	public $Desc14_IsNotEmpty;
	public $Desc14_IsEmpty;
	public $Desc14_BitwiseOr;
	public $Desc14_BitwiseAnd;
	public $Desc15_Equals;
	public $Desc15_NotEquals;
	public $Desc15_IsLike;
	public $Desc15_IsNotLike;
	public $Desc15_BeginsWith;
	public $Desc15_EndsWith;
	public $Desc15_GreaterThan;
	public $Desc15_GreaterThanOrEqual;
	public $Desc15_LessThan;
	public $Desc15_LessThanOrEqual;
	public $Desc15_In;
	public $Desc15_IsNotEmpty;
	public $Desc15_IsEmpty;
	public $Desc15_BitwiseOr;
	public $Desc15_BitwiseAnd;
	public $Desc16_Equals;
	public $Desc16_NotEquals;
	public $Desc16_IsLike;
	public $Desc16_IsNotLike;
	public $Desc16_BeginsWith;
	public $Desc16_EndsWith;
	public $Desc16_GreaterThan;
	public $Desc16_GreaterThanOrEqual;
	public $Desc16_LessThan;
	public $Desc16_LessThanOrEqual;
	public $Desc16_In;
	public $Desc16_IsNotEmpty;
	public $Desc16_IsEmpty;
	public $Desc16_BitwiseOr;
	public $Desc16_BitwiseAnd;
	public $Avista2_Equals;
	public $Avista2_NotEquals;
	public $Avista2_IsLike;
	public $Avista2_IsNotLike;
	public $Avista2_BeginsWith;
	public $Avista2_EndsWith;
	public $Avista2_GreaterThan;
	public $Avista2_GreaterThanOrEqual;
	public $Avista2_LessThan;
	public $Avista2_LessThanOrEqual;
	public $Avista2_In;
	public $Avista2_IsNotEmpty;
	public $Avista2_IsEmpty;
	public $Avista2_BitwiseOr;
	public $Avista2_BitwiseAnd;
	public $Desc21_Equals;
	public $Desc21_NotEquals;
	public $Desc21_IsLike;
	public $Desc21_IsNotLike;
	public $Desc21_BeginsWith;
	public $Desc21_EndsWith;
	public $Desc21_GreaterThan;
	public $Desc21_GreaterThanOrEqual;
	public $Desc21_LessThan;
	public $Desc21_LessThanOrEqual;
	public $Desc21_In;
	public $Desc21_IsNotEmpty;
	public $Desc21_IsEmpty;
	public $Desc21_BitwiseOr;
	public $Desc21_BitwiseAnd;
	public $Desc22_Equals;
	public $Desc22_NotEquals;
	public $Desc22_IsLike;
	public $Desc22_IsNotLike;
	public $Desc22_BeginsWith;
	public $Desc22_EndsWith;
	public $Desc22_GreaterThan;
	public $Desc22_GreaterThanOrEqual;
	public $Desc22_LessThan;
	public $Desc22_LessThanOrEqual;
	public $Desc22_In;
	public $Desc22_IsNotEmpty;
	public $Desc22_IsEmpty;
	public $Desc22_BitwiseOr;
	public $Desc22_BitwiseAnd;
	public $Desc23_Equals;
	public $Desc23_NotEquals;
	public $Desc23_IsLike;
	public $Desc23_IsNotLike;
	public $Desc23_BeginsWith;
	public $Desc23_EndsWith;
	public $Desc23_GreaterThan;
	public $Desc23_GreaterThanOrEqual;
	public $Desc23_LessThan;
	public $Desc23_LessThanOrEqual;
	public $Desc23_In;
	public $Desc23_IsNotEmpty;
	public $Desc23_IsEmpty;
	public $Desc23_BitwiseOr;
	public $Desc23_BitwiseAnd;
	public $Desc24_Equals;
	public $Desc24_NotEquals;
	public $Desc24_IsLike;
	public $Desc24_IsNotLike;
	public $Desc24_BeginsWith;
	public $Desc24_EndsWith;
	public $Desc24_GreaterThan;
	public $Desc24_GreaterThanOrEqual;
	public $Desc24_LessThan;
	public $Desc24_LessThanOrEqual;
	public $Desc24_In;
	public $Desc24_IsNotEmpty;
	public $Desc24_IsEmpty;
	public $Desc24_BitwiseOr;
	public $Desc24_BitwiseAnd;
	public $Desc25_Equals;
	public $Desc25_NotEquals;
	public $Desc25_IsLike;
	public $Desc25_IsNotLike;
	public $Desc25_BeginsWith;
	public $Desc25_EndsWith;
	public $Desc25_GreaterThan;
	public $Desc25_GreaterThanOrEqual;
	public $Desc25_LessThan;
	public $Desc25_LessThanOrEqual;
	public $Desc25_In;
	public $Desc25_IsNotEmpty;
	public $Desc25_IsEmpty;
	public $Desc25_BitwiseOr;
	public $Desc25_BitwiseAnd;
	public $Desc26_Equals;
	public $Desc26_NotEquals;
	public $Desc26_IsLike;
	public $Desc26_IsNotLike;
	public $Desc26_BeginsWith;
	public $Desc26_EndsWith;
	public $Desc26_GreaterThan;
	public $Desc26_GreaterThanOrEqual;
	public $Desc26_LessThan;
	public $Desc26_LessThanOrEqual;
	public $Desc26_In;
	public $Desc26_IsNotEmpty;
	public $Desc26_IsEmpty;
	public $Desc26_BitwiseOr;
	public $Desc26_BitwiseAnd;

}

?>
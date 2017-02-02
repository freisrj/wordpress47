<?php
/** @package WandallCa::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/Phreezable.php");
require_once("AulasMap.php");

/**
 * AulasDAO provides object-oriented access to the aulas table.  This
 * class is automatically generated by ClassBuilder.
 *
 * WARNING: THIS IS AN AUTO-GENERATED FILE
 *
 * This file should generally not be edited by hand except in special circumstances.
 * Add any custom business logic to the Model class which is extended from this DAO class.
 * Leaving this file alone will allow easy re-generation of all DAOs in the event of schema changes
 *
 * @package WandallCa::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class AulasDAO extends Phreezable
{
	/** @var int */
	public $IdAul;

	/** @var int */
	public $Aula;

	/** @var int */
	public $IdAlu;

	/** @var int */
	public $IdTur;

	/** @var int */
	public $Modulo;

	/** @var char */
	public $Ponto;

	/** @var date */
	public $Data;



}
?>
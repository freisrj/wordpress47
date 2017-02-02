<?php
/** @package WandallCa::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/Phreezable.php");
require_once("SHomeMap.php");

/**
 * SHomeDAO provides object-oriented access to the s_home table.  This
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
class SHomeDAO extends Phreezable
{
	/** @var int */
	public $IdHom;

	/** @var string */
	public $Titulo;

	/** @var longtext */
	public $Texto;



}
?>
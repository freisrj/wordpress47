<?php
/** @package WandallCa::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/Phreezable.php");
require_once("MailmensagensMap.php");

/**
 * MailmensagensDAO provides object-oriented access to the mailmensagens table.  This
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
class MailmensagensDAO extends Phreezable
{
	/** @var int */
	public $IdMen;

	/** @var int */
	public $Viss;

	/** @var string */
	public $Saldacao;

	/** @var int */
	public $Vism;

	/** @var longtext */
	public $Mens;

	/** @var int */
	public $Visn;

	/** @var int */
	public $Visr;

	/** @var longtext */
	public $Rodape;



}
?>
<?php
/** @package WandallCa::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/Phreezable.php");
require_once("BoletosMap.php");

/**
 * BoletosDAO provides object-oriented access to the boletos table.  This
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
class BoletosDAO extends Phreezable
{
	/** @var int */
	public $IdBoleto;

	/** @var int */
	public $IdCli;

	/** @var int */
	public $IdPedido;

	/** @var int */
	public $NossoNumero;

	/** @var float */
	public $Valor;

	/** @var date */
	public $DataCri;

	/** @var time */
	public $HoraCri;

	/** @var date */
	public $DataVenc;

	/** @var char */
	public $Hash;



}
?>
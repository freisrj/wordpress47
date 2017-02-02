<?php
/** @package WandallCa::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/Phreezable.php");
require_once("PedidoCertMap.php");

/**
 * PedidoCertDAO provides object-oriented access to the pedido_cert table.  This
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
class PedidoCertDAO extends Phreezable
{
	/** @var int */
	public $IdPcer;

	/** @var int */
	public $IdPed;

	/** @var int */
	public $Qped;

	/** @var string */
	public $Situacao;

	/** @var string */
	public $Quemretirou;

	/** @var date */
	public $Data;

	/** @var date */
	public $Entregue;

	/** @var int */
	public $IdAlu;

	/** @var int */
	public $Turma;

	/** @var string */
	public $Curso;



}
?>
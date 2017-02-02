<?php
/** @package WandallCa::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/Phreezable.php");
require_once("PagamentosMap.php");

/**
 * PagamentosDAO provides object-oriented access to the pagamentos table.  This
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
class PagamentosDAO extends Phreezable
{
	/** @var int */
	public $IdPag;

	/** @var string */
	public $Tipo;

	/** @var int */
	public $IdAlu;

	/** @var int */
	public $IdTur;

	/** @var int */
	public $Parcela;

	/** @var string */
	public $Especie;

	/** @var string */
	public $Bandeira;

	/** @var string */
	public $Banco;

	/** @var string */
	public $Cheque;

	/** @var string */
	public $Titular;

	/** @var date */
	public $Vencimento;

	/** @var date */
	public $Pago;

	/** @var float */
	public $Valor;

	/** @var string */
	public $Extenso;

	/** @var float */
	public $Desconto;

	/** @var float */
	public $Apagar;

	/** @var date */
	public $EnvioBoleto;

	/** @var int */
	public $Situacao;



}
?>
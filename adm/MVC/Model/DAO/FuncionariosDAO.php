<?php
/** @package WandallCa::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/Phreezable.php");
require_once("FuncionariosMap.php");

/**
 * FuncionariosDAO provides object-oriented access to the funcionarios table.  This
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
class FuncionariosDAO extends Phreezable
{
	/** @var int */
	public $IdFun;

	/** @var string */
	public $Apelido;

	/** @var string */
	public $Nome;

	/** @var string */
	public $Telefone;

	/** @var string */
	public $Celular;

	/** @var string */
	public $Endereco;

	/** @var string */
	public $Bairro;

	/** @var string */
	public $Funcao;

	/** @var string */
	public $Cidade;

	/** @var string */
	public $Cep;

	/** @var string */
	public $Uf;



}
?>
<?php

/**
 * DaoInstrumento
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $nome
 * @property integer $situacao
 * @property integer $status
 * @property integer $grupo_id
 * @property Grupo $Grupo
 * @property Doctrine_Collection $Escala
 * @property Doctrine_Collection $IntegranteInstrumento
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class DaoInstrumento extends DaoGeneric
{
    public function setTableDefinition()
    {
        $this->setTableName('instrumento');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('nome', 'string', 45, array(
             'type' => 'string',
             'length' => 45,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('situacao', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('status', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('grupo_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Grupo', array(
             'local' => 'grupo_id',
             'foreign' => 'id'));

        $this->hasMany('Escala', array(
             'local' => 'id',
             'foreign' => 'instrumento_id'));

        $this->hasMany('IntegranteInstrumento', array(
             'local' => 'id',
             'foreign' => 'instrumento_id'));
    }
}
<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of IntrumentoRepository
 *
 * @author SBrasil-002
 */
class InstrumentoRepository extends RepositoryAbstract{

    

    public function __construct() {
        $this->obj = new Instrumento();
        parent::__construct();
    }

    public function getList() {
        $q = Doctrine_Query::create()
                ->from(get_class($this->obj))
                ->where("grupo_id = ?", array(Grupo::getLogged()->id))
                ->orderBy('nome');
                


        return $q->execute();
    }

}

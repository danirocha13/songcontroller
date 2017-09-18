<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CultoRepository
 *
 * @author SBrasil-002
 */
class CultoRepository extends RepositoryAbstract{
     public function __construct() {
        $this->obj = new Culto();
        parent::__construct();
    }
    
    public function isExiste(Culto $culto) {
         $q = Doctrine_Query::create()
                 ->from(get_class($this->obj) . ' p')
                 ->where("data = ?", array($culto->data))
                 ->addWhere("hora = ?", array($culto->hora));
         
         if($culto->id > 0){
             $q->addWhere("p.id != ?", array($culto->id));
         }
         return $q->count() > 0;
    }
}

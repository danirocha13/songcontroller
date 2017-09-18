<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GrupoRepository
 *
 * @author SBrasil-002
 */
class GrupoRepository extends RepositoryAbstract {

    public function __construct() {
        $this->obj = new Grupo();
        parent::__construct();
    }
    
    public function getById($id) {
        $q = Doctrine_Query::create()
                ->from(get_class($this->obj))
                ->where("id = ?", array($id));
                
        return $q->fetchOne();
    }


    public function getGrupoByNome($nome, $id) {
        $q = Doctrine_Query::create()
                ->from(get_class($this->obj))
                ->where("nome = ?", array($nome))
                ->addWhere("id != ?", array($id));

        return $q->fetchOne();
    }

    public function isExiste(Grupo $grupo) {
        $q = Doctrine_Query::create()
                ->from(get_class($this->obj) . ' p')
                ->where("nome = ?", array($grupo->nome));
        
        if ($grupo->id > 0) {
            $q->addWhere("p.id != ?", array($grupo->id));
        }

        return $q->count() > 0;
    }

    public function getList() {
        $q = Doctrine_Query::create()
                ->from(get_class($this->obj))
                ->orderBy('nome');

        return $q->execute();
    }

}

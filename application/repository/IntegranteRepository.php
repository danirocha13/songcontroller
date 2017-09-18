<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of IntegranteRepository
 *
 * @author SBrasil-002
 */
class IntegranteRepository extends RepositoryAbstract {

    public function __construct() {
        $this->obj = new Integrante();
        parent::__construct();
    }

    public function getIntegranteByUsuarioAndSenha($usuario, $senha) {
        $q = Doctrine_Query::create()
                ->from(get_class($this->obj))
                ->where("usuario = ?", array($usuario))
                ->addWhere("senha = ?", array($senha))
                ->addWhere('status = ' . 1);
        return $q->fetchOne();
    }

    public function getIntegranteByNome($nome, $id) {
        $q = Doctrine_Query::create()
                ->from(get_class($this->obj))
                ->where("nome = ?", array($nome))
                ->addWhere("id != ?", array($id));
        return $q->fetchOne();
    }

    public function isExiste(Integrante $integrante) {
        $q = Doctrine_Query::create()
                ->from(get_class($this->obj) . ' p')
                ->where("nome = ?", array($integrante->nome))
                ->andWhere("usuario = ?", array($integrante->usuario));
                

        if ($integrante->id > 0) {
            $q->addWhere("p.id != ?", array($integrante->id));
        }

        return $q->count() > 0;
    }

    public function getList() {
        $q = Doctrine_Query::create()
                ->from(get_class($this->obj))
                ->where('grupo_id = ?', array(Grupo::getLogged()->id));


        return $q->execute();
    }

}

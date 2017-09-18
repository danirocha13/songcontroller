<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MusicaRepositoy
 *
 * @author SBrasil-002
 */
class MusicaRepository extends RepositoryAbstract {

    public function __construct() {
        $this->obj = new Musica();
        parent::__construct();
    }

    public function getList() {
        $q = Doctrine_Query::create()
                ->from(get_class($this->obj))
                ->where("grupo_id = ?", array(Grupo::getLogged()->id))
                ->orderBy('nome');

        return $q->execute();
    }

    public function getMusicaByNome($nome, $id) {
        $q = Doctrine_Query::create()
                ->from(get_class($this->obj))
                ->where("nome = ?", array($nome))
                ->addWhere("id != ?", array($id));
        return $q->fetchOne();
    }

    public function isExiste(Musica $musica) {
        $q = Doctrine_Query::create()
                ->from(get_class($this->obj) . ' p')
                ->where("nome = ?", array($musica->nome))
                ->andWhere("artista_banda = ?", array($musica->artista_banda));

        if ($musica->id > 0) {
            $q->addWhere("p.id != ?", array($musica->id));
        }

        return $q->count() > 0;
    }

}

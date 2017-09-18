<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RepositoryAbstract
 *
 * @author SBrasil-002
 */
abstract class RepositoryAbstract {
    /**
     *
     * @var DaoGeneric
     */
    protected $obj;
    protected $_id = 'id';
    protected $_descriptionField = 'name';
    private $_class;
    private static $_propert_remove = array("controller", "action", "module", "Submit");

    public function __construct() {
        $this->_class = get_class($this->obj);
    }
    
    public function getById($id) {
        $q = Doctrine_Query::create()
                ->from(get_class($this->obj))
                ->where("id = ?", array($id))
                ->addWhere("grupo_id = ?", array(Grupo::getLogged()->id));
        return $q->fetchOne();
    }
    
    public function getListByFilter(RepositoryFilter $repository_filter = null, RepositoryOrder $repository_order = null) {
        $q = Doctrine_Query::create()
                ->from($this->_class . ' p');
        if (!is_null($repository_filter) && !$repository_filter->isEmpty()) {
            foreach ($repository_filter->getFiltersJoin() as $filterJoin) {
                $q->innerJoin($filterJoin);
            }

            foreach ($repository_filter->getFiltersLeftJoin() as $filterLeftJoin) {
                $q->leftJoin($filterLeftJoin);
            }

            foreach ($repository_filter->getFiltersGeneric() as $filterGeneric) {
                $q->addWhere($filterGeneric);
            }


            foreach ($repository_filter->getFilters() as $filter) {
                $q->addWhere($filter[0], $filter[1]);
            }
        }

        if (!is_null($repository_order) && !$repository_order->isEmpty()) {
            foreach ($repository_order->getOrders() as $sort => $order) {
                $q->addOrderBy($sort . ' ' . $order);
            }
        }

        //echo $q->getSqlQuery();

        return $q;
    }
    
}

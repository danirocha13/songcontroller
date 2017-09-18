<?php

class Administrador_IndexController extends Zend_Controller_Action {
    
    public function init() {
        $this->_helper->layout->setLayout("administrador");
        $this->view->menu_ativo = 'pagina_inicial';
    }

    public function indexAction() {
        $this->view->mensagem_restrito = $this->getRequest()->getParam('mensagem_restrito');
         $this->view->mensagem_perfil = $this->getRequest()->getParam('mensagem_perfil');
        
    }

    public function novoAction() {
        
    }

}

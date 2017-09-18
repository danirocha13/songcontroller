<?php

class AclPlugin extends Zend_Controller_Plugin_Abstract {

    public function preDispatch(Zend_Controller_Request_Abstract $request) {
        session_start();
        if ($request->getModuleName() == 'site')
            return;

        
        if (!$_SESSION['logado']) {
            $request->setModuleName('site')
                    ->setControllerName('index')
                    ->setActionName('login');
        } else {
            if (Integrante::getLogged()->tipo == Integrante::TIPO_INTEGRANTE) {
                if ($request->getActionName() == 'novo' || $request->getActionName() == 'editar'|| $request->getControllerName() == 'grupo'|| $request->getActionName() == 'deletar') {
                    $r = Zend_Controller_Action_HelperBroker::getStaticHelper('redirector');
                    $r->gotoUrl(Zend_Controller_Front::getInstance()->getBaseUrl() . '/administrador?mensagem_restrito=Acesso Restrito')->redirectAndExit();
                }
            }
        }
    }

}

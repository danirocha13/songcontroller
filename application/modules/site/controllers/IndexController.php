<?php

class Site_IndexController extends Zend_Controller_Action {

    public function indexAction() {
        $this->_helper->layout->setLayout("site");
    }

    public function cadastrarAction() {
        $this->_helper->layout->setLayout("site");
        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();
            $integrante = new Integrante();
            $integrante->nome = $data['nome'];
            $integrante->usuario = $data['usuario'];
            $integrante->email = $data['email'];
            $integrante->senha = $data['senha'];
            $integrante->tipo = Integrante::TIPO_ADMINISTRADOR;
            $integrante->status = Integrante::STATUS_ATIVO;

            $grupo = new Grupo();
            $grupo->nome = "Meu grupo";
            $grupo->responsavel = $data['nome'];
            $grupo->Integrante->add($integrante);

            $validate = $this->validate($integrante);
            if (!isset($validate) || $validate == "") {
                
                $grupo->save();
                $this->_redirect($this->view->baseUrl(). '/index/login?mensagem=Usuario cadastrado com sucesso<br>Faça o login abaixo.');
            } else {
                $this->view->mensagem_erro = $validate;
            }
        }
    }

    public function loginAction() {



        if ($_SESSION['logado']) {

            $this->_redirect($this->view->baseUrl() . '/administrador/');
        }

        if ($_COOKIE['usuario'] != "" && $_COOKIE['senha'] != "") {
            $this->_logar($_COOKIE);
        }

        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();

            if (isset($_POST['lembrar'])) {
                $tempo = time() + 3600;
                setcookie('usuario', $_POST['usuario'], $tempo);
                setcookie('senha', $_POST['senha'], $tempo);
            }
            $this->_logar($data);
            
        }
         $this->view->mensagem_aviso = $this->getRequest()->getParam('mensagem');
    }

    public function logoutAction() {
        $tempo = time() - 3600;
        setcookie('usuario', $_POST['usuario'], $tempo);
        setcookie('senha', $_POST['senha'], $tempo);
        session_destroy();
        $this->_redirect($this->view->baseUrl() . '/index/login');
    }

    private function validate($integrante) {
        $erro = NULL;
        if ($integrante->nome == "") {
            $erro = "Campo nome não foi preenchido.<br>";
        }
        if ($integrante->usuario == "") {
            $erro = $erro . "Campo usuario não foi preenchido.<br>";
        }
        if ($integrante->email == "") {
            $erro = $erro . "Campo email não foi preenchido.<br>";
        }
        if ($integrante->senha == "") {
            $erro = $erro . "Campo senha não foi preenchido.<br>";
        }
        $integranteRepository = new IntegranteRepository();

        if ($integranteRepository->isExiste($integrante)) {
            $erro = $erro . 'Nome e/ou Usuário já cadastrado.<br>';
        }
        return $erro;
    }

    private function _logar($data) {
        $integranteRepository = new IntegranteRepository();
        $integrante = $integranteRepository->getIntegranteByUsuarioAndSenha($data['usuario'], $data['senha']);

        if ($integrante != FALSE && $integrante->id > 0) {

            $_SESSION['logado'] = TRUE;
            $_SESSION['grupo_id'] = $integrante->grupo_id;
            $_SESSION['integrante_nome'] = $integrante->nome;
            $_SESSION['integrante_tipo'] = $integrante->tipo;
            $_SESSION['integrante_categoria'] = $integrante->categoria;
            $_SESSION['integrante_foto'] = $integrante->foto;
            $_SESSION['integrante_id'] = $integrante->id;

            $this->_redirect($this->view->baseUrl() . '/administrador/index');
        } else {
            $this->view->mensagem_erro = "Usuário e/ou senha Invalidos.";
        }
    }

}

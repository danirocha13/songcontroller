<?php

class Administrador_IntegranteController extends Zend_Controller_Action {

    public function init() {
        $this->_helper->layout->setLayout("administrador");
        $this->view->menu_ativo = 'integrantes';
    }

    public function indexAction() {


        $params = $this->getRequest()->getParams();

        $lista_integranteRepository = new IntegranteRepository();

        $filter = new RepositoryFilter($params);
        $filter->addTextFilter('nome', $params['nome']);
        $filter->addSelectFilter('categoria', $params['categoria']);
        $filter->addTextFilter('grupo_id', Grupo::getLogged()->id);
        


        $orderby = new RepositoryOrder($params);
        $orderby->addOrder('nome', 'ASC');


        $list = new Zend_Paginator(new My_Zend_Paginator_Adapter_Doctrine($lista_integranteRepository->getListByFilter($filter, $orderby)));
        $list->setItemCountPerPage(10);
        $list->setCurrentPageNumber($params["page"]);

        $this->view->params = $params;
        $this->view->lista_integrantes = $list;
        $this->view->mensagem_sucess = $this->getRequest()->getParam('sucess');
        $this->view->mensagem_warning = $this->getRequest()->getParam('warning');
        $this->view->mensagem_danger = $this->getRequest()->getParam('danger');
        $this->view->list_params = array('filter' => $filter);
    }

    public function novoAction() {

        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();
            $integrante = new Integrante();
            $integrante->nome = $data['nome'];
            $integrante->usuario = $data['usuario'];
            $integrante->email = $data['email'];
            $integrante->senha = $data['senha'];
            $integrante->categoria = $data['categoria'];
            $integrante->status = $data['status'];
            $integrante->foto = UploadUtil::getFileName($_FILES['foto'], $integrante->nome);
            $integrante->grupo_id = Grupo::getLogged()->id;
            $integrante->tipo = Integrante::TIPO_INTEGRANTE;

            $validate = $this->_validate($integrante);

            if (!isset($validate) || ($validate == "")) {
                $integrante->save();

                UploadUtil::uploadFile($_FILES['foto'], 'fotointegrante', $integrante->nome);
                $this->_redirect($this->view->baseUrl() . '/administrador/integrante?sucess=Integrante Cadastrado com sucesso.');
            } else {
                $this->view->mensagem_erro = $validate;
            }
        }
        $this->view->integrante = $integrante;
    }

    public function editarAction() {

        $id = $this->getRequest()->getParam('id');
        $integranteRepository = new IntegranteRepository();
        $integrante = $integranteRepository->getById($id);
        
        if($integrante == FALSE){
           $this->_redirect($this->view->baseUrl() . '/administrador/integrante?danger=Integrante não existe no grupo!');
        }

        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();
            $this->_setData($integrante, $data);

            $validate = $this->_validate($integrante);

            if (!isset($validate) || $validate == "") {

                $integrante->save();
                UploadUtil::uploadFile($_FILES['foto'], 'fotointegrante', $integrante->nome);
                $this->_redirect($this->view->baseUrl() . '/administrador/integrante?sucess=Integrante alterado com sucesso.');
            } else {
                $this->view->mensagem_erro = $validate;
            }
        }
        $this->view->integrante = $integrante;
    }
    
    public function perfilAction(){
        $id = $this->getRequest()->getParam('id');
        $integranteRepository = new IntegranteRepository();
        $integrante_perfil = $integranteRepository->getById($id);
        
        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();
            $this->_setData($integrante_perfil, $data);

            $validate = $this->_validate($integrante_perfil);

            if (!isset($validate) || $validate == "") {

                $integrante_perfil->save();
                UploadUtil::uploadFile($_FILES['foto'], 'fotointegrante', $integrante_perfil->nome);
                $this->_redirect($this->view->baseUrl() . '/administrador?sucess=Perfil alterado com sucesso.');
            } else {
                $this->view->mensagem_erro = $validate;
            }
        }
        $this->view->integrante = $integrante_perfil;
    }

    public function deletarAction() {
        $id = $this->getRequest()->getParam('id');

        $integranteRepository = new IntegranteRepository();
        $integrante_deletar = $integranteRepository->getById($id);

        if ($integrante_deletar != FALSE) {
            
            if ($integrante_deletar->Escala->count() > 0) {
                $this->_redirect($this->view->baseUrl() . '/administrador/integrante?warning=Integrante não pode ser deletado pois está vinculado a uma escala!!!');
            }

            UploadUtil::deleteFile('fotointegrante', $integrante_deletar->foto);


            $integrante_deletar->IntegranteInstrumento->delete();
            $integrante_deletar->delete();
            $this->_redirect($this->view->baseUrl() . '/administrador/integrante?sucess=Integrante deletado com sucesso.');
        } else {

            $this->_redirect($this->view->baseUrl() . '/administrador/integrante?danger=Erro ao deletar Integrante');
        }
    }

    public function emailAction() {
        $id = $this->getRequest()->getParam('id');
        $integranteRepository = new IntegranteRepository();
        $integrante = $integranteRepository->getById($id);


        if ($integrante != FALSE) {
            $email = $integrante->email;
            $assunto = 'Dados Integrante';
            $mensagem = $integrante->usuario . $integrante->senha;
            echo "
    <style type='text/css'>
    body {
    margin:0px;
    font-family:Verdane;
    font-size:12px;
    color: #333;
    }
    a{
    color: #666666;
    text-decoration: none;
    }
    a:hover {
    color: #FF0000;
    text-decoration: none;
    }
    p{font-family:Verdane;
      font-weight: bold;
}
    </style>
    <html>
        <h1>Song Controller</h1>
        <h2>Seus Dados: </h2>
        <p>Usuario: $integrante->usuario</p>
        <p>Senha: $integrante->senha</p>
        <a href='" . $this->view->baseUrl() . "/index/login'>Entrar no sistema</a>
    </html>
    ";




            //Enviar email usando Mandrill
            $data = array(
                'from_name' => 'SongController',
                'from_email' => 'danirocha.ti@gmail.com',
                'to' => $email,
                'subject' => $assunto,
                'body' => $mensagem,
                'send_admin' => false,
                'copies_hidden' => false
            );

            $field_string = http_build_query($data, '', '&');

            $ch = curl_init('http://sbrasilsolucoes.com/rest/mandrill/send');
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $field_string);

            $output = curl_exec($ch);

            //Enviar email usando Mandrill



            $this->_redirect($this->view->baseUrl() . '/administrador/integrante?sucess=Dados enviados com sucesso');
        }
    }

    private function _setData(Integrante $integrante, $data) {

        $integrante->nome = $data['nome'];
        $integrante->usuario = $data['usuario'];
        $integrante->email = $data['email'];
        $integrante->categoria = $data['categoria'];
        $integrante->senha = $data['senha'];
        $integrante->status = $data['status'];
        $integrante->grupo_id = Grupo::getLogged()->id;

        if ($_FILES['foto']['name'] != "")
            $integrante->foto = UploadUtil::getFileName($_FILES['foto'], $integrante->nome);
    }

    private function _validate(Integrante $integrante) {
        $erro = NULL;
        if ($integrante->nome == "") {
            $erro = '* Campo nome não foi preenchido.<br>';
        }
        if ($integrante->usuario == "") {
            $erro = $erro . '* Campo usuario não foi preenchido.<br>';
        }
        if ($integrante->email == "") {
            $erro = $erro . '* Campo email não foi preenchido.<br>';
        }
        if ($integrante->categoria <= 0) {
            $erro = $erro . 'Selecione a categoria.<br>';
        }
        $integranteRepository = new IntegranteRepository();

        if ($integranteRepository->isExiste($integrante)) {
            $erro = $erro . 'Nome e/ou Usuário já cadastrado.<br>';
        }
        return $erro;
    }

}

<?php

class Administrador_MusicaController extends Zend_Controller_Action {

    public function init() {
        $this->_helper->layout->setLayout("administrador");
        $this->view->menu_ativo = 'musicas';
    }

    public function indexAction() {


        $params = $this->getRequest()->getParams();

        $lista_musicaRepository = new MusicaRepository();

        $filter = new RepositoryFilter($params);
        $filter->addTextFilter('nome', $params['nome']);
        $filter->addTextFilter('artista_banda', $params['artista']);
        $filter->addTextFilter('grupo_id', Grupo::getLogged()->id);

        $orderby = new RepositoryOrder($params);
        $orderby->addOrder('nome', 'ASC');

        $list = new Zend_Paginator(new My_Zend_Paginator_Adapter_Doctrine($lista_musicaRepository->getListByFilter($filter, $orderby)));
        $list->setItemCountPerPage(10);
        $list->setCurrentPageNumber($params["page"]);

        $this->view->params = $params;
        $this->view->lista_musicas = $list;
        $this->view->list_params = array('filter' => $filter);
        $this->view->mensagem_sucess = $this->getRequest()->getParam('sucess');
        $this->view->mensagem_warning = $this->getRequest()->getParam('warning');
        $this->view->mensagem_danger = $this->getRequest()->getParam('danger');
    }

    public function novoAction() {


        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();


            $musica = new Musica();
            $musica->nome = $data['nome'];
            $musica->artista_banda = $data['artista'];
            $musica->link = $data['link'];
            $musica->cifra = UploadUtil::getFileName($_FILES['cifra'], $musica->nome);
            $musica->arquivo_mp3 = UploadUtil::getFileName($_FILES['mp3'], $musica->nome);
            $musica->letra = UploadUtil::getFileName($_FILES['letra'], $musica->nome);
            $musica->power_point = UploadUtil::getFileName($_FILES['powerpoint'], $musica->nome);
            $musica->grupo_id = Grupo::getLogged()->id;



            $validate = $this->_validate($musica);

            if (!isset($validate) || $validate == "") {

                $musica->save();

                UploadUtil::uploadFile($_FILES['cifra'], 'cifra', $musica->nome);
                UploadUtil::uploadFile($_FILES['mp3'], 'mp3', $musica->nome);
                UploadUtil::uploadFile($_FILES['letra'], 'letra', $musica->nome);
                UploadUtil::uploadFile($_FILES['powerpoint'], 'powerpoints', $musica->nome);



                $this->_redirect($this->view->baseUrl() . "/administrador/musica?mensagem=Musica Cadastrada");
            } else {
                $this->view->mensagem_erro = $validate;
            }
        }
        $this->view->musica = $musica;
    }

    public function editarAction() {


        $id = $this->getRequest()->getParam('id');
        $musicaRepository = new MusicaRepository();
        $musica = $musicaRepository->getById($id);
        
        if($musica == FALSE){
           $this->_redirect($this->view->baseUrl() . '/administrador/musica?danger=Codigo da Musica não existe no grupo!');
        }


        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();
            $this->_setData($musica, $data);

            $validate = $this->_validate($musica);

            if (!isset($validate) || $validate == "") {
                $musica->save();

                UploadUtil::uploadFile($_FILES['cifra'], 'cifra', $musica->nome);
                UploadUtil::uploadFile($_FILES['mp3'], 'mp3', $musica->nome);
                UploadUtil::uploadFile($_FILES['letra'], 'letra', $musica->nome);
                UploadUtil::uploadFile($_FILES['powerpoint'], 'powerpoints', $musica->nome);

                $this->_redirect($this->view->baseUrl() . "/administrador/musica?mensagem=Musica alterada com sucesso");
            } else {
                $this->view->mensagem_erro = $validate;
            }
        }
        $this->view->musica = $musica;
    }

    public function deletarAction() {
        $id = $this->getRequest()->getParam('id');

        $musicaRepository = new MusicaRepository();
        $musica_deletar = $musicaRepository->getById($id);


        if ($musica_deletar != FALSE) {

            if ($musica_deletar->Repertorio->count() > 0) {
                $this->_redirect($this->view->baseUrl() . '/administrador/musica?warning=Musica não pode ser deletada pois está vinculada a uma escala!!!');
            }
            
            UploadUtil::deleteFile('cifra', $musica_deletar->cifra);
            UploadUtil::deleteFile('mp3', $musica_deletar->arquivo_mp3);
            UploadUtil::deleteFile('letra', $musica_deletar->letra);
            UploadUtil::deleteFile('powerpoints', $musica_deletar->power_point);

            $musica_deletar->delete();
            $this->_redirect($this->view->baseUrl() . '/administrador/musica?sucess=Música apagada com sucesso');
        } else {
            $this->_redirect($this->view->baseUrl() . '/administrador/musica?danger=Erro ao apagar música');
        }
    }

    private function _setData(Musica $musica, $data) {
        $musica->nome = $data['nome'];
        $musica->artista_banda = $data['artista'];
        $musica->link = $data['link'];

        //$arr_cifra = $_FILES['cifra'];
        //$arr_cifra['name'] 

        if ($_FILES['cifra']['name'] != "")
            $musica->cifra = UploadUtil::getFileName($_FILES['cifra'], $musica->nome);
        if ($_FILES['letra']['name'] != "")
            $musica->letra = UploadUtil::getFileName($_FILES['letra'], $musica->nome);
        if ($_FILES['mp3']['name'] != "")
            $musica->arquivo_mp3 = UploadUtil::getFileName($_FILES['mp3'], $musica->nome);
        if ($_FILES['powerpoint']['name'] != "")
            $musica->power_point = UploadUtil::getFileName($_FILES['powerpoint'], $musica->nome);
    }

    private function _validate($musica) {
        $erro = NULL;
        if ($musica->nome == "") {
            $erro = '* Campo nome não foi preenchido.<br>';
        }
        if ($musica->artista_banda == "") {
            $erro = $erro . "* Campo artista não foi preenchido.<br>";
        }
        
        $musicaRepository = new MusicaRepository();

        if ($musicaRepository->isExiste($musica)) {
            $erro = $erro . 'Essa música já foi cadastrada.';
        }
        return $erro;
    }

}

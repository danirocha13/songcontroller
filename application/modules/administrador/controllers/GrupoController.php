<?php

class Administrador_GrupoController extends Zend_Controller_Action {

    public function init() {
        $this->_helper->layout->setLayout("administrador");
        $this->view->menu_ativo = 'grupo';
    }

    public function indexAction() {

        $params = $this->getRequest()->getParams();

        $lista_grupoRepository = new GrupoRepository();

        $filter = new RepositoryFilter($params);
        $filter->addTextFilter('nome', $params['nome']);
        $filter->addTextFilter('id', Grupo::getLogged()->id);


        $orderby = new RepositoryOrder($params);
        $orderby->addOrder('nome', 'ASC');

        $list = new Zend_Paginator(new My_Zend_Paginator_Adapter_Doctrine($lista_grupoRepository->getListByFilter($filter, $orderby)));
        $list->setItemCountPerPage(10);
        $list->setCurrentPageNumber($params["page"]);

        $this->view->params = $params;
        $this->view->lista_grupos = $list;
        $this->view->list_params = array('filter' => $filter);
        $this->view->mensagem_aviso = $this->getRequest()->getParam('mensagem');
    }

    /* public function novoAction() {


      if ($this->getRequest()->isPost()) {
      $data = $this->getRequest()->getPost();

      $grupo = new Grupo();
      $grupo->nome = $data['grupo'];
      $grupo->responsavel = $data['responsavel'];
      $grupo->igreja = $data['igreja'];
      $grupo->imagem_grupo = UploadUtil::getFileName($_FILES['imagem'], $grupo->nome);

      $validate = $this->_validate($grupo);

      if (!isset($validate) || $validate == "") {
      $grupo->save();
      UploadUtil::uploadFile($_FILES['imagem'], 'imagemgrupo', $grupo->nome);
      $this->_redirect($this->view->baseUrl() . '/administrador/grupo?mensagem=Grupo cadastrado com sucesso');
      } else {
      $this->view->mensagem_erro = $validate;
      }
      }
      $this->view->grupo = $grupo;
      } */

    public function editarAction() {



        $id = $this->getRequest()->getParam('id');
        $grupoRepository = new GrupoRepository();
        $grupo = $grupoRepository->getById($id);


        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();
            $this->_setData($grupo, $data);


            $validate = $this->_validate($grupo);

            if (!isset($validate) || $validate == "") {
                UploadUtil::uploadFile($_FILES['imagem'], 'imagemgrupo', $grupo->nome);
                $grupo->save();
                $this->_redirect($this->view->baseUrl() . '/administrador/grupo?mensagem=Grupo alterado com sucesso');
            } else {
                $this->view->mensagem_erro = $validate;
            }
        }

        $this->view->grupo = $grupo;
    }

    public function deletarAction() {
        $id = $this->getRequest()->getParam('id');

        $grupoRepository = new GrupoRepository();
        $grupo_deletar = $grupoRepository->getById($id);

        if ($grupo_deletar != FALSE) {
            if ($grupo_deletar->Integrante->count() > 0) {
                $this->_redirect($this->view->baseUrl() . '/administrador/grupo?mensagem=Grupo não pode ser deletado pois tem integrante(s) cadastrado(s).!!!');
            }
            if ($grupo_deletar->Musica->count() > 0) {
                $this->_redirect($this->view->baseUrl() . '/administrador/grupo?mensagem=Grupo não pode ser deletado pois tem música(s) cadastrada(s).)!!!');
            }
            if ($grupo_deletar->Instrumento->count() > 0) {
                $this->_redirect($this->view->baseUrl() . '/administrador/grupo?mensagem=Grupo não pode ser deletado pois tem instrumento(s) cadastrado(s).)!!!');
            }

            $grupo_deletar->delete();

            $this->_redirect($this->view->baseUrl() . '/administrador/grupo?mensagem=Grupo deletado com sucesso');
        } else {
            $this->_redirect($this->view->baseUrl() . '/administrador/grupo?mensagem=Erro ao deletar grupo');
        }
    }

    private function _validate($grupo) {
        $erro = NULL;

        if ($grupo->nome == "") {
            $erro = '* Campo nome não foi preenchido<br>';
        }
        if ($grupo->responsavel == "") {
            $erro = $erro . '* Campo responsável não foi preenchido<br>';
        }
        if ($grupo->igreja == "") {
            $erro = $erro . '* Campo igreja não foi preenchido<br>';
        }

        $grupoRepository = new GrupoRepository();

        if ($grupoRepository->isExiste($grupo)) {
            $erro = $erro . 'Esse nome de Grupo já existe';
        }
        return $erro;
    }

    private function _setData(Grupo $grupo, $data) {

        $grupo->nome = $data['grupo'];
        $grupo->responsavel = $data['responsavel'];
        $grupo->igreja = $data['igreja'];
        
        
         if ($_FILES['imagem']['name'] != "")
            $grupo->imagem_grupo = UploadUtil::getFileName($_FILES['imagem'], $grupo->nome);
    }

}

<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CultoController
 *
 * @author SBrasil-002
 */
class Administrador_CultoController extends Zend_Controller_Action {

    public function init() {
        $this->_helper->layout->setLayout("administrador");
        $this->view->menu_ativo = 'culto';
        
    }

    public function indexAction() {

        $params = $this->getRequest()->getParams();

        $lista_cultoRepository = new CultoRepository();

        $filter = new RepositoryFilter();
        $filter->addTextFilter('nome', $params['nome']);
        $filter->addTextFilter('data', $params['data']);
        $filter->addTextFilter('hora', $params['hora']);
        $filter->addTextFilter('grupo_id', Grupo::getLogged()->id);

        $orderby = new RepositoryOrder();
        $orderby->addOrder('nome', 'ASC');

        $list = new Zend_Paginator(new My_Zend_Paginator_Adapter_Doctrine($lista_cultoRepository->getListByFilter($filter, $orderby)));
        $list->setItemCountPerPage(5);
        $list->setCurrentPageNumber($params["page"]);

        $this->view->mensagem_aviso = $this->getRequest()->getParam('mensagem');
        $this->view->lista_cultos = $list;
        $this->view->params = $params;
    }

    public function novoAction() {

        $instrumentoRepository = new InstrumentoRepository();
        $lista_instrumentos = $instrumentoRepository->getList();
        $musicaRepository = new MusicaRepository();
        $lista_musica = $musicaRepository->getList();

        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();
            $culto = new Culto();
            $culto->nome = $data['nome'];
            $culto->data = $data['data'];
            $culto->hora = $data['hora'];
            $culto->local = $data['local'];
            $culto->grupo_id = Grupo::getLogged()->id;

            if (count($data['musica']) > 0) {
                foreach ($data['musica'] as $musica) {
                    $repertorio = new Repertorio();
                    $repertorio->musica_id = $musica;
                    $culto->Repertorio->add($repertorio);
                }
            }

            if ($data['instrumento'] > 0) {
                foreach ($data['instrumento'] as $key => $instrumento) {
                    if ($data['integrante'][$key] > 0) {
                        $escala = new Escala();
                        $escala->instrumento_id = $instrumento;
                        $escala->integrante_id = $data['integrante'][$key];
                        $culto->Escala->add($escala);
                    }
                }
            }


            $validate = $this->_validate($culto);
            if (!isset($validate) || $validate == "") {
                $culto->save();

                $this->_redirect($this->view->baseUrl() . '/administrador/culto?mensagem=Culto cadastrado com sucesso');
            } else {
                $this->view->mensagem_erro = $validate;
            }
        }
        $this->view->culto = $culto;
        $this->view->instrumentos = $lista_instrumentos;
        $this->view->musicas = $lista_musica;
    }

    public function editarAction() {

        $instrumentoRepository = new InstrumentoRepository();
        $lista_instrumentos = $instrumentoRepository->getList();
        $musicaRepository = new MusicaRepository();
        $lista_musica = $musicaRepository->getList();

        $id = $this->getRequest()->getParam('id');

        $cultoRepository = new CultoRepository();
        $culto = $cultoRepository->getById($id);
        
        if($culto == FALSE){
           $this->_redirect($this->view->baseUrl() . '/administrador/culto?danger=Codigo do culto não existe no grupo!');
        }

        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();
            $this->_setData($culto, $data);

            if (count($data['musica']) > 0) {
                $culto->Repertorio->clear();
                foreach ($data['musica'] as $musica) {
                    $repertorio = new Repertorio();
                    $repertorio->musica_id = $musica;
                    $culto->Repertorio->add($repertorio);
                }
            }

            if ($data['instrumento'] > 0) {
                $culto->Escala->clear();
                foreach ($data['instrumento'] as $key => $instrumento) {
                    if ($data['integrante'][$key] > 0) {
                        $escala = new Escala();
                        $escala->instrumento_id = $instrumento;
                        $escala->integrante_id = $data['integrante'][$key];
                        $culto->Escala->add($escala);
                    }
                }
            }

            $validate = $this->_validate($culto);

            if (!isset($validate) || $validate == "") {
                $culto->save();
                $this->_redirect($this->view->baseUrl() . '/administrador/culto?mensagem=Culto Alterado com Sucesso');
            } else {
                $this->view->mensagem_erro = $validate;
            }
        }
        $this->view->instrumentos = $lista_instrumentos;
        $this->view->musicas = $lista_musica;
        $this->view->culto = $culto;
    }

    public function deletarAction() {
        $id = $this->getRequest()->getParam('id');

        $cultoRepository = new CultoRepository();
        $culto_deletar = $cultoRepository->getById($id);

        if ($culto_deletar != FALSE) {
            $culto_deletar->Repertorio->delete();
            $culto_deletar->Escala->delete();
            $culto_deletar->delete();
            $this->_redirect($this->view->baseUrl() . '/administrador/culto?mensagem=Culto deletado com sucesso');
        } else {
            $this->_redirect($this->view->baseUrl() . '/administrador/culto?mensagem=Erro ao deletar culto');
        }
    }

    public function visualizarAction() {
       
        $musicaRepository = new MusicaRepository();
        $lista_musica = $musicaRepository->getList();

        $id = $this->getRequest()->getParam('id');

        $cultoRepository = new CultoRepository();
        $culto = $cultoRepository->getById($id);

        $this->view->culto = $culto;
        $this->view->musicas = $lista_musica;
    }

    private function _validate(Culto $culto) {
        $erro = NULL;
        if ($culto->nome == "") {
            $erro = "* Campo nome dever ser preenchido.<br>";
        }
        if ($culto->data == "") {
            $erro = $erro . "* Campo data deve ser preenchido.<br>";
        }
        if ($culto->hora == "") {
            $erro = $erro . "* Campo hora deve ser preenchido.<br>";
        }
        if ($culto->local == "") {
            $erro = $erro . "* Campo local deve ser preenchido.<br>";
        }

        $cultoRepository = new CultoRepository();

        if ($cultoRepository->isExiste($culto)) {
            $erro = $erro . 'Não é permitido cadastrar culto com mesmo horário ou data ja cadastrado(s).<br>';
        }
        return $erro;
    }

    private function _setData(Culto $culto, $data) {
        $culto->nome = $data['nome'];
        $culto->data = $data['data'];
        $culto->local = $data['local'];
        $culto->hora = $data['hora'];
    }

}

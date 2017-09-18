<?php

class Administrador_InstrumentoController extends Zend_Controller_Action {

    public function init() {
        $this->_helper->layout->setLayout("administrador");
        $this->view->menu_ativo = 'instrumentos';
    }

    public function indexAction() {


        $params = $this->getRequest()->getParams();

        $lista_instrumentoRepository = new InstrumentoRepository();

        $filter = new RepositoryFilter();
        $filter->addTextFilter('nome', $params['nome']);
        $filter->addTextFilter('grupo_id', Grupo::getLogged()->id);

        $orderby = new RepositoryOrder();
        $orderby->addOrder('nome', 'ASC');
        


        $list = new Zend_Paginator(new My_Zend_Paginator_Adapter_Doctrine($lista_instrumentoRepository->getListByFilter($filter, $orderby)));
        $list->setItemCountPerPage(10);
        $list->setCurrentPageNumber($params["page"]);

        $this->view->params = $params;
        $this->view->lista_instrumentos = $list;
        $this->view->list_params = array('filter' => $filter);
        $this->view->mensagem_sucess = $this->getRequest()->getParam('sucess');
        $this->view->mensagem_warning = $this->getRequest()->getParam('warning');
        $this->view->mensagem_danger = $this->getRequest()->getParam('danger');
    }

    public function novoAction() {


        $integrantes = new IntegranteRepository();
        $this->view->lista_integrantes = $integrantes->getList();

        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();

            $instrumento = new Instrumento();
            $instrumento->nome = $data['nome'];
            $instrumento->situacao = $data['situacao'];
            $instrumento->status = $data['status'];
            $instrumento->grupo_id = Grupo::getLogged()->id;


            if (count($data['vinculo']) > 0) {
                foreach ($data['vinculo'] as $integrante_id) {
                    $integrante_instrumento = new IntegranteInstrumento();
                    $integrante_instrumento->integrante_id = $integrante_id;
                    $instrumento->IntegranteInstrumento->add($integrante_instrumento);
                }
            }

            $validate = $this->_validate($instrumento);

            if (!isset($validate) || $validate == "") {
                $instrumento->save();
                $this->_redirect($this->view->baseUrl() . "/administrador/instrumento?mensagem=Instrumento cadastrado com Sucesso");
            } else {
                $this->view->mensagem_erro = $validate;
            }
        }
        $this->view->instrumento =  $instrumento;
    }

    public function editarAction() {


        $id = $this->getRequest()->getParam('id');
        $intrumentoRepository = new InstrumentoRepository();
        $instrumento = $intrumentoRepository->getById($id);
        
        if($instrumento == FALSE){
           $this->_redirect($this->view->baseUrl() . '/administrador/instrumento?danger=Codigo do Instrumento não existe no grupo!');
        }


        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();


            $this->_setData($instrumento, $data);

            //$instrumento->IntegranteInstrumento->clear();
            if (count($data['vinculo']) > 0) {
                $instrumento->IntegranteInstrumento->clear();
                foreach ($data['vinculo'] as $integrante_id) {
                    $integrante_instrumento = new IntegranteInstrumento();
                    $integrante_instrumento->integrante_id = $integrante_id;
                    $instrumento->IntegranteInstrumento->add($integrante_instrumento);
                }

                $validate = $this->_validate($instrumento);

                if (!isset($validate) || $validate == "") {
                    $instrumento->save();
                    $this->_redirect($this->view->baseUrl() . "/administrador/instrumento?mensagem=Instrumento alterado com sucesso");
                } else {
                    $this->view->mensagem_erro = $validate;
                }
            }
        }
        $this->view->instrumento = $instrumento;
        $integrantes = new IntegranteRepository();
        $this->view->lista_integrantes = $integrantes->getList();
    }

    public function deletarAction() {
        $id = $this->getRequest()->getParam('id');

        $instrumentoRepository = new InstrumentoRepository();
        $intrumento_deletar = $instrumentoRepository->getById($id);

        if ($instrumentoRepository != FALSE) {
            
            if ($intrumento_deletar->Escala->count() > 0) {
                $this->_redirect($this->view->baseUrl() . '/administrador/instrumento?warning=Instrumento não pode ser deletado pois está vinculado a uma escala!!!');
            }

            $intrumento_deletar->IntegranteInstrumento->delete();
            $intrumento_deletar->delete();
            $this->_redirect($this->view->baseUrl() . '/administrador/instrumento?sucess=Instrumento deletado com sucesso');
        } else {
            $this->_redirect($this->view->baseUrl() . '/administrador/instrumento?danger=Erro ao deletar Instrumento');
        }
    }

    private function _setData(Instrumento $instrumento, $data) {
        $instrumento->nome = $data['nome'];
        $instrumento->situacao = $data['situacao'];
        $instrumento->status = $data['status'];
    }

    private function _validate($instrumento) {
        $erro = NULL;
        if ($instrumento->nome == "") {
            $erro = '* Campo nome não foi preenchido.<br>';
        }
        if ($instrumento->situacao <= 0) {
            $erro = $erro . '* Situação não foi selecionada.<br>';
        }
        if ($instrumento->status <= 0) {
            $erro = $erro . '* Status não foi selecionado.<br>';
        }
      
        return $erro;
    }

}

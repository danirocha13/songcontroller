<?php

/**
 * Instrumento
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Instrumento extends DaoInstrumento {

    const SITUACAO_OTIMO = 1;
    const SITUACAO_BOM = 2;
    const SITUACAO_REGULAR = 3;
    const SITUACAO_RUIM = 4;
    const STATUS_ATIVO = 1;
    const STATUS_INATIVO = 2;

      public function getSituacao() {
        $situacao = "";

        switch ($this->situacao) {
            case Instrumento::SITUACAO_OTIMO:
                $situacao = "Otimo";
                break;
            case Instrumento::SITUACAO_BOM:
                $situacao = "Bom";
                break;
            case Instrumento::SITUACAO_REGULAR:
                $situacao = "Regular";
                break;
            case Instrumento::SITUACAO_RUIM:
                $situacao = "Ruim";
                break;

            default:
                $situacao = $this->situacao;
                break;
        }

        return $situacao;
    }

    public function getStatus() {
        $status = "";
        switch ($this->status) {
            case Instrumento::STATUS_ATIVO:
                $status = 'Ativo';
                break;
            case Instrumento::STATUS_INATIVO:
                $status = 'Inativo';
                break;

            default :
                $status = $this->status;
                break;
        }
        return $status;
    }
    
    public function integranteSelecionado($integrate_id) {
        
        foreach ($this->IntegranteInstrumento as $integrante_instrumento) {
            if ($integrante_instrumento->integrante_id == $integrate_id)
                return TRUE;
        }
        
        return FALSE;
    }

}
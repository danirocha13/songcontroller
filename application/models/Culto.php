<?php

/**
 * Culto
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Culto extends DaoCulto {

    public function musicaSelecionada($musica_id) {
        foreach ($this->Repertorio as $musica) {
            if ($musica->musica_id == $musica_id)
                return TRUE;
        }
        return FALSE;
    }

    public function integranteSelecionado($instrumento, $integrante) {
        foreach ($this->Escala as $escala){
        if ($escala->instrumento_id == $instrumento)
            if ($escala->integrante_id == $integrante)
                return TRUE;
        }
    }

}

<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UploadUtil
 *
 * @author SBrasil-002
 */
class UploadUtil {

    /**
     * 
     * @param array $arquivo Recebe o parametro da tela ex.: $_FILES['nome_campo']
     * @param string $diretorio
     * @param string $nome
     * @return boolean Se o upload ocorrer normalmente retorna TRUE
     */
    public static function uploadFile($arquivo, $diretorio, $nome) {
        if (isset($arquivo)) {


            $dir = 'uploads/';
            if (!file_exists($dir))
                mkdir($dir);

            $subDir = $dir . $diretorio . '/';
            if (!file_exists($subDir))
                mkdir($subDir);

            $new_name = self::getFileName($arquivo, $nome);


            return move_uploaded_file($arquivo['tmp_name'], $subDir . $new_name);
        }
    }

    public static function getFileName($arquivo, $nome) {
        if ($arquivo['name'] != "") {

            $ext = strtolower(substr($arquivo['name'], -4));
            return AppUtil::gerar_link_seo($nome) . $ext;
        }

        return NULL;
    }

    public static function deleteFile($diretorio, $nome_arquivo) {
        $dir = 'uploads/';

        if (file_exists($dir)) {
            $file_dir = $dir . $diretorio . '/' . $nome_arquivo;
            if (file_exists($file_dir)) {
                unlink($file_dir);
            }
        }
    }

}

<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AppUtil
 *
 * @author SBrasil-002
 */
class AppUtil {

    //put your code here
    public static function autoload($className) {
        require_once $className . ".php";
        return true;
    }
    
    // Obtém o input, e desfaz-se dos caracteres indesejados
    public static function gerar_link_seo($input, $substitui = '-', $remover_palavras = true, $array_palavras = array()) {
        //Colocar em minúsculas, remover a pontuação
        $input = strtolower(utf8_decode($input));
        $input = strtr($input, utf8_decode('àáâãäåæçèéêëìíîïñòóôõöøùúûýýÿ'), 'aaaaaaaceeeeiiiinoooooouuuyyy');
        $resultado = trim(ereg_replace(' +', ' ', preg_replace('/[^a-zA-Z0-9\s]/', '', strtolower($input))));

        //Remover as palavras que não ajudam no SEO
        //Coloco as palavras por defeito no remover_palavras(), assim eu não esse array
        if ($remover_palavras) {
            $resultado = self::remover_palavras($resultado, $substitui, $array_palavras);
        }

        //Converte os espaços para o que o utilizador quiser
        //Normalmente um hífen ou um underscore
        return str_replace(' ', $substitui, $resultado);
    }

    private static function remover_palavras($input, $substitui, $array_palavras = array(), $palavras_unicas = true) {
        //Separar todas as palavras baseadas em espaços
        $array_entrada = explode(' ', $input);

        //Criar o array de saída
        $resultado = array();

        //Faz-se um loop às palavras, remove-se as palavras indesejadas e mantém-se as que interessam
        foreach ($array_entrada as $palavra) {
            if (!in_array($palavra, $array_palavras) && ($palavras_unica ? !in_array($palavra, $resultado) : true)) {
                $resultado[] = $palavra;
            }
        }

        return implode($substitui, $resultado);
    }

}

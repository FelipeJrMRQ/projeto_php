<?php

function traduz_prioridade($codigo) {
    $prioridade = '';
    switch ($codigo) {
        case 1:
            $prioridade = 'Baixa';
            break;
        case 2:
            $prioridade = 'Média';
            break;
        case 3:
            $prioridade = 'Alta';
        default:
            $prioridade = 'Alta';
            break;
    }
    return $prioridade;
}

function traduz_data_para_exibir($data) {
    if ($data == "" || $data == "0000-00-00") {
        return "";
    }

    $dados = explode("-", $data);

    if (count($dados) != 3) {
        return $data;
    }

    $dataExibir = "{$dados[2]}/{$dados[1]}/{$dados[0]}";

    return $dataExibir;
}

function traduz_data_para_banco($data) {

    if ($data == "") {
        return "";
    }

    $dados = explode("/", $data);

    if (count($dados) != 3) {
        return $data;
    }

    $dataMysql = "{$dados[2]}-{$dados[1]}-{$dados[0]}";

    return $dataMysql;
}

function traduz_tarefa_concluida($concluida) {
    if ($concluida == 1) {
        return "Sim";
    } else {
        return "Não";
    }
}

function tem_post() {
    if (count($_POST) > 0) {
        return true;
    } else {
        return false;
    }
}

/**
 * Realiza a validação da data para o formato nacional
 * dd/mm/aaaa
 * @param type $data
 * @return boolean
 * O retorno será verdareiro ou falso de acordo com os
 * parametros passados pelo usuário
 */
function validar_data($data) {
    $padrao = '/^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4}$/';
    $resultado = preg_match($padrao, $data);

    if (!$resultado) {
        return false;
    }

    $dados = explode("/", $data);

    $dia = $dados[0];
    $mes = $dados[1];
    $ano = $dados[2];

    $resultado = checkdate($mes, $dia, $ano);

    return $resultado;
}

/**
 * Esta função recebe um anexo e o salva em
 * uma pasta no servidor
 * este $anexo pode ser do tipo (zip/pdf)
 */
function tratar_anexo($anexo) {
    $padrao = '/^.+(\.pdf|\.zip)$/';
    $resultado = preg_match($padrao, $anexo['name']);

    if (!$resultado) {
        return false;
    }
    move_uploaded_file($anexo['tmp_name'], "anexos/{$anexo['name']}");
    return true;
}


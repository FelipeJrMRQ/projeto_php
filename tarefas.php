<?php

include "banco.php";
include "ajudantes.php";

$exibir_tabela = true;
$tem_erros = false;
$erros_validacao = array();

if (tem_post()) {
    $tarefa = array();

    if (isset($_POST['nome']) && strlen($_POST['nome']) > 0) {
        $tarefa['nome'] = $_POST['nome'];
    } else {
        $tem_erros = true;
        $erros_validacao['nome'] = 'O nome da tarefa é obrigatorio';
    }

    if (isset($_POST['descricao'])) {
        $tarefa['descricao'] = $_POST['descricao'];
    } else {
        $tarefa['descricao'] = '';
    }

    if (isset($_POST['prazo'])) {
        if (validar_data($_POST['prazo'])) {
            $tarefa['prazo'] = traduz_data_para_banco($_POST['prazo']);
        } else {
            $tem_erros = true;
            $erros_validacao['prazo'] = 'O prazo não é uma data valida';
        }
    } else {
        $tarefa['prazo'] = '';
    }

    $tarefa['prioridade'] = $_POST['prioridade'];

    if (isset($_POST['concluida'])) {
        $tarefa['concluida'] = 1;
    } else {
        $tarefa['concluida'] = 0;
    }

    if (!$tem_erros) {
        gravar_tarefa($conexao, $tarefa);
        header('Location: tarefas.php');
        die();
    }
}

$lista_tarefas = buscar_tarefas($conexao);


$tarefa = array(
    'id' => 0,
    'nome' => '',
    'descricao' => '',
    'prazo' => '',
    'prioridade' => 1,
    'concluida' => '',
);

include "template.php";

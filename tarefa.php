<?php
include 'banco.php';
include 'ajudantes.php';

$tem_erros = false;
$erros_validacao = array();

if(tem_post()){
    
    //Upload de arquivos
}

//Realiza a busca de uma única tarefa
$tarefa = buscar_tarefa($conexao, $_GET['id']);

include 'template_tarefa.php';


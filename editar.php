<?php 

session_start();

include "banco.php";
include "ajudantes.php";

$exibir_tabela = false;
$tem_erros = false;
$erros_validacao = array();

if(isset($_POST['nome'] ) && $_POST['nome'] != ''){
	$tarefa = array();

	$tarefa['id'] = $_POST['id'];

	$tarefa['nome'] = $_POST['nome'];

	if(isset($_POST['descricao'])){
		$tarefa['descricao'] = $_POST['descricao'];
	}else{
		$tarefa['descricao'] ='';
	}

	if(isset($_POST['prazo'])){
		$tarefa['prazo'] = traduz_data_para_banco($_POST['prazo']);
	}else{
		$tarefa['prazo'] = '';
	}

	$tarefa['prioridade'] = $_POST['prioridade'];

	if(isset($_POST['concluida'])){
		$tarefa['concluida'] = 1;
	}else{
		$tarefa['concluida'] = 0;
	}

	editar_tarefa($conexao, $tarefa);
}

$tarefa = buscar_tarefa($conexao ,$_GET['id']);

include "template.php";



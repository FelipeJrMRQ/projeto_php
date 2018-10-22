<?php

$bd_servidor = '127.0.0.1';
$bd_user = 'root';
$bd_password = '';
$bd_Banco = 'bd_tarefas';

$conexao = mysqli_connect($bd_servidor, $bd_user, $bd_password, $bd_Banco);

if (mysqli_connect_errno($conexao)) {
    echo "Problemas ao tentar se conectar ao banco de dados";
    die();
}

function buscar_tarefas($conexao) {
    $sqlBusca = 'SELECT * FROM tarefas';
    $resultado = mysqli_query($conexao, $sqlBusca);

    $tarefas = array();

    while ($tarefa = mysqli_fetch_assoc($resultado)) {
        $tarefas[] = $tarefa;
    }
    return $tarefas;
}

//felipe

function gravar_tarefa($conexao, $tarefa) {
    $sqlGravar = "INSERT INTO 
	tarefas (nome, descricao, prioridade, prazo, concluida) 
	VALUES 
	(
	'{$tarefa['nome']}', 
	'{$tarefa['descricao']}',
	 {$tarefa['prioridade']},
	'{$tarefa['prazo']}',
	 {$tarefa['concluida']}
	)
	";
    mysqli_query($conexao, $sqlGravar);
}

function buscar_tarefa($conexao, $id) {
    $sqlBusca = 'SELECT * FROM tarefas WHERE id = ' . $id;
    $resultado = mysqli_query($conexao, $sqlBusca);
    return mysqli_fetch_assoc($resultado);
}

function editar_tarefa($conexao, $tarefa) {
    $sqlEditar = "
	UPDATE tarefas SET 
	nome 		= '{$tarefa['nome']}',
	descricao 	= '{$tarefa['descricao']}',
	prioridade 	=  {$tarefa['prioridade']},
	prazo 		= '{$tarefa['prazo']}',
	concluida 	=  {$tarefa['concluida']}
	WHERE id 	=  {$tarefa['id']}
	";
    mysqli_query($conexao, $sqlEditar);
    header('Location: tarefas.php');
    die();
}

function remover_tarefa($conexao, $id) {
    $sqlRemover = "DELETE FROM tarefas WHERE id = {$id}";
    mysqli_query($conexao, $sqlRemover);
}

<?php 
//Realizar a remoção de um item da tabela de tarefas
include "banco.php";

remover_tarefa($conexao, $_GET['id']);

header('Location: tarefas.php');

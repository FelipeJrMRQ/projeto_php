<?php 

session_start();

include "banco.php";
include "ajudantes.php";

$exibir_tabela = false;
$tem_erros = false;
$erros_validacao = array();

if(tem_post()){
	$tarefa = array();

	$tarefa['id'] = $_POST['id'];

	if(isset($_POST['nome']) && strlen($_POST['nome'])>0){
            $tarefa['nome'] = $_POST['nome'];
        }else{
            $tem_erros = true;
            $erros_validacao['nome'] = "O nome da tarefa é obrigatório";
        }

	if(isset($_POST['descricao'])){
		$tarefa['descricao'] = $_POST['descricao'];
	}else{
		$tarefa['descricao'] ='';
	}

	if(isset($_POST['prazo']) && strlen($_POST['prazo']) >0){
            if(validar_data($_POST['prazo'])){
                $tarefa['prazo'] = traduz_data_para_banco($_POST['prazo']);
            }else{
                $tem_erros = true;
                $erros_validacao['prazo'] = "A data digitada é inválida!";
            }
        }

	$tarefa['prioridade'] = $_POST['prioridade'];

	if(isset($_POST['concluida'])){
		$tarefa['concluida'] = 1;
	}else{
		$tarefa['concluida'] = 0;
	}
        

	if(!$tem_erros){
            editar_tarefa($conexao, $tarefa);
            header('Location: tarefas.php');
            die();
        }
}

$tarefa = buscar_tarefa($conexao ,$_GET['id']);


include "template.php";



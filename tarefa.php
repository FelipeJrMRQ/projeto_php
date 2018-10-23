<?php
include 'banco.php';
include 'ajudantes.php';

$tem_erros = false;
$erros_validacao = array();

if(tem_post()){
    //Upload de arquivos
    $tarefa_id = $_POST['tarefa_id'];
    
    if(!isset($_FILES['anexo'])){
        $tem_erros = true;
        $erros_validacao['anexo'] ='Voce deve selecionar um arquivo';
    }else{
        if(tratar_anexo($_FILES['anexo'])){
            $anexo = array();
            $anexo['tarefa_id'] =$tarefa_id;
            $anexo['nome'] = $_FILES['anexo']['name'];
            $anexo['arquivo'] = $_FILES['anexo']['name'];
        }else{
            $tem_erros = true;
            $erros_validacao['anexo'] = 'Envie anexos apenas no formaro pfd ou zip';
        }
    }
    
    if(!$tem_erros){
        gravar_anexo($conexao, $anexo);
    }
}

//Realiza a busca de uma única tarefa
$tarefa = buscar_tarefa($conexao, $_GET['id']);

include 'template_tarefa.php';


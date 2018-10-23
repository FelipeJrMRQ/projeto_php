<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h2>Tarefa: <?php echo $tarefa['nome']; ?></h2>
        <p>
            <a href="tarefas.php">Voltar para lista de tarefas</a>
        </p>
        <p>
            <strong>Concluida:</strong>
            <?php echo traduz_tarefa_concluida($tarefa['concluida']) ?>
        </p>
        <p>
            <strong>Descricao:</strong>
            <?php echo nl2br($tarefa['descricao']); ?>
        </p>
        <P>
            <strong>Prioridade:</strong>
            <?php echo traduz_prioridade($tarefa['prioridade']) ?>
        </P>
        <h3>Anexos:_</h3>

        <form action="" method="POST" enctype="multipart/form-data">
            <fieldset>
                <legend>Novo anexo:</legend>
                <input type="hidden" name="tarefa_id" value="<?php echo $tarefa['id'] ?>"/>
                <label>
                    <?php if ($tem_erros && isset($erros_validacao['anexo'])): ?>
                        <span class="erro">
                            <?php echo $erros_validacao['anexo']; ?>
                        </span>
                    <?php endif; ?>
                    
                    <input type="file" name="anexo">
                </label>
                
                <input type="submit" value="Cadastrar"/>
            </fieldset>
        </form>
    </body>
</html>


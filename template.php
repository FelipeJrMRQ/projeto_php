<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
        <meta charset="utf-8">
        <title>Tarefas</title>
    </head>
    <body>
        
        <h3>Gerenciador de tarefas</h3>
        <?php include("formulario.php") ?>

        <br>
        <?php if ($exibir_tabela) : ?>
            <?php include('tabela.php'); ?>
        <?php endif; ?>


    </body>
</html>
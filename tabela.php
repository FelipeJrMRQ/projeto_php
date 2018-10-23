<!--
O códido abaixo é responsável pela exibição dos dados na tebela.

-->
<table class="felipe">
    <thead>
        <tr>
            <th>Tarefas</th>
            <th>Descrição</th>
            <th>Prazo</th>
            <th>Prioridade</th>
            <th>Conluida</th>
            <th>Opções</th>
        </tr>
    </thead>
    <?php foreach ($lista_tarefas as $tarefa) : ?>
        <tr>
            <td>
                <a href="tarefa.php?id=<?php echo $tarefa['id'] ?>">
                    <?php echo $tarefa['nome']; ?> 
                </a>
            </td>
            <td><?php echo $tarefa['descricao']; ?> </td>
            <td><?php echo traduz_data_para_exibir($tarefa['prazo']); ?> </td> 
            <td>
                <?php
                if ($tarefa['prioridade'] == 1) {
                    echo "Baixa";
                }
                if ($tarefa['prioridade'] == 2) {
                    echo "Média";
                }
                if ($tarefa['prioridade'] == 3) {
                    echo "Alta";
                }
                ?> 
            </td>
            <td>
                <?php echo traduz_tarefa_concluida($tarefa['concluida']); ?> 
            </td>
            <td>
                <a href="editar.php?id=<?php echo $tarefa['id'] ?>">Editar</a>
                <a href="remover.php?id=<?php echo $tarefa['id'] ?>">Remover</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
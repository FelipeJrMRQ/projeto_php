<form method="POST" >	
    <input type="hidden" name="id" value="<?php echo $tarefa['id']; ?> "/>

    <br>
    <label>Tarefa:</label>
    <br>
    <?php if ($tem_erros && isset($erros_validacao['nome'])) : ?>
        <span class="erro">
            <?php echo $erros_validacao['nome'] ?>
        </span>
        <br>
    <?php endif ?>
    <input type="text" name="nome"  value="<?php echo($tarefa['nome']) ?>">

    <br>
    <label>Descrição</label>
    <br>
    <textarea name="descricao"  rows="2">
        <?php echo($tarefa['descricao']) ?>
    </textarea>

    <br>
    <label>Prazo<br>
        <?php if ($tem_erros && isset($erros_validacao['prazo'])) : ?>
            <span class="erro">
                <?php echo $erros_validacao['prazo']; ?>
            </span>
        <?php endif; ?>
    </label>
    <br>
    <input type="text" name="prazo" value="<?php echo traduz_data_para_exibir($tarefa['prazo']) ?>"/>

    <br>
    <label>Prioridade</label>

    <input type="radio" name="prioridade" id="customRadioBaixa" value="1"
    <?php
    echo ($tarefa['prioridade'] == 1) ? 'checked' : '';
    ?>
           />
    <label for="customRadioBaixa" >Baixa</label>

    <input type="radio" name="prioridade" id="customRadioMedia" value="2"
    <?php
    echo ($tarefa['prioridade'] == 2) ? 'checked' : '';
    ?>
           />
    <label for="customRadioMedia" class="custom-control-label">Média</label>

    <input type="radio" name="prioridade" id="customRadioAlta"  value="3"
    <?php
    echo ($tarefa['prioridade'] == 1) ? 'checked' : '';
    ?>
           />
    <label for="customRadioAlta" >Alta</label>

    <br>
    <br>

    <input type="checkbox" name="concluida" value="1"  id="chek"
           <?php
           echo ($tarefa['concluida'] == 1) ? 'checked' : '';
           ?>
           >
    <label for="chek">Tarefa concluída</label>
    <input type="submit" value="<?php echo ($tarefa['id'] > 0) ? 'Atualizar' : 'Cadastrar' ?>">
</form>
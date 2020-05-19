<h2><?php echo isset($id) ? 'Editando noticia' : "Nova noticia" ?></h2>

<?php echo \Config\Services::validation()->listErrors(); ?>

<form action="/clientes/store" method="post">
    <label>
        Nome
        <input
         type="text" 
         name="nome"
          value="<?php echo isset($nome) ? $nome : set_value('nome') ?>" />
    </label>
    <label>
        CPF
        <input type="text" name="cpf"
        value="<?php echo isset($cpf) ? $cpf : set_value('cpf')  ?>" />
    </label>

    <input type="hidden" name="id" value="<?php echo isset($id) ? $id : set_value('id') ?>" />

    <input type="submit" value="salvar" />
</form>
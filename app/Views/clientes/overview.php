<a href="/clientes/create"> Cadastrar ciente</a>
<table class="table">

    <tr>
        <th>Nome</th>
        <th>CPF</th>
        <th>Ação</th>
    </tr>

    <?php if (!empty($clientes) && is_array($clientes)) : ?>
        <?php foreach ($clientes as $cliente_item) : ?>
            <tr>
                <td><a href="/clientes/view/<?= $cliente_item['id'] ?>"> <?= $cliente_item['nome'] ?></a></td>
                <td><?= $cliente_item['cpf'] ?></td>
                <td>
                    <a href="/clientes/edit/<?= $cliente_item['id'] ?>">Editar</a> -
                    <a href="/clientes/delete/<?= $cliente_item['id'] ?>" onclick="return confirm('Deseja mesmo excluir?');">Deletar</a>
                </td>
            </tr>
        <?php endforeach; ?>

    <?php else : ?>
        <tr>
            <td>Nenhuma notícia encontrada</td>

        <?php endif; ?>
        </tr>
</table>
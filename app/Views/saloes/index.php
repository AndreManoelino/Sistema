<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Salões</title>
    <link rel="stylesheet" href="/css/index.css">
</head>
<body>
    <div class="container">
        <h1>Lista de Salões</h1>

        <a href="/saloes/novo" class="btn">Novo Salão</a>

        <?php if (!empty($saloes)) : ?>
            <ul>
                <?php foreach ($saloes as $salao) : ?>
                    <li>
                        <strong><?= esc($salao['nome']) ?></strong> - <?= esc($salao['rua']) ?>
                        <a href="/saloes/editar/<?= $salao['id'] ?>">Editar</a> |
                        <a href="/saloes/deletar/<?= $salao['id'] ?>" onclick="return confirm('Deseja realmente deletar?')">Deletar</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else : ?>
            <p>Nenhum salão cadastrado.</p>
        <?php endif; ?>
    </div>
</body>
</html>

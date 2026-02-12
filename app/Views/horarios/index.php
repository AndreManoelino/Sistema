<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Horários do Salão</title>
    <link rel="stylesheet" href="/css/horarios/index.css">
</head>
<body>

<div class="container">
    <h1>Horários do Salão: <?= esc($salao['nome']) ?></h1>

    <a href="/horarios/create/<?= $salao['id'] ?>" class="btn">Novo Horário</a>

    <h2>Datas Cadastradas</h2>

    <?php if (!empty($datas)) : ?>
        <table>
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Dia</th>
                    <th>Tipo</th>
                    <th>Horário</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($datas as $d) : 
                    $timestamp = strtotime($d['data']);
                    $dias = ["Domingo","Segunda","Terça","Quarta","Quinta","Sexta","Sábado"];
                ?>
                    <tr>
                        <td><?= date('d/m/Y', $timestamp) ?></td>
                        <td><?= $dias[date('w',$timestamp)] ?></td>
                        <td><?= $d['tipo'] == 'bloqueado' ? 'Bloqueado' : 'Normal' ?></td>
                        <td>
                            <?php if($d['tipo'] == 'normal'): ?>
                                <?= esc($d['hora_abertura']) ?> - <?= esc($d['hora_fechamento']) ?>
                            <?php else: ?>
                                -
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="/horarios/edit-data/<?= $d['id'] ?>">Editar</a> |
                            <a href="/horarios/delete-data/<?= $d['id'] ?>" onclick="return confirm('Deseja excluir?')">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Nenhuma data cadastrada.</p>
    <?php endif; ?>

    <a href="/saloes/menu/dono/<?= $salao['id'] ?>" class="voltar">Voltar</a>
</div>

</body>
</html>

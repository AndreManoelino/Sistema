<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Menu do Salão</title>
    <link rel="stylesheet" href="/css/menu.css">
</head>
<body>
    <div class="container">
        <h1>Menu do Salão: <?= esc($salao['nome']) ?></h1>

        <ul>
            <li><a href="#">Gerenciar Horários</a></li>
            <li><a href="#">Barbeiros</a></li>
            <li><a href="#">Produtos / Serviços</a></li>
            <li><a href="#">Agendar </a></li>
            <li><a href="#">Agendamentos</a></li>
            <li><a href="/saloes/gerar-url/<?= $salao['id'] ?>"target=_blank>Gerar URL Cliente</a></li>
        </ul>

        <a href="/saloes" class="voltar">Voltar à lista de salões</a>
    </div>
</body>
</html>

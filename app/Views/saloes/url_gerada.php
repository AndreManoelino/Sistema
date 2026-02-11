<div class="container">
    <h1>URLs do Salão: <?= esc($salao['nome']) ?></h1>

    <p><strong>Menu do Dono:</strong> <a href="<?= esc($urlDono) ?>" target="_blank"><?= esc($urlDono) ?></a></p>
    <p><strong>Menu do Cliente:</strong> <a href="<?= esc($urlCliente) ?>" target="_blank"><?= esc($urlCliente) ?></a></p>

    <a href="/saloes" class="voltar">Voltar à lista de salões</a>
</div>

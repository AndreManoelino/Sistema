<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Produtos / Serviços</title>
    <link rel="stylesheet" href="<?= base_url('css/servico.css') ?>">
</head>
<body>

<div class="container">

    <!-- TÍTULO E VOLTAR -->
    <div class="topo">
        <h1>Produtos / Serviços</h1>

        <a href="<?= base_url('saloes/menu/dono/' . $salao_id) ?>" class="btn-voltar">
            ← Voltar ao Menu
        </a>
    </div>

    <!-- CADASTRAR BARBEIRO -->
    <section class="card">
        <h2>Cadastrar Barbeiro</h2>

        <form method="post" action="<?= base_url('servicos/store-barbeiro') ?>">
            <input type="hidden" name="salao_id" value="<?= esc($salao_id) ?>">

            <div class="form-group">
                <input type="text" name="nome" placeholder="Nome do Barbeiro" required>
            </div>

            <button type="submit" class="btn">Cadastrar Barbeiro</button>
        </form>
    </section>

    <!-- CADASTRAR SERVIÇO -->
    <section class="card">
        <h2>Cadastrar Serviço</h2>

        <form method="post"
              action="<?= base_url('servicos/store-servico') ?>"
              enctype="multipart/form-data">

            <input type="hidden" name="salao_id" value="<?= esc($salao_id) ?>">

            <div class="grid-form">

                <input type="text" name="nome" placeholder="Nome do Serviço" required>

                <input type="number" step="0.01" name="valor" placeholder="Valor (R$)" required>

                <input type="number" name="tempo_execucao" placeholder="Tempo Execução (min)" required>

                <input type="number" name="tempo_tolerancia" placeholder="Tolerância (min)" value="15">

                <select name="barbeiro_id" required>
                    <option value="">Selecione o Barbeiro</option>
                    <?php foreach($barbeiros as $b): ?>
                        <option value="<?= $b['id'] ?>">
                            <?= esc($b['nome']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <input type="file" name="foto">
            </div>

            <button type="submit" class="btn">Cadastrar Serviço</button>
        </form>
    </section>

    <!-- LISTA DE SERVIÇOS -->
    <section class="card">
        <h2>Serviços Cadastrados</h2>

        <?php if (!empty($servicos)): ?>
            <div class="lista-servicos">

                <?php foreach($servicos as $s): ?>
                    <div class="servico-card">

                        <!-- FOTO -->
                        <div class="servico-foto">
                            <?php if (!empty($s['foto'])): ?>
                                <img src="<?= base_url('uploads/servicos/' . $s['foto']) ?>" alt="Foto Serviço">
                            <?php else: ?>
                                <div class="sem-foto">Sem Foto</div>
                            <?php endif; ?>
                        </div>

                        <!-- DETALHES -->
                        <div class="servico-detalhes">
                            <h3><?= esc($s['nome']) ?></h3>

                            <div class="linha">
                                <span class="label">Valor:</span>
                                <span class="valor">
                                    R$ <?= number_format($s['valor'], 2, ',', '.') ?>
                                </span>
                            </div>

                            <div class="linha">
                                <span class="label">Barbeiro:</span>
                                <span><?= esc($s['barbeiro_nome']) ?></span>
                            </div>

                            <div class="linha">
                                <span class="label">Tempo:</span>
                                <span><?= esc($s['tempo_execucao']) ?> min</span>
                            </div>
                        </div>

                    </div>
                <?php endforeach; ?>

            </div>
        <?php else: ?>
            <p class="vazio">Nenhum serviço cadastrado ainda.</p>
        <?php endif; ?>
    </section>

</div>

</body>
</html>

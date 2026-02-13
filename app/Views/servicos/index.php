<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Produtos / Serviços</title>
    <link rel="stylesheet" href="<?= base_url('css/servico.css') ?>">
</head>
<body>

<div class="painel">

    <!-- TOPO -->
    <div class="topo">
        <h1>Produtos / Serviços</h1>
        <a href="<?= base_url('saloes/menu/dono/' . $salao_id) ?>" class="btn-voltar">
            ← Voltar
        </a>
    </div>

    <!-- ÁREA SUPERIOR -->
    <div class="area-superior">

        <!-- CADASTRAR BARBEIRO -->
        <div class="box">
            <h2>Novo Barbeiro</h2>

            <form method="post" action="<?= base_url('servicos/store-barbeiro') ?>" enctype="multipart/form-data">
                <input type="hidden" name="salao_id" value="<?= esc($salao_id) ?>">

                <input type="text" name="nome" placeholder="Nome do Barbeiro" required>

                <input type="file" name="foto">

                <button type="submit" class="btn">Cadastrar</button>
            </form>
        </div>

        <!-- CADASTRAR SERVIÇO -->
        <div class="box">
            <h2>Novo Serviço</h2>

            <form method="post"
                  action="<?= base_url('servicos/store-servico') ?>"
                  enctype="multipart/form-data">

                <input type="hidden" name="salao_id" value="<?= esc($salao_id) ?>">

                <input type="text" name="nome" placeholder="Nome do Serviço" required>

                <input type="number" step="0.01" name="valor" placeholder="Valor (R$)" required>

                <input type="number" name="tempo_execucao" placeholder="Tempo (min)" required>

                <input type="number" name="tempo_tolerancia" value="15">

                <select name="barbeiro_id" required>
                    <option value="">Selecione o Barbeiro</option>
                    <?php foreach($barbeiros as $b): ?>
                        <option value="<?= $b['id'] ?>">
                            <?= esc($b['nome']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <input type="file" name="foto">

                <button type="submit" class="btn">Cadastrar</button>
            </form>
        </div>

    </div>

    <!-- LISTA DE BARBEIROS -->
    <div class="box">
        <h2>Barbeiros</h2>

        <div class="lista-barbeiros">
            <?php foreach($barbeiros as $b): ?>
                <div class="barbeiro-card">

                    <div class="barbeiro-info">
                        <div class="foto-mini">
                            <?php if(!empty($b['foto'])): ?>
                                <img src="<?= base_url('uploads/barbeiros/'.$b['foto']) ?>">
                            <?php else: ?>
                                <div class="sem-foto-mini">?</div>
                            <?php endif; ?>
                        </div>

                        <span><?= esc($b['nome']) ?></span>
                    </div>

                    <div class="acoes">
                        <a href="<?= base_url('servicos/edit-barbeiro/'.$b['id']) ?>" class="btn-editar">
                            Editar
                        </a>

                        <a href="<?= base_url('servicos/delete-barbeiro/'.$b['id']) ?>"
                        class="btn-deletar"
                        onclick="return confirm('Tem certeza que deseja excluir este serviço?')">
                            Excluir
                        </a>
                    </div>

                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- LISTA DE SERVIÇOS -->
    <div class="box">
        <h2>Serviços</h2>

        <div class="lista-servicos">
            <?php foreach($servicos as $s): ?>
                <div class="servico-card">

                    <div class="servico-foto">
                        <?php if (!empty($s['foto'])): ?>
                            <img src="<?= base_url('uploads/servicos/' . $s['foto']) ?>" class="img-click">
                        <?php else: ?>
                            <div class="sem-foto">Sem Foto</div>
                        <?php endif; ?>
                    </div>

                    <div class="servico-detalhes">
                        <h3><?= esc($s['nome']) ?></h3>
                        <p><strong>R$ <?= number_format($s['valor'], 2, ',', '.') ?></strong></p>
                        <p><?= esc($s['barbeiro_nome']) ?></p>
                        <p><?= esc($s['tempo_execucao']) ?> min</p>
                    </div>

                    <div class="acoes">
                        <a href="<?= base_url('servicos/update-servico/'.$s['id']) ?>" class="btn-editar">
                            Editar
                        </a>

                        <a href="<?= base_url('servicos/delete-servico/'.$s['id']) ?>"
                        class="btn-deletar"
                        onclick="return confirm('Tem certeza que deseja excluir este serviço?')">
                            Excluir
                        </a>
                    </div>

                </div>
            <?php endforeach; ?>
        </div>
    </div>

</div>


<div class="modal-img" id="modalImg">
    <img id="imgAmpliada">
</div>

<script>
document.querySelectorAll('.img-click').forEach(img => {
    img.addEventListener('click', () => {
        document.getElementById('imgAmpliada').src = img.src;
        document.getElementById('modalImg').classList.add('active');
    });
});

document.getElementById('modalImg').addEventListener('click', () => {
    document.getElementById('modalImg').classList.remove('active');
});
</script>

</body>
</html>

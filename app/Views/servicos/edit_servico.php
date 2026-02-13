<h2>Editar Serviço</h2>

<form method="post"
      action="<?= base_url('servicos/update-servico/'.$servico['id']) ?>"
      enctype="multipart/form-data">

    <input type="text" name="nome"
           value="<?= esc($servico['nome']) ?>" required>

    <input type="number" step="0.01"
           name="valor"
           value="<?= esc($servico['valor']) ?>" required>

    <input type="number"
           name="tempo_execucao"
           value="<?= esc($servico['tempo_execucao']) ?>" required>

    <input type="number"
           name="tempo_tolerancia"
           value="<?= esc($servico['tempo_tolerancia']) ?>">

    <select name="barbeiro_id" required>
        <?php foreach($barbeiros as $b): ?>
            <option value="<?= $b['id'] ?>"
                <?= $b['id'] == $servico['barbeiro_id'] ? 'selected' : '' ?>>
                <?= esc($b['nome']) ?>
            </option>
        <?php endforeach; ?>
    </select>

    <input type="file" name="foto">

    <?php if(!empty($servico['foto'])): ?>
        <img src="<?= base_url('uploads/servicos/'.$servico['foto']) ?>" width="120">
    <?php endif; ?>

    <button type="submit">Atualizar</button>
</form>

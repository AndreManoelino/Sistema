<h2>Editar Barbeiro</h2>

<form method="post"
      action="<?= base_url('servicos/update-barbeiro/'.$barbeiro['id']) ?>"
      enctype="multipart/form-data">

    <input type="text" name="nome"
           value="<?= esc($barbeiro['nome']) ?>" required>

    <input type="file" name="foto">

    <?php if(!empty($barbeiro['foto'])): ?>
        <img src="<?= base_url('uploads/barbeiros/'.$barbeiro['foto']) ?>" width="120">
    <?php endif; ?>

    <button type="submit">Atualizar</button>
</form>

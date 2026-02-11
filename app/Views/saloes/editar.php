<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Salão</title>
    <link rel="stylesheet" href="/css/editar.css">
</head>
<body>
    <div class="container">
        <h1>Editar Salão</h1>

        <form action="/saloes/atualizar/<?= $salao['id'] ?>" method="post">
            <label>Nome:</label>
            <input type="text" name="nome" value="<?= esc($salao['nome']) ?>" required>

            <label>Email:</label>
            <input type="email" name="email" value="<?= esc($salao['email']) ?>" required>

            <label>Telefone:</label>
            <input type="text" name="telefone" value="<?= esc($salao['telefone']) ?>" required>
            <label>Rua:</label>
            <input type="text" name="rua" value="<?= isset($salao['rua']) ? esc($salao['rua']) : '' ?>" required>

            <label>Bairro:</label>
            <input type="text" name="bairro" value="<?= isset($salao['bairro']) ? esc($salao['bairro']) : '' ?>" required>

            <label>Cidade:</label>
            <input type="text" name="cidade" value="<?= isset($salao['cidade']) ? esc($salao['cidade']) : '' ?>" required>

            <label>CEP:</label>
            <input type="text" name="cep" value="<?= isset($salao['cep']) ? esc($salao['cep']) : '' ?>" required>

            <button type="submit">Atualizar</button>
        </form>

        <a href="/saloes" class="voltar">Voltar à lista</a>
    </div>
</body>
</html>

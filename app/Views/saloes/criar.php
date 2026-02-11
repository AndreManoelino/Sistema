<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Novo Salão</title>
    <link rel="stylesheet" href="/css/criar.css">
</head>
<body>
    <div class="container">
        <h1>Cadastrar Novo Salão</h1>

        <form action="/saloes/salvar" method="post">
            <label>Nome:</label>
            <input type="text" name="nome" placeholder="Digite o nome do salão" required>

            <label>Email:</label>
            <input type="email" name="email" placeholder="Digite o email" required>

            <label>Telefone:</label>
            <input type="text" name="telefone" placeholder="Digite o telefone" required>
            <label>Rua:</label>
            <input type="text" name="rua" value="<?= isset($salao['rua']) ? esc($salao['rua']) : '' ?>" required>

            <label>Bairro:</label>
            <input type="text" name="bairro" value="<?= isset($salao['bairro']) ? esc($salao['bairro']) : '' ?>" required>

            <label>Cidade:</label>
            <input type="text" name="cidade" value="<?= isset($salao['cidade']) ? esc($salao['cidade']) : '' ?>" required>

            <label>CEP:</label>
            <input type="text" name="cep" value="<?= isset($salao['cep']) ? esc($salao['cep']) : '' ?>" required>

            <button type="submit">Salvar</button>
        </form>

        <a href="/saloes" class="voltar">Voltar à lista</a>
    </div>
</body>
</html>

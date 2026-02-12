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

        <div class="form-group">
            <label>Nome:</label>
            <input type="text" name="nome" placeholder="Digite o nome do salão" required>
        </div>

        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" placeholder="Digite o email" required>
        </div>

        <div class="form-group">
            <label>Telefone:</label>
            <input type="text" name="telefone" placeholder="Digite o telefone" required>
        </div>

        <div class="form-group">
            <label>Rua:</label>
            <input type="text" name="rua" 
                   value="<?= isset($salao['rua']) ? esc($salao['rua']) : 'Digite a rua' ?>" required>
        </div>

        <div class="form-group">
            <label>Bairro:</label>
            <input type="text" name="bairro" 
                   value="<?= isset($salao['bairro']) ? esc($salao['bairro']) : 'Digite o bairro' ?>" required>
        </div>

        <div class="form-group">
            <label>Cidade:</label>
            <input type="text" name="cidade" 
                   value="<?= isset($salao['cidade']) ? esc($salao['cidade']) : 'Digite a cidade' ?>" required>
        </div>

        <div class="form-group">
            <label>CEP:</label>
            <input type="text" name="cep" 
                   value="<?= isset($salao['cep']) ? esc($salao['cep']) : 'Digite o CEP' ?>" required>
        </div>

        <div class="button-area">
            <button type="submit">Salvar</button>
        </div>

    </form>

    <div style="margin-top:40px; text-align:center;">
        <a href="/saloes" class="voltar">Voltar à lista</a>
    </div>

</div>

</body>
</html>

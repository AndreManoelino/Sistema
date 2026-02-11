<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Gestão de Salões</title>
    <link rel="stylesheet" href="/css/estilo.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>Gestão de Salões</h1>
            <nav>
                <a href="/saloes">Home</a>
                <a href="/saloes/novo">Novo Salão</a>
            </nav>
        </div>
    </header>

    <main class="container">
        <?= $this->renderSection('conteudo') ?>
    </main>

    <footer>
        &copy; <?= date('Y') ?> Meu Sistema
    </footer>
</body>
</html>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/horarios/editar.css">
</head>
<body></body>

<div class="container">
    <h1>Editar Data</h1>

    <form action="/horarios/update-data/<?= $data['id'] ?>" method="post">
        <input type="hidden" name="salao_id" value="<?= $data['salao_id'] ?>">

        <label>Data:</label>
        <input type="date" name="data" value="<?= $data['data'] ?>" required>

        <label>Tipo:</label>
        <select name="tipo">
            <option value="normal" <?= $data['tipo']=='normal'?'selected':'' ?>>Normal</option>
            <option value="bloqueado" <?= $data['tipo']=='bloqueado'?'selected':'' ?>>Bloqueado</option>
        </select>

        <label>Hora Abertura:</label>
        <input type="time" name="hora_abertura" value="<?= $data['hora_abertura'] ?>">

        <label>Hora Fechamento:</label>
        <input type="time" name="hora_fechamento" value="<?= $data['hora_fechamento'] ?>">

        <button type="submit">Atualizar</button>
    </form>

    <a href="/horarios/<?= $data['salao_id'] ?>">Voltar</a>
</div>

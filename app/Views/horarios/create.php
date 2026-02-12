<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Criar Horário</title>
    <link rel="stylesheet" href="/css/horarios/create.css">
</head>
<body>

<div class="container">
    <h1>Novo Horário</h1>

    <form action="/horarios/store-data" method="post">
        <input type="hidden" name="salao_id" value="<?= $salao_id ?>">

        <div class="form-group">
            <label>Selecione a Data:</label>
            <input type="date" name="data" id="data" required>
        </div>

        <div class="form-group">
            <label>Dia da Semana:</label>
            <input type="text" id="dia_semana_texto" readonly>
            <input type="hidden" name="dia_semana" id="dia_semana">
        </div>

        <div class="form-group">
            <label>Tipo:</label>
            <select name="tipo" id="tipo">
                <option value="normal">Horário Normal</option>
                <option value="bloqueado">Bloquear Dia</option>
            </select>
        </div>

        <div class="form-group horario-group">
            <label>Hora de Abertura:</label>
            <input type="time" name="hora_abertura">
        </div>

        <div class="form-group horario-group">
            <label>Hora de Fechamento:</label>
            <input type="time" name="hora_fechamento">
        </div>

        <button type="submit" class="btn">Salvar</button>
    </form>

    <a href="/horarios/<?= $salao_id ?>" class="voltar">Voltar</a>
</div>

<script>
const dias = ["Domingo","Segunda-feira","Terça-feira","Quarta-feira","Quinta-feira","Sexta-feira","Sábado"];

document.getElementById('data').addEventListener('change', function() {

    const partes = this.value.split('-');
    const data = new Date(partes[0], partes[1] - 1, partes[2]);

    const dia = data.getDay();

    document.getElementById('dia_semana_texto').value = dias[dia];
    document.getElementById('dia_semana').value = dia;
});



document.getElementById('data').addEventListener('change', function() {
    const partes = this.value.split('-');
    const data = new Date(partes[0], partes[1] - 1, partes[2]);


    document.getElementById('dia_semana_texto').value = dias[dia];
    document.getElementById('dia_semana').value = dia;
});

document.getElementById('tipo').addEventListener('change', function(){
    const horarioFields = document.querySelectorAll('.horario-group');

    if(this.value === 'bloqueado'){
        horarioFields.forEach(el => el.style.display = 'none');
    } else {
        horarioFields.forEach(el => el.style.display = 'block');
    }
});
</script>

</body>
</html>

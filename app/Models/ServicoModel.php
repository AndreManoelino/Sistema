<?php

namespace App\Models;

use CodeIgniter\Model;

class ServicoModel extends Model
{
    protected $table = 'servicos';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'salao_id',
        'barbeiro_id',
        'nome',
        'valor',
        'tempo_execucao',
        'tempo_tolerancia',
        'foto'
    ];
}

<?php

namespace App\Models;

use CodeIgniter\Model;

class HorarioDataModel extends Model
{
    protected $table      = 'horario_datas';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'salao_id',
        'data',
        'hora_abertura',
        'hora_fechamento',
        'tipo'
    ];

    protected $useTimestamps = true;
}

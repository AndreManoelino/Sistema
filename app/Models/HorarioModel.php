<?php

namespace App\Models;

use CodeIgniter\Model;

class HorarioModel extends Model
{
    protected $table      = 'horarios';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'salao_id',
        'dia_semana', 
        'hora_abertura', 
        'hora_fechamento'
    ];
    protected $useTimestamps = true;
}

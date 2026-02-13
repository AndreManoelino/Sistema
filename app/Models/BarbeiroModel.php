<?php

namespace App\Models;
use CodeIgniter\Model;


class BarbeiroModel extends Model
{
    protected $table ='barbeiros';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'salao_id',
        'nome','foto'

    ];
}
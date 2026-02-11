<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class Teste extends Controller
{
    public function testeConexao()
    {
        $db = \Config\Database::connect();
        var_dump($db->table('saloes')->get()->getResultArray());
    }

}


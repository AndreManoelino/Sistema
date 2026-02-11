<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddEnderecoToSaloes extends Migration
{
    public function up()
    {
        $fields = [
            'rua' => ['type' => 'VARCHAR', 'constraint' => 255],
            'bairro' => ['type' => 'VARCHAR', 'constraint' => 100],
            'cidade' => ['type' => 'VARCHAR', 'constraint' => 100],
            'cep' => ['type' => 'VARCHAR', 'constraint' => 20]
        ];

        $this->forge->addColumn('saloes', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('saloes', ['rua', 'bairro', 'cidade', 'cep']);
    }
}

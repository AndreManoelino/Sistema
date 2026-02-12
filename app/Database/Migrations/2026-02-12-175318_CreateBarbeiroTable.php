<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBarbeiroTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'SERIAL',
            ],
            'salao_id' => [
                'type' => 'INT',
                'null' => false,
            ],
            'nome' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false,
            ],
        ]);

        // adiciona campo manual para evitar aspas
        $this->forge->addField("created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP");

        $this->forge->addKey('id', true);

        $this->forge->addForeignKey(
            'salao_id',
            'saloes',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->forge->createTable('barbeiros');
    }

    public function down()
    {
        $this->forge->dropTable('barbeiros');
    }
}

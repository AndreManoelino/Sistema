<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateServicoTable extends Migration
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
            'barbeiro_id' => [
                'type' => 'INT',
                'null' => false,
            ],
            'nome' => [
                'type' => 'VARCHAR',
                'constraint' => 150,
                'null' => false,
            ],
            'valor' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => false,
            ],
            'tempo_execucao' => [
                'type' => 'INT',
                'null' => false,
            ],
            'tempo_tolerancia' => [
                'type' => 'INT',
                'default' => 15,
            ],
            'foto' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
        ]);

        $this->forge->addField("created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP");

        $this->forge->addKey('id', true);

        $this->forge->addForeignKey(
            'salao_id',
            'saloes',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->forge->addForeignKey(
            'barbeiro_id',
            'barbeiros',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->forge->createTable('servicos');
    }

    public function down()
    {
        $this->forge->dropTable('servicos');
    }
}

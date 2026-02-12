<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateHorariosTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'salao_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'dia_semana' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
            ],
            'hora_abertura' => [
                'type' => 'TIME',
            ],
            'hora_fechamento' => [
                'type' => 'TIME',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('salao_id', 'saloes', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('horarios');
    }

    public function down()
    {
        $this->forge->dropTable('horarios');
    }
}

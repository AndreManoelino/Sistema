<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateHorarioDatasTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'SERIAL',
            ],
            'salao_id' => [
                'type'       => 'INT',
            ],
            'data' => [
                'type' => 'DATE',
            ],
            'hora_abertura' => [
                'type' => 'TIME',
                'null' => true,
            ],
            'hora_fechamento' => [
                'type' => 'TIME',
                'null' => true,
            ],
            'tipo' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'default'    => 'normal',
            ],
            'created_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('salao_id', 'saloes', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('horario_datas');
    }

    public function down()
    {
        $this->forge->dropTable('horario_datas');
    }
}

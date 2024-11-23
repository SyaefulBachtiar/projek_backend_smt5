<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblMahasiswa extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_mhs' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'npm' => [
                'type'       => 'VARCHAR',
                'constraint' => '16',
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'alamat' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'tanggal_lahir' => [
                'type' => 'date',
                'null' => true,
            ],
            'jenis_kelamin' => [
                'type' => 'VARCHAR',
                'constraint' => '10',
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'foto' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'create_date' => [
                'type' => 'TIMESTAMP',
                'null' => true,
                'default' => null,
                'on_update' => 'CURRENT_TIMESTAMP'
            ],
        ]);
        $this->forge->addKey('id_mhs', true);
        $this->forge->createTable('TblMahasiswa');
    }

    public function down()
    {
        $this->forge->dropTable('TblMahasiswa');
    }
}

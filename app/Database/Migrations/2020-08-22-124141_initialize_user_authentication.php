<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Initialize_user_authentication extends Migration
{
    public function up()
    {
        //  Create user
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
                'unsigned' => true,
            ],
            'firstName' => [
                'type' => 'VARCHAR',
                'constraint' => 45,
            ],
            'lastName' => [
                'type' => 'VARCHAR',
                'constraint' => 45,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 256,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('email');
        $this->forge->createTable('user');
    }

    //--------------------------------------------------------------------

    public function down()
    {
        //
    }
}

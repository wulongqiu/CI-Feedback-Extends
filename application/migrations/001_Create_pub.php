<?php
class Migration_Create_pub extends CI_Migration {

    public function up(){

        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => '11',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'name' => array(
                'type' => 'VARCHAR',
                'constraint' => '16',
            ),
            'password' => array(
                'type' => 'VARCHAR',
                'constraint' => '128',
            ),
            'gender' => array(
                'type' => 'TINYINT',
                'constraint' => '1',
            ),
            'birthday' => array(
                'type' => 'VARCHAR',
                'constraint' => '30',
            ),
            'area' => array(
                'type' => 'INT',
                'constraint' => '10',
            ),
            'avatar' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'about' => array(
                'type' => 'TEXT',
            ),
        ));
        $this->dbforge->add_key('id');
        $this->dbforge->create_table('pub');

    }

    public function down() {
        $this->dbforge->drop_table('pub');
    }
}
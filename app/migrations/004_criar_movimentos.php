<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Criar_movimentos extends CI_Migration {

	public function up() {
		$this->dbforge->add_field([
			'id' => [
				'type'           => 'MEDIUMINT',
				'constraint'     => '8',
				'unsigned'       => TRUE,
				'auto_increment' => TRUE
			],
			'conta_origem' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
            ),
			'conta_destino' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
            ),
			'valor' => array(
				'type' => 'DECIMAL',
				'constraint' => '10,2',
			),
			'created_at datetime default current_timestamp',
            'updated_at datetime on update current_timestamp'
		]);
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('movimentos');
	}

	public function down() {
		$this->dbforge->drop_table('movimentos', TRUE);
	}
}

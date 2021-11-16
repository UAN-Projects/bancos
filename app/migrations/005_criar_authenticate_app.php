<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Criar_authenticate_app extends CI_Migration {

	public function up() {
		$this->dbforge->add_field([
			'id' => [
				'type'           => 'MEDIUMINT',
				'constraint'     => '8',
				'unsigned'       => TRUE,
				'auto_increment' => TRUE
			],
			'token' => [
				'type'       => 'VARCHAR',
				'constraint' => '254',
				'unique' 	 => TRUE,
				'null'       => TRUE
			],
			'code' => [
				'type'       => 'VARCHAR',
				'constraint' => '254',
				'default' => 'something'
			],
			'created_at datetime default current_timestamp',
            'updated_at datetime on update current_timestamp'
		]);
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('code_access');
	}

	public function down() {
		$this->dbforge->drop_table('code_access', TRUE);
	}
}

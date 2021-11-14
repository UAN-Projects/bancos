<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Criar_contas extends CI_Migration {

	public function up() {
		$this->dbforge->add_field([
			'id' => [
				'type'           => 'MEDIUMINT',
				'constraint'     => '8',
				'unsigned'       => TRUE,
				'auto_increment' => TRUE
			],
			'user_id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
            ),
			'banco_id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
            ),
			'numero' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
            ),
			'banco_numero' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
            ),
			'conta' => [
				'type'       => 'VARCHAR',
				'constraint' => '4',
				'unique' 	 => TRUE,
				'null'       => TRUE
			],
			'valor' => array(
				'type' => 'DECIMAL',
				'constraint' => '10,2',
				'default' => 0.00
			),
			'token' => [
				'type'       => 'VARCHAR',
				'constraint' => '254',
				'unique' 	 => TRUE,
				'null'       => TRUE
			],
			'created_at datetime default current_timestamp',
            'updated_at datetime on update current_timestamp'
		]);
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->add_field("CONSTRAINT CHECK (numero < 10)");
		$this->dbforge->add_field('CONSTRAINT UNIQUE (numero, banco_numero) ');
		$this->dbforge->create_table('contas');
	}

	public function down() {
		$this->dbforge->drop_table('contas', TRUE);
	}
}

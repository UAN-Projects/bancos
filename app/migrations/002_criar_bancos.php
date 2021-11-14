<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Criar_bancos extends CI_Migration {

	public function up() {
		$this->dbforge->add_field([
			'id' => [
				'type'           => 'MEDIUMINT',
				'constraint'     => '8',
				'unsigned'       => TRUE,
				'auto_increment' => TRUE
			],
			'admin' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
            ),
			'numero' => array(
                'type' => 'INT',
				'constraint'     => '1',
                'unsigned' => TRUE,
				'unique' => TRUE
            ),
			'nome' => [
				'type'       => 'VARCHAR',
				'constraint' => '250',
				'unique' => TRUE
			],
			'sigla' => [
				'type'       => 'VARCHAR',
				'constraint' => '4',
				'unique' => TRUE
			],
			'created_at datetime default current_timestamp',
            'updated_at datetime on update current_timestamp'
		]);
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->add_field("CONSTRAINT CHECK (numero < 10)");
		$this->dbforge->create_table('bancos');
	}

	public function down() {
		$this->dbforge->drop_table('bancos', TRUE);
	}
}

<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Seed extends CI_Controller
{

    public function index() 
    {
        $this->db->insert_batch('groups', [
            [
				'name'        => 'admin',
				'description' => 'Administrator'
			],
			[
				'name'        => 'members',
				'description' => 'General User'
			]
        ]);
        
		$this->db->insert_batch('code_access', [
            [
				'token'        => ''
			]
        ]);
    }

            
}
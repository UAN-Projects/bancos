<?php defined('BASEPATH') OR exit('No direct script access allowed');

require('BaseController.php');

class Errors extends BaseController {

    // public function __construct() {
    //     parent::__construct();
    //     // if($this->auth->is_logged()) redirect();
    // }

	public function index()
	{
		echo 'Error';
		// $dados = array(
        //     "titulo" => 'Erro', "view" => strtolower(__CLASS__), "method" => __FUNCTION__,
        // );
        // $this->load->view('layout', $dados);
    }
}

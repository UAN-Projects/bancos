<?php defined('BASEPATH') OR exit('No direct script access allowed');

require('BaseController.php');

class Dashboard extends BaseController {

	public function __construct() {
        parent::__construct();
        if (!$this->ion_auth->logged_in()) redirect();
		$this->data['class'] = strtolower(__CLASS__);
    }

	public function index()
	{
		$this->data['bancos'] = $this->Core_model->get('bancos');
		$this->data['contas'] = $this->Core_model->get('contas');
		$this->data['utilizadores'] = $this->Core_model->get('users');
		$this->data['movimentos'] = $this->Core_model->get('movimentos');
		$this->data['method'] = __FUNCTION__;
		$this->load->view('layout', $this->data);
	}

}

<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct() {
        parent::__construct();
        if (!$this->ion_auth->logged_in()) redirect('');
		$this->load->model('Core_model');
    }

	public function index()
	{
		$data = array('class' => strtolower(__CLASS__), 'method' => __FUNCTION__);
		$this->load->view('layout', $data);
	}

}

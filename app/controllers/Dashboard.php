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
		$this->data['method'] = __FUNCTION__;
		$this->load->view('layout', $this->data);
	}

}

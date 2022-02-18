<?php defined('BASEPATH') or exit('Acção não permitida');

class BaseController extends CI_Controller { 

    protected $data = [];

    public function __construct() {
        parent::__construct();
        $this->load->model('Core_model');
        $this->data['AppName'] = 'Bancos';
        $this->data['isAdmin'] = !$this->ion_auth->is_admin();
        $this->data['user_corrent'] = $this->ion_auth->get_user_id();
    }

}
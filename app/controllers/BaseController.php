<?php defined('BASEPATH') or exit('Acção não permitida');

class BaseController extends CI_Controller { 

    protected $data = [];

    public function __construct() {
        parent::__construct();
        $this->load->model('Core_model');
        $this->data['isAdmin'] = !$this->ion_auth->is_admin();
    }

    public function generateToken()
    {
        if(!$this->ion_auth->is_admin()) redirect();
        if ($this->Core_model->update('code_access', array('token' => base64_encode(date('Y_m_d_H_i_s'))), array('id' => '1'))) {
            $this->session->set_tempdata('notify', __CLASS__.",success, Sucesso!", 1);
        } else {
            $this->session->set_tempdata('notify', __CLASS__.",error, Erro!", 1);
        }
        redirect();
    }

}
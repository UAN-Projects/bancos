<?php defined('BASEPATH') or exit('Acção não permitida');

require('BaseController.php');

class User extends BaseController
{
    protected $table;

    public function __construct() {
        parent::__construct();
        if(!$this->ion_auth->logged_in()) redirect();
        if(!$this->ion_auth->is_admin()) redirect();
        $this->data['class'] = strtolower(__CLASS__);
        $this->table = 'users';
    }

    public function index()
    {
        $this->data['method'] = __FUNCTION__;
        $this->form_validation->set_rules('username', 'UserName', 'required');
        $this->form_validation->set_rules('first_name', 'Nome', 'required|is_unique[users.username]');
        $this->form_validation->set_rules('email', 'email', 'trim|required|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Senha', 'required|min_length[5]|max_length[255]');
        $this->form_validation->set_rules('confirm_password', 'Confirmar Senha', 'matches[password]');

        if ($this->form_validation->run()) {
            $email = $this->security->xss_clean($this->input->post('email'));
            $password = $this->security->xss_clean($this->input->post('password'));
            $username = $this->security->xss_clean($this->input->post('username'));

            $additional_data = array(
                'first_name' => $this->input->post('first_name'),
            );
            $additional_data = $this->security->xss_clean($additional_data);
            $group = array('2');

            if ($this->ion_auth->register($username, $password, $email, $additional_data, $group)) {
                $this->session->set_tempdata('notify', __CLASS__.",success, Sucesso!", 1);
            } else {
                $this->session->set_tempdata('notify', __CLASS__.",error, Erro!", 1);
            }
        }
        $this->data['items'] = $this->Core_model->get($this->table);
        $this->load->view('layout', $this->data);
    }

	public function show($id) {
        $this->data['method'] = __FUNCTION__;
        $this->data['item'] = $this->ion_auth->user($id)->row();
        $this->load->view('layout', $this->data);
	}

    public function update($id)
    {
        $this->data['method'] = 'show';
        if($this->ion_auth->user()->row()->id != $id) {
            $this->session->set_tempdata('notify', __CLASS__.",error, Não tem permissão para executar essa operação!", 1);
            redirect();
        }

        $this->form_validation->set_rules('first_name', 'Nome', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('password', 'Senha', 'min_length[5]|max_length[255]');
        $this->form_validation->set_rules('confirm_password', 'Confirmar Senha', 'matches[password]');

        if ($this->form_validation->run()) {
            $update_data = elements(array('first_name', 'email', 'password', 'username'), $this->security->xss_clean($this->input->post()));

            $password = $update_data('password');
            if(!$password) unset($update_data['password']);

            if($this->ion_auth->update($id, $update_data)) {
                $this->session->set_tempdata('notify', __CLASS__.",success, Sucesso!", 1);
            } else {
                $this->session->set_tempdata('notify', __CLASS__.",error, Erro!", 1);
            }
        }
        $this->data['item'] = $this->ion_auth->user($id)->row();
        $this->load->view('layout', $this->data);
    }


    public function delete($id)
    {
        ($this->ion_auth->delete_user($id))
        ? $this->session->set_flashdata('sucesso', 'Sucesso!') 
        : $this->session->set_flashdata('error', 'Erro na operação!');
        $this->index();
    }

    public function generateToken()
    {
        $user_id = $this->ion_auth->user()->row()->id;
        if($this->ion_auth->update($user_id, array('token' => base64_encode(date('Y_m_d_H_i_s'))))) {
            $this->session->set_tempdata('notify', __CLASS__.",success, Sucesso!", 1);
        } else {
            $this->session->set_tempdata('notify', __CLASS__.",error, Erro!", 1);
        }
        $this->show($user_id);
    }
}
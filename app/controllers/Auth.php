<?php defined('BASEPATH') OR exit('Acção não permitida');

class Auth extends CI_Controller {

    public function index() {
        if($this->ion_auth->logged_in()) redirect('dashboard');
        $data = array('class' => strtolower(__CLASS__), 'method' => __FUNCTION__);
        $this->load->view('layout_auth', $data);
    }

    public function login() {
        if($this->ion_auth->logged_in()) redirect('dashboard');
        $data = array('class' => strtolower(__CLASS__), 'method' => __FUNCTION__);

        $identity = $this->security->xss_clean($this->input->post('identity'));
        $password = $this->security->xss_clean($this->input->post('password'));

        if ($this->ion_auth->login($identity, $password)) {
            $this->session->set_tempdata('notify', __CLASS__.",login,Bem Vindo!!!", 1);
            redirect('dashboard');
        } else {
            $this->session->set_flashdata('form_error', $this->ion_auth->errors());
            redirect('auth');
        }
        redirect('auth');
    }

    public function logout() {
        $this->ion_auth->logout();
		redirect();
    }

    public function register()
    {
        if($this->ion_auth->logged_in()) redirect('dashboard');
        $data = array('class' => strtolower(__CLASS__), 'method' => __FUNCTION__);

        $this->form_validation->set_rules('username', '', 'required');
        $this->form_validation->set_rules('first_name', '', 'required|is_unique[users.username]');
        $this->form_validation->set_rules('email', '', 'trim|required|is_unique[users.email]');
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
            $group = array("2");

            if ($this->ion_auth->register($username, $password, $email, $additional_data, $group)) {
                $this->session->set_tempdata('notify', __CLASS__.",success, Bem Vindo!!!", 1);
                redirect('auth');
            } else {
                $this->session->set_tempdata('notify', __CLASS__.",error, Erro!", 1);
                redirect('auth/register');
            }
        }
		$this->load->view('layout_auth', $data);
    }

}

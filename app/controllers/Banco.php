<?php defined('BASEPATH') or exit('Acção não permitida');

require('BaseController.php');

class Banco extends BaseController
{
    protected $table;

    public function __construct() {
        parent::__construct();
        if(!$this->ion_auth->logged_in()) redirect();
        $this->data['class'] = strtolower(__CLASS__);
        $this->table = 'bancos';
    }

    public function index()
    {
        $this->data['method'] = __FUNCTION__;
        $this->form_validation->set_rules('nome', 'Nome', 'required|is_unique[bancos.nome]');
        $this->form_validation->set_rules('sigla', 'Sigla', 'required|is_unique[bancos.sigla]');
        $this->form_validation->set_rules('admin', 'Administrador', 'required');

        if ($this->form_validation->run()) {
            $insert_data = elements(array('nome', 'sigla', 'admin'), $this->security->xss_clean($this->input->post()));
            $insert_data['numero'] = $this->Core_model->getNumberBank();

            $insertedId = $this->Core_model->insert($this->table, $insert_data);
            if ($insertedId) {
                $this->session->set_tempdata('notify', __CLASS__.",success, Sucesso!", 1);
                redirect(strtolower(__CLASS__)."/show/".$insertedId);
            } else {
                $this->session->set_tempdata('notify', __CLASS__.",error, Erro!", 1);
            }
        }
        $this->data['items'] = $this->Core_model->get($this->table);
        $this->data['users'] = array_column( $this->ion_auth->users()->result(), 'username', 'id');
        $this->load->view('layout', $this->data);
    }

	public function show($id) {
        $this->data['method'] = __FUNCTION__;
        $this->data['item'] = $this->Core_model->getById($this->table, $id);
        $this->load->view('layout', $this->data);
	}

    public function update($id)
    {
        $this->data['method'] = 'show';
        $this->form_validation->set_rules('nome', 'Nome', 'required');
        $this->form_validation->set_rules('sigla', 'Sigla', 'required');
        $this->form_validation->set_rules('admin', 'Administrador', 'required');

        if ($this->form_validation->run()) {
            $update_data = elements(array('nome', 'sigla', 'admin'), $this->security->xss_clean($this->input->post()));

            if ($this->Core_model->updateById($this->table, $update_data, $id)) {
                $this->session->set_tempdata('notify', __CLASS__.",success, Sucesso!", 1);
                redirect(strtolower(__CLASS__)."/show/".$id);
            } else {
                $this->session->set_tempdata('notify', __CLASS__.",error, Erro!", 1);
            }
        }

        // $this->data['users'] = array_column( $this->ion_auth->users()->result(), 'username', 'id');
        $this->data['item'] = $this->Core_model->getById($this->table, $id);
        $this->load->view('layout', $this->data);
    }


    public function delete($id)
    {
        ($this->Core_model->deleteById($this->table, $id))
        ? $this->session->set_flashdata('sucesso', 'Sucesso!') 
        : $this->session->set_flashdata('error', 'Erro na operação!');
        $this->index();
    }
}
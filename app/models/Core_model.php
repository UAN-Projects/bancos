<?php defined('BASEPATH') or exit('Acção não permitida');

class Core_model extends CI_Model {

    public function get($tabela = NULL, $condicao = NULL) {
        if ($tabela) {
            if (is_array($condicao)) {
                $this->db->where($condicao);
            }
            return $this->db->get($tabela)->result();
        } else {
            return FALSE;
        }
    }

    public function getById($tabela = NULL, $id = NULL) {
        if ($tabela && $id) {
            $this->db->where(array('id' => $id));
            $this->db->limit(1);
            return $this->db->get($tabela)->row();
        } else {
            return FALSE;
        }
    }

    public function insert($tabela = NULL, $data = NULL) {
        if($this->db->insert($tabela, $data)) {
            return $this->db->insert_id();
        } else {
            return TRUE;
        }
    }

    public function updateById($tabela = NULL, $data = NULL, $id = NULL) {
        if ($tabela && is_array($data)) {
            if($this->db->update($tabela, $data, array('id' => $id))) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }
    public function update($tabela = NULL, $data = NULL, $condicao = NULL) {
        if ($tabela && is_array($data) && is_array($condicao)) {
            if($this->db->update($tabela, $data, $condicao)) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    public function deleteById($tabela = NULL, $id = NULL) {
        $this->db->db_debug = FALSE;
        if ($tabela && $id) {
            $status = $this->db->delete($tabela, array('id' => $id));
            $error = $this->db->error();
            $this->db->db_debug = TRUE;
            if (!$status) {
                return FALSE;
            } else {
                return TRUE;
            }
        } else {
            return FALSE;
        }
    }

    public function delete($tabela = NULL, $condicao = NULL) {
        $this->db->db_debug = FALSE;
        if ($tabela && is_array($condicao)) {
            $status = $this->db->delete($tabela, $condicao);
            $error = $this->db->error();
            $this->db->db_debug = TRUE;
            if (!$status) {
                return FALSE;
            } else {
                return TRUE;
            }
        } else {
            return FALSE;
        }
    }

    public function getNumberBank() {
        $this->db->select('numero');
        $this->db->order_by('numero', 'DESC');
        $this->db->limit(1);
        $numero = $this->db->get('bancos')->row()->numero;
        return ($numero)? $numero + 1 : 0;
    }
}

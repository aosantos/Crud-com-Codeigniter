<?php

class UsersModel extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function users($pular = null, $pag = null) {
        $this->db->select();
        $this->db->from('users');       
        $this->db->order_by("id", "DESC");
        
        if ($pular && $pag) {
            $this->db->limit($pag, $pular);
        } else {
            $this->db->limit(4);
        }
        return $this->db->get()->result_array();
        
    }
    function contar(){
        $this->db->count_all_results('users');        
        $this->db->from('users');
        return $this->db->count_all_results();
    }
      function remover($id) {
        $this->db->where('id', $id);
        $this->db->delete('users');
    }

}

?>
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class UsersController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('UsersModel');
    }

    public function index($pular =  null) {
        
        $this->load->library('pagination');
        $config['base_url'] = base_url("UsersController/index");
        $config['total_rows'] = $this->UsersModel->contar();
        $pag = 4;
        $config['per_page'] = $pag;
        $this->pagination->initialize($config);
        $data['links_paginacao'] = $this->pagination->create_links();        
        $data['lista']  = $this->UsersModel->users($pular,$pag);           
        
        $this->load->view('users', $data);
    }

    public function cadastrar() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nome', 'Nome ', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('cpf', 'Cpf', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('erro2', "Preencha todos os campos!");
            $this->index();
        } else {
            $nome           = $this->input->post('nome');                       
            $this->db->select();            
            $this->db->where('email', $email     = $this->input->post('email'));           
            $this->db->or_where('cpf', $cpf     = $this->input->post('cpf'));           
            $retorno = $this->db->get('users')->num_rows();
                     
            if($retorno>0 ){
                     $erro = $this->session->set_flashdata('erro', " Email ou Cpf  Já existe !");
                     redirect('UsersController',$erro);
            }
            
            else{
                $data = array(
                'nome'              => $nome,
                'email'             => $email,
                'cpf'               => $cpf,
                );
                
            $this->db->insert('users', $data);
            redirect('UsersController');
            exit;
        
            }
            
            }
            
    }
    public function atualizar(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nome', 'Nome ', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('cpf', 'Cpf', 'required');        
        
         if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('erro2', "Preencha todos os campos!");
            $this->index();
        } else {
            $id           = $this->input->post('id');
            $nome         = $this->input->post('nome');                                   
            $email        = $this->input->post('email');           
            $cpf          = $this->input->post('cpf');           
            
                     
                $data = array(
                'nome'              => $nome,
                'email'             => $email,
                'cpf'               => $cpf,
                'id'                => $id
                );
            
            $this->db->where('id', $id);
            $this->db->update('users', $data);
            redirect('UsersController');
            exit;
        
            }
            
            }
        
        public function remover($id) {
        $this->UsersModel->remover($id);            
        redirect('UsersController');
            exit;
        }
}
<?php

defined('BASEPATH') OR exit('id_user direct script access allowed');

class LoginModel extends CI_Model {
   
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function login($username, $password)
    {

              $this->db->select('*');
            $this->db->from('login');
            $this->db->where('username', $username);
            $this->db->where('password', $password);
            $query = $this->db->get();
            if($query->num_rows() > 0){
            return $query->result();
        }
             else{
                return false;
                }
        
    }

     public function getLogin()
    {

            $this->db->select('*');
            $this->db->from('Login');
            $query = $this->db->get();
            if($query->num_rows() > 0){
            return $query->result();
        }
    }
    public function updateLogin(){

        $id_user = $this->input->post('id_user');
        

        $data = array(
        'id_section' => $this->input->post('id_section'),
        'username' => $this->input->post('username'),
        'password' => $this->input->post('password'),
        'hak_akses' => $this->input->post('hak_akses'),
      
        );

        
        $this->db->where('id_user', $id_user);
        $this->db->update('Login', $data);
    }
    public function deleteLogin($id){
         $this->db->where('id_user', $id);
        $this->db->delete('Login');

    }
    public function tambahLogin(){
        $data = array(
        'id_user' => $this->input->post('id_user'),
        'id_section' => $this->input->post('id_section'),
        'username' => $this->input->post('username'),
        'password' => $this->input->post('password'),
        'hak_akses' => $this->input->post('hak_akses'),
      
        );
         $this->db->insert('Login', $data);

    }

 
private $_batchImport;
 
    public function setBatchImport($batchImport) {
        $this->_batchImport = $batchImport;
    }
 
    // save data
    public function importData() {
        $data = $this->_batchImport;
        $this->db->insert_batch('Login', $data);
    }



}
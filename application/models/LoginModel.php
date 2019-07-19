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
                 $this->db->order_by('id_user', 'desc');
            $query = $this->db->get();
            if($query->num_rows() > 0){
            return $query->result();
        }
    }
    public function updateLogin(){

         $id_user = $this->input->post('id_user');
        

        $data = array(
        
        'username' => $this->input->post('username'),
        'password' => $this->input->post('password'),
        'hak_akses' => $this->input->post('hak_akses'),
      
        );

        
         $this->db->where('id_user', $id_user);
        $this->db->update('Login', $data);
    }

     public function updateHak_akses(){

         $id_user = $this->input->post('id_user');
        

        $data = array(
        
        
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
        if(empty($this->input->post('section'))){
            $section = 0;
        }else{
        $section = $this->input->post('section');
      }
        $data = array(
        'id_user' => $this->input->post('id_user'),
        'username' => $this->input->post('username'),
        'password' => $this->input->post('password'),
        'hak_akses' => $this->input->post('hak_akses'),
        'section' => $section,
        
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



    public function edit_profile(){
        $id_user = $this->input->post('id_user');
        $data = array(
        'username' => $this->input->post('username'),
        'password' => $this->input->post('password'),
      
        );

        
        $this->db->where('id_user', $id_user);
        $this->db->update('login', $data);
    }



}
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

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

}
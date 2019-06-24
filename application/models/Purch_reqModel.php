<?php

defined('BASEPATH') OR exit('id_user direct script access allowed');

class Purch_reqModel extends CI_Model {
   
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }



     public function getPurch_req()
    {

            $this->db->select('*');
            $this->db->from('purch_req');
            $query = $this->db->get();
            if($query->num_rows() > 0){
            return $query->result();
        }
    }
    public function updatePurch_req(){

        $id_user = $this->input->post('id_user');
        

        $data = array(
        'id_section' => $this->input->post('id_section'),
        'username' => $this->input->post('username'),
        'password' => $this->input->post('password'),
        'hak_akses' => $this->input->post('hak_akses'),
      
        );

        
        $this->db->where('id_user', $id_user);
        $this->db->update('purch_req', $data);
    }
    public function deletePurch_req($id){
         $this->db->where('id_user', $id);
        $this->db->delete('purch_req');

    }
    public function tambahPurch_req(){
        $data = array(
        'id_user' => $this->input->post('id_user'),
        'id_section' => $this->input->post('id_section'),
        'username' => $this->input->post('username'),
        'password' => $this->input->post('password'),
        'hak_akses' => $this->input->post('hak_akses'),
      
        );
         $this->db->insert('purch_req', $data);

    }

     public function tambahItem_barang(){
        $data = array(
        'item_barang' => $this->input->post('item_barang'),
        'qty' => $this->input->post('qty'),
       
      
        );
         $this->db->insert('item', $data);

    }

 
private $_batchImport;
 
    public function setBatchImport($batchImport) {
        $this->_batchImport = $batchImport;
    }
 
    // save data
    public function importData() {
        $data = $this->_batchImport;
        $this->db->insert_batch('purch_req', $data);
    }



}
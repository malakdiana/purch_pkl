<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ApprovalModel extends CI_Model {
   
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
       
           
    }

     public function getApproval()
    {

            $this->db->select('*');
            $this->db->from('Approval');
            $query = $this->db->get();
            if($query->num_rows() > 0){
            return $query->result();
        }
    }
    public function updateApproval(){

    	$no = $this->input->post('no');
    	

        $data = array(
        'nama' => $this->input->post('nama'),
        'kode_nama' => $this->input->post('kode_nama'),
        'min' => $this->input->post('min'),
        'max' => $this->input->post('max'),
       
      
        );

        
        $this->db->where('no', $no);
        $this->db->update('Approval', $data);
    }
    public function deleteApproval($id){
         $this->db->where('no', $id);
        $this->db->delete('Approval');

    }
    public function tambahApproval(){
        $data = array(
        'nama' => $this->input->post('nama'),
        'kode_nama' => $this->input->post('kode_nama'),
        'min' => $this->input->post('min'),
        'max' => $this->input->post('max'),
      
        );
         $this->db->insert('Approval', $data);

    }

 
private $_batchImport;
 
    public function setBatchImport($batchImport) {
        $this->_batchImport = $batchImport;
    }
 
    // save data
    public function importData() {
        $data = $this->_batchImport;
        $this->db->insert_batch('Approval', $data);
    }
}
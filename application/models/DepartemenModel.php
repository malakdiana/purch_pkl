<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class DepartemenModel extends CI_Model {
   
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
       
           
    }

     public function getDepartemen()
    {

            $this->db->select('*');
            $this->db->from('departemen');
            $query = $this->db->get();
            if($query->num_rows() > 0){
            return $query->result();
        }
    }
    public function updateDepartemen(){

    	$no = $this->input->post('no');
    	

        $data = array(
        'group_name' => $this->input->post('group_name'),
        'remarks' => $this->input->post('remarks'),
      
        );

        
        $this->db->where('no', $no);
        $this->db->update('departemen', $data);
    }
    public function deleteDepartemen($id){
         $this->db->where('no', $id);
        $this->db->delete('departemen');

    }
    public function tambahDepartemen(){
        $data = array(
        'group_name' => $this->input->post('group_name'),
        'remarks' => $this->input->post('remarks'),
      
        );
         $this->db->insert('departemen', $data);

    }

 
private $_batchImport;
 
    public function setBatchImport($batchImport) {
        $this->_batchImport = $batchImport;
    }
 
    // save data
    public function importData() {
        $data = $this->_batchImport;
        $this->db->insert_batch('departemen', $data);
    }
}
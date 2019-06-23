<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Unit_barangModel extends CI_Model {
   
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
       
           
    }

     public function getUnit_barang()
    {

            $this->db->select('*');
            $this->db->from('Unit_barang');
            $query = $this->db->get();
            if($query->num_rows() > 0){
            return $query->result();
        }
    }
    public function updateUnit_barang(){

    	$no = $this->input->post('no');
    	

        $data = array(
        'unit_barang' => $this->input->post('unit_barang'),
        'remarks' => $this->input->post('remarks'),
      
        );

        
        $this->db->where('no', $no);
        $this->db->update('Unit_barang', $data);
    }
    public function deleteUnit_barang($id){
         $this->db->where('no', $id);
        $this->db->delete('Unit_barang');

    }
    public function tambahUnit_barang(){
        $data = array(
        'unit_barang' => $this->input->post('unit_barang'),
        'remarks' => $this->input->post('remarks'),
      
        );
         $this->db->insert('Unit_barang', $data);

    }

 
private $_batchImport;
 
    public function setBatchImport($batchImport) {
        $this->_batchImport = $batchImport;
    }
 
    // save data
    public function importData() {
        $data = $this->_batchImport;
        $this->db->insert_batch('Unit_barang', $data);
    }
}
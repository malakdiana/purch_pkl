<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class BarangModel extends CI_Model {
   
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
       
           
    }

     public function getBarang()
    {

            $this->db->select('*');
            $this->db->from('barang');
            $query = $this->db->get();
            if($query->num_rows() > 0){
            return $query->result();
        }
    }
    public function updateBarang(){

    	$no = $this->input->post('no_barang');
    	

        $data = array(
       
       
        'nama_barang' => $this->input->post('nama_barang'),
       
      
        );

        
        $this->db->where('no_barang', $no);
        $this->db->update('Barang', $data);
    }
    public function deleteBarang($id){
         $this->db->where('no_barang', $id);
        $this->db->delete('barang');

    }
    public function tambahBarang(){
        $data = array(
            'no_barang' => $this->input->post('no_barang'),
      
        'nama_barang' => $this->input->post('nama_barang'),
     
      
        );
         $this->db->insert('barang', $data);

    }

 
private $_batchImport;
 
    public function setBatchImport($batchImport) {
        $this->_batchImport = $batchImport;
    }
 
    // save data
    public function importData() {
        $data = $this->_batchImport;
        $this->db->insert_batch('barang', $data);
    }
}
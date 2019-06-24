<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PricelistModel extends CI_Model {
   
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
       
           
    }

     public function getPricelist()
    {

              $this->db->select('*');
            $this->db->from('pricelist');
             $this->db->limit(100);
            $query = $this->db->get();
            if($query->num_rows() > 0){
            return $query->result();
        }
    }
    public function updatePricelist(){

    	$no_pricelist = $this->input->post('no_pricelist');
    	

        $data = array(
        	'group_name' => $this->input->post('group_name'),
        'no_barang' => $this->input->post('no_barang'),
        'nama_barang' => $this->input->post('nama_barang'),
        'spec_barang' => $this->input->post('spec_barang'),
        'unit' => $this->input->post('unit'),
        'attention' => $this->input->post('attention'),
        'mata_uang' => $this->input->post('mata_uang'),
        'price' => $this->input->post('price'),
        'nama_supplier' => $this->input->post('nama_supplier'),
        'quotation_no' => $this->input->post('quotation_no'),
        'tgl_input' => $this->input->post('tgl_input'),
        
       
        'lbdate' => $this->input->post('lbdate'),
        'remarks' => $this->input->post('remarks'),
      
        );

        
        $this->db->where('no_pricelist', $no_pricelist);
        $this->db->update('pricelist', $data);
    }
    public function deletePricelist($id){
         $this->db->where('no_pricelist', $id);
        $this->db->delete('pricelist');

    }
    public function tambahPricelist(){
        $lb= $this->input->post('lbdate');
        $tanggal = date('Y-m-d', strtotime($lb));
        $data = array(
        'group_name' => $this->input->post('group_name'),
        'no_barang' => $this->input->post('no_barang'),
        'nama_barang' => $this->input->post('nama_barang'),
        'spec_barang' => $this->input->post('spec_barang'),
        'unit' => $this->input->post('unit'),
        'attention' => $this->input->post('attention'),
        'mata_uang' => $this->input->post('mata_uang'),
        'price' => $this->input->post('price'),
        'nama_supplier' => $this->input->post('nama_supplier'),
        'quotation_no' => $this->input->post('quotation_no'),
        'tgl_input' => $this->input->post('tgl_input'),  
        'lbdate' => $tanggal,
        'remarks' => $this->input->post('remarks'),
      
        );
         $this->db->insert('pricelist', $data);

    }

    
private $_batchImport;
 
    public function setBatchImport($batchImport) {
        $this->_batchImport = $batchImport;
    }
 
    // save data
    public function importData() {
        $data = $this->_batchImport;
        $this->db->insert_batch('pricelist', $data);
    }
}
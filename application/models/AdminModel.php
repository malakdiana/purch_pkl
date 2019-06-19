<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminModel extends CI_Model {
   
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

     public function getSupplier()
    {

              $this->db->select('*');
            $this->db->from('supplier');
            $query = $this->db->get();
            if($query->num_rows() > 0){
            return $query->result();
        }
    }
    public function updateSupplier(){

    	$id_supplier = $this->input->post('id_supplier');
    	

        $data = array(
        	'nama_supplier' => $this->input->post('nama_supplier'),
        'alamat' => $this->input->post('alamat'),
        'kota' => $this->input->post('kota'),
        'no_telp' => $this->input->post('no_telp'),
        'no_fax' => $this->input->post('no_fax'),
        'attention' => $this->input->post('attention'),
        'no_hp' => $this->input->post('no_hp'),
        'tgl_input' => $this->input->post('tgl_input'),
        'terms' => $this->input->post('terms'),
        'ppn' => $this->input->post('ppn'),
        'supply' => $this->input->post('supply'),
        'status' => $this->input->post('status'),
        'perjanjian' => $this->input->post('perjanjian'),
        'remarks' => $this->input->post('remarks'),
      
        );

        
        $this->db->where('id_supplier', $id_supplier);
        $this->db->update('supplier', $data);
    }
}
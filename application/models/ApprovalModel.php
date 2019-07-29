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
            $this->db->from('approval');
            $this->db->order_by('no','desc');
            $query = $this->db->get();
              $results=array();
            if($query->num_rows() > 0){
            return $query->result();
            }else{
            return $results;
            }
        
    }

     public function getApprovalExport()
    {

            $this->db->select('*');
            $this->db->from('approval');
            $this->db->order_by('no','asc');
            $query = $this->db->get();
            if($query->num_rows() > 0){
            return $query->result();
        }
    }
      

    public function updateApproval(){

    	$no = $this->input->post('no');
    	
 $d = $this->input->post('min');
             $d = str_replace('Rp', '', $d);
              $d = str_replace('.', '', $d);
               $d = str_replace(' ', '', $d);
        $e = $this->input->post('max');
             $e = str_replace('Rp', '', $e);
              $e = str_replace('.', '', $e);
               $e = str_replace(' ', '', $e);
        $data = array(
        'nama' => $this->input->post('nama'),
        'kode_nama' => $this->input->post('kode_nama'),
        'min' => $d,
        'max' => $e,
      
        );

        
        $this->db->where('no', $no);
        $this->db->update('approval', $data);
    }
    public function deleteApproval($id){
         $this->db->where('no', $id);
        $this->db->delete('approval');

    }
    public function tambahApproval(){
        $d = $this->input->post('min');
             $d = str_replace('Rp', '', $d);
              $d = str_replace('.', '', $d);
               $d = str_replace(' ', '', $d);
               $e = $this->input->post('max');
             $e = str_replace('Rp', '', $e);
              $e = str_replace('.', '', $e);
               $e = str_replace(' ', '', $e);
        $data = array(
        'nama' => $this->input->post('nama'),
        'kode_nama' => $this->input->post('kode_nama'),
        'min' => $d,
        'max' => $e,
        );
        if ($d>$e){
          echo "<script>alert('Jumlah Nominal minimal anda lebih besar dari nominal maximal')</script>";
          redirect('Approval/tambahApproval', 'refresh');
        }else{
         $this->db->insert('approval', $data);
        }

    }

 
private $_batchImport;
 
    public function setBatchImport($batchImport) {
        $this->_batchImport = $batchImport;
    }
 
    // save data
    public function importData() {
        $data = $this->_batchImport;
        $this->db->insert_batch('approval', $data);
    }
}
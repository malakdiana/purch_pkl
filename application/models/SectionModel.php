<?php

defined('BASEPATH') OR exit('id_section direct script access allowed');

class SectionModel extends CI_Model {
   
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
       
           
    }

     public function getSection()
    {

            $this->db->select('*');
            $this->db->from('section');

           $this->db->order_by('id_section','DESC');  
            $query = $this->db->get();
            if($query->num_rows() > 0){
            return $query->result();
        }
    }

    public function getSectionExport()
    {

            $this->db->select('*');
            $this->db->from('section');

           $this->db->order_by('id_section','ASC');  
            $query = $this->db->get();
            if($query->num_rows() > 0){
            return $query->result();
        }
    }

    public function updateSection(){

    	$id_section = $this->input->post('id_section');
    	
  $query = $this->db->select('*')->from('section')->where('id_section',$id)->get();
        foreach ($query->result() as $key ){
            $nama = $key->nama_section;
        }
        $data = array(
        'nama_section' => $this->input->post('nama_section'),
        'dept' => $this->input->post('dept'),
      
        );

       
        
        $this->db->where('id_section', $id_section);
        $this->db->update('section', $data);
         $data2 = array(
            'username' => $this->input->post('nama_section'),
        );
        $this->db->where('username', $nama);
        $this->db->update('login', $data2); 

    }
    public function deleteSection($id){
        $query = $this->db->select('*')->from('section')->where('id_section',$id)->get();
        foreach ($query->result() as $key ){
            $nama = $key->nama_section;
        }
      
        $query2 = $this->db->select('*')->from('login')->where('username',$nama)->or_where('section',$id)->get();
        $query3= $this->db->select('*')->from('penawaran')->where('section',$nama)->get();
        $query4= $this->db->select('*')->from('purch_req')->where('section',$nama)->get();
       

        if($query2->num_rows()==0 && $query3->num_rows()==0 && $query4->num_rows()==0){
         $this->db->where('id_section', $id);
        $this->db->delete('section');
           $this->session->set_flashdata('deleteSection','<div class="alert alert-success" role="alert">SUKSES DELETE DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    }else{
          echo "<script>alert('Tidak dapat terhapus karena data sedang dipakai')</script>";
    }

    }
    public function tambahSection(){
        $data = array(
        'nama_section' => $this->input->post('nama_section'),
        // 'dept' => $this->input->post('dept'),
      
        );
         $this->db->insert('section', $data);

    }

 
private $_batchImport;
 
    public function setBatchImport($batchImport) {
        $this->_batchImport = $batchImport;
    }
 
    // save data
    public function importData() {
        $data = $this->_batchImport;
        $this->db->insert_batch('section', $data);
    }
}
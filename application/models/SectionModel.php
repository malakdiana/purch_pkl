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
    public function updateSection(){

    	$id_section = $this->input->post('id_section');
    	

        $data = array(
        'nama_section' => $this->input->post('nama_section'),
        'dept' => $this->input->post('dept'),
      
        );

        
        $this->db->where('id_section', $id_section);
        $this->db->update('section', $data);
    }
    public function deleteSection($id){
         $this->db->where('id_section', $id);
        $this->db->delete('section');

    }
    public function tambahSection(){
        $data = array(
        'nama_section' => $this->input->post('nama_section'),
        'dept' => $this->input->post('dept'),
      
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
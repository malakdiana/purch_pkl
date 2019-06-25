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
           $results=array();
            if($query->num_rows() > 0){
            return $query->result();
            }else{
            return $results;
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
    public function tambahPR(){
        $data = array(
        'tgl' => $this->input->post('tgl'),
        'jam' => $this->input->post('jam'),
        'nik' => $this->input->post('nik'),
        'pic_request' => $this->input->post('pic_request'),
        'section' => $this->input->post('section'),
        'pr_no' => $this->input->post('pr_no'),
      
        );
         $this->db->insert('purch_req', $data);

    }

        public function getItem_barang($id)
    {

            $this->db->select('item.id_po ,item.id_item, item.id_purch, item.item_barang,item.qty, po.id_po,po.no_po,bayangan.id_po, bayangan.id_bayangan, bayangan.qty as qtybay');
            $this->db->from('item');
            $this->db->join('bayangan', 'item.id_item= bayangan.id_item', 'left');
             $this->db->join('po', 'po.id_po= bayangan.id_po','left');
            $this->db->where('item.id_purch',$id);
            $query = $this->db->get();
            $results=array();
            if($query->num_rows() > 0){
            return $query->result();
            }else{
            return $results;
            }
    }

    public function updateItem(){
         $data = array(
        'item_barang' => $this->input->post('item_barang'),
        'qty' => $this->input->post('qty'),
      
        );
            $this->db->where('id_item', $this->input->post('id_item'));
         $this->db->update('item', $data);
    }

     public function tambahItem_barang(){
        $data = array(
        'item_barang' => $this->input->post('item_barang'),
        'qty' => $this->input->post('qty'),
       
      
        );
         $this->db->insert('item', $data);

    }

    public function hapusItem($id_item){
         $this->db->where('id_item', $id_item);
         $this->db->delete('item');
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
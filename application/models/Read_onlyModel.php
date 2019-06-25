<?php

defined('BASEPATH') OR exit('id_user direct script access allowed');

class Read_onlyModel extends CI_Model {
   
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

  
 


}
<?php

defined('BASEPATH') OR exit('id_user direct script access allowed');

class PoModel extends CI_Model {
   
    public function __construct()
    {
        parent::__construct();
        $this->load->database();

    }



     public function getPo()
    {

            $this->db->select('*');
            $this->db->from('po');
            $query = $this->db->get();
           $results=array();
            if($query->num_rows() > 0){
            return $query->result();
            }else{
            return $results;
            }
    }

<<<<<<< HEAD
      public function getPoById($id){
        $this->db->select('*');
            $this->db->from('po');
            $this->db->where('id_po', $id_po);

            $query = $this->db->get();
            if($query->num_rows() > 0){
            return $query->result();
        }
    }


=======
    public function getItemPo($id){
        $this->db->select('*');
        $this->db->from('bayangan');
        $this->db->where('id_po', $id);
         $query = $this->db->get();
           $results=array();
            if($query->num_rows() > 0){
            return $query->result();
            }else{
            return $results;
            }
    }

>>>>>>> 8f0113e921a961c7808ff3ff77f3791ebb32e1c3
    
    public function updatePo(){

        $tgl_po = $this->input->post('tgl_po');
        

        $data = array(
        'no_po' => $this->input->post('no_po'),
        'status' => $this->input->post('status'),
       
      
        );

        
        $this->db->where('tgl_po', $tgl_po);
        $this->db->update('Po', $data);
    }
    public function deletePo($id_po){
         $this->db->where('id_po', $id_po);
        $this->db->delete('Po');

    }
    public function tambahPO(){

        $tgl_po = $this->input->post('tgl_po');
        $no_po = "PO"."-".$this->input->post('no_po')."/"."PUR"."-"."SAI"."/".$this->input->post('bulan')."/".$this->input->post('tahun');

        $data = array(
        'tgl_po' => $tgl_po,
        'no_po' => $no_po,
        'status' => "OPEN"
      
        );
         $this->db->insert('Po', $data);

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
        $id=array();$item_barang=array();$qty=array();
        $id= $this->input->post('id');
        $item_barang= $this->input->post('item');
        $qty= $this->input->post('qty');
        for ($i=0; $i < count($id) ; $i++) { 
        $data = array(
        'id_purch' => $id[$i],
        'item_barang' => $item_barang[$i],
        'qty' => $qty[$i],
        );
         $this->db->insert('item', $data);
        }
       
     

    }

    public function deleteItem($id_item){
         $this->db->where('id_bayangan', $id_item);
         $this->db->delete('bayangan');
    }

    public function getPoById($id){
         $this->db->select('*');
            $this->db->from('po');
            $this->db->where('id_po',$id);
            $query = $this->db->get();

           $results=array();
            if($query->num_rows() > 0){
            return $query->result();
            }else{
            return $results;
            }
    }


        

}
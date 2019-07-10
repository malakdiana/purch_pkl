<?php

defined('BASEPATH') OR exit('id_user direct script access allowed');

class RiwayatdatangModel extends CI_Model {
   
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    

    }



     public function getPo()
    {

            $this->db->select('po.id_po,po.tgl_po, po.no_po, po.eta, bayangan.id_bayangan, bayangan.no_pr, bayangan.item, bayangan.qty,bayangan.status_datang');
            $this->db->from('bayangan');
            $this->db->join('po', 'po.id_po = bayangan.id_po', 'left');
            

            $query = $this->db->get();
           $results=array();
            if($query->num_rows() > 0){
            return $query->result();
            }else{
            return $results;
            }
    }

    public function inserttanggal(){
      $status = 0;
      $qty_dtg =$this->input->post('qty_dtg');
      $qtyriwayat=0;
      $id_bayangan = $this->input->post('id_bayangan');
      $query= $this->db->select('qty')->from('bayangan')->where('id_bayangan', $id_bayangan)->get();
      foreach ($query->result() as $key ) {
        $qtypo = $key->qty;
      }

       $query= $this->db->select('sum(qty_dtg) as jumlah')->from('riwayatdatang')->where('id_bayangan', $id_bayangan)->get();
      foreach ($query->result() as $key ) {
        $qtyriwayat = $key->jumlah;
      }
      $qty= $qtypo-$qtyriwayat;

      if ($qty < $this->input->post('qty_dtg')) {
       $status = 1;
      }else{
        $data = array(
        'id_bayangan' => $this->input->post('id_bayangan'),
        'tgl_dtg' => $this->input->post('tgl_dtg'),
        'qty_dtg' => $this->input->post('qty_dtg'),
      
        );
         $this->db->insert('riwayatdatang', $data);
         $qtyyy = $qtyriwayat+$qty_dtg;
        if($qtyyy==$qtypo){
           $data2 = array(
        'status_datang' => 1,
       );
            $this->db->where('id_bayangan', $id_bayangan);
         $this->db->update('bayangan', $data2);
         }
           else{
              $data2 = array(
        'status_datang' => 2,
       );
               $this->db->where('id_bayangan', $id_bayangan);
         $this->db->update('bayangan', $data2);
           }
          
        
    }

    return $status;
  }


     public function getDetail($id)
    {

            $this->db->select('po.id_po,po.tgl_po, po.no_po, po.eta, bayangan.id_bayangan, bayangan.no_pr, bayangan.item, bayangan.qty, riwayatdatang.tgl_dtg, riwayatdatang.qty_dtg, riwayatdatang.id, bayangan.status_datang');
            $this->db->from('po');
            $this->db->join('bayangan', 'po.id_po = bayangan.id_po', 'left');
            $this->db->join('riwayatdatang', 'bayangan.id_bayangan = riwayatdatang.id_bayangan','left');
            $this->db->where('bayangan.id_bayangan', $id);
            $query = $this->db->get();
           $results=array();
            if($query->num_rows() > 0){
            return $query->result();
            }else{
            return $results;
            }
    }

  public function deleteriwayat($id, $id_bayangan){
         $this->db->where('id', $id);
        $this->db->delete('riwayatdatang');
        $qtyriwayat=0;
        

       $query= $this->db->select('qty_dtg')->from('riwayatdatang')->where('id_bayangan', $id_bayangan)->get();
      foreach ($query->result() as $key ) {
        $qtyriwayat = $key->qty_dtg;
      }
     
      if ($qtyriwayat == 0 ) {
       $data2 = array(
        'status_datang' => 0,
       );$this->db->where('id_bayangan', $id_bayangan);
         $this->db->update('bayangan', $data2);

    }else{
      $data2 = array(
        'status_datang' => 2,
       );$this->db->where('id_bayangan', $id_bayangan);
         $this->db->update('bayangan', $data2);
    }

}

        

}
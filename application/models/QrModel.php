<?php

defined('BASEPATH') OR exit('id_user direct script access allowed');

class QrModel extends CI_Model {
   
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }



     public function getQr()
    {

            $this->db->select('*');
            $this->db->from('Penawaran');

            $query = $this->db->get();
            if($query->num_rows() > 0){
            return $query->result();
        }
    }

     public function getQr_tracking()
    {
           
            $section = $this->session->userdata('logged_in')['username'];
            $this->db->select('*');
            $this->db->from('Penawaran');
            $this->db->where('section', $section);
         
            $query = $this->db->get();
            if($query->num_rows() > 0){
            return $query->result();
        }
    }

    public function getListVendor($id){
        $this->db->select('*');
            $this->db->from('detail_penawaran');
            $this->db->where('id_penawaran',$id);

      
             $query = $this->db->get();
             $results=array();
            if($query->num_rows() > 0){
            return $query->result();
            }else{
            return $results;
            }

    }
    public function editVendor(){

      $data = array(
                    'tanggal' => $this->input->post('tanggal'),
                    'nama_vendor' => $this->input->post('nama_vendor'),
                    'harga' => $this->input->post('harga'),
            );

        $this->db->where('id_detail', $this->input->post('id_detil'));
        $this->db->update('detail_penawaran', $data);
    }
    public function editVendorDetail(){

      $data = array(
                    'tanggal' => $this->input->post('tanggal'),
                    'nama_vendor' => $this->input->post('nama_vendor'),
                    'harga' => $this->input->post('harga'),
                    'detail'=>$this->upload->data('file_name'),
            );

        $this->db->where('id_detail', $this->input->post('id_detil'));
        $this->db->update('detail_penawaran', $data);
    }
    public function deleteQr($id){
         $this->db->where('id_user', $id);
        $this->db->delete('Qr');

    }
    public function tambahQR(){
        $data = array(
        'tanggal' => $this->input->post('tgl'),
        'item' => $this->input->post('item'),
        'tanggal_butuh' => $this->input->post('tanggal_butuh'),
        'section' => $this->input->post('section'),
        'pic' => $this->input->post('pic'),
        'bahan' => $this->input->post('bahan'),
        'detail' => $this->input->post('detail'),
        'gambar' => $this->upload->data('file_name'),
      
        );
         $this->db->insert('penawaran', $data);

    }

        public function getItem_barang($id)
    {

            $this->db->select('item.id_po ,item.id_item, item.id_purch, item.item_barang,item.qty, po.id_po,po.no_po,bayangan.id_po, bayangan.id_bayangan, bayangan.qty as qtybay');
            $this->db->from('item');
            $this->db->join('bayangan', 'item.id_item= bayangan.id_item', 'left');
             $this->db->join('po', 'po.id_po= bayangan.id_po','left');
            $this->db->where('item.id_purch',$id);
            $query = $this->db->get();
            if($query->num_rows() > 0){
            return $query->result();
        }
    }

     public function tambahItem_barang(){
        $data = array(
        'item_barang' => $this->input->post('item_barang'),
        'qty' => $this->input->post('qty'),
       
      
        );
         $this->db->insert('item', $data);

    }

    
       
     


 
private $_batchImport;
 
    public function setBatchImport($batchImport) {
        $this->_batchImport = $batchImport;
    }
 
    // save data
    public function importData() {
        $data = $this->_batchImport;
        $this->db->insert_batch('Qr', $data);
    }



}
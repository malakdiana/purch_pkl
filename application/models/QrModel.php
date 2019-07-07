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
    public function getQrById($id){
        $this->db->select('*');
            $this->db->from('Penawaran');
            $this->db->where('id_penawaran', $id);

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
          $id = $this->input->post('id_detail');
      $data = array(
                    'tanggal' => $this->input->post('tanggal'),
                    'nama_vendor' => $this->input->post('nama_vendor'),
                    'harga' => $this->input->post('harga'),
            );

        $this->db->where('id_detail', $id);
        $this->db->update('detail_penawaran', $data);
    }
    public function editVendorDetail(){
        $id = $this->input->post('id_detail');
      $data = array(
                    'tanggal' => $this->input->post('tanggal'),
                    'nama_vendor' => $this->input->post('nama_vendor'),
                    'harga' => $this->input->post('harga'),
                     'detail'=>$this->upload->data('file_name'),
            );

        $this->db->where('id_detail', $id);
        $this->db->update('detail_penawaran', $data);
        
    }

    public function editQuotation(){
         $id = $this->input->post('id_penawaran');
     $data = array(
                    'tanggal' => $this->input->post('tanggal'),
                    'item' => $this->input->post('item'),
                    'kode_qr' => $this->input->post('kode_qr'),
                     'section'=>$this->input->post('section'),
                      'pic'=>$this->input->post('pic'),
                       'bahan'=>$this->input->post('bahan'),
                        'detail'=>$this->input->post('detail'),
                        

            );

        $this->db->where('id_penawaran', $id);
        $this->db->update('penawaran', $data);
    }
    public function editQuotationGambar(){
         $id = $this->input->post('id_penawaran');
     $data = array(
                    'tanggal' => $this->input->post('tanggal'),
                    'item' => $this->input->post('item'),
                    'kode_qr' => $this->input->post('kode_qr'),
                     'section'=>$this->input->post('section'),
                      'pic'=>$this->input->post('pic'),
                       'bahan'=>$this->input->post('bahan'),
                        'detail'=>$this->input->post('detail'),
                        'gambar'=>$this->upload->data('file_name'),
                        

            );

        $this->db->where('id_penawaran', $id);
        $this->db->update('penawaran', $data);
    }

    public function deleteQr($id){
         $this->db->where('id_user', $id);
        $this->db->delete('Qr');

    }
    public function tambahQR(){
        $tglkode=date('ymd');

$kodeno=1;
$buat_id   = str_pad($kodeno, 2, "0", STR_PAD_LEFT);
$kodeasli="QR".$tglkode.".".$buat_id;
$kodeqr1="QR".$tglkode;
  $query = $this->db->select('kode_qr')->order_by('id_penawaran', 'DESC')->limit('1')->get('penawaran');
        foreach ($query->result() as $key) {
            $carikode = $key->kode_qr;
        }





$pecah=explode(".", $carikode);


if ($kodeqr1==$pecah[0]) {
    $baru=$pecah[1]+1;
    $buat_kode   = str_pad($baru, 2, "0", STR_PAD_LEFT);
    $kodeasli=$kodeqr1.".".$buat_kode;
    }

      $tgl= date('d-m-Y',strtotime($this->input->post('tanggal_butuh')));



        $data = array(
        'tanggal' => $this->input->post('tgl'),
        'item' => $this->input->post('item'),
        'kode_qr' => $kodeasli,
        'tanggal_butuh' => $tgl,
        'section' => $this->input->post('section'),
        'pic' => $this->input->post('pic'),
        'bahan' => $this->input->post('bahan'),
        'detail' => $this->input->post('detail'),
        'gambar' => $this->upload->data('file_name'),
        'status' => 0,
      
        );
         $this->db->insert('penawaran', $data);

        

    }
     public function tambahQRnoGambar(){
         $tglkode=date('ymd');

$kodeno=1;
$buat_id   = str_pad($kodeno, 2, "0", STR_PAD_LEFT);
$kodeasli="QR".$tglkode.".".$buat_id;
$kodeqr1="QR".$tglkode;
  $query = $this->db->select('kode_qr')->order_by('id_penawaran', 'DESC')->limit('1')->get('penawaran');
        foreach ($query->result() as $key) {
            $carikode = $key->kode_qr;
        }





$pecah=explode(".", $carikode);


if ($kodeqr1==$pecah[0]) {
    $baru=$pecah[1]+1;
    $buat_kode   = str_pad($baru, 2, "0", STR_PAD_LEFT);
    $kodeasli=$kodeqr1.".".$buat_kode;
    }

      


$tgl= date('d-m-Y',strtotime($this->input->post('tanggal_butuh')));

        $data = array(
        'tanggal' => $this->input->post('tgl'),
        'item' => $this->input->post('item'),
        'kode_qr' => $kodeasli,
        'tanggal_butuh' => $tgl,
        'section' => $this->input->post('section'),
        'pic' => $this->input->post('pic'),
        'bahan' => $this->input->post('bahan'),
        'detail' => $this->input->post('detail'),
      
        'status' => 0,
      
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
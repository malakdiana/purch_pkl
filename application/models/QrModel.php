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
            $this->db->from('penawaran');     
               $this->db->order_by('status','ASC'); 
            $this->db->order_by('id_penawaran','DESC');


            $query = $this->db->get();
                $results=array();
            if($query->num_rows() > 0){
            return $query->result();
            }else{
            return $results;
            }


    }
    public function getQrById($id){
        $this->db->select('*');
            $this->db->from('penawaran');
            $this->db->where('id_penawaran', $id);

            $query = $this->db->get();
                 $results=array();
            if($query->num_rows() > 0){
            return $query->result();
            }else{
            return $results;
            }

        
    }

     public function getQr_tracking()
    {
           
            $section = $this->session->userdata('logged_in')['username'];
            $this->db->select('*');
            $this->db->from('penawaran');
            $this->db->where('section', $section);
               $this->db->order_by('status','ASC'); 
            $this->db->order_by('id_penawaran','DESC');

         
            $query = $this->db->get();
               $results=array();
            if($query->num_rows() > 0){
            return $query->result();
            }else{
            return $results;
            }

     
    }

    public function addKomen($id){
        $this->db->where('id_penawaran', $id);
        $this->db->set('status', 2);
        $this->db->update('komen');

        date_default_timezone_set('Asia/Jakarta');
       
        // if($this->session->userdata('logged_in')['hak_akses']==1){
        //     $user = 'administrator';
        // }else{
        //     $user = $this->session->userdata('logged_in')['username'];
        // }


        $data = array(
            'tanggal' => date('Y-m-d H:i:s'),
            'id_penawaran' => $id,
            'user' => $this->session->userdata('logged_in')['username'],
            'komentar' => $this->input->post('komentar'),
            'status' => 1
        );
        $this->db->insert('komen', $data);


    }

    public function getKomen($id){

        $query=$this->db->select('*')->from('komen')->where('id_penawaran',$id)->get();
         $results=array();
            if($query->num_rows() > 0){
            return $query->result();
            }else{
            return $results;
            }

    }
    public function getIcon(){
          if($this->session->userdata('logged_in')['hak_akses']==1){
      $query = $this->db->select('*,count(*) as jumlah')->from('komen')->join('penawaran', 'komen.id_penawaran = penawaran.id_penawaran')->where('komen.status',1)->where('user !=',$this->session->userdata('logged_in')['username'] )->group_by('komen.id_penawaran')->get();
    }else{
        $query = $this->db->select('*,count(*) as jumlah')->from('komen')->join('penawaran', 'komen.id_penawaran = penawaran.id_penawaran')->where('komen.status',1)->where('user !=',$this->session->userdata('logged_in')['username'])->where('section',$this->session->userdata('logged_in')['username'])->or_where('pic',$this->session->userdata('logged_in')['username'])->group_by('komen.id_penawaran')->get();
    }
     $results=array();
            if($query->num_rows() > 0){
            return $query->result();
            }else{
            return $results;
            }

    }

    public function getNotifikasi(){
        if($this->session->userdata('logged_in')['hak_akses']==1){
      $query = $this->db->select('*,count(*) as jumlah')->from('komen')->join('penawaran', 'komen.id_penawaran = penawaran.id_penawaran')->where('komen.status',1)->where('user !=',$this->session->userdata('logged_in')['username'] )->where('status_lihat',0)->group_by('komen.id_penawaran')->get();
    }else{
        $query=$this->db->select('*')->from('section')->where('nama_section', $this->session->userdata('logged_in')['username'])->get();
        if($query->num_rows()==0){
             $query = $this->db->query("select *,count(*) as jumlah from komen join penawaran on komen.id_penawaran = penawaran.id_penawaran where komen.status = 1 AND user != '".$this->session->userdata('logged_in')['username']."' AND status_lihat =0 AND pic ='".$this->session->userdata('logged_in')['username']."' group by komen.id_penawaran");
         }else{
        $query = $this->db->query("select *,count(*) as jumlah from komen join penawaran on komen.id_penawaran = penawaran.id_penawaran where komen.status = 1 AND user != '".$this->session->userdata('logged_in')['username']."' AND status_lihat =0 AND section='".$this->session->userdata('logged_in')['username']."' group by komen.id_penawaran");
    }
    }
      $results=array();
            if($query->num_rows() > 0){
            return $query->result();
            }else{
            return $results;
            }
}

    public function getQr_tracking_personal()
    {
           
            $username = $this->session->userdata('logged_in')['username'];
            $section = $this->session->userdata('logged_in')['section'];

            $this->db->select('*');
            $this->db->from('penawaran');
            $this->db->where('pic', $username);
            $this->db->where('section', $section);
         $this->db->order_by('status','ASC'); 
            $this->db->order_by('id_penawaran','DESC');
            $query= $this->db->get();

         
               $results=array();
            if($query->num_rows() > 0){
            return $query->result();
            }else{
            return $results;
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
        
            $d = $this->input->post('harga');

             $d = str_replace('Rp', '', $d);
              $d = str_replace('.', '', $d);
               $d = str_replace(' ', '', $d);
      $data = array(
                    'tanggal' => $this->input->post('tanggal'),
                    'nama_vendor' => $this->input->post('nama_vendor'),
                    'harga' => $d,
            );

        $this->db->where('id_detail', $id);
    $this->db->update('detail_penawaran', $data);

    }
    public function editVendorDetail(){
        $id = $this->input->post('id_detail');
         $d = $this->input->post('harga');
             $d = str_replace('Rp', '', $d);
              $d = str_replace('.', '', $d);
               $d = str_replace(' ', '', $d);
      $data = array(
                    'tanggal' => $this->input->post('tanggal'),
                    'nama_vendor' => $this->input->post('nama_vendor'),
                    'harga' => $d,
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
                        'status'=>$this->input->post('status')
                        

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
                        'status'=>$this->input->post('status'),
                        

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
                $results=array();
            if($query->num_rows() > 0){
            return $query->result();
            }else{
            return $results;
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
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
           $this->db->limit('500');
     $this->db->order_by('status','desc');    
           $this->db->order_by('id','DESC');  
               

          
            $query = $this->db->get();
           $results=array();
            if($query->num_rows() > 0){
            return $query->result();
            }else{
            return $results;
            }
    }

   public function getItemById($id){
 $this->db->select('*');
            $this->db->from('item');
            $this->db->join('purch_req', 'item.id_purch= purch_req.id', 'left');
            $this->db->where('id_item', $id);
            $query = $this->db->get();
           $results=array();
            if($query->num_rows() > 0){
            return $query->result();
            }else{
            return $results;
            }
   }

    public function getPurch_req_section()
    {
            $section = $this->session->userdata('logged_in')['username'];
            $this->db->select('*');
            $this->db->from('purch_req');
            $this->db->where('section', $section);
             $this->db->order_by('status','DESC');
             $this->db->order_by('id','ASC');

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
         $this->db->where('id', $id);
        $this->db->delete('purch_req');

    }
    public function tambahPR(){

        $pr_no = $this->input->post('pr_no')."/".$this->input->post('section_kode')."/".$this->input->post('bulan')."/".$this->input->post('tahun');
        $query3 = $this->db->select('*')->from('purch_req')->where('pr_no', $pr_no)->get();
        if($query3->num_rows()==0){

        $data = array(
        'tgl' => $this->input->post('tgl'),
        'jam' => $this->input->post('jam'),
        'nik' => $this->input->post('nik'),
        'pic_request' => $this->input->post('pic_request'),
        'section' => $this->input->post('section'),
        'pr_no' => $pr_no,
        'status' => "OPEN"
      
        );
         $this->db->insert('purch_req', $data);
if (!empty($this->input->post('item'))) {
  

         $this->db->select('*');
        $this->db->from('purch_req');
        $this->db->where('pr_no',$pr_no);
        $query = $this->db->get();
      
       foreach ($query->result() as $key) {
         $id = $key->id;
       }
        $this->tambahItem_barang($id);
       }
           $this->session->set_flashdata('tambahPR','<div class="alert alert-success" role="alert">SUKSES TAMBAH DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
     }
     else{
 echo "<script>alert('Nomor PR tidak boleh sama')</script>";
     }
 }

    

        public function getItem_barang($id)
     {

            $this->db->select('item.id_po ,item.id_item, item.id_purch, item.item_barang,item.qty, po.id_po,po.no_po,bayangan.id_po, bayangan.id_bayangan, bayangan.qty as qtybay, bayangan.harga, item.unit_name');
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

    public function jumlahQty($id){
        //$this->db->select('bayangan.id_item, bayangan.qty as qtybay, sum(bayangan.qty) as jumlah');
        $this->db->select('bayangan.id_item, sum(bayangan.qty) as jumlah');
        $this->db->from('bayangan');
        $this->db->where('id_pr',$id);
        $this->db->group_by('id_item');
          $query = $this->db->get();
            $results=array();
            if($query->num_rows() > 0){
            return $query->result();
            }else{
            return $results;
            }
    }

    // public function getItem_barang($id){
    //     $this->db->select('*');
    //     $this->db->from('item');
    //     $this->db->where('item.id_purch',$id);
    //     $query = $this->db->get();
    //     $results=array();
    //     if($query->num_rows() > 0){
    //     return $query->result();
    //     }else{
    //     return $results;
    //     }


    // }

    public function detail_item($id){
        $this->db->select('*, count(*) as jumlah');
        $this ->db->from('bayangan');
        $this->db->join('po', 'bayangan.id_po = po.id_po');
        $this->db->where('id_pr',$id);
        $this->db->group_by('id_item');
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

     public function tambahItem_barang($id){
        //$id=array();
        $item_barang=array();$qty=array();$unit=array();
  
        $item_barang= $this->input->post('item');
        $qty= $this->input->post('qty');
        $unit= $this->input->post('unit');
              $jumlah= $this->input->post('jumlah');

        for ($i=0; $i < count($item_barang) ; $i++) { 
            $nama_barang="";
              $this->db->select('*');
        $this ->db->from('barang');
        $this->db->where('no_barang',$item_barang[$i] );
         $query = $this->db->get();
         foreach ($query->result() as $key) {
             $nama_barang = $key->nama_barang;
         }
        $data = array(
        'id_purch' => $id,
        'item_barang' => $nama_barang,
        'qty' => $qty[$i],
        'unit_name' => $unit[$i]
        );
         $this->db->insert('item', $data);
        }
       
     

    }

    public function hapusItem($id_item){
         $this->db->where('id_item', $id_item);
         $result=$this->db->delete('item');
         return $result;
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


    public function getBarang($id){
        $this->db->select('no as id,nama_barang as text');
         $this->db->where('no',$id);
         $this->db->from('barang');
         $query = $this->db->get();
         $results=array();
            if($query->num_rows() > 0){
            return $query->result();
            }else{
            return $results;
            }
    }
       public function Verify($id){
         $data = array(
        'status_fa' => 1,
      
        );
        $this->db->where('id',$id);
         $this->db->update('purch_req', $data);
    }

     public function Verifyitem($id){
         $data = array(
        'status_fa' => 1,
      
        );
        $this->db->where('id', $id);
         $this->db->update('purch_req', $data);
    }




    public function getQtySisa($id){
             $quantity=0;
             $hasil=$this->db->query("SELECT sum(qty) as jumlah FROM bayangan WHERE id_item=".$id);
         if($hasil->num_rows()>0){
            foreach ($hasil->result() as $data) {
                $quantity=$data->jumlah;
            }

        }

        $quantity2=0;
             $hsl=$this->db->query("SELECT * FROM item WHERE id_item=".$id);
        if($hsl->num_rows()>0){
            foreach ($hsl->result() as $data) {
                $quantity2 = $data->qty;
            }

        }
        $qty = $quantity2-$quantity;
        return $qty;

    }
    public function getQtySisa2($id_pr){
           $quantity=0;
             $query=$this->db->query("SELECT id_item, sum(qty) as jumlah FROM bayangan WHERE id_pr=".$id_pr." group_by id_item");
              $results=array();
            if($query->num_rows() > 0){
            return $query->result();
            }else{
            return $results;
            }
        
    }

    public function insertPrtoPo(){
       $harga = $this->input->post('harga');
        $d = $harga;
             $d = str_replace('Rp', '', $d);
              $d = str_replace('.', '', $d);
               $d = str_replace(' ', '', $d);
          $data = array(
        'id_po' => $this->input->post('no_po'),
        'id_pr' => $this->input->post('id_pr'),
        'id_item' => $this->input->post('id_item'),
        'no_pr' => $this->input->post('pr_no'),
        'item' => $this->input->post('item_barang'),
        'qty' => $this->input->post('qty_po'),
        'unit' => $this->input->post('unit'),
        'harga' => $d,
        );
          $this->db->insert('bayangan', $data);
$idpr=$this->input->post('id_pr');

         $query= $this->db->select('id_purch, sum(qty) as jumlah')->where('id_purch', $idpr)->get('item');
         foreach ($query->result() as $key) {
           $jumlahitem = $key->jumlah;
         }
          $query= $this->db->select('sum(qty) as jumlah')->where('id_pr', $idpr)->get('bayangan');
         foreach ($query->result() as $key) {
           $jumlahbay = $key->jumlah;
         }
         if($jumlahitem==$jumlahbay){
          $dat=array(
            'status' => 'CLOSED'
          );
          $this->db->where('id', $idpr);
          $this->db->update('purch_req',$dat);
         }


         // $query = $this->db->select('sum(qty) as jumlah')->from('bayangan')->where('id_item', $this->input->post('id_item'))->get();
         // foreach ($query->result() as $key) {
         //   $jmlBay = $key->jumlah;
         // }
         // $query = $this->db->select('sum(qty) as jumlah')->from('item')->where('id_item',$this->input->post('id_item'))->get();
         //  foreach ($query->result() as $key) {
         //   $jmlItem = $key->jumlah;
         // }

         // if($jmlBay == $jmlItem){
         //  $d= array(
         //    'status_po' => '1'
         //  );
         //   $this->db->where('id_item', $this->input->post('id_item'));
         //  $this->db->update('item',$d);
         // }
       }

       public function getPrById($id){
        $query = $this->db->select('*')->from('purch_req')->where('id',$id)->get();
         $results=array();
            if($query->num_rows() > 0){
            return $query->result();
            }else{
            return $results;
            }
       }

    



}
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
             $this->db->order_by('id_po','DESC');
            $query = $this->db->get();
           $results=array();
            if($query->num_rows() > 0){
            return $query->result();
            }else{
            return $results;
            }
    }


      public function getPoById($id){
        $this->db->select('*');
            $this->db->from('po');
            $this->db->where('id_po', $id);

            $query = $this->db->get();
            if($query->num_rows() > 0){
            return $query->result();
        }
    }



    public function getItemPo($id){
        $this->db->select('bayangan.*, po.supplier as supplier');
        $this->db->from('bayangan');
        $this->db->join('po','po.id_po = bayangan.id_po');
        $this->db->where('bayangan.id_po', $id);
         $query = $this->db->get();
           $results=array();
            if($query->num_rows() > 0){
            return $query->result();
            }else{
            return $results;
            }
    }


    
    public function updatePo(){
        $id_po =  $this->input->post('id_po');

        $eta = $this->input->post('eta');
         $franco = $this->input->post('franco');
         $id_supplier = $this->input->post('supplier');

        $query = $this->db->select('nama_supplier')->where('id_supplier',$id_supplier)->get("supplier");
        foreach ($query->result() as $key ) {
            $supplier = $key->nama_supplier;
        }
        

        $data = array(
      
        'eta' => $eta,
        'franco' => $franco,
        'id_supplier' =>$id_supplier,
        'supplier' => $supplier
       
      
        );

        
        $this->db->where('id_po', $id_po);
        $result = $this->db->update('Po', $data);
          return $result;
    }
    public function deletePo($id_po){
         $this->db->where('id_po', $id_po);
        $this->db->delete('po');

    }
    public function tambahPO(){
      

        $tgl_po = $this->input->post('tgl_po');
        $id_supplier = $this->input->post('supplier');

        $query = $this->db->select('nama_supplier')->where('id_supplier',$id_supplier)->get("supplier");
        foreach ($query->result() as $key ) {
            $supplier = $key->nama_supplier;
        }
         $eta = $this->input->post('eta');
          $franco = $this->input->post('franco');
         $eta = date('Y-m-d', strtotime($eta));
        $no_po = "PO"."-".$this->input->post('no_po')."/"."PUR"."-"."SAI"."/".$this->input->post('bulan')."/".$this->input->post('tahun');
        $this->db->select('*');
        $this->db->from('po');
        $this->db->where('no_po',$no_po);
        $query = $this->db->get();
        if($query->num_rows() > 0){
              echo "<script>alert('Gagal di tambahkan, Nomor PO tidak boleh sama')</script>";
             $this->load->view('Admin/header');
            $this->load->view('Admin/tambahPO');
        }else{


        $data = array(
        'tgl_po' => $tgl_po,
        'no_po' => $no_po,
        'id_supplier' => $id_supplier,
        'supplier' => $supplier,
        'status' => "OPEN",
        'eta' => $eta,
        'franco' => $franco
      
        );
         $this->db->insert('po', $data);

         $this->db->select('*');
        $this->db->from('po');
        $this->db->where('no_po',$no_po);
        $query = $this->db->get();
      
       foreach ($query->result() as $key) {
         $id_po = $key->id_po;
       }
        $this->insertPr($id_po);
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
      function delete_bayangan(){
        $id_bayangan=$this->input->post('id_bayangan');
          $query= $this->db->select('*')->from('bayangan')->where('id_bayangan', $id_bayangan)->get();
          foreach ($query->result() as $key) {
              $xx = $key->id_pr;
          }
          $data= array(
            'status' => 'OPEN'
          );
           $this->db->where('id', $xx);
            $this->db->update('purch_req',$data);

          $this->db->where('id_bayangan', $id_bayangan);
       $result = $this->db->delete('bayangan');


        return $result;
    }

    public function insertPr($id){
        $status=0;
          $jumlah=$this->input->post('jumlah');
          $itemName=array();$namaBarang=array();$qty=array();$harga= array();$unit= array();$qtysisa=array();
              $itemName=$this->input->post('itemName');
                  $namaBarang=$this->input->post('namaBarang');
                      $qty=$this->input->post('qty');
                       $qtysisa=$this->input->post('qtysisa');
                      $unit=$this->input->post('unit');
                      $harga=$this->input->post('harga');
        

        for ($i=0; $i < $jumlah ; $i++) { 
            $this->db->select('*');
            $this->db->from('item');
              $this->db->where('id_item', $namaBarang[$i]);
               $query = $this->db->get();
               foreach ($query->result() as $key) {
                   $nama = $key->item_barang;
               }
             $this->db->select('*');
            $this->db->from('purch_req');
              $this->db->where('id', $itemName[$i]);
               $query = $this->db->get();
               foreach ($query->result() as $key) {
                   $nomor = $key->pr_no;
               }
             $d = $harga[$i];
             $d = str_replace('Rp', '', $d);
              $d = str_replace('.', '', $d);
               $d = str_replace(' ', '', $d);
        if ($qtysisa[$i] < $qty[$i]) {
            $status=1;
        }else{


        $data = array(
        'id_po' => $id,
        'id_pr' => $itemName[$i],
        'id_item' => $namaBarang[$i],
        'no_pr' => $nomor,
        'item' => $nama,
        'qty' => $qty[$i],
        'unit' => $unit[$i],
        'harga' => $d,
       
        );

         $this->db->insert('bayangan', $data);

         $query= $this->db->select('id_purch, sum(qty) as jumlah')->where('id_purch', $itemName[$i])->get('item');
         foreach ($query->result() as $key) {
           $jumlahitem = $key->jumlah;
         }
          $query= $this->db->select('sum(qty) as jumlah')->where('id_pr', $itemName[$i])->get('bayangan');
         foreach ($query->result() as $key) {
           $jumlahbay = $key->jumlah;
         }
         if($jumlahitem==$jumlahbay){
          $dat=array(
            'status' => 'CLOSED'
          );
          $this->db->where('id',  $itemName[$i]);
          $this->db->update('purch_req',$dat);
         }
       }
   }
   return $status;


        }




    

  


        

}
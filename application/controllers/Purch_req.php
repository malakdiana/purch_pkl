<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Purch_req extends CI_Controller {
	///

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Purch_reqModel');
        $this->load->model('QrModel');
         $this->load->helper('url','form');
        // $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
         // $this->load->library('excel','upload');
         if (!$this->session->userdata('logged_in')) {
          redirect('Login','refresh');
        }

    
    }

public function index()
	{
         $datax['notif']= $this->QrModel->getNotifikasi(); $datax['edit']= $this->QrModel->getNotifEdit();
		$data['Purch_req']= $this->Purch_reqModel->getPurch_req();
        if($this->session->userdata('logged_in')['hak_akses']==1){
		$this->load->view('admin/header',$datax);
        $this->load->view('admin/Purch_req',$data);

        }else if($this->session->userdata('logged_in')['hak_akses']==2){
        $data['Purch_req']= $this->Purch_reqModel->getPurch_req_section();
        $this->load->view('user/header',$datax);
        $this->load->view('user/Purch_req',$data);

        }else if($this->session->userdata('logged_in')['hak_akses']==4){
        
        $this->load->view('Personal/header',$datax);
        $this->load->view('Personal/Purch_req',$data);

    }
   
	}

    public function search(){
        $json = [];
        $this->load->database();

        
        if(!empty($this->input->get("q"))){
            $this->db->like('nama_barang', $this->input->get("q"));
            $query = $this->db->select('no as id,nama_barang as text')->limit(10)->get("barang");
            $json = $query->result();
        }else{
 $query = $this->db->select('no as id,nama_barang as text')->limit(10)->get("barang");
            $json = $query->result();
        }

        
        echo json_encode($json);
    }

       public function tambahPR(){
         $datax['notif']= $this->QrModel->getNotifikasi(); $datax['edit']= $this->QrModel->getNotifEdit();
        $this->load->model('SectionModel');
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
               
        $this->load->model('Unit_barangModel');

            $data['unit']= $this->Unit_barangModel->getUnit_barang();
        $this->form_validation->set_rules('tgl', 'tgl', 'trim|required');
        if ($this->form_validation->run()==FALSE) {
             $data['section']=$this->SectionModel->getSection();
              if($this->session->userdata('logged_in')['hak_akses']==1){
            $this->load->view('admin/header',$datax);
            $this->load->view('admin/tambahPR', $data);
        }else{
              $this->load->view('user/header',$datax);
            $this->load->view('user/tambahPR', $data);
        }
          
        }else{
            $this->Purch_reqModel->tambahPR();
            
            redirect('Purch_req/', 'refresh');
        }

    }

       

     public function tambahItem($id){
         $datax['notif']= $this->QrModel->getNotifikasi(); $datax['edit']= $this->QrModel->getNotifEdit();
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
       
        $this->load->model('Unit_barangModel');

            $data['unit']= $this->Unit_barangModel->getUnit_barang();
            $data['id']=$id;
            $data['list']=$this->Purch_reqModel->getPrById($id);
            $data['detail']=$this->Purch_reqModel->getItem_barang($id);

               if($this->session->userdata('logged_in')['hak_akses']==1){
            $this->load->view('admin/header',$datax);
            $this->load->view('admin/tambahItem_barang',$data);
        }else{
              $this->load->view('user/header',$datax);
            $this->load->view('admin/tambahItem_barang',$data);
        }
           

    }

    public function tambah($id){
         $this->Purch_reqModel->tambahItem_barang($id);
                $this->session->set_flashdata('tambahItem','<div class="alert alert-success" role="alert">SUKSES TAMBAH DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
          
            redirect('Purch_req', 'refresh');
    }


    public function GetItem_barang($id,$status){
         $datax['notif']= $this->QrModel->getNotifikasi(); $datax['edit']= $this->QrModel->getNotifEdit();
        $data['status_fa']=$status;

            $data['Purch_req']= $this->Purch_reqModel->GetItem_barang($id);
            $data['detail']= $this->Purch_reqModel->jumlahQty($id);
            $this->load->model('BarangModel');
            $data['barang']= $this->BarangModel->getBarang(); $data['id']=$id;
                if($this->session->userdata('logged_in')['hak_akses']==1){
            $this->load->view('admin/header',$datax);
            $this->load->view('admin/GetItem_barang',$data);

        }else if($this->session->userdata('logged_in')['hak_akses']==2){
            $this->load->view('user/header',$datax);
            $this->load->view('user/GetItem_barang',$data);
          }else if($this->session->userdata('logged_in')['hak_akses']==4){
            $this->load->view('Personal/header',$datax);
            $this->load->view('Personal/GetItem_barang',$data);
         
            }  

    }

     public function GetItem_barang_user($id){
         $datax['notif']= $this->QrModel->getNotifikasi(); $datax['edit']= $this->QrModel->getNotifEdit();

            $data['Purch_req']= $this->Purch_reqModel->GetItem_barang($id);
            $data['detail']= $this->Purch_reqModel->jumlahQty($id);
            $this->load->model('BarangModel');
            $data['barang']= $this->BarangModel->getBarang(); $data['id']=$id;
                if($this->session->userdata('logged_in')['hak_akses']==1){
            $this->load->view('admin/header',$datax);
            $this->load->view('admin/GetItem_barang',$data);

        }else if($this->session->userdata('logged_in')['hak_akses']==2){
            $this->load->view('user/header',$datax);
            $this->load->view('user/GetItem_barang',$data);
          }else if($this->session->userdata('logged_in')['hak_akses']==4){
            $this->load->view('Personal/header',$datax);
            $this->load->view('Personal/GetItem_barang',$data);
         
           

    }
  }

    public function updateItem(){

       
        $this->Purch_reqModel->updateItem();
                $this->session->set_flashdata('editItem','<div class="alert alert-success" role="alert">SUKSES UPDATE DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                $id = $this->input->post('id');
                if(empty($this->input->post('status'))){
 redirect("Purch_req/GetItem_barang_user/$id", 'refresh');
                }else{
                     $status = $this->input->post('status');
            redirect("Purch_req/GetItem_barang/$id/$status", 'refresh');
        }
    }

    public function hapusItem($id,$id_item,$status){

        $x= $this->Purch_reqModel->hapusItem($id_item);
        if($x == null){
            echo "<script>alert('Item tidak bisa dihapus karena memiliki nomor PO')</script>";
        }else{
                $this->session->set_flashdata('editItem','<div class="alert alert-success" role="alert">SUKSES HAPUS ITEM <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            }
            redirect("Purch_req/GetItem_barang/$id/$status", 'refresh');
    }

      function deleteItem(){
        $id = $this->input->post('id_item');
        $data=$this->Purch_reqModel->hapusItem($id);
        echo json_encode($data);
    }

   

    public function deletePurch_req($id){
        $this->Purch_reqModel->deletePurch_req($id);
               
    }

      public function Verify($id){

        $this->Purch_reqModel->Verify($id);
        
            
            redirect("Purch_req/", 'refresh');
    }

       public function Verifyitem($id){

        $this->Purch_reqModel->Verifyitem($id);
        redirect("Purch_req/GetItem_barang/$id/1", 'refresh');
            
          //  redirect("Purch_req/", 'refresh');
    }

      public function InsertPo($id){
         $datax['notif']= $this->QrModel->getNotifikasi(); $datax['edit']= $this->QrModel->getNotifEdit();
       $query = $this->db->select('*')->from('item')->join('purch_req', 'item.id_purch = purch_req.id')->where('item.id_item',$id)->get();
       $status=0;
       $idp=0;
       foreach ($query->result() as $key ) {
           if($key->status_fa == 1){
            $status=1;
          
           }
             $idp= $key->id_purch;
       }
       if($status == 1){
        $data['list'] = $this->Purch_reqModel->getItemById($id);
        $data['qtysisa'] = $this->Purch_reqModel->getQtySisa($id);
        $this->load->view('admin/header',$datax);
        $this->load->view('admin/InsertPo', $data);
    }else{
          echo "<script>alert('Belum di verifikasi')</script>";
           redirect('Purch_req/GetItem_barang/'.$idp.'/'.$status, 'refresh');

    }

    }
    public function getPo(){
          $this->load->database();

        
        if(!empty($this->input->get("q"))){
            $this->db->like('no_po', $this->input->get("q"));
            $query = $this->db->select('id_po as id,no_po as text')->where('status',0)->get("po");
            $json = $query->result();
        }else{
            $query = $this->db->select('id_po as id,no_po as text')->where('status',0)->get("po");
            $json = $query->result();
        }

        
        echo json_encode($json);
    }
     public function getBarang(){
          $this->load->database();

        
        if(!empty($this->input->get("q"))){
            $this->db->like('nama_barang', $this->input->get("q"));
            $query = $this->db->select('no_barang as id,nama_barang as text')->get("barang");
            $json = $query->result();
        }else{
             $query = $this->db->select('no_barang as id,nama_barang as text')->get("barang");
            $json = $query->result();
        }

        
        echo json_encode($json);
    }

    public function insertPrtoPo($id){
          $this->load->database();
        $query = $this->db->select('*')->from('item')->join('purch_req','item.id_purch=purch_req.id')->where('id_item',$id)->get();
        foreach ($query->result() as $key) {
            $id_pr = $key->id_purch;
            $status = $key->status_fa;
        }

        if($this->input->post('qty_po') > $this->input->post('qty') ){
            echo "<script>alert('Gagal di tambahkan, quantity terlalu banyak')</script>";
        redirect('Purch_req/GetItem_barang/'.$id_pr.'/'.$status, 'refresh');
        }else{
              $this->Purch_reqModel->insertPrtoPo();  
              echo "<script>alert('Berhasil di tambahkan')</script>";
             redirect('Purch_req/GetItem_barang/'.$id_pr.'/'.$status, 'refresh');
        }
     
    }

	
}

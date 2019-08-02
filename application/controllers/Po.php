<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Po extends CI_Controller {
	///

	public function __construct()
    {
        parent::__construct();
         $this->load->model('PoModel');
         $this->load->model('QrModel');
         $this->load->model('Purch_reqModel');
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
		$data['Po']= $this->PoModel->getPo();
        if($this->session->userdata('logged_in')['hak_akses']==1){
		$this->load->view('admin/header',$datax);
        $this->load->view('admin/Po',$data);
        }
}
    public function getBarang($id)
    {
        $json = [];


        $this->load->database();

        
        if(!empty($this->input->get("q"))){
            $this->db->like('item_barang', $this->input->get("q"));
            $query = $this->db->select('id_item as id,item_barang as text')->where('id_purch',$id)->get("item");
            $json = $query->result();
        }else{
            $query = $this->db->select('id_item as id,item_barang as text')->where('id_purch',$id)->get("item");
            $json = $query->result(); 
        }

        
        echo json_encode($json);
    }
    public function getPObySup($id){
        $json = [];


        $this->load->database();

        
        if(!empty($this->input->get("q"))){
            $this->db->like('no_po', $this->input->get("q"));
            $query = $this->db->select('id_po as id,no_po as text')->where('id_supplier',$id)->get("po");
            $json = $query->result();
        }else{
           $query = $this->db->select('id_po as id,no_po as text')->where('id_supplier',$id)->get("po");
            $json = $query->result();  
        }

        
        echo json_encode($json);
    }

    public function getQtyBarang(){

        $this->load->database();

         if(!empty($this->input->post("ids"))){
             $id=$this->input->post("ids"); $quantity=0;
             $hasil=$this->db->query("SELECT sum(qty) as jumlah FROM bayangan WHERE id_item=".$id); if($hasil->num_rows()>0){
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
        $qty=$quantity2-$quantity;
        foreach ($hsl->result() as $data) {
               
                $data=array(
                   'id_item' => $data->id_item,
                   'unit' => $data->unit_name,
                    'qty' => $qty,
                    );


            }
        

         
        echo json_encode($data);
    }
}

public function getTotalPO(){
    $id = $this->input->post("ids");
    $jumlah=0;
     $hasil=$this->db->query("SELECT item, sum(harga) as jumlah FROM bayangan WHERE id_po=".$id);
            foreach ($hasil->result() as $data) {
                $jumlah=$data->jumlah;
            }
            $x= $hasil->result();
             $data=array(
                   'id_po' => $id,
                   'barang' => $x[0]->item,
                   'jumlah' => $jumlah
                    );
                     
        echo json_encode($data);
    }


   
	public function getPr(){


        $this->load->database();

        
        if(!empty($this->input->get("q"))){
            $this->db->like('pr_no', $this->input->get("q"));
            $query = $this->db->select('id,pr_no as text')->where('status','OPEN')->where('status_fa','1')->get("purch_req");
            $json = $query->result();
        }else{
             $query = $this->db->select('id,pr_no as text')->where('status','OPEN')->where('status_fa','1')->get("purch_req");
            $json = $query->result();
        }

        
        echo json_encode($json);

    }
    public function getSup(){


        $this->load->database();

        
        if(!empty($this->input->get("q"))){
            $this->db->like('nama_supplier', $this->input->get("q"));
            $query = $this->db->select('id_supplier as id,nama_supplier as text')->get("supplier");
            $json = $query->result();
        }else{
              $query = $this->db->select('id_supplier as id,nama_supplier as text')->get("supplier");
            $json = $query->result();
        }

        
        echo json_encode($json);

    }
    public function detail_itemPo($id){
         $datax['notif']= $this->QrModel->getNotifikasi(); $datax['edit']= $this->QrModel->getNotifEdit();
        $data['brg']= $this->PoModel->getItemPo($id);
        $data['id']= $id;
        if($this->session->userdata('logged_in')['hak_akses']==1){
        $this->load->view('admin/header',$datax);
        $this->load->view('admin/detail_itemPo',$data);
        }

    }
     function deleteBayangan(){
        $data=$this->PoModel->delete_bayangan();
        echo json_encode($data);
    }

       public function tambahPO(){
         $datax['notif']= $this->QrModel->getNotifikasi(); $datax['edit']= $this->QrModel->getNotifEdit();
        // $this->load->model('SectionModel');
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('tgl_po', 'tgl_po', 'trim|required');
        if ($this->form_validation->run()==FALSE) {
             // $data['section']=$this->SectionModel->getSection();
            $this->load->view('admin/header',$datax);
            $this->load->view('admin/tambahPO');
          
        }else{
           
            $this->PoModel->tambahPO();
              
        }

    }

    public function tambahItem($id){
         $datax['notif']= $this->QrModel->getNotifikasi(); $datax['edit']= $this->QrModel->getNotifEdit();
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
            $this->load->model('SupplierModel');

             $data['supplier'] = $this->SupplierModel->getSupplier();
            $data['detail'] = $this->PoModel->getItemPo($id);
            $data['list'] = $this->PoModel->getPoById($id);
            $data['id']=$id;
  
            $this->load->view('admin/header',$datax);
            $this->load->view('admin/insert_itemPo',$data);

    }

    public function tambah($id){
         $this->Purch_reqModel->tambahItem_barang();
                $this->session->set_flashdata('tambahUnit_barang','<div class="alert alert-success" role="alert">SUKSES TAMBAH DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Po', 'refresh');
    }


    public function GetItem_barang($id){
         $datax['notif']= $this->QrModel->getNotifikasi(); $datax['edit']= $this->QrModel->getNotifEdit();

            $data['Purch_req']= $this->Purch_reqModel->GetItem_barang($id);
            $this->load->model('BarangModel');
            $data['barang']= $this->BarangModel->getBarang();
            $data['id']=$id;
                if($this->session->userdata('logged_in')['hak_akses']==1){
            $this->load->view('admin/header',$datax);
            $this->load->view('admin/GetItem_barang',$data);

        }else if($this->session->userdata('logged_in')['hak_akses']==2){
            $this->load->view('user/header',$datax);
            $this->load->view('admin/GetItem_barang',$data);
         
            }else{
                      $this->load->view('read_only/header');
            $this->load->view('read_only/GetItem_barang',$data);
            }   

    }

    public function updateItem(){
        $this->Purch_reqModel->updateItem();
                $this->session->set_flashdata('editItem','<div class="alert alert-success" role="alert">SUKSES UPDATE DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                $id = $this->input->post('id');
            redirect("Po/GetItem_barang/$id", 'refresh');
    }

    public function deleteItemPo($id,$id_item){
         $this->PoModel->deleteItem($id_item);
                $this->session->set_flashdata('editItem','<div class="alert alert-success" role="alert">SUKSES UPDATE DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect("Po/detail_itemPo/$id", 'refresh');
    }

   

    public function deletePo($id_po){
        $this->PoModel->deletePo($id_po);
                $this->session->set_flashdata('deletePo','<div class="alert alert-success" role="alert">SUKSES DELETE DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Po', 'refresh');
    }

     public function EditPo($id){
         $datax['notif']= $this->QrModel->getNotifikasi(); $datax['edit']= $this->QrModel->getNotifEdit();
        $data['list'] = $this->PoModel->getPoById($id);
        $this->load->view('admin/header',$datax);
        $this->load->view('admin/editPo', $data);
        $this->load->view('admin/footer');
    }

 

    public function insertPr($id){
        $xx= $this->PoModel->insertPr($id);
        if($xx == 1){
            echo "<script>alert('Gagal di tambahkan, quantity terlalu banyak')</script>";
          redirect('Po/tambahItem/'.$id, 'refresh');
        }else{
               echo "<script>alert('Berhasil ditambahkan')</script>";
          redirect('Po/tambahItem/'.$id, 'refresh');
        }
    }

    public function update(){
        $data=$this->PoModel->updatePo();
        echo json_encode($data);
    }

   
}

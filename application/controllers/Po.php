<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Po extends CI_Controller {
	///

	public function __construct()
    {
        parent::__construct();
         $this->load->model('PoModel');
         $this->load->helper('url','form');
        // $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
         // $this->load->library('excel','upload');

    
    }

public function index()
	{
		$data['Po']= $this->PoModel->getPo();
        if($this->session->userdata('logged_in')['hak_akses']==1){
		$this->load->view('Admin/header');
        $this->load->view('Admin/Po',$data);
        }else{
        $this->load->view('Read_only/header');
        $this->load->view('Read_only/Po',$data);
    }
}
    public function getBarang($id)
    {
        $json = [];


        $this->load->database();

        
        if(!empty($this->input->get("q"))){
            $this->db->like('item_barang', $this->input->get("q"));
            $query = $this->db->select('id_item as id,item_barang as text')->where('id_purch',$id)
                        ->limit(10)
                        ->get("item");
            $json = $query->result();
        }

        
        echo json_encode($json);
    }

    public function getQtyBarang(){

        $this->load->database();

         if(!empty($this->input->post("ids"))){
             $id=$this->input->post("ids");
             $hsl=$this->db->query("SELECT * FROM item WHERE id_item=".$id);
        if($hsl->num_rows()>0){
            foreach ($hsl->result() as $data) {
                $data=array(
                    'id_item' => $data->id_item,
                    'qty' => $data->qty,
                    );


            }

        }
         
        echo json_encode($data);
    }
}
   
	public function getPr(){


        $this->load->database();

        
        if(!empty($this->input->get("q"))){
            $this->db->like('pr_no', $this->input->get("q"));
            $query = $this->db->select('id,pr_no as text')->where('status','OPEN')
                        ->limit(10)
                        ->get("purch_req");
            $json = $query->result();
        }

        
        echo json_encode($json);

    }
    public function detail_itemPo($id){
        $data['brg']= $this->PoModel->getItemPo($id);
        $data['id']= $id;
        if($this->session->userdata('logged_in')['hak_akses']==1){
        $this->load->view('Admin/header');
        $this->load->view('Admin/detail_itemPo',$data);
        }else{
        $this->load->view('Read_only/header');
        $this->load->view('Read_only/detail_itemPo',$data);
    }

    }

       public function tambahPO(){
        // $this->load->model('SectionModel');
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('tgl_po', 'tgl_po', 'trim|required');
        if ($this->form_validation->run()==FALSE) {
             // $data['section']=$this->SectionModel->getSection();
            $this->load->view('Admin/header');
            $this->load->view('Admin/tambahPO');
          
        }else{
            $this->PoModel->tambahPO();
                $this->session->set_flashdata('tambahPO','<div class="alert alert-success" role="alert">SUKSES TAMBAH DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Po/', 'refresh');
        }

    }

    public function tambahItem($id){
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
       
            $data['list'] = $this->PoModel->getPoById($id);
            $data['id']=$id;
  
            $this->load->view('Admin/header');
            $this->load->view('Admin/insert_itemPo',$data);

    }

    public function tambah($id){
         $this->Purch_reqModel->tambahItem_barang();
                $this->session->set_flashdata('tambahUnit_barang','<div class="alert alert-success" role="alert">SUKSES TAMBAH DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Po', 'refresh');
    }


    public function GetItem_barang($id){

            $data['Purch_req']= $this->Purch_reqModel->GetItem_barang($id);
            $this->load->model('BarangModel');
            $data['barang']= $this->BarangModel->getBarang();
            $data['id']=$id;
                if($this->session->userdata('logged_in')['hak_akses']==1){
            $this->load->view('Admin/header');
            $this->load->view('Admin/GetItem_barang',$data);

        }else if($this->session->userdata('logged_in')['hak_akses']==2){
            $this->load->view('User/header');
            $this->load->view('Admin/GetItem_barang',$data);
         
            }else{
                      $this->load->view('Read_only/header');
            $this->load->view('Read_only/GetItem_barang',$data);
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
        $data['list'] = $this->PoModel->getPoById($id);
        $this->load->view('Admin/header');
        $this->load->view('Admin/editPo', $data);
        $this->load->view('Admin/footer');
    }

 

   
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Purch_req extends CI_Controller {
	///

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Purch_reqModel');
         $this->load->helper('url','form');
        // $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
         // $this->load->library('excel','upload');

    
    }

public function index()
	{
		$data['Purch_req']= $this->Purch_reqModel->getPurch_req();
        if($this->session->userdata('logged_in')['hak_akses']==1){
		$this->load->view('Admin/header');
        $this->load->view('Admin/Purch_req',$data);

        }else if($this->session->userdata('logged_in')['hak_akses']==2){
        $this->load->view('User/header');
        $this->load->view('Admin/Purch_req',$data);


    }else{
        $this->load->view('Read_only/header');
        $this->load->view('Read_only/Purch_req',$data);
    }
   
	}

       public function tambahPR(){
        $this->load->model('SectionModel');
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('tgl', 'tgl', 'trim|required');
        if ($this->form_validation->run()==FALSE) {
             $data['section']=$this->SectionModel->getSection();
              if($this->session->userdata('logged_in')['hak_akses']==1){
            $this->load->view('Admin/header');
            $this->load->view('Admin/tambahPR', $data);
        }else{
              $this->load->view('User/header');
            $this->load->view('Admin/tambahPR', $data);
        }
          
        }else{
            $this->Purch_reqModel->tambahPR();
                $this->session->set_flashdata('tambahPR','<div class="alert alert-success" role="alert">SUKSES TAMBAH DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Purch_req/', 'refresh');
        }

    }

       

     public function tambahItem($id){
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
       
        $this->load->model('BarangModel');
            $data['barang']= $this->BarangModel->getBarang();
            $data['id']=$id;
               if($this->session->userdata('logged_in')['hak_akses']==1){
            $this->load->view('Admin/header');
            $this->load->view('Admin/tambahItem_barang',$data);
        }else{
              $this->load->view('User/header');
            $this->load->view('Admin/tambahItem_barang',$data);
        }
           

    }

    public function tambah($id){
         $this->Purch_reqModel->tambahItem_barang();
                $this->session->set_flashdata('tambahUnit_barang','<div class="alert alert-success" role="alert">SUKSES TAMBAH DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Purch_req', 'refresh');
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
            redirect("Purch_req/GetItem_barang/$id", 'refresh');
    }

    public function hapusItem($id,$id_item){
         $this->Purch_reqModel->deleteItem($id_item);
                $this->session->set_flashdata('editItem','<div class="alert alert-success" role="alert">SUKSES UPDATE DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect("Purch_req/GetItem_barang/$id", 'refresh');
    }


	
}

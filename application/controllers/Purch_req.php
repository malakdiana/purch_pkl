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
		$this->load->view('Admin/header');
        $this->load->view('Admin/Purch_req',$data);
   
	}

     public function tambahItem(){
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('item_barang', 'item_barang', 'trim|required');
        if ($this->form_validation->run()==FALSE) {
            $this->load->view('Admin/header');
            $this->load->view('Admin/tambahItem_barang');
            $this->load->view('Admin/footer');
        }else{
            $this->Purch_reqModel->tambahItem_barang();
                $this->session->set_flashdata('tambahUnit_barang','<div class="alert alert-success" role="alert">SUKSES TAMBAH DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Purch_req', 'refresh');
        }

    }


    public function GetItem_barang($id){

            $data['Purch_req']= $this->Purch_reqModel->GetItem_barang($id);
            $this->load->model('BarangModel');
            $data['barang']= $this->BarangModel->getBarang();

            $this->load->view('Admin/header');
            $this->load->view('Admin/GetItem_barang',$data);
            $this->load->view('Admin/footer');       

    }

	
}

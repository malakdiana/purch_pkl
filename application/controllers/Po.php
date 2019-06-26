<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Po extends CI_Controller {
	///

	public function __construct()
    {
        parent::__construct();
        // $this->load->model('PoModel');
         $this->load->helper('url','form');
        // $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
         // $this->load->library('excel','upload');

    
    }

public function index()
	{
		$data['Po']= $this->PoModel->getPo();
		$this->load->view('Admin/header');
        $this->load->view('Admin/Po',$data);
   
	}

       public function tambahPO(){
        // $this->load->model('SectionModel');
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('tgl', 'tgl', 'trim|required');
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

   
}

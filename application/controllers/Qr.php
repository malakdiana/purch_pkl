<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Qr extends CI_Controller {
	///

	public function __construct()
    {
        parent::__construct();
        $this->load->model('QrModel');
         $this->load->helper('url','form');
        // $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
         // $this->load->library('excel','upload');

    
    }

public function index()
	{
		
		$this->load->view('User/header');
        $this->load->view('User/Qr');
   
	}

       public function tambahQR(){
        $this->load->model('SectionModel');
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('item', 'item', 'trim|required');
        if ($this->form_validation->run()==FALSE) {
            $data['section']=$this->SectionModel->getSection();
            $this->load->view('User/header');
            $this->load->view('User/tambahQR', $data);
            $this->load->view('Admin/footer');
        }else{

            $config['upload_path'] = './assets/upload/';
            $config['allowed_types'] = 'pdf|jpg|png|jpeg';
            $config['max_size']= 1000000000;
            $config['max_width']= 10240;
            $config['max_height']=7680;
            $this->load->library('upload', $config);

            if(!$this->upload->do_upload('gambar')){
                $data['section']=$this->SectionModel->getSection();
                $error= array('error'=>$this->upload->display_errors());
                $this->load->view('User/header');
                $this->load->view('User/tambahQR',$data, $error);
                $this->load->view('Admin/footer');
            }else{
                $this->wisata_model->tambahQR();
               $this->session->set_flashdata('tambahQR','<div class="alert alert-success" role="alert">SUKSES TAMBAH DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Qr/', 'refresh');
            }
                
        }

    }

     

	
}

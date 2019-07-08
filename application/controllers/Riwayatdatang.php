<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayatdatang extends CI_Controller {
	///

	public function __construct()
    {
        parent::__construct();
         $this->load->model('PoModel');
         $this->load->model('Purch_reqModel');
         $this->load->helper('url','form');
        // $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
         // $this->load->library('excel','upload');

    
    }

public function index()
	{
		$data['Po']= $this->PoModel->getPo();
        if($this->session->userdata('logged_in')['hak_akses']==1){
		$this->load->view('Admin/header');
        $this->load->view('Admin/Riwayatdatang',$data);
        }else{
        $this->load->view('Read_only/header');
        $this->load->view('Read_only/Po',$data);
    }
}

   
}

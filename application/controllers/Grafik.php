<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grafik extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('GrafikModel');
		 $this->load->helper('url','form','download');
		  $this->load->library('excel','upload');


	
	}

public function index()
	{
		$data['grafik']= $this->GrafikModel->getSupplier();
		$data['pr'] = $this->GrafikModel->getPrOpen();
		$data['qr'] = $this->GrafikModel->getQrOpen();
		$data['eta'] = $this->GrafikModel->eta();
		$data['delay'] = $this->GrafikModel->delay();
		$data['section'] = $this->GrafikModel->getSection();
		$this->load->view('Admin/header');
        $this->load->view('Admin/grafik',$data);
   
	}

	public function setting(){
		$data['user']= $this->AddModel->getUser();
		$this->load->view('admin/header');
		$this->load->view('admin/setting',$data);
	}

	  function getSupplier(){
        $tgl=$this->input->get('tgl');
        $tgl= explode('-', $tgl);
       //echo "$tgl[1]";die();
        $data=$this->GrafikModel->getSupplierr($tgl[1]);
        echo json_encode($data);
    }
	
}

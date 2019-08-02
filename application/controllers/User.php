<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Purch_reqModel');
		$this->load->model('QrModel');
		 $this->load->helper('url','form','download');
		  $this->load->library('Excel','upload');
		  if (!$this->session->userdata('logged_in')) {
	      redirect('Login','refresh');
	    }
	}
	  

public function index()
	{
		$datax['notif']= $this->QrModel->getNotifikasi();
		$data['Purch_req']= $this->Purch_reqModel->getPurch_req();
		$this->load->view('user/header',$datax);
        $this->load->view('user/dashboard',$data);
   
	}

	public function setting(){
		$datax['notif']= $this->QrModel->getNotifikasi(); $datax['edit']= $this->QrModel->getNotifEdit();
		$data['user']= $this->AddModel->getUser();
		$this->load->view('admin/header',$datax);
		$this->load->view('admin/setting',$data);
	}
	
}

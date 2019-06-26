<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		 $this->load->helper('url','form','download');
		  $this->load->library('excel','upload');


	
	}

public function index()
	{  if($this->session->userdata('logged_in')['hak_akses']==1){
		$this->load->view('Admin/header');
        $this->load->view('Admin/dashboard');
    }else{
    	$this->load->view('User/header');
        $this->load->view('User/dashboard');
    }
   
	}

	

	public function setting(){
		$data['user']= $this->AddModel->getUser();
		 if($this->session->userdata('logged_in')['hak_akses']==1){
		$this->load->view('admin/header');
		$this->load->view('admin/setting',$data);
		 }else{
		 	$this->load->view('User/header');
        $this->load->view('User/setting');
	}
	
}
}

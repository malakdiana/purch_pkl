<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Purch_reqModel');
		 $this->load->helper('url','form','download');
		  $this->load->library('Excel','upload');
	}

public function index()
	{
		$data['Purch_req']= $this->Purch_reqModel->getPurch_req();
		$this->load->view('user/header');
        $this->load->view('user/dashboard',$data);
   
	}

	public function setting(){
		$data['user']= $this->AddModel->getUser();
		$this->load->view('admin/header');
		$this->load->view('admin/setting',$data);
	}
	
}

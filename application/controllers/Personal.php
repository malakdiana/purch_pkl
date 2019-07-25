<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Personal extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Purch_reqModel');
		 $this->load->helper('url','form','download');
		  $this->load->library('Excel','upload');
		  if (!$this->session->userdata('logged_in')) {
	      redirect('Login','refresh');
	    }


	
	}

public function index()
	{
		$data['Purch_req']= $this->Purch_reqModel->getPurch_req();
		$this->load->view('Personal/header');
        $this->load->view('Personal/dashboard',$data);
   
	}

	
	
}

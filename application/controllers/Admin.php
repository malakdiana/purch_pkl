<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('SupplierModel');
		 $this->load->helper('url','form','download');
		  $this->load->library('excel','upload');

	
	}
	public function index()
	
	{
		$data['supp']= $this->SupplierModel->getSupplier();
		$this->load->view('admin/header');
		$this->load->view('admin/supplier',$data);
	}

	public function setting(){
		$data['user']= $this->AddModel->getUser();
		$this->load->view('admin/header');
		$this->load->view('admin/setting',$data);
	}
	
}

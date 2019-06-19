<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('AdminModel');
	
	}

	public function index()
	
	{
		$data['supp']= $this->AdminModel->getSupplier();
		$this->load->view('admin/header');
		$this->load->view('admin/supplier',$data);
	}
	public function updateSupplier(){
		$this->AdminModel->updateSupplier();
				$this->session->set_flashdata('editSupplier','<div class="alert alert-success" role="alert">SUKSES UPDATE DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('Admin', 'refresh');
	}
}

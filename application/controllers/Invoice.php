<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->load->model('Purch_reqModel');
		 $this->load->helper('url','form','download');
		  $this->load->library('excel','upload');


	
	}

public function index()
	{
		// $data['Purch_req']= $this->InvoiceModel->getInvoice();
		$this->load->view('Invoice/header');
        $this->load->view('Invoice/Dashboard');
   
	}

	// public function setting(){
	// 	$data['Invoice']= $this->AddModel->getInvoice();
	// 	$this->load->view('admin/header');
	// 	$this->load->view('admin/setting',$data);
	// }
	
}

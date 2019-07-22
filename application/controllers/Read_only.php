<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Read_only extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Read_onlyModel');
		 $this->load->helper('url','form','download');
		  $this->load->library('Excel','upload');


	
	}

public function index()
	{
		// $data['Read_only']= $this->Read_onlyModel->getPurch_req();
		$this->load->view('Read_only/header');
        $this->load->view('Read_only/dashboard');
   
	}


	   public function GetItem_barang($id){
	   		$this->load->model('Read_onlyModel');
            $data['Read_only']= $this->Read_onlyModel->GetItem_barang($id);
            $data['id']=$id;
            $this->load->view('Read_only/header');
            $this->load->view('Read_only/GetItem_barang',$data);
            $this->load->view('admin/footer');       

    }


	
}

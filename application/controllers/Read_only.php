<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Read_only extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Read_onlyModel');
			$this->load->model('Purch_reqModel');
					$this->load->model('PoModel');

					$this->load->model('QrModel');
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
	   
            $data['Purch_req']= $this->Read_onlyModel->GetItem_barang($id);
            $data['id']=$id;
            $this->load->view('Read_only/header');
            $this->load->view('Read_only/GetItem_barang',$data);
            $this->load->view('admin/footer');       

    }

public function getPr(){
   	$data['Purch_req']= $this->Purch_reqModel->getPurch_req();
        $this->load->view('read_only/header');
        $this->load->view('read_only/Purch_req',$data);
            $this->load->view('admin/footer');    
}

public function getPo(){
	$this->load->model('PoModel');
			$data['Po']= $this->PoModel->getPo();
        $this->load->view('read_only/header');
        $this->load->view('read_only/Po',$data);
}

public function detailItem_Po($id){

      $data['brg']= $this->PoModel->getItemPo($id);
        $data['id']= $id;
        $this->load->view('read_only/header');
        $this->load->view('read_only/detail_itemPo',$data);
    
}

public function getQr(){
$data['Qr']=$this->QrModel->getQr();
        $this->load->view('read_only/header');
        $this->load->view('read_only/Qr',$data);
    
}

 public function detailQuotationUser($id){
 	  $data['list'] = $this->QrModel->getQrById($id);
         $this->load->view('read_only/header');
        $this->load->view('read_only/editQuotation', $data);
        $this->load->view('admin/footer');
    }
    public function dashboard(){

    	$this->load->view('read_only/header');
        $this->load->view('read_only/dashboard');
    
    }
    


	
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eta extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('EtaModel');
	
	}

public function index()
	{

		if(empty($this->input->post('search'))){
		$tgl = mktime(0, 0, 0, date("m"), date("d")+1, date("Y"));
		//$date->modify('+24 hours');
		$tgl =  date("Y-m-d", $tgl);
	}else{
		$tgl = $this->input->post('search');
	}
		$data['tgl']=$tgl;
		$data['eta']= $this->EtaModel->getPo($tgl);
		$this->load->view('Admin/header');
        $this->load->view('Admin/eta',$data);
   
	}

	public function delay()
	{
		
		if(empty($this->input->post('search'))){
		$tgl = mktime(0, 0, 0, date("m"), date("d")+1, date("Y"));
		
		$tgl =  date("Y-m-d", $tgl);
		$tgl2 = mktime(0, 0, 0, date("m"), date("d")+5, date("Y"));
		
		$tgl2 =  date("Y-m-d", $tgl2);
	}else{
		$tgl = $this->input->post('search');
		$tgl2 = $this->input->post('search2');
	}
		$data['tgl']=$tgl;
		$data['tgl2']=$tgl2;
		$data['delay']= $this->EtaModel->getDelay($tgl,$tgl2);
		$this->load->view('Admin/header');
        $this->load->view('Admin/delay',$data);
   
	}




	public function invoice($id){
	  $this->EtaModel->invoice($id);
            
            redirect("Eta/", 'refresh');
	}

	public function konfirmasi($id){
        $this->EtaModel->konfirmasi($id);
            
            redirect("Eta/", 'refresh');
    }
    public function invoiceDelay($id){
	  $this->EtaModel->invoice($id);
            
            redirect("Eta/delay", 'refresh');
	}

	public function konfirmasiDelay($id){
        $this->EtaModel->konfirmasi($id);
            
            redirect("Eta/delay", 'refresh');
    }

    public function addRemarks(){
    	  $this->EtaModel->addRemarks();
    	  if(!empty($this->input->post('tanggal'))){
    	   $this->EtaModel->delay();
    	  }

    	   redirect("Eta/", 'refresh');
    }
    public function addRemarksDelay(){
    	  $this->EtaModel->addRemarksDelay();
    	  if(!empty($this->input->post('tanggal'))){
    	   $this->EtaModel->delay();
    	  }

    	   redirect("Eta/delay", 'refresh');
    }
	
}

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
		$tgl = mktime(0, 0, 0, date("m"), date("d")+1, date("Y"));
		//$date->modify('+24 hours');
		$tgl =  date("Y-m-d", $tgl);
		$data['eta']= $this->EtaModel->getPo($tgl);
		$this->load->view('Admin/header');
        $this->load->view('Admin/eta',$data);
   
	}

	public function setting(){
		$data['user']= $this->AddModel->getUser();
		$this->load->view('admin/header');
		$this->load->view('admin/setting',$data);
	}
	
}

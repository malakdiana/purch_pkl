<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grafik extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('GrafikModel');
		 $this->load->helper('url','form','download');
		  $this->load->library('excel','upload');
		       $this->load->database();


	
	}

public function index()
	{
		$data['grafik']= $this->GrafikModel->getSupplier();
		$data['pr'] = $this->GrafikModel->getPrOpen();
		$data['qr'] = $this->GrafikModel->getQrOpen();
		$data['eta'] = $this->GrafikModel->eta();
		$data['delay'] = $this->GrafikModel->delay();
		$data['section'] = $this->GrafikModel->getSection();
		$this->load->view('Admin/header');
        $this->load->view('Admin/grafik',$data);
   
	}

	public function setting(){
		$data['user']= $this->AddModel->getUser();
		$this->load->view('admin/header');
		$this->load->view('admin/setting',$data);
	}

	  function getSupplier(){
        $tgl= $this->input->post('tgl');
      
        $dataa=$this->db->select('supplier, sum(qty*harga) as jumlah')->from('bayangan')->join('po','po.id_po = bayangan.id_po')->where("SUBSTRING_INDEX(SUBSTRING_INDEX(tgl_po,' ',1),'/',-2) =",$tgl)->group_by('po.supplier')->order_by('jumlah','DESC')->get();
        echo json_encode($dataa->result());
    }
      function getSection(){
       $tgl= $this->input->post('tgl');
        $dataa=$this->db->select('nama_section, sum(qty*harga) as jumlah')->from('bayangan')->join('po','po.id_po = bayangan.id_po')->join('purch_req','purch_req.id= bayangan.id_pr')->join('section','purch_req.section = section.nama_section', 'RIGHT')->where("SUBSTRING_INDEX(SUBSTRING_INDEX(tgl_po,' ',1),'/',-2) =",$tgl)->group_by('section')->order_by('jumlah','asc')->get();
        echo json_encode($dataa->result());
    }
	
}

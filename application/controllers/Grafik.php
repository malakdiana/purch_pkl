<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grafik extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('GrafikModel');
		   $this->load->model('QrModel');
		 $this->load->helper('url','form','download');
		  $this->load->library('excel','upload');
		       $this->load->database();
if (!$this->session->userdata('logged_in')) {
	      redirect('Login','refresh');
	    }

	
	}

public function index()
	{ $datax['notif']= $this->QrModel->getNotifikasi();
		$data['grafik']= $this->GrafikModel->getSupplier();
		$data['pr'] = $this->GrafikModel->getPrOpen();
		$data['qr'] = $this->GrafikModel->getQrOpen();
		$data['eta'] = $this->GrafikModel->eta();
		$data['delay'] = $this->GrafikModel->delay();
		$data['section'] = $this->GrafikModel->getSection();
		$this->load->view('admin/header',$datax);
        $this->load->view('admin/grafik',$data);
   
	}

	public function setting(){
		 $datax['notif']= $this->QrModel->getNotifikasi();
		$data['user']= $this->AddModel->getUser();
		$this->load->view('admin/header',$datax);
		$this->load->view('admin/setting',$data);
	}

	  function getSupplier(){
        $tgl= $this->input->post('tgl');
      
        $dataa=$this->db->select('supplier, sum(qty*harga) as jumlah')->from('bayangan')->join('po','po.id_po = bayangan.id_po')->where("SUBSTRING_INDEX(SUBSTRING_INDEX(tgl_po,' ',1),'/',-2) =",$tgl)->group_by('po.supplier')->order_by('jumlah','DESC')->get();
        echo json_encode($dataa->result());
    }
      function getSection(){
       $tgl= $this->input->post('tgl');
         $dataa=$this->db->query("SELECT s.nama_section, p.jumlah from section as s left join ( SElect pr.section, sum(qty*harga) as jumlah from purch_req as pr inner join bayangan as b on b.id_pr=pr.id inner join po on po.id_po = b.id_po where SUBSTRING_INDEX(SUBSTRING_INDEX(po.tgl_po,' ',1),'/',-2) = '$tgl' GROUP BY pr.section ) as p on s.nama_section=p.section ORDER BY p.jumlah ASC");
        echo json_encode($dataa->result());
    }
	
}

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
        $tgl= substr($tgl,-2);
      // echo $tgl[0];die();
        $data=$this->db->select('supplier, sum(qty*harga) as jumlah')->from('bayangan')->join('po','po.id_po = bayangan.id_po')->where('SUBSTRING_INDEX(SUBSTRING_INDEX(tgl_po,"/",2),"/",-1) AS part2',$tgl)->group_by('po.supplier')->order_by('jumlah','DESC')->limit(5)->get();
          foreach ($data->result() as $data) {
               
                $dataa=array(
                   'supplier' => $data->supplier,
                   'jumlah' => $data->jumlah,
                    );


            }
        

         
       // echo json_encode($data);
        echo json_encode($dataa);
    }
	
}

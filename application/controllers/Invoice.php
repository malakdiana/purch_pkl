<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->load->model('Purch_reqModel');
		 $this->load->helper('url','form','download');
		  $this->load->library('excel','upload');
		  $this->load->model('InvoiceModel');
		  		  $this->load->model('PoModel');
		$this->load->helper('file');

	
	}

public function index()
	{
		$data['doc']= $this->InvoiceModel->getDocRec();
		$this->load->view('Invoice/header');
        $this->load->view('Invoice/data_docrec',$data);
   
	}

	public function docrec(){
			$this->load->view('Invoice/header');
        $this->load->view('Invoice/docrec');
	}

	public function addDocRec(){
		$status = $this->InvoiceModel->addDocRec();
			      
	$this->load->view('Invoice/header');
        $this->load->view('Invoice/docrec');
	
	
	}

	public function poPrint(){
		$data['doc'] =  $this->InvoiceModel->poToPrint();
			$this->load->view('Invoice/header');
        $this->load->view('Invoice/po',$data);
	}

	public function detailPo($id){
	 $data['doc']= $this->PoModel->getItemPo($id);
	  $data['inv']= $this->InvoiceModel->getInvoice($id);
	 $this->load->view('Invoice/header');
        $this->load->view('Invoice/detail_po',$data);
		//$this->load->view('Invoice/print');

}

public function detailPrint(){
	$id_po = $this->input->post('id_po');
	 $data['inv']= $this->InvoiceModel->getInvoice($id_po);
	$material = $this->input->post('material');
	$qtymat = $this->input->post('qtymat');
	$jasa = $this->input->post('jasa');
	$qtyjas = $this->input->post('qtyjas');
	$pph = $this->input->post('pph');
	$ppn = $this->input->post('ppn');
    $material = str_replace('Rp', '', $material);
    $material = str_replace('.', '', $material);
    $material = str_replace(' ', '', $material);
    $data['material'] = $material;
	$totalmat = $material*$qtymat;
	$data['totalmat'] = $totalmat;
	$data['qtymat'] = $qtymat;
	$jasa = str_replace('Rp', '', $jasa);
    $jasa = str_replace('.', '', $jasa);
    $jasa = str_replace(' ', '', $jasa);
    $data['jasa'] = $jasa;
	$totaljas = $jasa*$qtyjas;
	$data['totaljas'] = $totaljas;
	    $data['qtyjas'] = $qtyjas;
	$totalpph = $totaljas * $pph / 100;
	  $data['totalpph'] = $totalpph;
	  $data['subtotal'] = $totaljas+$totalmat;
	$totalppn = ($totaljas+$totalmat) * $ppn / 100;
	  $data['totalppn'] = $totalppn;
	$total = $totaljas+$totalmat+$totalppn-$totalpph;
	  $data['total'] = $total;
	  $data['pph'] = $pph;

		$paper_size='A5'; //paper size
		//$html="";



		$orientation = 'landscape'; //tipe format kertas
	
	$html=$this->load->view('Invoice/print',$data,true);
	//	$html = $this->output->get_output();

$this->load->library('dompdf_gen');		
$dompdf = new DOMPDF();
		$dompdf->set_paper($paper_size, $orientation); //convert to pdf
		
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream("laporanKESMAS.pdf");
	

}

	
	
}

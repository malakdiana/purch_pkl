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
	 $data['barang']= $this->input->post('barang');
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
	  if(empty($material)&&empty($jasa)){
	  	  $data['subtotal'] = $this->input->post('jumlah');
	  }
	$totalppn = $data['subtotal'] * $ppn / 100;
	  $data['totalppn'] = $totalppn;
	$total = $data['subtotal']+$totalppn-$totalpph;
	  $data['total'] = $total;
	  $data['pph'] = $pph;
$data['say'] = $this->terbilang($total)." Rupiah";
		$paper_size='A5';

		$orientation = 'landscape'; 

	if(empty($material) && empty($jasa)){

			$html=$this->load->view('Invoice/print',$data,true);
	}else{
			$html=$this->load->view('Invoice/printdetaill',$data,true);
	}

	

$this->load->library('dompdf_gen');		
$dompdf = new DOMPDF();
		$dompdf->set_paper($paper_size, $orientation); //convert to pdf
		
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream("laporanKESMAS.pdf");
	

}

function penyebut($nilai) {
		$nilai = abs($nilai);
		$huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
		$temp = "";
		if ($nilai < 12) {
			$temp = " ". $huruf[$nilai];
		} else if ($nilai <20) {
			$temp = $this->penyebut($nilai - 10). " Belas";
		} else if ($nilai < 100) {
			$temp = $this->penyebut($nilai/10)." Puluh". $this->penyebut($nilai % 10);
		} else if ($nilai < 200) {
			$temp = " Seratus" . $this->penyebut($nilai - 100);
		} else if ($nilai < 1000) {
			$temp = $this->penyebut($nilai/100) . " Ratus" . $this->penyebut($nilai % 100);
		} else if ($nilai < 2000) {
			$temp = " Seribu" . $this->penyebut($nilai - 1000);
		} else if ($nilai < 1000000) {
			$temp = $this->penyebut($nilai/1000) . " Ribu" . $this->penyebut($nilai % 1000);
		} else if ($nilai < 1000000000) {
			$temp = $this->penyebut($nilai/1000000) . " Juta" . $this->penyebut($nilai % 1000000);
		} else if ($nilai < 1000000000000) {
			$temp = $this->penyebut($nilai/1000000000) . " Milyar" . $this->penyebut(fmod($nilai,1000000000));
		} else if ($nilai < 1000000000000000) {
			$temp = $this->penyebut($nilai/1000000000000) . " Trilyun" . $this->penyebut(fmod($nilai,1000000000000));
		}     
		return $temp;
	}
 
	function terbilang($nilai) {
		if($nilai<0) {
			$hasil = "minus ". trim($this->penyebut($nilai));
		} else {
			$hasil = trim($this->penyebut($nilai));
		}     		
		return $hasil;
	}

	
	
}

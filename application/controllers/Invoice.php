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
		        $this->load->database();


	
	}

public function index()
	{
		$data['doc']= $this->InvoiceModel->getDocRec();
		$this->load->view('Invoice/header');
        $this->load->view('Invoice/data_docrec',$data);
   
	}

	  function deleteDetail(){
        $id = $this->input->post('id_detail');
        $data=$this->InvoiceModel->hapusDetail($id);
        echo json_encode($data);
    }

    function tambahDocRec($id){
    	$this->InvoiceModel->insertDetail($id);
    	redirect('Invoice/editDocRec/'.$id);
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

	public function editDetail(){
		$id = $this->input->post('id');
		$this->InvoiceModel->editDetail();
		redirect('Invoice/editDocRec/'.$id);
	}

	public function poPrint(){
		$data['doc'] =  $this->InvoiceModel->poToPrint();
			$this->load->view('Invoice/header');
        $this->load->view('Invoice/po',$data);
	}

	public function detailPo($id){
	 $data['doc']= $this->PoModel->getItemPo($id);
	  $data['pre']=$this->InvoiceModel->getPre();
	  $data['inv']= $this->InvoiceModel->getInvoice($id);
	  $data['docrec'] = $this->InvoiceModel->getDocrecByPo($id);
	 $this->load->view('Invoice/header');
        $this->load->view('Invoice/detail_po',$data);
	
}
public function editPrepared(){
	$data=$this->InvoiceModel->updatePre();
        echo json_encode($data);
}

public function editDocRec($id){
	$data['docrec'] = $this->InvoiceModel->getDocRecById($id);
	$data['list']= $this->InvoiceModel->getPoByDoc($id);
	 $this->load->view('Invoice/header');
        $this->load->view('Invoice/editDocRec',$data);
	

}



public function detailPrint(){
	$id_po = $this->input->post('id_po');
	 $data['inv']= $this->InvoiceModel->getInvoice($id_po);

	 $data['barang']= $this->input->post('barang');
	 $data['vp_date']= $this->input->post('vp_date');
	 $data['tf_date']= $this->input->post('tf_date');
	 $data['barang']= $this->input->post('barang');
	 $data['prepared'] = $this->input->post('prepared');
	 	 $data['paid'] = $this->input->post('paid');
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


// $object=array(
// 	'tf_date' => $data['tf_date'],
// 	'vp_date' => $data['vp_date'],
// 	'material' => $data['material'],
// 	'jasa' => $data['jasa'],
// 	'total_material' => $data['totalmat'],

// 	'total_jasa'=> $data['totaljas'],
// 	'pph' => $data['pph'],
// 	'total_pph' => $data['totalpph'],
// 	'total_ppn' => $data['totalppn'],
// 	'total'=> $data['total'],
// 	'id_po'=> $id_po
// );

//  $this->db->insert('detail_vp', $object);

 $query= $this->db->select('kode_nama')->from('approval')->where('min <=', $total)->where('max >=', $total)->get();
 foreach ($query->result() as $key ) {
 	$data['kode_nama']= $key->kode_nama;
 }
 $data['tf_date']= $this->tgl_indo($data['tf_date']);
 $data['vp_date']= $this->tgl_indo($data['vp_date']);
		$paper_size='A4';

		$orientation = 'potrait'; 

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
		$dompdf->stream("VoucherPaying.pdf", array("Attachment" => false));

exit(0);
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

	function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	
	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun
 
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}

  public function updateDocRec(){
        $data=$this->InvoiceModel->updateDocRec();
        echo json_encode($data);
    }

    public function hapusDocRec(){
    	$this->db->where('id_receipt',$this->input->post('id_receipt_delete'));
    	$this->db->delete('detail_docrec');
    $this->db->where('id_receipt',$this->input->post('id_receipt_delete'));
    	$this->db->delete('doc_receipt');

    	redirect('Invoice');
    		
    }

	
	
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->load->model('Purch_reqModel');
		 $this->load->helper('url','form','download');
		  $this->load->library('Excel','upload');
		  $this->load->model('InvoiceModel');
		  		  $this->load->model('PoModel');
		$this->load->helper('file');
		        $this->load->database();
		        if (!$this->session->userdata('logged_in')) {
	      redirect('Login','refresh');
	    }


	
	}

public function index()
	{
		//$data['doc']= $this->InvoiceModel->getDocRec();
		$this->load->view('Invoice/header');
        $this->load->view('Invoice/dashboard');
   
	}
	public function dataDocRec()
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
    	$this->session->set_flashdata('editDocRec','<div class="alert alert-success" role="alert">SUKSES UPDATE DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    	redirect('Invoice/dataDocRec/'.$id);
    }

	public function docrec(){
			$this->load->view('Invoice/header');
        $this->load->view('Invoice/docrec');
	}

	public function addDocRec(){
		$status = $this->InvoiceModel->addDocRec();
			      
	$this->load->view('Invoice/header');
        $this->load->view('Invoice/docrec');

        redirect('Invoice/poPrint', 'refresh');
	
	
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
	  $data['vp'] = $this->InvoiceModel->getDetail_vp($id);
	  $data['supplier'] = $this->InvoiceModel->getSupplier($id);
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



public function detailPrint($id){
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
	  $object = array(
	  	'tf_date' => $this->input->post('tf_date'),
	  	'vp_date' => $this->input->post('vp_date'),
	  	'material' => $material,
	  	'jasa' => $jasa,
	  	'total_material' => $totalmat,
	  	'total_jasa' => $totaljas,
	  	'pph' => $pph,
	  	'total_pph' => $totalpph,
	  	'total_ppn' => $totalppn,
	  	'total' => $total,
	  	'id_po' => $id
	  	 );
	  $query= $this->db->select('*')->from('detail_vp')->where('id_po',$id)->get();
	  if($query->num_rows() == 0){
	  $this->db->insert('detail_vp',$object);
	}else{
		$this->db->where('id_po',$id);
		 $this->db->update('detail_vp',$object);
	}
$data['say'] = $this->terbilang($total)." Rupiah";

 $query= $this->db->select('kode_nama')->from('approval')->where('min <=', $total)->where('max >=', $total)->get();
 foreach ($query->result() as $key ) {
 	$data['kode_nama']= $key->kode_nama;
 }
 $data['tf_date']= $this->tgl_indo($data['tf_date']);
 $data['vp_date']= $this->tgl_indo($data['vp_date']);
		$paper_size= array(0,0,488,640);

		$orientation = 'landscape'; 

	if(empty($material) && empty($jasa)){

			$html=$this->load->view('Invoice/print',$data,true);
	}else{
			$html=$this->load->view('Invoice/printdetaill',$data,true);
	}

	

$this->load->library('dompdf_gen');		
$dompdf = new DOMPDF();
		$dompdf->set_paper($paper_size, $orientation); //convert to pdf
		//$dompdf->set_paper(array(0,0,304.7244‬,467.7165), "landscape");
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

  public function exportbydate(){
    // Load plugin PHPExcel nya
    //include APPPATH.'third_party/PHPExcel/PHPExcel.php';
    
    // Panggil class PHPExcel nya
    $excel = new PHPExcel();
    // Settingan awal fil excel
    $excel->getProperties()->setCreator('My Notes Code')
                 ->setLastModifiedBy('My Notes Code')
                 ->setTitle("Document Receipt")
                 ->setSubject("Document Receipt");
                
    // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
    $style_col = array(
      'font' => array('bold' => true), // Set font nya jadi bold
      'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
      ),
      'borders' => array(
        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
      )
    );
    // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
    $style_row = array(
      'alignment' => array(
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
      ),
      'borders' => array(
        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
      )
    );
   
    // Buat header tabel nya pada baris ke 3
    $excel->setActiveSheetIndex(0)->setCellValue('A1', "No"); // Set kolom A3 dengan tulisan "NO"
    $excel->setActiveSheetIndex(0)->setCellValue('B1', "VP date"); // Set kolom B3 dengan tulisan "NIS"
    $excel->setActiveSheetIndex(0)->setCellValue('C1', "TF date"); // Set kolom C3 dengan tulisan "NAMA"
    $excel->setActiveSheetIndex(0)->setCellValue('D1', "Supplier"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
    $excel->setActiveSheetIndex(0)->setCellValue('E1', "No Receipt"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('F1', "PO No"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('G1', "Invoice No"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('H1', "Invoice Date");
    $excel->setActiveSheetIndex(0)->setCellValue('I1', "Total"); // Set kolom E3 dengan tulisan "ALAMAT"// Set kolom E3 
    $excel->setActiveSheetIndex(0)->setCellValue('J1', "Detail Barang"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('K1', "Material");
    $excel->setActiveSheetIndex(0)->setCellValue('L1', "Jasa"); // Set kolom E3 dengan tulisan "ALAMAT"// Set kolom E3 
    $excel->setActiveSheetIndex(0)->setCellValue('M1', "Total Material"); // Set kolom E3 dengan tulisan "ALAMAT"
   $excel->setActiveSheetIndex(0)->setCellValue('N1', "Total Jasa");
   $excel->setActiveSheetIndex(0)->setCellValue('O1', "PPH");
   $excel->setActiveSheetIndex(0)->setCellValue('P1', "Total PPH");
   // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->getActiveSheet()->getStyle('A1')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('B1')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('C1')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('D1')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('E1')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('F1')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('G1')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('H1')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('I1')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('J1')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('K1')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('L1')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('M1')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('N1')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('O1')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('P1')->applyFromArray($style_col);
   

    // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
    $tgl1=$this->input->post('search');
 
    $tgl2=$this->input->post('search2');
    $siswa = $this->InvoiceModel->getExportbydate($tgl1,$tgl2);
    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
    $numrow = 2; // Set baris pertama untuk isi tabel adalah baris ke 4
    foreach($siswa as $data){ // Lakukan looping pada variabel siswa
      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->vp_date);
      $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->tf_date);
      $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->supplier);
      $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->no_receipt);
      $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->no_po);
      $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->no_invoice);
      $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->tgl_invoice);
      $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->total);
      $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->barang);
      $excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data->material);
      $excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $data->jasa);
      $excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $data->total_material);
      $excel->setActiveSheetIndex(0)->setCellValue('N'.$numrow, $data->total_jasa);
      $excel->setActiveSheetIndex(0)->setCellValue('O'.$numrow, $data->pph);
      $excel->setActiveSheetIndex(0)->setCellValue('P'.$numrow, $data->total_pph);
     
      
      $no++; // Tambah 1 setiap kali looping
      $numrow++; // Tambah 1 setiap kali looping
    }
    // Set width kolom
    //$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
    $excel->getActiveSheet()->getColumnDimension('B')->setWidth(30); // Set width kolom B
    $excel->getActiveSheet()->getColumnDimension('C')->setWidth(30); // Set width kolom C
   
    $excel->getActiveSheet()->getColumnDimension('D')->setWidth(25);
    $excel->getActiveSheet()->getColumnDimension('E')->setWidth(25);
    $excel->getActiveSheet()->getColumnDimension('F')->setWidth(25);
    $excel->getActiveSheet()->getColumnDimension('G')->setWidth(25);
    $excel->getActiveSheet()->getColumnDimension('H')->setWidth(25);
    $excel->getActiveSheet()->getColumnDimension('I')->setWidth(25);
    $excel->getActiveSheet()->getColumnDimension('J')->setWidth(25);
    $excel->getActiveSheet()->getColumnDimension('K')->setWidth(25);
    $excel->getActiveSheet()->getColumnDimension('L')->setWidth(25);
    $excel->getActiveSheet()->getColumnDimension('M')->setWidth(25);
    $excel->getActiveSheet()->getColumnDimension('N')->setWidth(25);
    $excel->getActiveSheet()->getColumnDimension('O')->setWidth(25);
    $excel->getActiveSheet()->getColumnDimension('P')->setWidth(25);
    
    $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
    // Set orientasi kertas jadi LANDSCAPE
    $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
    // Set judul file excel nya
    $excel->getActiveSheet(0)->setTitle("Laporan Document Receipt");
    $excel->setActiveSheetIndex(0);
   
    $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
    ob_end_clean();
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Data Semua ETA.xlsx"');
    $write->save('php://output');
  }
	
	
	
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eta extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('EtaModel');
		$this->load->helper('url','form','download');
          $this->load->library('Excel','upload');
	
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
		$this->load->view('admin/header');
        $this->load->view('admin/eta',$data);
   
	}

	public function get($tgl){
		$data['tgl']=$tgl;
		$data['eta']= $this->EtaModel->getPo($tgl);
		$this->load->view('admin/header');
        $this->load->view('admin/eta',$data);
	}

	public function delay()
	{
		$tgl = $this->input->post('search');
		$tgl2 = $this->input->post('search2');
		
		if(empty($this->input->post('search'))){
		$tgl = mktime(0, 0, 0, date("m"), date("d")+1, date("Y"));
		
		$tgl =  date("Y-m-d", $tgl);
		$tgl2 = mktime(0, 0, 0, date("m"), date("d")+5, date("Y"));
		
		$tgl2 =  date("Y-m-d", $tgl2);
	}else if($tgl>$tgl2){
		echo "<script>alert('Tanggal mulai anda salah')</script>";
          redirect('Eta/delay/', 'refresh');
	}else{
		$tgl = $this->input->post('search');
		$tgl2 = $this->input->post('search2');
	}
		$data['tgl1']=$tgl;
		$data['tgl2']=$tgl2;
		$data['delay']= $this->EtaModel->getDelay($tgl,$tgl2);
		$this->load->view('admin/header');
        $this->load->view('admin/delay',$data);
   
	}

	public function getDelay($tgl1,$tgl2){
		$data['tgl1']=$tgl1;
		$data['tgl2']=$tgl2;
		$data['delay']= $this->EtaModel->getDelay($tgl1,$tgl2);
		$this->load->view('admin/header');
        $this->load->view('admin/delay',$data);

	}




	public function invoice($id,$tgl){
	  $this->EtaModel->invoice($id);
            
            redirect("Eta/get/".$tgl, 'refresh');
	}

	public function konfirmasi($id,$tgl){
        $this->EtaModel->konfirmasi($id);
            
            redirect("Eta/get/".$tgl, 'refresh');
    }
    public function invoiceDelay($id,$tgl1,$tgl2){
	  $this->EtaModel->invoiceDelay($id);
            
            redirect("Eta/getDelay/".$tgl1."/".$tgl2, 'refresh');
	}

	public function konfirmasiDelay($id,$tgl1,$tgl2){
        $this->EtaModel->konfirmasiDelay($id);
            
             redirect("Eta/getDelay/".$tgl1."/".$tgl2, 'refresh');
    }

    public function addRemarks(){
    	$tgl = $this->input->post('tgl');
    	  $this->EtaModel->addRemarks();
    	  if(!empty($this->input->post('tanggal'))){
    	   $this->EtaModel->delay();
    	  }
    	   redirect("Eta/get/".$tgl, 'refresh');
    }
    public function addRemarksDelay(){
    	$tgl1 = $this->input->post('tgl1');
    	$tgl2 = $this->input->post('tgl2');
    	  $this->EtaModel->addRemarksDelay();
    	  if(!empty($this->input->post('tanggal'))){
    	   $this->EtaModel->delay();
    	  }
    	 redirect("Eta/getDelay/".$tgl1."/".$tgl2, 'refresh');
    }

     public function export(){
    // Load plugin PHPExcel nya
    //include APPPATH.'third_party/PHPExcel/PHPExcel.php';
    
    // Panggil class PHPExcel nya
    $excel = new PHPExcel();
    // Settingan awal fil excel
    $excel->getProperties()->setCreator('My Notes Code')
                 ->setLastModifiedBy('My Notes Code')
                 ->setTitle("Data ETA")
                 ->setSubject("ETA")
                 ->setDescription("Laporan Semua Data ETA")
                 ->setKeywords("Data ETA");
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
    $excel->setActiveSheetIndex(0)->setCellValue('A1', "Supplier"); // Set kolom A3 dengan tulisan "NO"
    $excel->setActiveSheetIndex(0)->setCellValue('B1', "Tgl PO"); // Set kolom B3 dengan tulisan "NIS"
    $excel->setActiveSheetIndex(0)->setCellValue('C1', "No PO"); // Set kolom C3 dengan tulisan "NAMA"
    $excel->setActiveSheetIndex(0)->setCellValue('D1', "ETA"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
    $excel->setActiveSheetIndex(0)->setCellValue('E1', "Franco"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('F1', "Section"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('G1', "No PR"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('H1', "item");
    $excel->setActiveSheetIndex(0)->setCellValue('I1', "unit"); // Set kolom E3 dengan tulisan "ALAMAT"// Set kolom E3 
    $excel->setActiveSheetIndex(0)->setCellValue('J1', "qty to PO"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('K1', "konfirmasi"); 

    $excel->setActiveSheetIndex(0)->setCellValue('L1', "invoice"); // Set kolom E3 dengan tulisan "ALAMAT"// Set kolom E3 
    $excel->setActiveSheetIndex(0)->setCellValue('M1', "remarks"); // Set kolom E3 dengan tulisan "ALAMAT"
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
   

    // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
    $siswa = $this->EtaModel->getExport();
    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
    $numrow = 2; // Set baris pertama untuk isi tabel adalah baris ke 4
    foreach($siswa as $data){ // Lakukan looping pada variabel siswa
      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $data->supplier);
      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->tgl_po);
      $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->no_po);
      $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->eta);
      $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->franco);
      $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->section);
      $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->pr_no);
      $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->item);
      $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->unit_name);
      $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->qty);
      $excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data->konfirmasi);
      $excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $data->invoice);
      $excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $data->remarks);
     
      
      $no++; // Tambah 1 setiap kali looping
      $numrow++; // Tambah 1 setiap kali looping
    }
    // Set width kolom
    $excel->getActiveSheet()->getColumnDimension('A')->setWidth(40); // Set width kolom A
    $excel->getActiveSheet()->getColumnDimension('B')->setWidth(30); // Set width kolom B
    $excel->getActiveSheet()->getColumnDimension('C')->setWidth(30); // Set width kolom C
   
    $excel->getActiveSheet()->getColumnDimension('D')->setWidth(25);
    $excel->getActiveSheet()->getColumnDimension('E')->setWidth(25);
    $excel->getActiveSheet()->getColumnDimension('F')->setWidth(25);
    $excel->getActiveSheet()->getColumnDimension('G')->setWidth(25);
    $excel->getActiveSheet()->getColumnDimension('H')->setWidth(25);
    $excel->getActiveSheet()->getColumnDimension('I')->setWidth(25);
    $excel->getActiveSheet()->getColumnDimension('J')->setWidth(25);
    $excel->getActiveSheet()->getColumnDimension('K')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('L')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('M')->setWidth(45);
    
    $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
    // Set orientasi kertas jadi LANDSCAPE
    $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
    // Set judul file excel nya
    $excel->getActiveSheet(0)->setTitle("Laporan Semua Data ETA");
    $excel->setActiveSheetIndex(0);
   
    $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
    ob_end_clean();
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Data Semua ETA.xlsx"');
    $write->save('php://output');
  }

       public function exportbydate(){
    // Load plugin PHPExcel nya
    //include APPPATH.'third_party/PHPExcel/PHPExcel.php';
    
    // Panggil class PHPExcel nya
    $excel = new PHPExcel();
    // Settingan awal fil excel
    $excel->getProperties()->setCreator('My Notes Code')
                 ->setLastModifiedBy('My Notes Code')
                 ->setTitle("Data ETA")
                 ->setSubject("ETA")
                 ->setDescription("Laporan Semua Data ETA")
                 ->setKeywords("Data ETA");
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
    $excel->setActiveSheetIndex(0)->setCellValue('A1', "Supplier"); // Set kolom A3 dengan tulisan "NO"
    $excel->setActiveSheetIndex(0)->setCellValue('B1', "Tgl PO"); // Set kolom B3 dengan tulisan "NIS"
    $excel->setActiveSheetIndex(0)->setCellValue('C1', "No PO"); // Set kolom C3 dengan tulisan "NAMA"
    $excel->setActiveSheetIndex(0)->setCellValue('D1', "ETA"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
    $excel->setActiveSheetIndex(0)->setCellValue('E1', "Franco"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('F1', "Section"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('G1', "No PR"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('H1', "item");
    $excel->setActiveSheetIndex(0)->setCellValue('I1', "unit"); // Set kolom E3 dengan tulisan "ALAMAT"// Set kolom E3 
    $excel->setActiveSheetIndex(0)->setCellValue('J1', "qty to PO"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('K1', "konfirmasi"); 

    $excel->setActiveSheetIndex(0)->setCellValue('L1', "invoice"); // Set kolom E3 dengan tulisan "ALAMAT"// Set kolom E3 
    $excel->setActiveSheetIndex(0)->setCellValue('M1', "remarks"); // Set kolom E3 dengan tulisan "ALAMAT"
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
   

    // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
    $tgl1=$this->input->post('search');
    $tgl2=$this->input->post('search2');
    $siswa = $this->EtaModel->getExportbydate($tgl1,$tgl2);
    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
    $numrow = 2; // Set baris pertama untuk isi tabel adalah baris ke 4
    foreach($siswa as $data){ // Lakukan looping pada variabel siswa
      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $data->supplier);
      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->tgl_po);
      $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->no_po);
      $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->eta);
      $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->franco);
      $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->section);
      $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->pr_no);
      $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->item);
      $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->unit_name);
      $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->qty);
      $excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data->konfirmasi);
      $excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $data->invoice);
      $excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $data->remarks);
     
      
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
    
    $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
    // Set orientasi kertas jadi LANDSCAPE
    $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
    // Set judul file excel nya
    $excel->getActiveSheet(0)->setTitle("Laporan Semua Data ETA");
    $excel->setActiveSheetIndex(0);
   
    $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
    ob_end_clean();
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Data Semua ETA.xlsx"');
    $write->save('php://output');
  }
	
}

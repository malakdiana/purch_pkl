<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pricelist extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('PricelistModel');
        $this->load->model('QrModel');
		 $this->load->helper('url','form','download');
		// $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
		  $this->load->library('Excel','upload');
          if (!$this->session->userdata('logged_in')) {
          redirect('Login','refresh');
        }

	
	}

	public function index()
	
	{
         $datax['notif']= $this->QrModel->getNotifikasi(); $datax['edit']= $this->QrModel->getNotifEdit();
		$data['price']= $this->PricelistModel->getPricelist();
		$this->load->view('admin/header',$datax);
		$this->load->view('admin/pricelist',$data);
	}
	public function updatePricelist(){
		$this->PricelistModel->updatePricelist();
				$this->session->set_flashdata('editPricelist','<div class="alert alert-success" role="alert">SUKSES UPDATE DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('Pricelist', 'refresh');
	}
	public function deletePricelist($id){
		$this->PricelistModel->deletePricelist($id);
				$this->session->set_flashdata('deletePricelist','<div class="alert alert-success" role="alert">SUKSES DELETE DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('Pricelist', 'refresh');
	}
	public function tambahPricelist(){
         $datax['notif']= $this->QrModel->getNotifikasi(); $datax['edit']= $this->QrModel->getNotifEdit();
        $this->load->model('Unit_barangModel');
		$this->load->helper('url', 'form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama_supplier', 'nama_supplier', 'trim|required');
		if ($this->form_validation->run()==FALSE) {
             $data['listUnit']=$this->Unit_barangModel->getUnit_barang();
			$this->load->view('admin/header',$datax);
			$this->load->view('admin/tambahPricelist', $data);
			$this->load->view('admin/footer');
		}else{
			$this->PricelistModel->tambahPricelist();
				$this->session->set_flashdata('tambahPricelist','<div class="alert alert-success" role="alert">SUKSES TAMBAH DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('Pricelist', 'refresh');
		}

	}

	public function importPricelist(){
         $datax['notif']= $this->QrModel->getNotifikasi(); $datax['edit']= $this->QrModel->getNotifEdit();
		$this->load->view('admin/header',$datax);
			$this->load->view('admin/importPricelist');
			$this->load->view('admin/footer');
	}

	public function prosesImportSup(){

    $path= './assets/';
             $config['upload_path'] = './assets/';
            $config['allowed_types'] = 'xlsx|xls|jpg|png';
            $config['remove_spaces'] = TRUE;
           // $this->upload->initialize($config);
            $this->load->library('upload', $config);
   
            if (!$this->upload->do_upload('file')) {
                $error = array('error' => $this->upload->display_errors());
            } else {
                $data = array('upload_data' => $this->upload->data());
            }
            
            if (!empty($data['upload_data']['file_name'])) {
                $import_xls_file = $data['upload_data']['file_name'];
            } else {
                $import_xls_file = 0;
            }
            $inputFileName = $path . $import_xls_file;
            try {
                $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
            } catch (Exception $e) {
                die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
                        . '": ' . $e->getMessage());
            }
            $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
            
            $arrayCount = count($allDataInSheet);

            $flag = 0;
            $createArray = array('No','Group_Name', 'No_Barang','Nama_Barang','Spec_Barang','Unit','Mata_Uang','Price','Nama_Supplier','Quotation_No','Tgl_Input','Lb_Date','Remarks');
            $makeArray = array('No'=>'No','Group_Name'=>'Group_Name', 'No_Barang'=>'No_Barang','Nama_Barang'=>'Nama_Barang','Spec_Barang' =>'Spec_Barang','Unit'=>'Unit','Mata_Uang'=>'Mata_Uang','Price'=>'Price','Nama_Supplier'=>'Nama_Supplier','Quotation_No'=>'Quotation_No','Tgl_Input' => 'Tgl_Input','Lb_Date' => 'Lb_Date','Remarks'=>'Remarks');
            $SheetDataKey = array();
            foreach ($allDataInSheet as $dataInSheet) {
                foreach ($dataInSheet as $key => $value) {
                    if (in_array(trim($value), $createArray)) {
                        $value = preg_replace('/\s+/', '', $value);
                        $SheetDataKey[trim($value)] = $key;
                    } else {
                        
                    }
                }
            }
            


            $datax = array_diff_key($makeArray, $SheetDataKey);
           
            if (empty($datax)) {
                $flag = 1;
            }
            if ($flag == 1) {
                for ($i = 2; $i <= $arrayCount; $i++) {
                    $addresses = array();
                    
                    $no=$SheetDataKey['No'];
                    $group_name = $SheetDataKey['Group_Name'];
                    $no_barang = $SheetDataKey['No_Barang'];
                    $nama_barang = $SheetDataKey['Nama_Barang'];
                    $spec_barang = $SheetDataKey['Spec_Barang'];
                    $unit = $SheetDataKey['Unit'];
                    $mata_uang = $SheetDataKey['Mata_Uang'];
                    $price = $SheetDataKey['Price'];
                    $nama_supplier = $SheetDataKey['Nama_Supplier'];
                    $quotation_no = $SheetDataKey['Quotation_No'];
                    $tgl_input = $SheetDataKey['Tgl_Input'];
                    $lbdate = $SheetDataKey['Lb_Date'];
                    $remarks = $SheetDataKey['Remarks'];
                  
                    
                    $no = filter_var(trim($allDataInSheet[$i][$no]), FILTER_SANITIZE_STRING);
                    $group_name = filter_var(trim($allDataInSheet[$i][$group_name]), FILTER_SANITIZE_STRING);
                    $no_barang = filter_var(trim($allDataInSheet[$i][$no_barang]), FILTER_SANITIZE_STRING);
                    $nama_barang = filter_var(trim($allDataInSheet[$i][$nama_barang]), FILTER_SANITIZE_STRING);
                    $spec_barang = filter_var(trim($allDataInSheet[$i][$spec_barang]), FILTER_SANITIZE_STRING);
                    $unit = filter_var(trim($allDataInSheet[$i][$unit]), FILTER_SANITIZE_STRING);
                    $mata_uang = filter_var(trim($allDataInSheet[$i][$mata_uang]), FILTER_SANITIZE_STRING);
                    $price = filter_var(trim($allDataInSheet[$i][$price]), FILTER_SANITIZE_STRING);
                    $nama_supplier = filter_var(trim($allDataInSheet[$i][$nama_supplier]), FILTER_SANITIZE_STRING);
                    $quotation_no = filter_var(trim($allDataInSheet[$i][$quotation_no]), FILTER_SANITIZE_STRING);
                    $tgl_input = filter_var(trim($allDataInSheet[$i][$tgl_input]), FILTER_SANITIZE_STRING);
                    $lbdate = filter_var(trim($allDataInSheet[$i][$lbdate]), FILTER_SANITIZE_STRING);
                    $remarks = filter_var(trim($allDataInSheet[$i][$remarks]), FILTER_SANITIZE_STRING);
                   
                    $fetchData[] = array( 'group_name' =>$group_name,
        'no_barang' =>$no_barang,
        'nama_barang' => $nama_barang,
        'spec_barang' => $spec_barang,
        'unit' => $unit,
        'attention' => $attention,
        'mata_uang' => $mata_uang,
        'price' => $price,
        'nama_supplier' => $nama_supplier,
        'quotation_no' => $quotation_no,
        'tgl_input' => $tgl_input,  
        'lbdate' => $lbdate,
        'remarks' => $remarks,);
                }              
                $datax['employeeInfo'] = $fetchData;
                $this->PricelistModel->setBatchImport($fetchData);
                $this->PricelistModel->importData();
                 $url = FCPATH.'/assets/'.$data['upload_data']['file_name'];
               unlink($url);
               redirect('Pricelist','refresh');
            } else {
               $this->session->set_flashdata('gagalImport','<div class="alert alert-success" role="alert">SUKSES DELETE DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Pricelist/importPricelist', 'refresh');
            }
        
      
	}
	

	public function downloadSup(){
		force_download('assets/format/FormatDataPricelist.xlsx',null);
	}

         public function export(){
    // Load plugin PHPExcel nya
    //include APPPATH.'third_party/PHPExcel/PHPExcel.php';
    
    // Panggil class PHPExcel nya
    $excel = new PHPExcel();
    // Settingan awal fil excel
    $excel->getProperties()->setCreator('My Notes Code')
                 ->setLastModifiedBy('My Notes Code')
                 ->setTitle("Data Pricelist")
                 ->setSubject("Pricelist")
                 ->setDescription("Laporan Semua Data Pricelist")
                 ->setKeywords("Data Pricelist");
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
    $excel->setActiveSheetIndex(0)->setCellValue('B1', "Group_Name"); // Set kolom B3 dengan tulisan "NIS"
    $excel->setActiveSheetIndex(0)->setCellValue('C1', "No_Barang"); // Set kolom C3 dengan tulisan "NAMA"
    $excel->setActiveSheetIndex(0)->setCellValue('D1', "Nama_Barang"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
    $excel->setActiveSheetIndex(0)->setCellValue('E1', "Spec_Barang"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('F1', "Unit"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('G1', "Mata_Uang"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('H1', "Price"); 
    $excel->setActiveSheetIndex(0)->setCellValue('I1', "Nama_Supplier");// Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('J1', "Quotation_No"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('K1', "Tgl_Input");
    $excel->setActiveSheetIndex(0)->setCellValue('L1', "Lb_Date");  // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('M1', "Remarks"); // Set kolom E3 dengan tulisan "ALAMAT"
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
    $siswa = $this->PricelistModel->getPricelist();
    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
    $numrow = 2; // Set baris pertama untuk isi tabel adalah baris ke 4
    foreach($siswa as $data){ // Lakukan looping pada variabel siswa
      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $data->no);
      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->group_name);
      $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->no_barang);
      $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->nama_barang);
      $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->spec_barang);
      $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->unit);
      $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->mata_uang);
      $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->price);
      $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->nama_supplier);
      $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->quotation_no);
      $excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data->tgl_input);
      $excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $data->lbdate);
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
    $excel->getActiveSheet(0)->setTitle("Laporan Data Pricelist");
    $excel->setActiveSheetIndex(0);
   
    $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
    ob_end_clean();
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Data Pricelist.xlsx"');
    $write->save('php://output');
  }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

       $session_data=$this->session->userdata('logged_in');
       if(empty($session_data['id_user'])){
       redirect('Login','refresh');
       }
		$this->load->model('SupplierModel');
		 $this->load->helper('url','form','download');
		  $this->load->library('excel','upload');

	
	}

	public function index()
	
	{
		$data['supp']= $this->SupplierModel->getSupplier();
		$this->load->view('admin/header');
		$this->load->view('admin/supplier',$data);
	}
	public function updateSupplier(){
		$this->SupplierModel->updateSupplier();
				$this->session->set_flashdata('editSupplier','<div class="alert alert-success" role="alert">SUKSES UPDATE DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('Supplier', 'refresh');
	}
	public function deleteSupplier($id){
		$this->SupplierModel->deleteSupplier($id);
				$this->session->set_flashdata('deleteSupplier','<div class="alert alert-success" role="alert">SUKSES DELETE DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('Supplier', 'refresh');
	}
	public function tambahSupplier(){
		$this->load->helper('url', 'form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama_supplier', 'nama_supplier', 'trim|required');
		if ($this->form_validation->run()==FALSE) {
			$this->load->view('admin/header');
			$this->load->view('admin/tambahSupplier');
			$this->load->view('admin/footer');
		}else{
			$this->SupplierModel->tambahSupplier();
				$this->session->set_flashdata('tambahSupplier','<div class="alert alert-success" role="alert">SUKSES TAMBAH DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('Supplier', 'refresh');
		}

	}

	public function importSupplier(){
		$this->load->view('admin/header');
			$this->load->view('admin/importSupplier');
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
            $createArray = array('No','Nama_Supplier', 'Alamat','Kota','No_Telp','No_Fax','Attention','No_Hp','Tgl_Input','Terms','PPN','Supply','Status','Perjanjian','Remarks');
            $makeArray = array('No' => 'No','Nama_Supplier'=>'Nama_Supplier', 'Alamat' => 'Alamat','Kota'=> 'Kota','No_Telp' => 'No_Telp','No_Fax' => 'No_Fax','Attention' => 'Attention','No_Hp' => 'No_Hp','Tgl_Input' => 'Tgl_Input','Terms' => 'Terms','PPN' => 'PPN','Supply' => 'Supply','Status'=>'Status','Perjanjian' => 'Perjanjian','Remarks' => 'Remarks');
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
            


            $data = array_diff_key($makeArray, $SheetDataKey);
           
            if (empty($data)) {
                $flag = 1;
            }
            if ($flag == 1) {
                for ($i = 2; $i <= $arrayCount; $i++) {
                    $addresses = array();
                    
                    $no=$SheetDataKey['No'];
                    $nama_supplier = $SheetDataKey['Nama_Supplier'];
                    $alamat = $SheetDataKey['Alamat'];
                    $kota = $SheetDataKey['Kota'];
                    $no_telp = $SheetDataKey['No_Telp'];
                    $no_fax = $SheetDataKey['No_Fax'];
                    $attention = $SheetDataKey['Attention'];
                    $no_hp = $SheetDataKey['No_Hp'];
                    $tgl_input = $SheetDataKey['Tgl_Input'];
                    $terms = $SheetDataKey['Terms'];
                    $ppn = $SheetDataKey['PPN'];
                    $supply = $SheetDataKey['Supply'];
                    $status = $SheetDataKey['Status'];
                    $perjanjian = $SheetDataKey['Perjanjian'];
                    $remarks = $SheetDataKey['Remarks'];
                  
                    
                    $no = filter_var(trim($allDataInSheet[$i][$no]), FILTER_SANITIZE_STRING);
                    $nama_supplier = filter_var(trim($allDataInSheet[$i][$nama_supplier]), FILTER_SANITIZE_STRING);
                    $alamat = filter_var(trim($allDataInSheet[$i][$alamat]), FILTER_SANITIZE_STRING);
                    $kota = filter_var(trim($allDataInSheet[$i][$kota]), FILTER_SANITIZE_STRING);
                    $no_telp = filter_var(trim($allDataInSheet[$i][$no_telp]), FILTER_SANITIZE_STRING);
                    $no_fax = filter_var(trim($allDataInSheet[$i][$no_fax]), FILTER_SANITIZE_STRING);
                    $attention = filter_var(trim($allDataInSheet[$i][$attention]), FILTER_SANITIZE_STRING);
                    $no_hp = filter_var(trim($allDataInSheet[$i][$no_hp]), FILTER_SANITIZE_STRING);
                    $tgl_input = filter_var(trim($allDataInSheet[$i][$tgl_input]), FILTER_SANITIZE_STRING);
                    $terms = filter_var(trim($allDataInSheet[$i][$terms]), FILTER_SANITIZE_STRING);
                    $ppn = filter_var(trim($allDataInSheet[$i][$ppn]), FILTER_SANITIZE_STRING);
                    $supply = filter_var(trim($allDataInSheet[$i][$supply]), FILTER_SANITIZE_STRING);
                    $status = filter_var(trim($allDataInSheet[$i][$status]), FILTER_SANITIZE_STRING);
                    $perjanjian = filter_var(trim($allDataInSheet[$i][$perjanjian]), FILTER_SANITIZE_STRING);
                    $remarks = filter_var(trim($allDataInSheet[$i][$remarks]), FILTER_SANITIZE_STRING);
                   
                    $fetchData[] = array('nama_supplier' => $nama_supplier,'alamat' => $alamat,'kota' => $kota,'no_telp' => $no_telp,'no_fax' => $no_fax,
                          'attention' => $attention,
                          'no_hp' => $no_hp,
                          'tgl_input' => $tgl_input,
                          'terms' => $terms,
                          'ppn' => $ppn,
                          'supply' => $supply,
                          'status' => $status,
                          'perjanjian' => $perjanjian,
                          'remarks' => $remarks,);
                }              
                $data['employeeInfo'] = $fetchData;
                $this->SupplierModel->setBatchImport($fetchData);
                $this->SupplierModel->importData();
               unlink('./assets/'.$data['upload_data']['file_name']);
               redirect('Supplier','refresh');
            } else {
               $this->session->set_flashdata('gagalImport','<div class="alert alert-success" role="alert">SUKSES DELETE DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Supplier/importSupplier', 'refresh');
            }
        
      
	}
	

	public function downloadSup(){
		force_download('assets/format/FormatDataSupplier.xlsx',null);
	}


     public function export(){
    // Load plugin PHPExcel nya
    //include APPPATH.'third_party/PHPExcel/PHPExcel.php';
    
    // Panggil class PHPExcel nya
    $excel = new PHPExcel();
    // Settingan awal fil excel
    $excel->getProperties()->setCreator('My Notes Code')
                 ->setLastModifiedBy('My Notes Code')
                 ->setTitle("Data Supplier")
                 ->setSubject("Supplier")
                 ->setDescription("Laporan Semua Data Supplier")
                 ->setKeywords("Data Supplier");
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
    //$excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA SISWA"); // Set kolom A1 dengan tulisan "DATA SISWA"
    //$excel->getActiveSheet()->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
    //$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
    //$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
    //$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
    // Buat header tabel nya pada baris ke 3
    $excel->setActiveSheetIndex(0)->setCellValue('A1', "No"); // Set kolom A3 dengan tulisan "NO"
    $excel->setActiveSheetIndex(0)->setCellValue('B1', "Nama_Supplier"); // Set kolom B3 dengan tulisan "NIS"
    $excel->setActiveSheetIndex(0)->setCellValue('C1', "Alamat"); // Set kolom C3 dengan tulisan "NAMA"
    $excel->setActiveSheetIndex(0)->setCellValue('D1', "Kota"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
    $excel->setActiveSheetIndex(0)->setCellValue('E1', "No_Telp"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('F1', "No_Fax"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('G1', "Attention"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('H1', "No_Hp"); 
    $excel->setActiveSheetIndex(0)->setCellValue('I1', "Tgl_Input"); // Set kolom E3 dengan tulisan "ALAMAT"// Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('J1', "Terms"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('K1', "PPN");
    $excel->setActiveSheetIndex(0)->setCellValue('L1', "Supply");  // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('M1', "Status"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('N1', "Perjanjian"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('O1', "Remarks"); // Set kolom E3 dengan tulisan "ALAMAT"
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

    // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
    $siswa = $this->SupplierModel->getSupplier();
    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
    $numrow = 2; // Set baris pertama untuk isi tabel adalah baris ke 4
    foreach($siswa as $data){ // Lakukan looping pada variabel siswa
      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $data->id_supplier);
      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->nama_supplier);
      $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->alamat);
      $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->kota);
      $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->no_telp);
      $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->no_fax);
      $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->attention);
      $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->no_hp);
      $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->tgl_input);
      $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->terms);
      $excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data->ppn);
      $excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $data->supply);
      $excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $data->status);
      $excel->setActiveSheetIndex(0)->setCellValue('N'.$numrow, $data->perjanjian);
      $excel->setActiveSheetIndex(0)->setCellValue('O'.$numrow, $data->remarks);
      // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
      // $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
      // $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
      // $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
      // $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
      // $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
      
      $no++; // Tambah 1 setiap kali looping
      $numrow++; // Tambah 1 setiap kali looping
    }
    // Set width kolom
    //$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
    $excel->getActiveSheet()->getColumnDimension('B')->setWidth(25); // Set width kolom B
    $excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
    //$excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
    //$excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); // Set width kolom E
    
    // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
    $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
    // Set orientasi kertas jadi LANDSCAPE
    $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
    // Set judul file excel nya
    $excel->getActiveSheet(0)->setTitle("Laporan Data Supplier");
    $excel->setActiveSheetIndex(0);
    // Proses file excel
  // header('Content-Type: application/vnd.ms-excel'); //mime type
    header('Content-Disposition: attachment; filename="Data Supplier.xlsx"'); // Set nama file excel nya
    //header('Cache-Control: max-age=0');
    $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
    $write->save('php://output');



  }
 
}

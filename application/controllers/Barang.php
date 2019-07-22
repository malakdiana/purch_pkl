<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('BarangModel');
		 $this->load->helper('url','form','download');
		// $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
		  $this->load->library('Excel','upload');

	
	}

	public function index()
	
	{
		$data['brg']= $this->BarangModel->getBarang();
        if($this->session->userdata('logged_in')['hak_akses']==1){
		$this->load->view('admin/header');
		$this->load->view('admin/Barang',$data);
         }else if($this->session->userdata('logged_in')['hak_akses']==2){
        $data['brg']= $this->BarangModel->getBarang();
        $this->load->view('user/header');
        $this->load->view('user/Barang',$data);
         }else if($this->session->userdata('logged_in')['hak_akses']==4){
        $data['brg']= $this->BarangModel->getBarang();
        $this->load->view('Personal/header');
        $this->load->view('Personal/Barang',$data);
         }
	}
	public function updateBarang(){
		$this->BarangModel->updateBarang();
				$this->session->set_flashdata('editBarang','<div class="alert alert-success" role="alert">SUKSES UPDATE DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('Barang', 'refresh');
	}
	public function deleteBarang($id){
		$this->BarangModel->deleteBarang($id);
				$this->session->set_flashdata('deleteBarang','<div class="alert alert-success" role="alert">SUKSES DELETE DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('Barang', 'refresh');
	}
	public function tambahBarang(){
        $this->load->model('Unit_barangModel');
		$this->load->helper('url', 'form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama_barang', 'nama_barang', 'trim|required');
		if ($this->form_validation->run()==FALSE) {
            $data['listUnit']=$this->Unit_barangModel->getUnit_barang();
			$this->load->view('admin/header');
			$this->load->view('admin/tambahBarang',$data);
			$this->load->view('admin/footer');
		}else{
			$this->BarangModel->tambahBarang();
				$this->session->set_flashdata('tambahBarang','<div class="alert alert-success" role="alert">SUKSES TAMBAH DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('Barang', 'refresh');
		}

	}

	public function importBarang(){
		$this->load->view('admin/header');
			$this->load->view('admin/importBarang');
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
            $createArray = array('NO_BARANG','NAMA_BARANG');
            $makeArray = array('NO_BARANG'=>'NO_BARANG','NAMA_BARANG'=> 'NAMA_BARANG');
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
                    
                   
                    $no_barang = $SheetDataKey['NO_BARANG'];
                 
                    $nama_barang = $SheetDataKey['NAMA_BARANG'];
                 
                   
                  
                    
                   
                    $no_barang = filter_var(trim($allDataInSheet[$i][$no_barang]), FILTER_SANITIZE_STRING);
                 
                    $nama_barang = filter_var(trim($allDataInSheet[$i][$nama_barang]), FILTER_SANITIZE_STRING);
                 
                   
                    $fetchData[] = array('nama_barang' => $nama_barang,);
                }              
                $data['employeeInfo'] = $fetchData;
                $this->BarangModel->setBatchImport($fetchData);
                $this->BarangModel->importData();
               //unlink('./assets/'.$data['upload_data']['file_name']);
               redirect('Barang','refresh');
            } else {
               $this->session->set_flashdata('gagalImport','<div class="alert alert-success" role="alert">SUKSES DELETE DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Admin/importBarang', 'refresh');
            }
        
      
	}
	

	public function downloadSup(){
		force_download('assets/format/FormatDataBarang.xlsx',null);
	}

         public function export(){
    // Load plugin PHPExcel nya
    //include APPPATH.'third_party/PHPExcel/PHPExcel.php';
    
    // Panggil class PHPExcel nya
    $excel = new PHPExcel();
    // Settingan awal fil excel
    $excel->getProperties()->setCreator('My Notes Code')
                 ->setLastModifiedBy('My Notes Code')
                 ->setTitle("Data Barang")
                 ->setSubject("Barang")
                 ->setDescription("Laporan Semua Data Barang")
                 ->setKeywords("Data Barang");
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
    $excel->setActiveSheetIndex(0)->setCellValue('A1', "NO_BARANG"); // Set kolom A3 dengan tulisan "NO"
    $excel->setActiveSheetIndex(0)->setCellValue('B1', "NAMA_BARANG"); // Set kolom B3 dengan tulisan "NIS"
   
    $excel->getActiveSheet()->getStyle('A1')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('B1')->applyFromArray($style_col);
  

    // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
    $siswa = $this->BarangModel->getBarang();
    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
    $numrow = 2; // Set baris pertama untuk isi tabel adalah baris ke 4
    foreach($siswa as $data){ // Lakukan looping pada variabel siswa
      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $data->no_barang);
      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->nama_barang);
    
      $no++; // Tambah 1 setiap kali looping
      $numrow++; // Tambah 1 setiap kali looping
    }
    // Set width kolom
    //$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
    $excel->getActiveSheet()->getColumnDimension('B')->setWidth(30); // Set width kolom B
   
 
    $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
    // Set orientasi kertas jadi LANDSCAPE
    $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
    // Set judul file excel nya
    $excel->getActiveSheet(0)->setTitle("Laporan Data Barang");
    $excel->setActiveSheetIndex(0);
   
    $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
    ob_end_clean();
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Data Barang.xlsx"');
    $write->save('php://output');
  }
}

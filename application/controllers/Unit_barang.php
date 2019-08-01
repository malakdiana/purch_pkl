<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unit_barang extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Unit_barangModel');
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
        $datax['notif']= $this->QrModel->getNotifikasi();
        $data['unit']= $this->Unit_barangModel->getUnit_barang();
        $this->load->view('admin/header',$datax);
        $this->load->view('admin/Unit_barang',$data);
    }
    public function updateUnit_barang(){
        $this->Unit_barangModel->updateUnit_barang();
                $this->session->set_flashdata('editUnit_barang','<div class="alert alert-success" role="alert">SUKSES UPDATE DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Unit_barang', 'refresh');
    }
    public function deleteUnit_barang($id){
        $this->Unit_barangModel->deleteUnit_barang($id);
                $this->session->set_flashdata('deleteUnit_barang','<div class="alert alert-success" role="alert">SUKSES DELETE DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Unit_barang', 'refresh');
    }
    public function tambahUnit_barang(){
        $this->load->view('admin/header');
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('unit_barang', 'unit_barang', 'trim|required');
        if ($this->form_validation->run()==FALSE) {
            $this->load->view('admin/header',$datax);
            $this->load->view('admin/tambahUnit_barang');
            $this->load->view('admin/footer');
        }else{
            $this->Unit_barangModel->tambahUnit_barang();
                $this->session->set_flashdata('tambahUnit_barang','<div class="alert alert-success" role="alert">SUKSES TAMBAH DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Unit_barang', 'refresh');
        }

    }

    public function importUnit_barang(){
        $this->load->view('admin/header');
        $this->load->view('admin/header',$datax);
            $this->load->view('admin/importUnit_barang');
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
            $createArray = array('no','unit_barang','remarks');
            $makeArray = array('no' => 'no', 'unit_barang' => 'unit_barang','remarks' => 'remarks');
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
                    
                    $no=$SheetDataKey['no'];
                    $unit_barang = $SheetDataKey['unit_barang'];
                    $remarks = $SheetDataKey['remarks'];
                   
                  
                    
                    $no = filter_var(trim($allDataInSheet[$i][$no]), FILTER_SANITIZE_STRING);
                    $unit_barang = filter_var(trim($allDataInSheet[$i][$unit_barang]), FILTER_SANITIZE_STRING);
                    $remarks = filter_var(trim($allDataInSheet[$i][$remarks]), FILTER_SANITIZE_STRING);
                   
                    $fetchData[] = array('unit_barang' => $unit_barang,
                          'remarks' => $remarks,);
                }              
                $datax['employeeInfo'] = $fetchData;
                $this->Unit_barangModel->setBatchImport($fetchData);
                $this->Unit_barangModel->importData();
                 $url = FCPATH.'/assets/'.$data['upload_data']['file_name'];
               unlink($url);
               
               redirect('Unit_barang','refresh');
            } else {
               $this->session->set_flashdata('gagalImport','<div class="alert alert-success" role="alert">SUKSES DELETE DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Unit_barang/importUnit_barang', 'refresh');
            }
        
      
    }
    

    public function downloadSup(){
        force_download('assets/format/FormatDataUnit_barang.xlsx',null);
    }


         public function export(){
    // Load plugin PHPExcel nya
    //include APPPATH.'third_party/PHPExcel/PHPExcel.php';
    
    // Panggil class PHPExcel nya
    $excel = new PHPExcel();
    // Settingan awal fil excel
    $excel->getProperties()->setCreator('My Notes Code')
                 ->setLastModifiedBy('My Notes Code')
                 ->setTitle("Data Unit Barang")
                 ->setSubject("Unit Barang")
                 ->setDescription("Laporan Semua Data Unit Barang")
                 ->setKeywords("Data Unit Barang");
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
    $excel->setActiveSheetIndex(0)->setCellValue('B1', "Unit Barang"); // Set kolom B3 dengan tulisan "NIS"
    $excel->setActiveSheetIndex(0)->setCellValue('C1', "Remarks"); // Set kolom C3 dengan tulisan "NAMA"
  
    $excel->getActiveSheet()->getStyle('A1')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('B1')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('C1')->applyFromArray($style_col);
  
    // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
    $siswa = $this->Unit_barangModel->getUnit_barangExport();
    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
    $numrow = 2; // Set baris pertama untuk isi tabel adalah baris ke 4
    foreach($siswa as $data){ // Lakukan looping pada variabel siswa
      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $data->no);
      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->unit_barang);
      $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->remarks);
      
      
      $no++; // Tambah 1 setiap kali looping
      $numrow++; // Tambah 1 setiap kali looping
    }
    // Set width kolom
    //$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
    $excel->getActiveSheet()->getColumnDimension('B')->setWidth(30); // Set width kolom B
    $excel->getActiveSheet()->getColumnDimension('C')->setWidth(30); // Set width kolom C
    
    $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
    // Set orientasi kertas jadi LANDSCAPE
    $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
    // Set judul file excel nya
    $excel->getActiveSheet(0)->setTitle("Laporan Data Unit Barang");
    $excel->setActiveSheetIndex(0);
   
    $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
    ob_end_clean();
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Data Unit Barang.xlsx"');
    $write->save('php://output');
  }
}

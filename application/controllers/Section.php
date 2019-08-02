<?php
defined('BASEPATH') OR exit('id_section direct script access allowed');

class Section extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('SectionModel');
        $this->load->model('QrModel');
         $this->load->model('DepartemenModel');
         $this->load->helper('url','form','download');
        // $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
          $this->load->library('Excel','upload');
          if (!$this->session->userdata('logged_in')) {
          redirect('Login','refresh');
        }

    
    }
    public function kosongkan(){
    $this->db->empty_table('section');
    redirect('Section');
  }


    public function index()
    
    {
         $datax['notif']= $this->QrModel->getNotifikasi();
        $data['dpt']= $this->SectionModel->getSection();
        $data['listDep']=$this->DepartemenModel->getDepartemen();
        $this->load->view('admin/header',$datax);
        $this->load->view('admin/Section',$data);
    }


    public function updateSection(){
        $data['listDep']=$this->SectionModel->updateSection();
                $this->session->set_flashdata('editSection','<div class="alert alert-success" role="alert">SUKSES UPDATE DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Section', 'refresh');
    }
    public function deleteSection($id){
        $this->SectionModel->deleteSection($id);
             
            redirect('Section', 'refresh');
    }
    public function tambahSection(){
         $datax['notif']= $this->QrModel->getNotifikasi();
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
         //$this->load->model('DepartemenModel');
        $this->form_validation->set_rules('nama_section', 'nama_section', 'trim|required');
        if ($this->form_validation->run()==FALSE) {
            //$data['listDep']=$this->DepartemenModel->getDepartemen();
            $this->load->view('admin/header',$datax);
            $this->load->view('admin/tambahSection');
            $this->load->view('admin/footer');
        }else{
            $this->SectionModel->tambahSection();
                $this->session->set_flashdata('tambahSection','<div class="alert alert-success" role="alert">SUKSES TAMBAH DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Section', 'refresh');
        }

    }

    public function importSection(){
         $datax['notif']= $this->QrModel->getNotifikasi();
        $this->load->view('admin/header',$datax);
            $this->load->view('admin/importSection');
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
            $createArray = array('nama_section');
            $makeArray = array('nama_section' => 'nama_section');
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
                    
                    
                    $nama_section = $SheetDataKey['nama_section'];
                    
                   
                  
                    
                    //$id_section = filter_var(trim($allDataInSheet[$i][$id_section]), FILTER_SANITIZE_STRING);
                    $nama_section = filter_var(trim($allDataInSheet[$i][$nama_section]), FILTER_SANITIZE_STRING);
                    //$dept = filter_var(trim($allDataInSheet[$i][$dept]), FILTER_SANITIZE_STRING);
                   
                    $fetchData[] = array('nama_section' => $nama_section,
                          );
                }              
                $datax['employeeInfo'] = $fetchData;
                $this->SectionModel->setBatchImport($fetchData);
                $this->SectionModel->importData();
                $url = FCPATH.'/assets/'.$data['upload_data']['file_name'];
               unlink($url);
        
               redirect('Section','refresh');
            } else {
               $this->session->set_flashdata('gagalImport','<div class="alert alert-success" role="alert">SUKSES DELETE DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Section/importSection', 'refresh');
            }
        
      
    }
    

    public function downloadSup(){
        force_download('assets/format/FormatDataSection.xlsx',null);
    }

         public function export(){
    // Load plugin PHPExcel nya
    //include APPPATH.'third_party/PHPExcel/PHPExcel.php';
    
    // Panggil class PHPExcel nya
    $excel = new PHPExcel();
    // Settingan awal fil excel
    $excel->getProperties()->setCreator('My Notes Code')
                 ->setLastModifiedBy('My Notes Code')
                 ->setTitle("Data Section")
                 ->setSubject("Section")
                 ->setDescription("Laporan Semua Data Section")
                 ->setKeywords("Data Section");
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
    //$excel->setActiveSheetIndex(0)->setCellValue('A1', "Id_Section"); // Set kolom A3 dengan tulisan "NO"
    $excel->setActiveSheetIndex(0)->setCellValue('A1', "Nama_Section"); // Set kolom B3 dengan tulisan "NIS"
    //$excel->setActiveSheetIndex(0)->setCellValue('C1', "Departemen"); // Set kolom C3 dengan tulisan "NAMA"
    
    $excel->getActiveSheet()->getStyle('A1')->applyFromArray($style_col);
    //$excel->getActiveSheet()->getStyle('B1')->applyFromArray($style_col);
    //$excel->getActiveSheet()->getStyle('C1')->applyFromArray($style_col);
   

    // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
    $siswa = $this->SectionModel->getSectionExport();
    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
    $numrow = 2; // Set baris pertama untuk isi tabel adalah baris ke 4
    foreach($siswa as $data){ // Lakukan looping pada variabel siswa
      //$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $data->id_section);
      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $data->nama_section);
      //$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->dept);
      
     
      
      $no++; // Tambah 1 setiap kali looping
      $numrow++; // Tambah 1 setiap kali looping
    }
    // Set width kolom
    //$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
    $excel->getActiveSheet()->getColumnDimension('A')->setWidth(20); // Set width kolom B
   // $excel->getActiveSheet()->getColumnDimension('C')->setWidth(30); // Set width kolom C
   
   
    $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
    // Set orientasi kertas jadi LANDSCAPE
    $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
    // Set judul file excel nya
    $excel->getActiveSheet(0)->setTitle("Laporan Data Section");
    $excel->setActiveSheetIndex(0);
   
    $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
    ob_end_clean();
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Data Section.xlsx"');
    $write->save('php://output');
  }
}

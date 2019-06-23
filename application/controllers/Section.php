<?php
defined('BASEPATH') OR exit('id_section direct script access allowed');

class Section extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('SectionModel');
         $this->load->helper('url','form','download');
        // $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
          $this->load->library('excel','upload');

    
    }

    public function index()
    
    {
        $data['dpt']= $this->SectionModel->getSection();
        $this->load->view('Admin/header');
        $this->load->view('Admin/Section',$data);
    }
    public function updateSection(){
        $this->SectionModel->updateSection();
                $this->session->set_flashdata('editSection','<div class="alert alert-success" role="alert">SUKSES UPDATE DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Section', 'refresh');
    }
    public function deleteSection($id){
        $this->SectionModel->deleteSection($id);
                $this->session->set_flashdata('deleteSection','<div class="alert alert-success" role="alert">SUKSES DELETE DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Section', 'refresh');
    }
    public function tambahSection(){
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama_section', 'nama_section', 'trim|required');
        if ($this->form_validation->run()==FALSE) {
            $this->load->view('Admin/header');
            $this->load->view('Admin/tambahSection');
            $this->load->view('Admin/footer');
        }else{
            $this->SectionModel->tambahSection();
                $this->session->set_flashdata('tambahSection','<div class="alert alert-success" role="alert">SUKSES TAMBAH DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Section', 'refresh');
        }

    }

    public function importSection(){
        $this->load->view('Admin/header');
            $this->load->view('Admin/importSection');
            $this->load->view('Admin/footer');
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
            $createArray = array('id_section','nama_section','dept');
            $makeArray = array('id_section' => 'id_section', 'nama_section' => 'nama_section','dept' => 'dept');
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
                    
                    $id_section=$SheetDataKey['id_section'];
                    $nama_section = $SheetDataKey['nama_section'];
                    $dept = $SheetDataKey['dept'];
                   
                  
                    
                    $id_section = filter_var(trim($allDataInSheet[$i][$id_section]), FILTER_SANITIZE_STRING);
                    $nama_section = filter_var(trim($allDataInSheet[$i][$nama_section]), FILTER_SANITIZE_STRING);
                    $dept = filter_var(trim($allDataInSheet[$i][$dept]), FILTER_SANITIZE_STRING);
                   
                    $fetchData[] = array('nama_section' => $nama_section,
                          'dept' => $dept,);
                }              
                $data['employeeInfo'] = $fetchData;
                $this->SectionModel->setBatchImport($fetchData);
                $this->SectionModel->importData();
               //unlink('./assets/'.$data['upload_data']['file_name']);
               
               redirect('Section','refresh');
            } else {
               $this->session->set_flashdata('gagalImport','<div class="alert alert-success" role="alert">SUKSES DELETE DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Section/importSection', 'refresh');
            }
        
      
    }
    

    public function downloadSup(){
        force_download('assets/format/FormatDataSection.xlsx',null);
    }
}

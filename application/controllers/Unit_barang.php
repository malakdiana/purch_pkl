<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unit_barang extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Unit_barangModel');
         $this->load->helper('url','form','download');
        // $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
          $this->load->library('excel','upload');

    
    }

    public function index()
    
    {
        $data['unit']= $this->Unit_barangModel->getUnit_barang();
        $this->load->view('Admin/header');
        $this->load->view('Admin/Unit_barang',$data);
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
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('unit_barang', 'unit_barang', 'trim|required');
        if ($this->form_validation->run()==FALSE) {
            $this->load->view('Admin/header');
            $this->load->view('Admin/tambahUnit_barang');
            $this->load->view('Admin/footer');
        }else{
            $this->Unit_barangModel->tambahUnit_barang();
                $this->session->set_flashdata('tambahUnit_barang','<div class="alert alert-success" role="alert">SUKSES TAMBAH DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Unit_barang', 'refresh');
        }

    }

    public function importUnit_barang(){
        $this->load->view('Admin/header');
            $this->load->view('Admin/importUnit_barang');
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
            


            $data = array_diff_key($makeArray, $SheetDataKey);
           
            if (empty($data)) {
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
                $data['employeeInfo'] = $fetchData;
                $this->Unit_barangModel->setBatchImport($fetchData);
                $this->Unit_barangModel->importData();
               //unlink('./assets/'.$data['upload_data']['file_name']);
               
               redirect('Unit_barang','refresh');
            } else {
               $this->session->set_flashdata('gagalImport','<div class="alert alert-success" role="alert">SUKSES DELETE DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Unit_barang/importUnit_barang', 'refresh');
            }
        
      
    }
    

    public function downloadSup(){
        force_download('assets/format/FormatDataUnit_barang.xlsx',null);
    }
}

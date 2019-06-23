<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Approval extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ApprovalModel');
         $this->load->helper('url','form','download');
        // $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
          $this->load->library('excel','upload');

    
    }

    public function index()
    
    {
        $data['app']= $this->ApprovalModel->getApproval();
        $this->load->view('Admin/header');
        $this->load->view('Admin/Approval',$data);
    }
    public function updateApproval(){
        $this->ApprovalModel->updateApproval();
                $this->session->set_flashdata('editApproval','<div class="alert alert-success" role="alert">SUKSES UPDATE DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Approval', 'refresh');
    }
    public function deleteApproval($id){
        $this->ApprovalModel->deleteApproval($id);
                $this->session->set_flashdata('deleteApproval','<div class="alert alert-success" role="alert">SUKSES DELETE DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Approval', 'refresh');
    }
    public function tambahApproval(){
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama', 'nama', 'trim|required');
        if ($this->form_validation->run()==FALSE) {
            $this->load->view('Admin/header');
            $this->load->view('Admin/tambahApproval');
            $this->load->view('Admin/footer');
        }else{
            $this->ApprovalModel->tambahApproval();
                $this->session->set_flashdata('tambahApproval','<div class="alert alert-success" role="alert">SUKSES TAMBAH DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Approval', 'refresh');
        }

    }

    public function importApproval(){
        $this->load->view('Admin/header');
            $this->load->view('Admin/importApproval');
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
            $createArray = array('no','nama','kode_nama','min','max');
            $makeArray = array('no' => 'no', 'nama' => 'nama','kode_nama' => 'kode_nama','min' => 'min','max' => 'max');
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
                    $nama = $SheetDataKey['nama'];
                    $kode_nama = $SheetDataKey['kode_nama'];
                    $min = $SheetDataKey['min'];
                    $max = $SheetDataKey['max'];
                   
                  
                    
                    $no = filter_var(trim($allDataInSheet[$i][$no]), FILTER_SANITIZE_STRING);
                    $nama = filter_var(trim($allDataInSheet[$i][$nama]), FILTER_SANITIZE_STRING);
                    $kode_nama = filter_var(trim($allDataInSheet[$i][$kode_nama]), FILTER_SANITIZE_STRING);
                    $min = filter_var(trim($allDataInSheet[$i][$min]), FILTER_SANITIZE_STRING);
                    $max = filter_var(trim($allDataInSheet[$i][$max]), FILTER_SANITIZE_STRING);
                   
                    $fetchData[] = array('no' => $no,'nama' => $nama, 'kode_nama' => $kode_nama, 'min' => $min, 'max' => $max,);
                }              
                $data['employeeInfo'] = $fetchData;
                $this->ApprovalModel->setBatchImport($fetchData);
                $this->ApprovalModel->importData();
               //unlink('./assets/'.$data['upload_data']['file_name']);
               
               redirect('Approval','refresh');
            } else {
               $this->session->set_flashdata('gagalImport','<div class="alert alert-success" role="alert">SUKSES DELETE DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Approval/importApproval', 'refresh');
            }
        
      
    }
    

    public function downloadSup(){
        force_download('assets/format/FormatDataApproval.xlsx',null);
    }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Departemen extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('DepartemenModel');
         $this->load->helper('url','form','download');
        // $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
          $this->load->library('excel','upload');

    
    }

    public function index()
    
    {
        $data['dpt']= $this->DepartemenModel->getDepartemen();
        $this->load->view('Admin/header');
        $this->load->view('Admin/Departemen',$data);
    }
    public function updateDepartemen(){
        $this->DepartemenModel->updateDepartemen();
                $this->session->set_flashdata('editDepartemen','<div class="alert alert-success" role="alert">SUKSES UPDATE DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Departemen', 'refresh');
    }
    public function deleteDepartemen($id){
        $this->DepartemenModel->deleteDepartemen($id);
                $this->session->set_flashdata('deleteDepartemen','<div class="alert alert-success" role="alert">SUKSES DELETE DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Departemen', 'refresh');
    }
    public function tambahDepartemen(){
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('group_name', 'group_name', 'trim|required');
        if ($this->form_validation->run()==FALSE) {
            $this->load->view('Admin/header');
            $this->load->view('Admin/tambahDepartemen');
            $this->load->view('Admin/footer');
        }else{
            $this->DepartemenModel->tambahDepartemen();
                $this->session->set_flashdata('tambahDepartemen','<div class="alert alert-success" role="alert">SUKSES TAMBAH DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Departemen', 'refresh');
        }

    }

    public function importDepartemen(){
        $this->load->view('Admin/header');
            $this->load->view('Admin/importDepartemen');
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
            $createArray = array('no','group_name','remarks');
            $makeArray = array('no' => 'no', 'group_name' => 'group_name','remarks' => 'remarks');
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
                    $group_name = $SheetDataKey['group_name'];
                    $remarks = $SheetDataKey['remarks'];
                   
                  
                    
                    $no = filter_var(trim($allDataInSheet[$i][$no]), FILTER_SANITIZE_STRING);
                    $group_name = filter_var(trim($allDataInSheet[$i][$group_name]), FILTER_SANITIZE_STRING);
                    $remarks = filter_var(trim($allDataInSheet[$i][$remarks]), FILTER_SANITIZE_STRING);
                   
                    $fetchData[] = array('group_name' => $group_name,
                          'remarks' => $remarks,);
                }              
                $data['employeeInfo'] = $fetchData;
                $this->DepartemenModel->setBatchImport($fetchData);
                $this->DepartemenModel->importData();
               //unlink('./assets/'.$data['upload_data']['file_name']);
               
               redirect('Departemen','refresh');
            } else {
               $this->session->set_flashdata('gagalImport','<div class="alert alert-success" role="alert">SUKSES DELETE DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Departemen/importDepartemen', 'refresh');
            }
        
      
    }
    

    public function downloadSup(){
        force_download('assets/format/FormatDataDepartemen.xlsx',null);
    }
}

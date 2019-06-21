<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('AdminModel');
		 $this->load->helper('url','form','download');
		// $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
		  $this->load->library('excel','upload');

	
	}

	public function index()
	
	{
		$data['supp']= $this->AdminModel->getSupplier();
		$this->load->view('admin/header');
		$this->load->view('admin/supplier',$data);
	}
	public function updateSupplier(){
		$this->AdminModel->updateSupplier();
				$this->session->set_flashdata('editSupplier','<div class="alert alert-success" role="alert">SUKSES UPDATE DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('Admin', 'refresh');
	}
	public function deleteSupplier($id){
		$this->AdminModel->deleteSupplier($id);
				$this->session->set_flashdata('deleteSupplier','<div class="alert alert-success" role="alert">SUKSES DELETE DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('Admin', 'refresh');
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
			$this->AdminModel->tambahSupplier();
				$this->session->set_flashdata('tambahSupplier','<div class="alert alert-success" role="alert">SUKSES TAMBAH DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('Admin', 'refresh');
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
                $this->AdminModel->setBatchImport($fetchData);
                $this->AdminModel->importData();
               unlink('./assets/'.$data['upload_data']['file_name']);
               redirect('Admin','refresh');
            } else {
               $this->session->set_flashdata('gagalImport','<div class="alert alert-success" role="alert">SUKSES DELETE DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Admin/importSupplier', 'refresh');
            }
        
      
	}
	

	public function downloadSup(){
		force_download('assets/format/FormatDataSupplier.xlsx',null);
	}
}

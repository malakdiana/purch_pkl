<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('BarangModel');
		 $this->load->helper('url','form','download');
		// $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
		  $this->load->library('excel','upload');

	
	}

	public function index()
	
	{
		$data['brg']= $this->BarangModel->getBarang();
		$this->load->view('Admin/header');
		$this->load->view('Admin/Barang',$data);
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
		$this->load->helper('url', 'form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('no_barang', 'no_barang', 'trim|required');
		if ($this->form_validation->run()==FALSE) {
			$this->load->view('Admin/header');
			$this->load->view('Admin/tambahBarang');
			$this->load->view('Admin/footer');
		}else{
			$this->BarangModel->tambahBarang();
				$this->session->set_flashdata('tambahBarang','<div class="alert alert-success" role="alert">SUKSES TAMBAH DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('Barang', 'refresh');
		}

	}

	public function importBarang(){
		$this->load->view('Admin/header');
			$this->load->view('Admin/importBarang');
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
            $createArray = array('NO','NO_BARANG', 'GROUP_NAME','NAMA_BARANG','UNIT','REMARKS');
            $makeArray = array('NO' => 'NO','NO_BARANG'=>'NO_BARANG', 'GROUP_NAME' => 'GROUP_NAME','NAMA_BARANG'=> 'NAMA_BARANG','UNIT' => 'UNIT','REMARKS' => 'REMARKS');
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
                    
                    $no=$SheetDataKey['NO'];
                    $no_barang = $SheetDataKey['NO_BARANG'];
                    $group_name = $SheetDataKey['GROUP_NAME'];
                    $nama_barang = $SheetDataKey['NAMA_BARANG'];
                    $unit = $SheetDataKey['UNIT'];
                    $remarks = $SheetDataKey['REMARKS'];
                   
                  
                    
                    $no = filter_var(trim($allDataInSheet[$i][$no]), FILTER_SANITIZE_STRING);
                    $no_barang = filter_var(trim($allDataInSheet[$i][$no_barang]), FILTER_SANITIZE_STRING);
                    $group_name = filter_var(trim($allDataInSheet[$i][$group_name]), FILTER_SANITIZE_STRING);
                    $nama_barang = filter_var(trim($allDataInSheet[$i][$nama_barang]), FILTER_SANITIZE_STRING);
                    $unit = filter_var(trim($allDataInSheet[$i][$unit]), FILTER_SANITIZE_STRING);
                    $remarks = filter_var(trim($allDataInSheet[$i][$remarks]), FILTER_SANITIZE_STRING);
                   
                    $fetchData[] = array('no_barang' => $no_barang,'group_name' => $group_name,'nama_barang' => $nama_barang,'unit' => $unit,
                          'remarks' => $remarks,);
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
}

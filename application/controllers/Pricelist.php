<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pricelist extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('PricelistModel');
		 $this->load->helper('url','form','download');
		// $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
		  $this->load->library('excel','upload');

	
	}

	public function index()
	
	{
		$data['price']= $this->PricelistModel->getPricelist();
		$this->load->view('admin/header');
		$this->load->view('admin/pricelist',$data);
	}
	public function updatePricelist(){
		$this->PricelistModel->updatePricelist();
				$this->session->set_flashdata('editPricelist','<div class="alert alert-success" role="alert">SUKSES UPDATE DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('Pricelist', 'refresh');
	}
	public function deletePricelist($id){
		$this->PricelistModel->deletePricelist($id);
				$this->session->set_flashdata('deletePricelist','<div class="alert alert-success" role="alert">SUKSES DELETE DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('Pricelist', 'refresh');
	}
	public function tambahPricelist(){
		$this->load->helper('url', 'form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama_supplier', 'nama_supplier', 'trim|required');
		if ($this->form_validation->run()==FALSE) {
			$this->load->view('admin/header');
			$this->load->view('admin/tambahPricelist');
			$this->load->view('admin/footer');
		}else{
			$this->PricelistModel->tambahSupplier();
				$this->session->set_flashdata('tambahPricelist','<div class="alert alert-success" role="alert">SUKSES TAMBAH DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('Pricelist', 'refresh');
		}

	}

	public function importPricelist(){
		$this->load->view('admin/header');
			$this->load->view('admin/importPricelist');
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
            $createArray = array('No','Group_Name', 'No_Barang','Nama_Barang','Spec_Barang','Unit','Mata_Uang','Price','Nama_Supplier','Quotation_No','Tgl_Input','Lb_Date','Remarks');
            $makeArray = array('No'=>'No','Group_Name'=>'Group_Name', 'No_Barang'=>'No_Barang','Nama_Barang'=>'Nama_Barang','Spec_Barang' =>'Spec_Barang','Unit'=>'Unit','Mata_Uang'=>'Mata_Uang','Price'=>'Price','Nama_Supplier'=>'Nama_Supplier','Quotation_No'=>'Quotation_No','Tgl_Input' => 'Tgl_Input','Lb_Date' => 'Lb_Date','Remarks'=>'Remarks');
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
                    $group_name = $SheetDataKey['Group_Name'];
                    $no_barang = $SheetDataKey['No_Barang'];
                    $nama_barang = $SheetDataKey['Nama_Barang'];
                    $spec_barang = $SheetDataKey['Spec_Barang'];
                    $unit = $SheetDataKey['Unit'];
                    $mata_uang = $SheetDataKey['Mata_Uang'];
                    $price = $SheetDataKey['Price'];
                    $nama_supplier = $SheetDataKey['Nama_Supplier'];
                    $quotation_no = $SheetDataKey['Quotation_No'];
                    $tgl_input = $SheetDataKey['Tgl_Input'];
                    $lbdate = $SheetDataKey['Lb_Date'];
                    $remarks = $SheetDataKey['Remarks'];
                  
                    
                    $no = filter_var(trim($allDataInSheet[$i][$no]), FILTER_SANITIZE_STRING);
                    $group_name = filter_var(trim($allDataInSheet[$i][$group_name]), FILTER_SANITIZE_STRING);
                    $no_barang = filter_var(trim($allDataInSheet[$i][$no_barang]), FILTER_SANITIZE_STRING);
                    $nama_barang = filter_var(trim($allDataInSheet[$i][$nama_barang]), FILTER_SANITIZE_STRING);
                    $spec_barang = filter_var(trim($allDataInSheet[$i][$spec_barang]), FILTER_SANITIZE_STRING);
                    $unit = filter_var(trim($allDataInSheet[$i][$unit]), FILTER_SANITIZE_STRING);
                    $mata_uang = filter_var(trim($allDataInSheet[$i][$mata_uang]), FILTER_SANITIZE_STRING);
                    $price = filter_var(trim($allDataInSheet[$i][$price]), FILTER_SANITIZE_STRING);
                    $nama_supplier = filter_var(trim($allDataInSheet[$i][$nama_supplier]), FILTER_SANITIZE_STRING);
                    $quotation_no = filter_var(trim($allDataInSheet[$i][$quotation_no]), FILTER_SANITIZE_STRING);
                    $tgl_input = filter_var(trim($allDataInSheet[$i][$tgl_input]), FILTER_SANITIZE_STRING);
                    $lbdate = filter_var(trim($allDataInSheet[$i][$lbdate]), FILTER_SANITIZE_STRING);
                    $remarks = filter_var(trim($allDataInSheet[$i][$remarks]), FILTER_SANITIZE_STRING);
                   
                    $fetchData[] = array( 'group_name' =>$group_name,
        'no_barang' =>$no_barang,
        'nama_barang' => $nama_barang,
        'spec_barang' => $spec_barang,
        'unit' => $unit,
        'attention' => $attention,
        'mata_uang' => $mata_uang,
        'price' => $price,
        'nama_supplier' => $nama_supplier,
        'quotation_no' => $quotation_no,
        'tgl_input' => $tgl_input,  
        'lbdate' => $lbdate,
        'remarks' => $remarks,);
                }              
                $data['employeeInfo'] = $fetchData;
                $this->PricelistModel->setBatchImport($fetchData);
                $this->PricelistModel->importData();
               unlink('./assets/'.$data['upload_data']['file_name']);
               redirect('Pricelist','refresh');
            } else {
               $this->session->set_flashdata('gagalImport','<div class="alert alert-success" role="alert">SUKSES DELETE DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Pricelist/importPricelist', 'refresh');
            }
        
      
	}
	

	public function downloadSup(){
		force_download('assets/format/FormatDataPricelist.xlsx',null);
	}
}

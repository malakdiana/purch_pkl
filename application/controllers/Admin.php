<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('AdminModel');
		 $this->load->helper('url','form','download');

	
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
		$this->form_validation->set_rules('namaSupplier', 'namaSupplier', 'trim|required');
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
		if (isset($_POST['import'])){
			$file = $_FILES['dataSupplier']['tmp_name'];
			$ekstensi = explode('.', $_FILES['dataSupplier']['name']);

			if(empty($file)){
				echo 'file tidak boleh kosong';
			}
			else{
				if(strtolower(end($ekstensi))=='csv' && $_FILES['dataSupplier']['size']>0){
					$i =0;
					$handle =fopen($file, "r");
					while(($row = fgetcsv($handle,2048))){
						$i++;
						if($i ==1) continue;

						$data =[
							'nama_supplier' => $row[1],
							'alamat' => $row[2],
							'kota' => $row[3],
							'no_telp' => $row[4],
							'no_fax' => $row[5],
							'attention' => $row[6],
							'no_hp' => $row[7],
							'tgl_input' => $row[8],
							'terms' => $row[9],
							'ppn' => $row[10],
							'supply' => $row[11],
							'status' => $row[12],
							'perjanjian' => $row[13],
							'remarks' => $row[14],
						];
					

						$this->AdminModel->importSupplier($data);
					}
					fclose($handle);

					redirect('Admin','refresh');
				}else{
					echo('format tidak valid');
				}
			}
		}
	}

	public function downloadSup(){
		force_download('assets/format/formatsupplierr.csv',null);
	}
}

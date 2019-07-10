<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayatdatang extends CI_Controller {
	///

	public function __construct()
    {
        parent::__construct();
         $this->load->model('RiwayatdatangModel');
         $this->load->model('Purch_reqModel');
         $this->load->helper('url','form');
        // $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
         // $this->load->library('excel','upload');

    
    }

public function index()
	{
		$data['Po']= $this->RiwayatdatangModel->getPo();
        
		$this->load->view('Admin/header');
        $this->load->view('Admin/Riwayatdatang',$data);
 }

public function inserttanggal(){
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
        $this->load->model('RiwayatdatangModel');
         
        $this->form_validation->set_rules('tgl_dtg', 'tgl_dtg', 'trim|required');
        if ($this->form_validation->run()==FALSE) {
            $this->load->view('Admin/header');
            $this->load->view('Admin/Riwayatdatang');
            $this->load->view('Admin/footer');

            $this->session->set_flashdata('tambah Data Kedatangan','<div class="alert alert-success" role="alert">GAGAL TAMBAH DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        }else{
           
            $xx = $this->RiwayatdatangModel->inserttanggal();

            if($xx == 1){
              echo "<script>alert('Gagal di tambahkan, quantity terlalu banyak')</script>";
              redirect('Riwayatdatang', 'refresh');
            }else{
                $this->session->set_flashdata('tambah Data Kedatangan','<div class="alert alert-success" role="alert">SUKSES TAMBAH DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('Riwayatdatang', 'refresh');
            }

              
        }

    }

    public function detaildatang($id)
    {
        $data['Detail']= $this->RiwayatdatangModel->getDetail($id);
        
        $this->load->view('Admin/header');
        $this->load->view('Admin/Detailriwayat',$data);
 }

  public function deleteriwayat($id, $id_bayangan){
        $this->RiwayatdatangModel->deleteriwayat($id, $id_bayangan);
                $this->session->set_flashdata('deleteRiwayat','<div class="alert alert-success" role="alert">SUKSES DELETE DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Riwayatdatang/detaildatang/'.$id_bayangan, 'refresh');
    }

   
}

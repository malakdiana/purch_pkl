<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Qr extends CI_Controller {
	///

	public function __construct()
    {
        parent::__construct();
        $this->load->model('QrModel');
         $this->load->helper('url','form');
        // $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
         $this->load->library('upload');

    
    }

public function index()
	{
		$data['Qr']=$this->QrModel->getQr();
        if($this->session->userdata('logged_in')['hak_akses']==1){
             $this->load->view('Admin/header');

        $this->load->view('admin/quotation',$data);
    }else if($this->session->userdata('logged_in')['hak_akses']==2){
             $this->load->view('User/header');
        $this->load->view('User/Qr',$data);

		
    }else{
        $this->load->view('Read_only/header');
        $this->load->view('User/Qr',$data);
    }
   
	}

       public function tambahQR(){
        $this->load->model('SectionModel');
        $this->load->helper('url', 'form');
    
            $data['section']=$this->SectionModel->getSection();
            $this->load->view('User/header');
            $this->load->view('User/tambahQR', $data);
            $this->load->view('Admin/footer');
       
                
        

    }

    public function addQr(){
            $config['upload_path'] = './assets/file_qr/';
            $config['allowed_types'] = 'pdf|jpg|png|jpeg';
            $config['max_size']= 1000000000;
            $config['max_width']= 10240;
            $config['max_height']=7680;
            $this->load->library('upload', $config);

            if(!$this->upload->do_upload('fupload')){
                $data['section']=$this->SectionModel->getSection();
                $error= array('error'=>$this->upload->display_errors());
                $this->load->view('User/header');
                $this->load->view('User/tambahQR',$data, $error);
                $this->load->view('Admin/footer');
            }else{
                $this->QrModel->tambahQR();
               $this->session->set_flashdata('tambahQR','<div class="alert alert-success" role="alert">SUKSES TAMBAH DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Qr/', 'refresh');
            }
    }

    public function tambahVendor($id){
        $data['id']=$id;
        $data['vendor']=$this->QrModel->getListVendor($id);
        $this->load->view('Admin/header');
            $this->load->view('Admin/tambahVendor',$data);

    }

    public function tambahVen($id){

        $id=array();
        $vendor=array();
        $harga=array();
       $tgl = date('Y-m-d');
        $id= $this->input->post('id');
        $vendor= $this->input->post('vendor');
        $harga= $this->input->post('harga');
        $cek= true;
        $number_of_files = sizeof($_FILES['userfiles']['tmp_name']);

        $files=$_FILES['userfiles'];
        $config['upload_path'] = './assets/file_qr/';
            $config['allowed_types'] = 'pdf|jpg|png|jpeg|doc|docx';
            $config['max_size']= 1000000000;
            $config['max_width']= 10240;
            $config['max_height']=7680;
        
        for ($i=0; $i < $number_of_files ; $i++) { 
            
            $_FILES['userfile']['name']= $files['name'][$i];
             $_FILES['userfile']['type']= $files['type'][$i];
              $_FILES['userfile']['tmp_name']= $files['tmp_name'][$i];
               $_FILES['userfile']['error']= $files['error'][$i];
                $_FILES['userfile']['size']= $files['size'][$i];
                $this->upload->initialize($config);

            if($this->upload->do_upload('userfile')){
                $data = array(
                    'id_penawaran' => $id[$i],
                    'tanggal' => $tgl,
                    'nama_vendor' => $vendor[$i],
                    'harga' => $harga[$i],
                    'detail' => $this->upload->data('file_name'),
                      'status' => 0,
            );
         $this->db->insert('detail_penawaran', $data);
            }else{
               $error = array('error' => $this->upload->display_errors());
               
            }
            
        }

         redirect('Qr/', 'refresh');

    }


     

	
}

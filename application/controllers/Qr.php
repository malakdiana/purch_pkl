<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Qr extends CI_Controller {
	///

	public function __construct()
    {
        parent::__construct();
        $this->load->model('QrModel');
        $this->load->model('SectionModel');
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
        $this->load->view('read_only/Qr',$data);
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
            $config['allowed_types'] = 'pdf|jpg|png|jpeg|docx';
            $config['max_size']= 1000000000;
            $config['max_width']= 10240;
            $config['max_height']=7680;
            $this->load->library('upload', $config);

            if(!$this->upload->do_upload('fupload')){
               $this->QrModel->tambahQRnoGambar();
               $this->session->set_flashdata('tambahQR','<div class="alert alert-success" role="alert">SUKSES TAMBAH DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Qr/', 'refresh');
                // $data['section']=$this->SectionModel->getSection();
                // $error= array('error'=>$this->upload->display_errors());
                // $this->load->view('User/header');
                // $this->load->view('User/tambahQR',$data, $error);
                // $this->load->view('Admin/footer');
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

     public function listvendor($id){
        $data['id']=$id;
        $data['vendor']=$this->QrModel->getListVendor($id);
         if($this->session->userdata('logged_in')['hak_akses']==1){
        $this->load->view('Admin/header');
            $this->load->view('User/list_Vendor',$data);
          }
          else if($this->session->userdata('logged_in')['hak_akses']==2){
        $this->load->view('User/header');
            $this->load->view('User/list_Vendor',$data);
          } else{
        $this->load->view('Read_only/header');
            $this->load->view('User/list_Vendor',$data);
          }

    }

    public function editVendor(){
          $files=$_FILES['fupload'];
        $config['upload_path'] = './assets/file_qr/';
                   $config['upload_path'] = './assets/file_qr/';
            $config['allowed_types'] = 'pdf|jpg|png|jpeg|doc|docx';
            $config['max_size']= 1000000000;
            $config['max_width']= 10240;
            $config['max_height']=7680;
        
             $_FILES['userfile']['name']= $files['name'];
             $_FILES['userfile']['type']= $files['type'];
       
              $_FILES['userfile']['tmp_name']= $files['tmp_name'];
               $_FILES['userfile']['error']= $files['error'];
                $_FILES['userfile']['size']= $files['size'];
                $this->load->library('upload', $config);
$this->upload->initialize($config);

          if($this->upload->do_upload('userfile')){
  $this->QrModel->editVendorDetail();
               redirect('Qr/', 'refresh');
                 

            }else{
               $this->QrModel->editVendor();
            }
    }

    public function editQr($id){
        $data['list'] = $this->QrModel->getQrById($id);
        $this->load->view('Admin/header');
        $this->load->view('Admin/editQuotation', $data);
        $this->load->view('Admin/footer');
    }

    public function detailQuotation($id){
       $data['list'] = $this->QrModel->getQrById($id);
        $this->load->view('Admin/header');
        $this->load->view('Admin/detailQuotation', $data);
        $this->load->view('Admin/footer');
    }

    public function editQuotation($id){
      if(!empty($_FILES['fupload'])){
        var_dump($_FILES['fupload']);die();
        $files=$_FILES['fupload'];
        $config['upload_path'] = './assets/file_qr/';
       
            $config['allowed_types'] = 'pdf|jpg|png|jpeg|doc|docx';
            $config['max_size']= 1000000000;
            $config['max_width']= 10240;
            $config['max_height']=7680;
        
             $_FILES['userfile']['name']= $files['name'];
             $_FILES['userfile']['type']= $files['type'];
       
              $_FILES['userfile']['tmp_name']= $files['tmp_name'];
               $_FILES['userfile']['error']= $files['error'];
                $_FILES['userfile']['size']= $files['size'];
                $this->load->library('upload', $config);
$this->upload->initialize($config);
}
          if($this->upload->do_upload('userfile')){

  $this->QrModel->editQuotationGambar();
   $this->session->set_flashdata('editQr','<div class="alert alert-success" role="alert">SUKSES EDIT QUOTATION <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
               redirect('Qr/', 'refresh');
                 

            }else{
             
               $this->QrModel->editQuotation();
                  $this->session->set_flashdata('editQr','<div class="alert alert-success" role="alert">SUKSES EDIT QUOTATION <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
               redirect('Qr/', 'refresh');
            } 
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
                      'status' => 1,
            );
         $this->db->insert('detail_penawaran', $data);
         $this->session->set_flashdata('tambahVendor','<div class="alert alert-success" role="alert">SUKSES TAMBAH DATA VENDOR <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
         $ids = $id[$i];
       
            }else{
               $error = array('error' => $this->upload->display_errors());
               $ids = $id[$i];
               
            }
            
        }
          $data2 = array(
            'status' =>1);
         $this->db->where('id_penawaran',$ids );
         $this->db->update('penawaran',$data2);

         redirect("Qr/tambahVendor/$ids", 'refresh');

    }

    public function tracking()
    {  $data['Qr']=$this->QrModel->getQr_tracking();

        if($this->session->userdata('logged_in')['hak_akses']==2){
        $this->load->view('User/header');
        $this->load->view('User/Tracking_Qr',$data);
        }
    }


     
	
}

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
         if (!$this->session->userdata('logged_in')) {
        redirect('Login','refresh');
      }

    
    }

public function index()
	{
		$data['Qr']=$this->QrModel->getQr();
        if($this->session->userdata('logged_in')['hak_akses']==1){
             $this->load->view('admin/header');
        $this->load->view('admin/quotation',$data);
        
    }else if($this->session->userdata('logged_in')['hak_akses']==2){
             $this->load->view('user/header');
        $this->load->view('user/Qr',$data);
    }else if($this->session->userdata('logged_in')['hak_akses']==4){
             $this->load->view('Personal/header');
        $this->load->view('Personal/Qr',$data);
		
    }else{
        $this->load->view('read_only/header');
        $this->load->view('read_only/Qr',$data);
    }
   
	}

       public function tambahQR(){
        $this->load->model('SectionModel');
        $this->load->helper('url', 'form');
    
            $data['section']=$this->SectionModel->getSection();

            if($this->session->userdata('logged_in')['hak_akses']==2){
            $this->load->view('user/header');
            $this->load->view('user/tambahQR', $data);
            $this->load->view('admin/footer');
            }else if($this->session->userdata('logged_in')['hak_akses']==4){
            $this->load->view('Personal/header');
            $this->load->view('Personal/tambahQR', $data);
            $this->load->view('admin/footer');
    
    }
       
                
        

    }

    public function addQr(){
            $config['upload_path'] = './assets/file_qr/';
            $config['allowed_types'] = 'pdf|jpg|png|jpeg|doc|docx|xlsx';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if(!$this->upload->do_upload('fupload')){
               $this->QrModel->tambahQRnoGambar();
               $this->session->set_flashdata('tambahQR','<div class="alert alert-success" role="alert">SUKSES TAMBAH DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Qr/tracking', 'refresh');
            }else{
                $this->QrModel->tambahQR();
               $this->session->set_flashdata('tambahQR','<div class="alert alert-success" role="alert">SUKSES TAMBAH DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Qr/tracking', 'refresh');
            }
    }

     public function addQrPersonal(){
            $config['upload_path'] = './assets/file_qr/';
            $config['allowed_types'] = 'pdf|jpg|png|jpeg|doc|docx|xlsx';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if(!$this->upload->do_upload('fupload')){
               $this->QrModel->tambahQRnoGambar();
               $this->session->set_flashdata('tambahQR','<div class="alert alert-success" role="alert">SUKSES TAMBAH DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Qr/tracking_personal', 'refresh');
            }else{
                $this->QrModel->tambahQR();
               $this->session->set_flashdata('tambahQR','<div class="alert alert-success" role="alert">SUKSES TAMBAH DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Qr/tracking_personal', 'refresh');
            }
    }

    public function tambahVendor($id){
        $data['id']=$id;
        $data['vendor']=$this->QrModel->getListVendor($id);
        $this->load->view('admin/header');
            $this->load->view('admin/tambahVendor',$data);

    }

     public function listvendor($id){
        $data['id']=$id;
        $data['vendor']=$this->QrModel->getListVendor($id);
         if($this->session->userdata('logged_in')['hak_akses']==1){
        $this->load->view('admin/header');
            $this->load->view('user/list_Vendor',$data);
          }
          else if($this->session->userdata('logged_in')['hak_akses']==2){
        $this->load->view('user/header');
            $this->load->view('user/list_Vendor',$data);
          }else if($this->session->userdata('logged_in')['hak_akses']==4){
        $this->load->view('Personal/header');
            $this->load->view('Personal/list_Vendor',$data);
          } else{
        $this->load->view('read_only/header');
            $this->load->view('user/list_Vendor',$data);
          }

    }

    public function editVendor(){
          $id = $this->input->post('id');
          $files=$_FILES['fupload'];
        $config['upload_path'] = './assets/file_qr/';
                   $config['upload_path'] = './assets/file_qr/';
            $config['allowed_types'] = 'pdf|jpg|png|jpeg|doc|docx|xlsx';
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
           redirect('Qr/tambahVendor/'.$id, 'refresh');
                 

            }else{
               $this->QrModel->editVendor();
                redirect('Qr/tambahVendor/'.$id, 'refresh');
            }
    }

    public function editQr($id){
        $data['list'] = $this->QrModel->getQrById($id);
        $this->load->view('admin/header');
        $this->load->view('admin/editQuotation', $data);
        $this->load->view('admin/footer');
    }

        public function editQrUser($id){
        $data['list'] = $this->QrModel->getQrById($id);
        if($this->session->userdata('logged_in')['hak_akses']==2){
        $this->load->view('user/header');
        $this->load->view('user/editQR', $data);
        $this->load->view('admin/footer');
        }else if($this->session->userdata('logged_in')['hak_akses']==4){
        $this->load->view('Personal/header');
        $this->load->view('Personal/editQR', $data);
        $this->load->view('admin/footer');
      }
    }



    public function detailQuotation($id){
       $data['list'] = $this->QrModel->getQrById($id);
        $this->load->view('admin/header');
        $this->load->view('admin/detailQuotation', $data);
        $this->load->view('admin/footer');
    }

    public function detailQuotationUser($id){
       $data['list'] = $this->QrModel->getQrById($id);
       if($this->session->userdata('logged_in')['hak_akses']==2){
        $this->load->view('user/header');
        $this->load->view('user/detailQuotation', $data);
        $this->load->view('admin/footer');
      }else if($this->session->userdata('logged_in')['hak_akses']==4){
        $this->load->view('Personal/header');
        $this->load->view('Personal/detailQuotation', $data);
        $this->load->view('admin/footer');
         }else{
         $this->load->view('read_only/header');
        $this->load->view('read_only/editQuotation', $data);
        $this->load->view('admin/footer');
    }

    }

    public function editQuotation($id){
      $config['upload_path'] = './assets/file_qr/';
            $config['allowed_types'] = 'pdf|jpg|png|jpeg|doc|docx|xlsx';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
                $this->load->library('upload', $config);
$this->upload->initialize($config);

          if($this->upload->do_upload('fupload')){

  $this->QrModel->editQuotationGambar();
   $this->session->set_flashdata('editQr','<div class="alert alert-success" role="alert">SUKSES EDIT QUOTATION <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
               redirect('Qr/', 'refresh');
                 

            }else{
             
               $this->QrModel->editQuotation();
                  $this->session->set_flashdata('editQr','<div class="alert alert-success" role="alert">SUKSES EDIT QUOTATION <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
               redirect('Qr/', 'refresh');
            } 
    }


    public function editQuotationUser($id){
     $config['upload_path'] = './assets/file_qr/';
            $config['allowed_types'] = 'pdf|jpg|png|jpeg|doc|docx|xlsx';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
                $this->load->library('upload', $config);
$this->upload->initialize($config);
          if($this->upload->do_upload('fupload')){

  $this->QrModel->editQuotationGambar();
   $this->session->set_flashdata('editQr','<div class="alert alert-success" role="alert">SUKSES EDIT QUOTATION <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');


               redirect('Qr/tracking', 'refresh');
                 

            }else{
             
               $this->QrModel->editQuotation();
                  $this->session->set_flashdata('editQr','<div class="alert alert-success" role="alert">SUKSES EDIT QUOTATION <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
               redirect('Qr/tracking', 'refresh');
            } 
    }


    public function editQuotationPersonal($id){
     $config['upload_path'] = './assets/file_qr/';
            $config['allowed_types'] = 'pdf|jpg|png|jpeg|doc|docx|xlsx';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
                $this->load->library('upload', $config);
$this->upload->initialize($config);
          if($this->upload->do_upload('fupload')){

  $this->QrModel->editQuotationGambar();
   $this->session->set_flashdata('editQr','<div class="alert alert-success" role="alert">SUKSES EDIT QUOTATION <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

              
               redirect('Qr/tracking_personal', 'refresh');
                 

            }else{
             
               $this->QrModel->editQuotation();
                  $this->session->set_flashdata('editQr','<div class="alert alert-success" role="alert">SUKSES EDIT QUOTATION <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
               redirect('Qr/tracking_personal', 'refresh');
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
            $config['allowed_types'] = 'pdf|jpg|png|jpeg|doc|docx|xlsx';
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
                $d = $harga[$i];
             $d = str_replace('Rp', '', $d);
              $d = str_replace('.', '', $d);
               $d = str_replace(' ', '', $d);
            if($this->upload->do_upload('userfile')){
                $data = array(
                    'id_penawaran' => $id[$i],
                    'tanggal' => $tgl,
                    'nama_vendor' => $vendor[$i],
                    'harga' => $d,
                    'detail' => $this->upload->data('file_name'),
                      'status' => 1,
            );
         $this->db->insert('detail_penawaran', $data);
         $this->session->set_flashdata('tambahVendor','<div class="alert alert-success" role="alert">SUKSES TAMBAH DATA VENDOR <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
         $ids = $id[$i];
       
            }else{
               $data = array(
                    'id_penawaran' => $id[$i],
                    'tanggal' => $tgl,
                    'nama_vendor' => $vendor[$i],
                    'harga' => $d,
                      'status' => 1,
            );
         $this->db->insert('detail_penawaran', $data);
         $this->session->set_flashdata('tambahVendor','<div class="alert alert-success" role="alert">SUKSES TAMBAH DATA VENDOR <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
         $ids = $id[$i];
               
            }
            
        }

        if ($this->cekVendor($ids) ==1){
           $data2 = array(
            'status' =>3);
         }else if($this->cekVendor($ids) >=1){
           $data2 = array(
            'status' =>1);
         }
         
         $this->db->where('id_penawaran',$ids );
         $this->db->update('penawaran',$data2);

         redirect("Qr/tambahVendor/$ids", 'refresh');

    }

    public function cekVendor($no){
      $query=$this->db->select('count(*) as jumlah')->from('detail_penawaran')->where('id_penawaran',$no)->get();
        //$results=array();
      $jumlah=0;
            if($query->num_rows() > 0){
               foreach ($query->result() as $key ) {
                $jumlah = $key->jumlah;
                return $jumlah;
        
      }


            }else{
            return $jumlah;
            }

  
    }

    public function tracking()
    {  $data['Qr']=$this->QrModel->getQr_tracking();
        $this->load->view('user/header');
        $this->load->view('user/Tracking_Qr',$data);
        
    }

    public function tracking_personal()
    {  $data['Qr']=$this->QrModel->getQr_tracking_personal();

        $this->load->view('Personal/header');
        $this->load->view('Personal/Tracking_Qr',$data);
      
    }


     
	
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		 $this->load->model('LoginModel');
		 $this->load->helper('url','form','download');
		 if (!$this->session->userdata('logged_in')) {
	      redirect('Login','refresh');
	    }
		  $this->load->library('Excel','upload');


	
	}

public function index()
	{  if($this->session->userdata('logged_in')['hak_akses']==1){
		$this->load->view('admin/header');
        $this->load->view('admin/dashboard');
        }else if($this->session->userdata('logged_in')['hak_akses']==2){
		$this->load->view('user/header');
        $this->load->view('user/dashboard');
    }else if($this->session->userdata('logged_in')['hak_akses']==3){
		$this->load->view('Invoice/header');
        $this->load->view('Invoice/dashboard');
        }else if($this->session->userdata('logged_in')['hak_akses']==4){
		$this->load->view('Personal/header');
        $this->load->view('Personal/dashboard');  
    }else{
    	$this->load->view('read_only/header');
        $this->load->view('read_only/dashboard');
    }
   
	}

	

	public function Myprofil(){
		
		if($this->session->userdata('logged_in')['hak_akses']==1){
		$this->load->view('admin/header');
       	$this->load->view('admin/Myprofil');
        }else if($this->session->userdata('logged_in')['hak_akses']==2){
		$this->load->view('user/header');
       	$this->load->view('admin/Myprofil');
    }else if($this->session->userdata('logged_in')['hak_akses']==3){
		$this->load->view('Invoice/header');
       	$this->load->view('admin/Myprofil');
        }else if($this->session->userdata('logged_in')['hak_akses']==4){
		$this->load->view('Personal/header');
       	$this->load->view('admin/Myprofil'); 
    }else{
    	$this->load->view('read_only/header');
       	$this->load->view('admin/Myprofil');
    }

	}

	public function edit_profile(){
		if(empty($this->input->post('password'))){
			echo "<script>alert('Anda belum mengisi password baru')</script>";
           redirect('Dashboard/Myprofil', 'refresh');
		}else if($this->input->post('password')==$this->input->post('konfirpassword')){
		$this->LoginModel->edit_profile();
		 $sess_array = array(
		 		'id_user'=> $this->session->userdata('logged_in')['id_user'],		 		
		 		'username'=> $this->session->userdata('logged_in')['username'],
		 		'password'=> $this->input->post('password'),
		 		'hak_akses' => $this->session->userdata('logged_in')['hak_akses']
		 		);
		$hak_akses = $this->session->userdata('logged_in')['hak_akses'];
		$this->session->unset_userdata('logged_in');
		
		$this->session->set_userdata('logged_in',$sess_array);
				$this->session->set_flashdata('edit_profile','<div class="alert alert-success" role="alert">SUKSES UPDATE DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('Dashboard/Myprofil', 'refresh');
		}else{
			echo "<script>alert('Konfirmasi password anda tidak sesuai')</script>";
           redirect('Dashboard/Myprofil', 'refresh');
		}
	}


}

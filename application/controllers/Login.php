<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	///

	public function __construct()
    {
        parent::__construct();
        $this->load->model('LoginModel');
        $this->load->model('SectionModel');
         $this->load->helper('url','form');
        // $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
         // $this->load->library('excel','upload');

    
    }

	public function index()
	{
		$this->load->view('login');
		

        
	}

public function ManajemenUser()
	{
		$data['login']= $this->LoginModel->getLogin();
		$this->load->view('Admin/header');
        $this->load->view('Admin/Login',$data);
   
	}

	public function cekLogin(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username','username', 'trim|required');
		$this->form_validation->set_rules('password','password', 'trim|required|callback_cekDb');
		//$this->form_validation->set_rules('password','password', 'trim|required');

		if($this->form_validation->run()== false){

			$this->load->view('login');
		}
		else{
			
			$session_data=$this->session->userdata('logged_in');
			
			if($session_data['hak_akses']=='1'){
				
					redirect('Admin','refresh');
			}else if($session_data['hak_akses']=='2'){
				redirect('User','refresh');
			}else if($session_data['hak_akses']=='3'){
				redirect('Invoice','refresh');
			}else if($session_data['hak_akses']=='4'){
				redirect('Personal','refresh');
			}
			
		}
	}

	public function cekDb($password)
	{
		$this->load->helper('url','form');
		$this->load->library('form_validation');
		$this->load->model('LoginModel');
		$username = $this->input->post('username');
		$password2=($this->input->post('password'));
		$result = $this->LoginModel->login($username, $password2);

		if($result){
			$sess_array = array();
			foreach ($result as $row){
				$sess_array = array(
				'id_user'=>$row->id_user,
				
				'username'=>$row->username,
				'password'=>$row->password,
				'hak_akses' =>$row->hak_akses
				);
				$this->session->set_userdata('logged_in',$sess_array);

			}
			return true;
		}else
		{
			$this->session->set_flashdata('gglLogin','<div class="alert alert-danger" role="alert">LOGIN GAGAL <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		
			return false;
		}
	}

	public function updateLogin(){
		if(empty($this->input->post('password'))){
			 $this->LoginModel->updateHak_akses();
           redirect('Login/ManajemenUser', 'refresh');
		}else{
		 if($this->input->post('password')==$this->input->post('konfirpassword')){
		
        $this->LoginModel->updateLogin();
                $this->session->set_flashdata('editLogin','<div class="alert alert-success" role="alert">SUKSES UPDATE DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');


            redirect('Login/ManajemenUser', 'refresh');
        }else{
			echo "<script>alert('Konfirmasi password anda tidak sesuai')</script>";
           redirect('Login/ManajemenUser', 'refresh');
		} 
		}   
        
    }
    public function deleteLogin($id){
        $this->LoginModel->deleteLogin($id);
                $this->session->set_flashdata('deleteLogin','<div class="alert alert-success" role="alert">SUKSES DELETE DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Login/ManajemenUser', 'refresh');
    }
    public function tambahLogin(){
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'username', 'trim|required');
        if ($this->form_validation->run()==FALSE) {
        	$data['listSec']=$this->SectionModel->getSection();
            $this->load->view('Admin/header');
            $this->load->view('Admin/tambahLogin',$data);
            $this->load->view('Admin/footer');
        }else{
        	if($this->input->post('password')==$this->input->post('konfirpassword')){
            $this->LoginModel->tambahLogin();
                $this->session->set_flashdata('tambahLogin','<div class="alert alert-success" role="alert">SUKSES TAMBAH DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Login/ManajemenUser', 'refresh');
        }else{
        	echo "<script>alert('Konfirmasi password anda tidak sesuai')</script>";
           redirect('Login/ManajemenUser', 'refresh');
        }

        }

    }
		public function logout()
			{
				$this->session->unset_userdata('logged_in');
				 $this->session->sess_destroy();
				redirect('Login','refresh');
			}

}

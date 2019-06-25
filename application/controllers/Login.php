<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	///

	public function __construct()
    {
        parent::__construct();
        $this->load->model('LoginModel');
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
			}
			else if($session_data['hak_akses']=='3'){
				$data['idPuskesmas']=$session_data['idPuskesmas'];
			
				redirect('User','refresh');
			}
			else if($session_data['hak_akses']=='4'){
				$data['idPuskesmas']=$session_data['idPuskesmas'];
			
				redirect('User','refresh');
			}else if($session_data['hak_akses']=='5'){
				$data['idPuskesmas']=$session_data['idPuskesmas'];
			
				redirect('User','refresh');
			}
		}
	}

	public function cekDb($password)
	{
		$this->load->helper('url','form');
		$this->load->library('form_validation');
		$this->load->model('LoginModel');
		$username = $this->input->post('username');
		$password2=md5($this->input->post('password'));
		$result = $this->LoginModel->login($username, $password2);

		if($result){
			$sess_array = array();
			foreach ($result as $row){
				$sess_array = array(
				'id_user'=>$row->id_user,
				'id_section'=>$row->id_section,
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
        $this->LoginModel->updateLogin();
                $this->session->set_flashdata('editLogin','<div class="alert alert-success" role="alert">SUKSES UPDATE DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Login/ManajemenUser', 'refresh');
    }
    public function deleteLogin($id){
        $this->LoginModel->deleteLogin($id);
                $this->session->set_flashdata('deleteLogin','<div class="alert alert-success" role="alert">SUKSES DELETE DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Login/ManajemenUser', 'refresh');
    }
    public function tambahLogin(){
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('id_section', 'id_section', 'trim|required');
        if ($this->form_validation->run()==FALSE) {
            $this->load->view('Admin/header');
            $this->load->view('Admin/tambahLogin');
            $this->load->view('Admin/footer');
        }else{
            $this->LoginModel->tambahLogin();
                $this->session->set_flashdata('tambahLogin','<div class="alert alert-success" role="alert">SUKSES TAMBAH DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Login/ManajemenUser', 'refresh');
        }

    }
		public function logout()
			{
				$this->session->unset_userdata('logged_in');
				 $this->session->sess_destroy();
				redirect('Login','refresh');
			}

}

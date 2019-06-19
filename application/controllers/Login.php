<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	///

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('login');
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
				
					redirect('admin','refresh');
			}else if($session_data['hak_akses']=='2'){
				$data['idPuskesmas']=$session_data['idPuskesmas'];
			
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
}

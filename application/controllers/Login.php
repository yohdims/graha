<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	var $data;
	function __construct() {
		parent::__construct();

	}
	public function index()
	{
		
		$this->data['judul_tab'] = 'Login';

		$this->load->view('login', $this->data);
	}

	public function login(){
		$username			= $this->input->post('username');
		$password			= $this->input->post('password');
		$data = array(
			'username' => $username,
			'password' => $password
		);
		$user=$this->M_User->login($data);
		if(!empty($user)){
	 		$begin = date('d-m-Y');
          	$end = date('Y-m-d', strtotime('+1 weeks'));
			$data_session = array(
				'id_user' => $user->id_user,
				'username' => $user->username,
				'level' => $user->level,
				'tgl_sekarang' => $begin,
				'tgl_batas' => $end ,
				'status' => "login"
				);

			$this->session->set_userdata($data_session);

				redirect(base_url( $user->level."/index"));
		}else{
			redirect(base_url('login'));
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}
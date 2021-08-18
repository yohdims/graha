<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	var $link='user';
	// var $list= $this->list.'/index';
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		if(empty($this->session->userdata('username'))){
			redirect('login');
		}
	}

	public function index()
	{
		$this->data['judul_tab']='User';
		$this->data['title']='Data User';
		$this->data['user']=$this->M_User->getAll();
		$this->data['isi'] = $this->load->view($this->link.'/index',$this->data,TRUE);

		$this->load->view('template/v_layout_utama',$this->data);
	}

	public function form($id)
	{
			$this->data['id']=$id;
		if($id==0){	
			$this->data['judul_tab']='Form Tambah User';
			$this->data['title']='Tambah User';
		}else{

			$this->data['judul_tab']='Form Edit User';
			$this->data['title']='Edit User';

			$this->data['user']=$this->M_User->getID($id);
		}
			$this->data['isi'] = $this->load->view($this->link.'/form',$this->data,TRUE);

		$this->load->view('template/v_layout_utama',$this->data);
	}
	public function input()
	{

		$id_user	= $this->input->post('id_user');
		$username		= $this->input->post('username');
		$nama_lengkap		= $this->input->post('nama_lengkap');
		$password	= $this->input->post('password');
		$level	= $this->input->post('level');
			
		if($id_user==0){	
			$insert = array(
				'username'=>$username,
				'nama_lengkap'=>$nama_lengkap,
				'password'=>$password,
				'level'=>$level);
			if ($this->M_User->insert($insert)) {// success
					$this->session->set_flashdata('success_msg', 'Berhasil tambah data');
					redirect('admin/'.$this->link);
				}
		}else{	
				$update = array(
				'id_user'=>$id_user,
				'username'=>$username,
				'nama_lengkap'=>$nama_lengkap,
				'password'=>$password,
				'level'=>$level);
			if ($this->M_User->update($update)) {// success
					$this->session->set_flashdata('success_msg', 'Berhasil tambah data');
					redirect('admin/'.$this->link);
				}
		}
			
	}
	public function hapus($id)
	{
		$this->M_User->delete($id);
		redirect('admin/'.$this->link);
	}

}
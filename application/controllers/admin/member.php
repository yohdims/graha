<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {
	var $link='member';
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
		$this->data['judul_tab']='Member';
		$this->data['title']='Data Member';
		$this->data['member']=$this->M_Member->getAll();
		$this->data['isi'] = $this->load->view($this->link.'/index',$this->data,TRUE);

		$this->load->view('template/v_layout_utama',$this->data);
	}

	public function form($id)
	{
			$this->data['id']=$id;
		if($id==0){	
			$this->data['judul_tab']='Form Tambah Member';
			$this->data['title']='Tambah Member';
		}else{

			$this->data['judul_tab']='Form Edit Member';
			$this->data['title']='Edit Member';

			$this->data['member']=$this->M_Member->getID($id);
		}
			$this->data['isi'] = $this->load->view($this->link.'/form',$this->data,TRUE);

		$this->load->view('template/v_layout_utama',$this->data);
	}
	public function input()
	{

		$id_member	= $this->input->post('id_member');
		$nama		= $this->input->post('nama');
		$no_ktp		= $this->input->post('no_ktp');
		$alamat	= $this->input->post('alamat');
		$jenis_kelamin	= $this->input->post('jenis_kelamin');
		$email		= $this->input->post('email');
		$no_telp	= $this->input->post('no_telp');
			
			// $this->load->library('upload',$config); //call library upload 
   //      	$this->upload->initialize($config);
			
		if($id_member==0){	
			// $this->upload->do_upload('gambar_Member');
			// $data = array('upload' => $this->upload->data());
			// $image= $data['upload']['file_name'];
			// $gambar_Member			= $image;
			$insert = array(
				'nama'=>$nama,
				'no_ktp'=>$no_ktp,
				'alamat'=>$alamat,
				'jenis_kelamin'=>$jenis_kelamin,
				'email'=>$email,
				'no_telp'=>$no_telp);
			if ($this->M_Member->insert($insert)) {// success
					$this->session->set_flashdata('success_msg', 'Berhasil tambah data');
					redirect('admin/'.$this->link);
				}
		}else{	
				$update = array(
				'id_member'=>$id_member,
				'nama'=>$nama,
				'no_ktp'=>$no_ktp,
				'alamat'=>$alamat,
				'jenis_kelamin'=>$jenis_kelamin,
				'email'=>$email,
				'no_telp'=>$no_telp);
			if ($this->M_Member->update($update)) {// success
					$this->session->set_flashdata('success_msg', 'Berhasil tambah data');
					redirect('admin/'.$this->link);
				}
		}
			
	}
	public function hapus($id)
	{
		$this->M_Member->delete($id);
		redirect('admin/'.$this->link);
	}

}
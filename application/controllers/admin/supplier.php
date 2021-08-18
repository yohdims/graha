<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {
	var $link='supplier';
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
		$this->data['judul_tab']='Supplier';
		$this->data['title']='Data Supplier';
		$this->data['supplier']=$this->M_Supplier->getAll();
		$this->data['isi'] = $this->load->view($this->link.'/index',$this->data,TRUE);

		$this->load->view('template/v_layout_utama',$this->data);
	}

	public function form($id)
	{
			$this->data['id']=$id;
		if($id==0){	
			$this->data['judul_tab']='Form Tambah Supplier';
			$this->data['title']='Tambah Supplier';
		}else{

			$this->data['judul_tab']='Form Edit Supplier';
			$this->data['title']='Edit Supplier';

			$this->data['supplier']=$this->M_Supplier->getID($id);
		}
			$this->data['isi'] = $this->load->view($this->link.'/form',$this->data,TRUE);

		$this->load->view('template/v_layout_utama',$this->data);
	}
	public function input()
	{

		$id_supplier	= $this->input->post('id_supplier');
		$nama		= $this->input->post('nama');
		$alamat	= $this->input->post('alamat');
		$email	= $this->input->post('email');
		$no_telp		= $this->input->post('no_telp');
			
		if($id_supplier==0){	
			$insert = array(
				'nama'=>$nama,
				'alamat'=>$alamat,
				'email'=>$email,
				'no_telp'=>$no_telp);
			if ($this->M_Supplier->insert($insert)) {// success
					$this->session->set_flashdata('success_msg', 'Berhasil tambah data');
					redirect('admin/'.$this->link);
				}
		}else{	
				$update = array(
				'id_supplier'=>$id_supplier,
				'nama'=>$nama,
				'alamat'=>$alamat,
				'email'=>$email,
				'no_telp'=>$no_telp);
			if ($this->M_Supplier->update($update)) {// success
					$this->session->set_flashdata('success_msg', 'Berhasil tambah data');
					redirect('admin/'.$this->link);
				}
		}
			
	}
	public function hapus($id)
	{
		$this->M_Supplier->delete($id);
		redirect('admin/'.$this->link);
	}

}
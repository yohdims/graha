<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {
	var $link='penjualan';
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
		$this->data['judul_tab']='Penjualan';
		$this->data['title']='Data Penjualan';
		$this->data['penjualan']=$this->M_Penjualan->getAll();
		$this->data['isi'] = $this->load->view($this->link.'/index',$this->data,TRUE);

		$this->load->view('template/v_layout_utama',$this->data);
	}

	public function form($id)
	{
			$this->data['id']=$id;
		if($id==0){	
			$this->data['judul_tab']='Form Tambah Penjualan';
			$this->data['title']='Tambah Penjualan';
		}else{

			$this->data['judul_tab']='Form Edit Penjualan';
			$this->data['title']='Edit Penjualan';

			$this->data['Penjualan']=$this->M_Penjualan->getID($id);
		}
			$this->data['jenis']=$this->M_Jenis->getPenjualan();
			$this->data['isi'] = $this->load->view($this->link.'/form',$this->data,TRUE);

		$this->load->view('template/v_layout_utama',$this->data);
	}
	public function input()
	{

		$id_penjualan	= $this->input->post('id_penjualan');
		$id_user		= $this->input->post('id_user');
		$id_member	= $this->input->post('id_member');
			
			// $this->load->library('upload',$config); //call library upload 
   //      	$this->upload->initialize($config);
			
		if($id_penjualan==0){	
			// $this->upload->do_upload('gambar_Penjualan');
			// $data = array('upload' => $this->upload->data());
			// $image= $data['upload']['file_name'];
			// $gambar_Penjualan			= $image;
			$insert = array(
				'id_user'=>$id_user,
				'id_member'=>$id_member);
			if ($this->M_Penjualan->insert($insert)) {// success
					$this->session->set_flashdata('success_msg', 'Berhasil tambah data');
					redirect('admin/'.$this->link);
				}
		}else{	
				$update = array(
				'id_penjualan'=>$id_penjualan,
				'id_user'=>$id_user,
				'id_member'=>$id_member);
			if ($this->M_Penjualan->update($update)) {// success
					$this->session->set_flashdata('success_msg', 'Berhasil tambah data');
					redirect('admin/'.$this->link);
				}
		}
			
	}
	public function hapus($id)
	{
		$this->M_Penjualan->delete($id);
		redirect('admin/'.$this->link);
	}

}
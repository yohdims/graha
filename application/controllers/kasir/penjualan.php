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
		$id_user	= $this->session->userdata("id_user");
		$tanggal	= $this->session->userdata("tgl_sekarang");

		$update = array(
		'id_penjualan'=>$id_penjualan,
		'id_user'=>$id_user
		);
		if($this->M_Penjualan->update($update)){
			
		$penjualan=$this->M_Detail_Penjualan->getPenjualan($id_penjualan);
		foreach ($penjualan as $penjualan) {
			$barang=$this->M_Barang->getID( $penjualan["id_barang"]);
			$stok= $barang->stok - $penjualan["jumlah"];
			$update2= array(
			'id_barang'=>$penjualan["id_barang"],
			'stok'=>$stok
			);
			$this->M_Barang->update($update2);
		}
			$insert = array(
					'id_user'=>$id_user);
			$this->M_Penjualan->insert($insert);
			$this->session->set_flashdata('message', 'Data Berhasil Disimpan');
			redirect('kasir/index');
		}
	}
	
	public function hapus($id)
	{
		$this->M_Penjualan->delete($id);
		redirect('kasir/'.$this->link);
	}

}
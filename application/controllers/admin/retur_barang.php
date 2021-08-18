<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Retur_Barang extends CI_Controller {
	var $link='retur_barang';
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
		$this->data['judul_tab']='Retur Barang';
		$this->data['title']='Data Retur Barang';
		$this->data['retur_barang']=$this->M_Retur_Barang->getAll();
		$this->data['isi'] = $this->load->view($this->link.'/index',$this->data,TRUE);

		$this->load->view('template/v_layout_utama',$this->data);
	}


	public function kembali()
	{
		$this->data['judul_tab']='Retur Barang';
		$this->data['title']='Data Retur Barang';
		$this->data['retur_barang']=$this->M_Retur_Barang->getKembali();
		$this->data['supplier']=$this->M_Supplier->getAll();
		$this->data['isi'] = $this->load->view($this->link.'/pengembalian',$this->data,TRUE);

		$this->load->view('template/v_layout_utama',$this->data);
	}
	public function surat()
	{
		$id_supplier	= $this->input->post('id_supplier');
		$tanggal_pengembalian	= $this->input->post('tanggal_pengembalian');

		$this->data['judul_tab']='Retur Barang';
		$this->data['title']='Data Retur Barang';
		$this->data['no_surat']='XX/xx/xx/xx';
		$this->data['supplier']=$this->M_Supplier->getID($id_supplier);
		$this->data['tanggal']=$tanggal_pengembalian;
		$this->data['retur_barang']=$this->M_Retur_Barang->getSupplier($id_supplier,$tanggal_pengembalian);
		$this->data['isi'] = $this->load->view($this->link.'/surat_pengembalian',$this->data,TRUE);

		$this->load->view('template/v_layout_surat',$this->data);
	}

	public function form($id)
	{
			$this->data['id']=$id;
		if($id==0){	
			$this->data['judul_tab']='Form Tambah Retur Barang';
			$this->data['title']='Tambah Retur Barang';
		}else{

			$this->data['judul_tab']='Form Edit Retur Barang';
			$this->data['title']='Edit Retur Barang';

			$this->data['retur_barang']=$this->M_Retur_Barang->getID($id);
		}
			$this->data['jenis']=$this->M_Jenis->getRetur_Barang();
			$this->data['isi'] = $this->load->view($this->link.'/form',$this->data,TRUE);

		$this->load->view('template/v_layout_utama',$this->data);
	}
	public function input($id_retur_barang)
	{

		$id_retur_barang		= $id_retur_barang;

		$tanggal_pengembalian	= date("Y-m-d",strtotime($this->session->userdata("tgl_sekarang"))); 
		$update = array(
		'id_retur_barang'=>$id_retur_barang,
		'tanggal_pengembalian'=>$tanggal_pengembalian);

		if ($this->M_Retur_Barang->update($update)) {// success
			$this->session->set_flashdata('message', 'Berhasil ubah data');
			redirect('admin/'.$this->link.'/kembali');
		}
	
	}
	public function hapus($id)
	{
		$this->M_Retur_Barang->hapus_gambar($id);
		$this->M_Retur_Barang->delete($id);
		redirect('admin/'.$this->link);
	}

}
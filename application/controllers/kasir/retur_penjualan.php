<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Retur_Penjualan extends CI_Controller {
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
		$tanggal	= $this->input->post('tanggal');
		$this->data['judul_tab']='Retur Barang Penjualan';
		$this->data['title']='Retur Barang Penjualan';
		if(!empty($tanggal)){
			$this->data['retur_penjualan']=$this->M_Penjualan->getFilterTanggal($tanggal);
		}else{
			$this->data['retur_penjualan']=$this->M_Penjualan->getAll();

		}
		$this->data['isi'] = $this->load->view($this->link.'/retur_penjualan',$this->data,TRUE);

		$this->load->view('template/v_layout_utama',$this->data);
	}
	public function nota()
	{
		// $data['barang']= $this->Model_Barang->getAllBarang();
		$id_penjualan		= $this->input->post('id_penjualan');
		$this->data['judul_tab']='Kasir';
		$this->data['title']='Nota Retur Penjualan';
		$this->data['title2']='Detail Penjualan';
		$this->data['retur_barang']=$this->M_Retur_Barang->getID_Penjualan($id_penjualan);
		$this->data['total']=$this->M_Retur_Barang->getTotal($id_penjualan);
		// $this->data['penjualan']=$id_penjualan;
		// $this->data['retur_barang']=$this->M_Penjualan->getID($this->M_Penjualan->getMax());
		$this->data['penjualan']=$this->M_Penjualan->getID($id_penjualan);
		$this->data['isi'] = $this->load->view('penjualan/kasir',$this->data,TRUE);

		$this->load->view('retur_barang/nota',$this->data);
	}
	public function ambil_data_penjualan(){
		$id_penjualan		= $this->input->post('id_penjualan');
		// $data['barang']= $this->Model_Barang->getAllBarang();
		// $this->data['total']=$this->M_Penjualan->getTotal($id_penjualan);
		// $this->data['penjualan']=$this->M_Penjualan->getID($id_penjualan);
		$penjualan=$this->M_Detail_Penjualan->getPenjualan($id_penjualan);
		echo json_encode($penjualan);

	}

	public function input()
	{

		// $id_retur_barang	= $this->input->post('id_retur_barang');
		$id_det_penjualan		= $this->input->post('id_det_penjualan');
		$alasan		= $this->input->post('alasan');
		$id_user		= $this->session->userdata('id_user');
		// $tanggal_pengembalian	= $this->input->post('tanggal_pengembalian');

	
			$insert = array('id_det_penjualan'=>$id_det_penjualan,
				'id_user'=>$id_user,
				'alasan'=>$alasan
			);
			$this->M_Retur_Barang->insert($insert);
			$this->session->set_flashdata('message', 'Berhasil tambah data');
		
			
	}
	public function hapus($id)
	{
		$this->M_Retur_Barang->hapus_gambar($id);
		$this->M_Retur_Barang->delete($id);
		redirect('kasir/'.$this->link);
	}

}
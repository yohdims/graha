<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class index extends CI_Controller {
	public $link="index";
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
		$this->data['judul_tab']='Kasir';
		$this->data['title']='Input Transaksi Penjualan';
		$this->data['title2']='Detail Penjualan';
		$this->data['barang']=$this->M_Barang->getAll();
		$this->data['total']=$this->M_Penjualan->getTotal($this->M_Penjualan->getMax());
		$this->data['penjualan']=$this->M_Penjualan->getMax();
		$this->data['detail_penjualan']=$this->M_Detail_Penjualan->getPenjualan($this->M_Penjualan->getMax());
		$this->data['isi'] = $this->load->view('penjualan/kasir',$this->data,TRUE);

		$this->load->view('template/v_layout_utama',$this->data);
	}
	public function nota($id)
	{
		$this->data['judul_tab']='Kasir';
		$this->data['title']='Nota Penjualan';
		$this->data['title2']='Detail Penjualan';
		$this->data['barang']=$this->M_Barang->getAll();
		// $this->data['member']=$this->M_Member->getAll();
		$this->data['total']=$this->M_Penjualan->getTotal($id);
		$this->data['penjualan']=$this->M_Penjualan->getID($id);
		// var_dump($this->data['penjualan']=$this->M_Penjualan->getID($id));
		$this->data['detail_penjualan']=$this->M_Detail_Penjualan->getPenjualan($id);
		$this->data['isi'] = $this->load->view('penjualan/kasir',$this->data,TRUE);

		$this->load->view('penjualan/nota',$this->data);
	}
	public function ambil_data(){
		$id_det_penjualan	= $this->input->post('id_det_penjualan');

		$barang=$this->M_Detail_Penjualan->getJSON($id_det_penjualan);

		echo json_encode($barang);
	}
	public function ambil_data_barang(){
		$id_barang	= $this->input->post('id_barang');

		$barang=$this->M_Barang->getID($id_barang);

		echo json_encode($barang);
	}
	public function input_detail()
	{

		$id_penjualan	= $this->input->post('id_penjualan');
		$id_det_penjualan	= $this->input->post('id_det_penjualan');
		$id_barang	= $this->input->post('id_barang');
		$jumlah		= $this->input->post('jumlah');
		$harga		= $this->input->post('harga_jual');
		$diskon	= $this->input->post('diskon');
		$subtotal		= $jumlah*$harga-$diskon;
		$where=array(
			'id_penjualan'=>$id_penjualan,
			'id_barang'=>$id_barang
		);
		$detail_penjualan=$this->M_Detail_Penjualan->getID($where);
		if($id_barang==0){
			$this->session->set_flashdata('message', 'Isi Data Barang');
			redirect('kasir/index');
		}else if($detail_penjualan!=$id_barang){		
			$insert = array(
				'id_penjualan'=>$id_penjualan,
				'id_barang'=>$id_barang,
				'jumlah'=>$jumlah,
				'harga'=>$harga,
				'diskon'=>$diskon,
				'subtotal'=>$subtotal);
			if ($this->M_Detail_Penjualan->insert($insert)) {// success
					$this->session->set_flashdata('message', 'Barang berhasil ditambahkan');
					redirect('kasir/index');
				}
		}else{
			$update = array(
				'id_penjualan'=>$id_penjualan,
				'id_barang'=>$id_barang,
				'jumlah'=>$jumlah,
				'harga'=>$harga,
				'diskon'=>$diskon,
				'subtotal'=>$subtotal);
			if ($this->M_Detail_Penjualan->update($update)) {// success
					$this->session->set_flashdata('message', 'Berhasil diubah');
					redirect('kasir/'.$this->link);
				}
			
	}
		}


	public function hapus($id)
	{
		$this->M_Detail_Penjualan->delete($id);
		redirect('kasir/'.$this->link);
	}
}
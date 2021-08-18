<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
	var $link='barang';
	// var $list= $this->list.'/index';
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		if(empty($this->session->userdata('username'))){
			redirect('login');
		}
	}

	public function barang()
	{
		$this->data['judul_tab']='Laporan Barang';
		$this->data['title']='Data Barang';
		$this->data['barang']=$this->M_Barang->getAll();
		$this->data['isi'] = $this->load->view('barang/laporan',$this->data,TRUE);

		$this->load->view('template/v_layout_laporan',$this->data);
	}

	public function member()
	{
		$this->data['judul_tab']='Laporan Member';
		$this->data['title']='Data Member';
		$this->data['member']=$this->M_Member->getAll();
		$this->data['isi'] = $this->load->view('member/laporan',$this->data,TRUE);

		$this->load->view('template/v_layout_laporan',$this->data);
	}

	public function supplier()
	{
		$this->data['judul_tab']='Laporan Supplier';
		$this->data['title']='Data Supplier';
		$this->data['supplier']=$this->M_Supplier->getAll();
		$this->data['isi'] = $this->load->view('supplier/laporan',$this->data,TRUE);

		$this->load->view('template/v_layout_laporan',$this->data);
	}

	public function user()
	{
		$this->data['judul_tab']='Laporan User';
		$this->data['title']='Data User';
		$this->data['user']=$this->M_User->getAll();
		$this->data['isi'] = $this->load->view('user/laporan',$this->data,TRUE);

		$this->load->view('template/v_layout_laporan',$this->data);
	}

	public function penjualan()
	{
		$tgl_awal	= $this->input->post('tgl_awal');
		$tgl_akhir	= $this->input->post('tgl_akhir');
		$this->data['judul_tab']='Barang';
		$this->data['title']='Data Barang';
		$this->data['tgl_awal']=$tgl_awal;
		$this->data['tgl_akhir']=$tgl_akhir;
		$this->data['penjualan']=$this->M_Penjualan->getLaporan($tgl_awal,$tgl_akhir);
		$this->data['isi'] = $this->load->view('penjualan/laporan',$this->data,TRUE);

		$this->load->view('template/v_layout_laporan',$this->data);
	}

	public function retur_barang()
	{
		$tgl_awal	= $this->input->post('tgl_awal');
		$tgl_akhir	= $this->input->post('tgl_akhir');
		$this->data['judul_tab']='Laporan Retur Barang';
		$this->data['title']='Data Retur Barang';
		$this->data['tgl_awal']=$tgl_awal;
		$this->data['tgl_akhir']=$tgl_akhir;
		$this->data['retur_barang']=$this->M_Retur_Barang->getLaporan($tgl_awal,$tgl_akhir);
		$this->data['isi'] = $this->load->view('retur_barang/laporan',$this->data,TRUE);

		$this->load->view('template/v_layout_laporan',$this->data);
	}

	public function retur_barang_kembali()
	{
		$this->data['judul_tab']='Laporan Retur Barang';
		$this->data['title']='Data Retur Barang';
		$this->data['retur_barang']=$this->M_Retur_Barang->getAll();
		$this->data['isi'] = $this->load->view('retur_barang/laporan',$this->data,TRUE);

		$this->load->view('template/v_layout_laporan',$this->data);
	}

	public function order_barang()
	{
		$this->data['judul_tab']='Laporan Order Barang';
		$this->data['title']='Data Order Barang';
		$this->data['order_barang']=$this->M_Order_Barang->getAll();
		$this->data['isi'] = $this->load->view('order_barang/laporan',$this->data,TRUE);

		$this->load->view('template/v_layout_laporan',$this->data);
	}

	public function persediaan_barang()
	{
		$this->data['judul_tab']='Laporan Persediaan Barang';
		$this->data['title']='Data Persediaan Barang';
		$this->data['barang']=$this->M_Barang->getBarang();
		$this->data['isi'] = $this->load->view('barang/laporan',$this->data,TRUE);

		$this->load->view('template/v_layout_laporan',$this->data);
	}

	public function pengembalian_supplier()
	{
		$this->data['judul_tab']='Barang';
		$this->data['title']='Data Barang';
		$this->data['retur_barang']=$this->M_Retur_Barang->getAll();
		$this->data['isi'] = $this->load->view('retur_barang/laporan',$this->data,TRUE);

		$this->load->view('template/v_layout_laporan',$this->data);
	}
}
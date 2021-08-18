<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_Barang extends CI_Controller {
	var $link='order_barang';
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
		$this->data['judul_tab']='Order Barang';
		$this->data['title']='Data Order Barang';
		$this->data['order_barang']=$this->M_Order_Barang->getAll();
		$this->data['isi'] = $this->load->view($this->link.'/index',$this->data,TRUE);

		$this->load->view('template/v_layout_utama',$this->data);
	}

	public function konfirmasi()
	{
		$this->data['judul_tab']='Konfirmasi Order Barang';
		$this->data['title']='Data Konfirmasi Order Barang';
		$this->data['order_barang']=$this->M_Det_Order_Barang->getOrderMenunggu($this->M_Order_Barang->getMax()-1);
		$this->data['isi'] = $this->load->view($this->link.'/index',$this->data,TRUE);

		$this->load->view('template/v_layout_utama',$this->data);
	}

	public function acc()
	{
		$this->data['judul_tab']='Order Barang';
		$this->data['title']='Data Order Barang';
		$this->data['order_barang']=$this->M_Order_Barang->getAll();
		
		$this->data['isi'] = $this->load->view($this->link.'/index',$this->data,TRUE);

		$this->load->view('template/v_layout_utama',$this->data);
	}

	public function form($id)
	{
			$this->data['id']=$id;
		if($id==0){	
			$this->data['judul_tab']='Form Tambah Order Barang';
			$this->data['title']='Tambah Order Barang';
		}else{

			$this->data['judul_tab']='Form Edit Order Barang';
			$this->data['title']='Edit Order Barang';

			$this->data['barang']=$this->M_Barang->getID($id);
		}
			$this->data['jenis']=$this->M_Jenis->getBarang();
			$this->data['isi'] = $this->load->view($this->link.'/form',$this->data,TRUE);

		$this->load->view('template/v_layout_utama',$this->data);
	}
	public function input_acc($id)
	{

		$id_det_order_brg	= $id;
		$status	= "acc";
		$update = array(
		'id_det_order_brg'=>$id_det_order_brg,
		'status'=>$status);
		if ($this->M_Det_Order_Barang->updateById($update)) {
				$this->session->set_flashdata('success_msg', 'Berhasil tambah data');
				redirect('admin/order_barang/konfirmasi');
			}
			
	}
	public function hapus($id)
	{
		$this->M_Barang->delete($id);
		redirect('admin/'.$this->link);
	}

}
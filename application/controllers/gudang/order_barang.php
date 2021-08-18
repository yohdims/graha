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
		$this->data['barang']=$this->M_Barang->getLowStok();
		$this->data['supplier']=$this->M_Supplier->getAll();
		// $this->data['order_barang']=$this->M_Order_Barang->getOrderBarang();
		$this->data['order_barang']=$this->M_Order_Barang->getMax();
		$this->data['detail_order']=$this->M_Det_Order_Barang->getOrderBarangKeranjang($this->M_Order_Barang->getMax());
		$this->data['isi'] = $this->load->view($this->link.'/barang',$this->data,TRUE);

		$this->load->view('template/v_layout_utama',$this->data);
	}
	
	public function ambil_data(){
		$id_det_order_brg	= $this->input->post('id_det_order_brg');

		$barang=$this->M_Det_Order_Barang->getJSON($id_det_order_brg);

		echo json_encode($barang);
	}
	public function konfirmasi()
	{
		$this->data['judul_tab']='Konfirmasi Order Barang';
		$this->data['title']='Data Konfirmasi Order Barang';
		$this->data['order_barang']=$this->M_Order_Barang->getAll();
		$this->data['isi'] = $this->load->view($this->link.'/index',$this->data,TRUE);

		$this->load->view('template/v_layout_utama',$this->data);
	}

	public function acc()
	{
		$this->data['judul_tab']='Acc Order Barang';
		$this->data['title']='Data Acc Order Barang';
		$this->data['supplier']=$this->M_Det_Order_Barang->getSupplier();
		$this->data['detail_order']=$this->M_Det_Order_Barang->getOrderAcc($this->M_Order_Barang->getMax()-1);
		$this->data['order_barang']=$this->M_Order_Barang->getMax()-1;
		$this->data['isi'] = $this->load->view($this->link.'/acc_barang',$this->data,TRUE);

		$this->load->view('template/v_layout_utama',$this->data);
	}
	public function surat()
	{
		$id_supplier	= $this->input->post('id_supplier');
		$this->data['judul_tab']='Acc Order Barang';
		$this->data['title']='Data Acc Order Barang';
		$this->data['no_surat']='XX/xx/xx/xx';
		$this->data['supplier']=$this->M_Supplier->getID($id_supplier);
		$this->data['tanggal']=$this->M_Order_Barang->getID($this->M_Order_Barang->getMax())->tanggal_order_brg;
		$this->data['detail_order']=$this->M_Det_Order_Barang->getOrderAccSurat($this->M_Order_Barang->getMax(),$id_supplier);
		$this->data['isi'] = $this->load->view($this->link.'/surat_order',$this->data,TRUE);

		$this->load->view('template/v_layout_surat',$this->data);
	}

	public function barang_masuk()
	{
		$this->data['judul_tab']='Order Barang';
		$this->data['title']='Data Order Barang';
		$this->data['barang']=$this->M_Barang->getLowStok();
		$this->data['supplier']=$this->M_Supplier->getAll();
		// $this->data['order_barang']=$this->M_Order_Barang->getOrderBarang();
		$this->data['order_barang']=$this->M_Order_Barang->getMax()-1;
		$this->data['detail_order']=$this->M_Det_Order_Barang->getOrderDiorder($this->M_Order_Barang->getMax()-1);
		$this->data['isi'] = $this->load->view($this->link.'/barang_masuk',$this->data,TRUE);

		$this->load->view('template/v_layout_utama',$this->data);
	}
	public function input_detail(){

		$id_order_barang	= $this->input->post('id_order_barang');
		$id_det_order_brg	= $this->input->post('id_det_order_brg');
		$id_barang	= $this->input->post('id_barang');
		$id_supplier	= $this->input->post('id_supplier');
		$harga	= $this->input->post('harga_beli');
		$jumlah		= $this->input->post('jumlah_order');
		$subtotal		= $jumlah*$harga;
		$where=array(
			'id_order_barang'=>$id_order_barang,
			'id_barang'=>$id_barang
		);
		$detail_order=$this->M_Det_Order_Barang->getID($where);
		if($id_barang==0){
			$this->session->set_flashdata('message', 'Isi Data Barang');
			redirect('gudang/'.$this->link);
		}else if($detail_order!=$id_barang){		
			$insert = array(
				'id_order_barang'=>$id_order_barang,
				'id_barang'=>$id_barang,
				'id_supplier'=>$id_supplier,
				'jumlah'=>$jumlah,
				'subtotal'=>$subtotal);
			if ($this->M_Det_Order_Barang->insert($insert)) {// success
					$this->session->set_flashdata('message', 'Barang berhasil ditambahkan');
					redirect('gudang/'.$this->link);
				}
		}else{
			$update = array(
				'id_order_barang'=>$id_order_barang,
				'id_barang'=>$id_barang,
				'id_supplier'=>$id_supplier,
				'jumlah'=>$jumlah,
				'subtotal'=>$subtotal);
			if ($this->M_Det_Order_Barang->update($update)) {// success
					$this->session->set_flashdata('message', 'Berhasil diubah');
					redirect('gudang/'.$this->link);
				}
			
	}
	}
	public function input_akhir(){
		$id_order_barang	= $this->input->post('id_order_barang');
		$id_det_order_brg	= $this->input->post('id_det_order_brg');
		$id_barang	= $this->input->post('id_barang');
		$id_supplier	= $this->input->post('id_supplier');
		$harga_beli	= $this->input->post('harga_beli');
		$harga_jual	= $this->input->post('harga_jual');
		$jumlah		= $this->input->post('jumlah_order');
		$subtotal		= $jumlah*$harga_beli;
		// Barang Lama
		$barang=$this->M_Barang->getID($id_barang);
		$harga_jual_lama= $barang->harga_jual;
		$stok= $barang->stok;
		
		//Perhitungan metode average
		$average= (($harga_jual_lama*$stok)+($harga_jual*$jumlah))/($stok+$jumlah);

		if($id_barang==0){
			$this->session->set_flashdata('message', 'Isi Data Barang');
			redirect('gudang/'.$this->link.'/barang_masuk');
		}else{
			$update = array(
				'id_order_barang'=>$id_order_barang,
				'id_barang'=>$id_barang,
				'id_supplier'=>$id_supplier,
				'jumlah'=>$jumlah,
				'subtotal'=>$subtotal);

			$update_barang = array(
				'id_barang'=>$id_barang,
				'id_supplier'=>$id_supplier,
				'harga_beli'=>$harga_beli,
				'harga_jual'=>$average);
			if ($this->M_Det_Order_Barang->update($update)&& $this->M_Barang->update($update_barang)) {// success
					$this->session->set_flashdata('message', 'Berhasil diubah'.$average);
					redirect('gudang/'.$this->link.'/barang_masuk');
				}
			
	}
	}
	public function input_order($id)
	{
		$id_order_barang	= $id;
			$update_detail = array(
				'id_order_barang'=>$id_order_barang,
				'status'=>"diorder"
			);		

			$this->M_Det_Order_Barang->update_kirim_pimpinan($update_detail);
			$this->session->set_flashdata('message', 'Data Berhasil Dikirim');
			redirect('gudang/'.$this->link."/acc");
			
	}
	public function input_selesai($id)
	{

		$id_order_barang	= $id;
		$status				= "selesai";

		$update = array(
		'id_order_barang'=>$id_order_barang,
		'status'=>$status
		);
		$order_barang=$this->M_Det_Order_Barang->getOrderDiorder($id_order_barang);
		foreach ($order_barang as $order_barang) {
			$barang=$this->M_Barang->getID( $order_barang["id_barang"]);
			$stok= $barang->stok + $order_barang["jumlah"];
			$update2= array(
			'id_barang'=>$order_barang["id_barang"],
			'stok'=>$stok
			);
			$this->M_Barang->update($update2);
		}
		if($this->M_Det_Order_Barang->update_selesai($update)){

			$this->session->set_flashdata('message', 'Data Berhasil Disimpan');
			// $this->session->set_flashdata('message', 'Data Berhasil Disimpan'.$order_barang->id_barang);
			redirect('gudang/'.$this->link.'/barang_masuk');
		}
			
	}

	public function input($id)
	{

		$id_order_barang	= $id;
		$id_user	= $this->session->userdata("id_user");
		$tanggal	= $this->session->userdata("tgl_sekarang");
		$id_user2		= "1";
		$update = array(
		'id_order_barang'=>$id_order_barang,
		'id_user'=>$id_user2
		);
		if($this->M_Order_Barang->update($update)){
			$update2 = array(
				'id_order_barang'=>$id_order_barang,
				'id_user'=>$id_user
			);
			$update_detail = array(
				'id_order_barang'=>$id_order_barang,
				'status'=>"menunggu"
			);		
			$this->M_Order_Barang->update($update2);
			$this->M_Det_Order_Barang->update_kirim_pimpinan($update_detail);
			
			$insert = array(
					'id_user'=>$id_user);
			$this->M_Order_Barang->insert($insert);
			$this->session->set_flashdata('message', 'Data Berhasil Dikirim');
			redirect('gudang/'.$this->link);
		}
			
	}
	public function hapus($id)
	{
		$this->M_Det_Order_Barang->delete($id);
		redirect('gudang/'.$this->link);
	}

}
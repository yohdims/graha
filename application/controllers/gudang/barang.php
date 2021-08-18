<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {
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

	public function index()
	{
		$this->data['judul_tab']='Barang';
		$this->data['title']='Data Barang';
		$this->data['barang']=$this->M_Barang->getAll();
		$this->data['isi'] = $this->load->view($this->link.'/index',$this->data,TRUE);

		$this->load->view('template/v_layout_utama',$this->data);
	}

	public function form($id)
	{
			$this->data['id']=$id;
		if($id==0){	
			$this->data['judul_tab']='Form Tambah Barang';
			$this->data['title']='Tambah Barang';
		}else{

			$this->data['judul_tab']='Form Edit Barang';
			$this->data['title']='Edit Barang';

			$this->data['barang']=$this->M_Barang->getID($id);
		}
			$this->data['supplier']=$this->M_Supplier->getAll();
			$this->data['isi'] = $this->load->view($this->link.'/form',$this->data,TRUE);

		$this->load->view('template/v_layout_utama',$this->data);
	}

	

	public function input()
	{

		$id_supplier		= $this->input->post('id_supplier');
		$nama_barang		= $this->input->post('nama_barang');
		
		$kode_barang		= $this->M_Barang->getkodeBarang($nama_barang);

		$stok				= $this->input->post('stok');
		$harga_beli			= $this->input->post('harga_beli');
		$harga_jual			= $this->input->post('harga_jual');
		$deskripsi			= $this->input->post('deskripsi');
			
			// $this->load->library('upload',$config); //call library upload 
   //      	$this->upload->initialize($config);
			
		if($id_barang==0){	
			// $this->upload->do_upload('gambar_barang');
			// $data = array('upload' => $this->upload->data());
			// $image= $data['upload']['file_name'];
			// $gambar_barang			= $image;
			$getId = $this->M_Barang->countBarang();
			$insert = array(
				'id_barang' => $getId,
				'kode_barang' => $kode_barang,
				'id_supplier'=>$id_supplier,
				'nama_barang'=>$nama_barang,
				'stok'=>$stok,
				'harga_beli'=>$harga_beli,
				'harga_jual'=>$harga_jual,
				'deskripsi'=>$deskripsi);
			if ($this->M_Barang->insert($insert)) {// success
					$this->session->set_flashdata('success_msg', 'Berhasil tambah data');
					redirect('gudang/'.$this->link);
				}
		}else{	
				$update = array(
				'id_barang'=>$id_barang,
				'id_supplier'=>$id_supplier,
				'nama_barang'=>$nama_barang,
				'stok'=>$stok,
				'harga_beli'=>$harga_beli,
				'harga_jual'=>$harga_jual,
				'deskripsi'=>$deskripsi);
			if ($this->M_Barang->update($update,$id_barang_lama)) {// success
					$this->session->set_flashdata('success_msg', 'Berhasil tambah data');
					redirect('gudang/'.$this->link);
				}
		}
			
	}
	public function hapus($id)
	{
		$this->M_Barang->hapus_gambar($id);
		$this->M_Barang->delete($id);
		redirect('gudang/'.$this->link);
	}

}
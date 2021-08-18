<?php
class M_Barang extends CI_Model {

	var $table='barang';
	var $pk='id_barang';

	public function getAll ()
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('supplier s','s.id_supplier=barang.id_supplier');
		$this->db->order_by($this->pk, 'DESC');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getLowStok ()
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('supplier s','s.id_supplier=barang.id_supplier');
		// $this->db->where("stok <", "20");
		$this->db->order_by('stok', 'ASC');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getID($id)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('supplier s','s.id_supplier=barang.id_supplier');
		$this->db->where($this->pk, $id);

		$query = $this->db->get();
		// if ($query->num_rows() > 0){
			return $query->row();
		// }else{
		// 	return false;
		// }
	}

	public function getkodeBarang($param){
		$generateCode 	= random_bytes(4);
		$getCode 		= bin2hex($generateCode);
		$combine		= strtoupper(substr($param,0,3)).$getCode;
		return $combine;
	}

	public function countBarang(){
		$getCount= $this->db->count_all_results($this->table) + 1;
		return $getCount;
	}

	public function insert($data){
		$id = $this->db->insert($this->table, $data);
		// //$this->db->insert_id();
		return $id;
	}
	
	


	public function update($data,$id_barang_lama){
		$this->db->where($this->pk, $id_barang_lama);
		$id = $this->db->update($this->table, $data);
		return $id;
	}
	public function hapus_gambar($id){
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where($this->pk, $id);
		$query = $this->db->get();
     	$row = $query->row();

     	unlink("./assets/images/kendaraan/$row->gambar_kendaraan");
	}
	public function delete($id){
		$id = $this->db->where($this->pk,$id)->delete($this->table);
		return $id;
	}
}
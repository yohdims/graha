<?php
class M_Detail_Penjualan extends CI_Model {

	var $table='detail_penjualan';
	var $pk='id_det_penjualan';

	public function getPenjualan ($id)
	{
		$this->db->select('*');
		$this->db->from($this->table." dp");
		$this->db->join('penjualan p','p.id_penjualan=dp.id_penjualan');
		$this->db->join('user u','u.id_user=p.id_user');
		$this->db->join('barang b','b.id_barang=dp.id_barang');
		// $this->db->join('member m','m.id_member=p.id_member',"left");
		$this->db->where('p.id_penjualan', $id);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getJSON($id)
	{

		$where=array("id_det_penjualan"=>$id);
		
		return $this->db->get_where($this->table,$where)->result();
	}

	public function getID($where)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		// $this->db->join('supplier s','s.id_supplier=barang.id_supplier');
		$this->db->where("id_barang", $where['id_barang']);
		$this->db->where("id_penjualan", $where['id_penjualan']);

		$query = $this->db->get();
		// if ($query->num_rows() > 0){
			return $query->row('id_barang');
		// }else{
		// 	return false;
		// }
	}
	
	public function insert($data){
		$id = $this->db->insert($this->table, $data);
		//$this->db->insert_id();
		return $id;
	}
	
	public function update($data){
		$this->db->where('id_barang', $data["id_barang"]);
		$this->db->where('id_penjualan', $data['id_penjualan']);
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
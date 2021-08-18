<?php
class M_Order_Barang extends CI_Model {

	var $table='order_barang';
	var $pk='id_order_barang';

	public function getAll ()
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('det_order_barang dob','dob.id_order_barang='.$this->table.".".$this->pk);
		$this->db->join('supplier s','s.id_supplier=dob.id_supplier');
		$this->db->join('barang b','b.id_barang=dob.id_barang');
		$this->db->order_by($this->table.".".$this->pk, 'DESC');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getMax()
	{
		$this->db->select('Max(id_order_barang) as id');
		$this->db->from($this->table);
		$query = $this->db->get();
		// if ($query->num_rows() > 0){
			return $query->row('id');
		// }else{
		// 	return false;
		// }
	}
	
	public function getOrderBarang()
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('det_order_barang dob','dob.id_order_barang='.$this->table.".".$this->pk);
		$this->db->join('supplier s','s.id_supplier=dob.id_supplier');
		$this->db->join('barang b','b.id_barang=dob.id_barang');
		$this->db->where('status','Menunggu');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getID($id)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where($this->pk,$id);

		$query = $this->db->get();
		// if ($query->num_rows() > 0){
			return $query->row();
		// }else{
		// 	return false;
		// }
	}

	public function getWhere($where)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where($where);

		$query = $this->db->get();
		// if ($query->num_rows() > 0){
			return $query->row();
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
		$this->db->where($this->pk, $data[$this->pk]);
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
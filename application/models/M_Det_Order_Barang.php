<?php
class M_Det_Order_Barang extends CI_Model {

	var $table='det_order_barang';
	var $pk='id_det_order_brg';
	public function getOrderBarangKeranjang($id)
	{
		$this->db->select('*');
		$this->db->from($this->table." do");
		$this->db->join('order_barang o','o.id_order_barang=do.id_order_barang');
		$this->db->join('supplier s','do.id_supplier=s.id_supplier');
		$this->db->join('user u','u.id_user=o.id_user');
		$this->db->join('barang b','b.id_barang=do.id_barang');
		$this->db->where('o.id_order_barang', $id);
		$this->db->where('status','keranjang');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getOrderMenunggu($id)
	{
		$this->db->select('*');
		$this->db->from($this->table." do");
		$this->db->join('order_barang o','o.id_order_barang=do.id_order_barang');
		$this->db->join('supplier s','do.id_supplier=s.id_supplier');
		$this->db->join('user u','u.id_user=o.id_user');
		$this->db->join('barang b','b.id_barang=do.id_barang');
		// $this->db->where('o.id_order_barang', $id);
		$this->db->where('status', 'menunggu');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getOrderAcc($id)
	{
		$this->db->select('*');
		$this->db->from($this->table." do");
		$this->db->join('order_barang o','o.id_order_barang=do.id_order_barang');
		$this->db->join('supplier s','do.id_supplier=s.id_supplier');
		$this->db->join('barang b','b.id_barang=do.id_barang');
		// $this->db->where('o.id_order_barang', $id);
		$this->db->where('status', 'acc');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getOrderAccSurat($id,$id_supplier)
	{
		$this->db->select('*');
		$this->db->from($this->table." do");
		$this->db->join('order_barang o','o.id_order_barang=do.id_order_barang');
		$this->db->join('supplier s','do.id_supplier=s.id_supplier');
		$this->db->join('barang b','b.id_barang=do.id_barang');
		// $this->db->where('o.id_order_barang', $id);
		// $this->db->where('do.id_supplier', $id_supplier);
		$this->db->where('status', 'acc');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getOrderDiorder($id)
	{
		$this->db->select('*');
		$this->db->from($this->table." do");
		$this->db->join('order_barang o','o.id_order_barang=do.id_order_barang');
		$this->db->join('user u','u.id_user=o.id_user');
		$this->db->join('barang b','b.id_barang=do.id_barang');
		// $this->db->where('o.id_order_barang', $id);
		$this->db->where('status', 'diorder');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getSupplier()
	{
		$this->db->select('*');
		$this->db->from($this->table." do");
		$this->db->join('order_barang o','o.id_order_barang=do.id_order_barang');
		$this->db->join('supplier s','do.id_supplier=s.id_supplier');
		$this->db->where('status', 'acc');
		$this->db->group_by('do.id_supplier');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getJSON($id)
	{

		$this->db->select('*,do.id_supplier as supplier');
		$this->db->from($this->table." do");
		$this->db->join('order_barang o','o.id_order_barang=do.id_order_barang');
		$this->db->join('user u','u.id_user=o.id_user');
		$this->db->join('barang b','b.id_barang=do.id_barang');
		$this->db->where($this->pk, $id);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getID($where)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		// $this->db->join('supplier s','s.id_supplier=barang.id_supplier');
		$this->db->where("id_barang", $where['id_barang']);
		$this->db->where("id_order_barang", $where['id_order_barang']);

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
	public function update_selesai($data){
		$this->db->where('status', 'diorder');
		$this->db->where('id_order_barang', $data['id_order_barang']);
		$id = $this->db->update($this->table, $data);
		return $id;
	}
	public function update_kirim_pimpinan($data){
		$this->db->where('id_order_barang', $data['id_order_barang']);
		$id = $this->db->update($this->table, $data);
		return $id;
	}
	public function update($data){
		$this->db->where('id_barang', $data["id_barang"]);
		$this->db->where('id_order_barang', $data['id_order_barang']);
		$id = $this->db->update($this->table, $data);
		return $id;
	}
	public function updateById($data){
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
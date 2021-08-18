<?php
class M_Retur_Barang extends CI_Model {

	var $table='retur_barang';
	var $pk='id_retur_barang';

	public function getAll ()
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('detail_penjualan dp','dp.id_det_penjualan='.$this->table.".id_det_penjualan");
		$this->db->join('penjualan p','dp.id_penjualan=p.id_penjualan');
		$this->db->join('barang b','b.id_barang=dp.id_barang');
		// $this->db->join('member m','m.id_member=p.id_member',"left");
		$this->db->order_by($this->pk, 'DESC');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getID_Penjualan ($id)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('detail_penjualan dp','dp.id_det_penjualan='.$this->table.".id_det_penjualan");
		$this->db->join('penjualan p','dp.id_penjualan=p.id_penjualan');
		$this->db->join('barang b','b.id_barang=dp.id_barang');
		// $this->db->join('member m','m.id_member=p.id_member',"left");
		$this->db->where('p.id_penjualan',$id);
		$this->db->order_by($this->pk, 'DESC');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getPenjualan ($id)
	{
		$this->db->select('*');
		$this->db->from($this->table." rb");
		$this->db->join('detail_penjualan dp','dp.id_det_penjualan=rb.id_det_penjualan');
		$this->db->join('penjualan p','p.id_penjualan=dp.id_penjualan');
		$this->db->join('user u','u.id_user=p.id_user');
		// $this->db->join('member m','m.id_member=p.id_member',"left");
		$this->db->where('rb.id_penjualan', $id);
		$query = $this->db->get();
		return $query->result_array();
	}	
	public function getLaporan ($tgl_awal,$tgl_akhir)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('detail_penjualan dp','dp.id_det_penjualan='.$this->table.".id_det_penjualan");
		$this->db->join('penjualan p','dp.id_penjualan=p.id_penjualan');
		$this->db->join('barang b','b.id_barang=dp.id_barang');
		// $this->db->join('member m','m.id_member=p.id_member',"left");
		$this->db->where('p.tanggal BETWEEN "'. date('Y-m-d', strtotime($tgl_awal)). '" and "'. date('Y-m-d', strtotime($tgl_akhir)). '"');
		$this->db->order_by($this->pk, 'DESC');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getSupplier ($id_supplier,$tanggal)
	{
		$this->db->select('*');
		$this->db->from($this->table." rb");
		$this->db->join('detail_penjualan dp','dp.id_det_penjualan=rb.id_det_penjualan');
		$this->db->join('barang b','b.id_barang=dp.id_barang');
		$this->db->where('b.id_supplier',$id_supplier);
		$this->db->where('rb.tanggal_pengembalian',$tanggal);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getTotal($id)
	{
		$this->db->select('SUM(subtotal) as total');
		$this->db->from($this->table);
		$this->db->join('detail_penjualan dp','dp.id_det_penjualan='.$this->table.".id_det_penjualan");
		$this->db->join('penjualan p','dp.id_penjualan=p.id_penjualan');
		$this->db->group_by("p.id_penjualan");
		$this->db->where("p.id_penjualan", $id);
		$query = $this->db->get();
		// if ($query->num_rows() > 0){
			return $query->row("total");
		// }else{
		// 	return false;
		// }
	}
	public function getKembali ()
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('detail_penjualan dp','dp.id_det_penjualan='.$this->table.".id_det_penjualan");
		$this->db->join('penjualan p','dp.id_penjualan=p.id_penjualan');
		$this->db->join('barang b','b.id_barang=dp.id_barang');
		// $this->db->join('member m','m.id_member=p.id_member',"left");
		$this->db->where('tanggal_pengembalian="0000-00-00"');
		$this->db->order_by($this->pk, 'DESC');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getID($id)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where($this->pk, $id);

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
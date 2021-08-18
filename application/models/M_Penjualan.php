<?php
class M_Penjualan extends CI_Model {

	var $table='penjualan';
	var $pk='id_penjualan';

	public function getAll ()
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('detail_penjualan dp','dp.id_penjualan='.$this->table.".".$this->pk);
		$this->db->join('barang b','b.id_barang=dp.id_barang');
		$this->db->join('user u','u.id_user='.$this->table.".id_user");
		// $this->db->join('member m','m.id_member='.$this->table.".id_member","left");
		$this->db->group_by("penjualan.id_penjualan");
		$this->db->order_by($this->table.".".$this->pk, 'DESC');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getLaporan ($tgl_awal,$tgl_akhir)
	{
		$this->db->select('*');
		$this->db->from($this->table." p");
		$this->db->join('detail_penjualan dp','dp.id_penjualan=p.'.$this->pk);
		$this->db->join('barang b','b.id_barang=dp.id_barang');
		$this->db->join('user u','u.id_user=p.id_user');
		// $this->db->join('member m','m.id_member=p.id_member',"left");
		$this->db->where('p.tanggal BETWEEN "'. date('Y-m-d', strtotime($tgl_awal)). '" and "'. date('Y-m-d', strtotime($tgl_akhir)). '"');
		$this->db->order_by("p.".$this->pk, 'DESC');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getMax()
	{
		$this->db->select('Max(id_penjualan) as id');
		$this->db->from($this->table);
		$query = $this->db->get();
		// if ($query->num_rows() > 0){
			return $query->row('id');
		// }else{
		// 	return false;
		// }
	}
	public function getTotal($id)
	{
		$this->db->select('SUM(subtotal) as total');
		$this->db->join('detail_penjualan dp','dp.id_penjualan='.$this->table.".".$this->pk);
		$this->db->from($this->table);
		$this->db->group_by("penjualan.id_penjualan");
		$this->db->where($this->table.".".$this->pk, $id);
		$query = $this->db->get();
		// if ($query->num_rows() > 0){
			return $query->row("total");
		// }else{
		// 	return false;
		// }
	}
	public function getID($id)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('detail_penjualan dp','dp.id_penjualan='.$this->table.".".$this->pk);
		$this->db->join('user u','u.id_user='.$this->table.".id_user");
		$this->db->join('barang b','b.id_barang=dp.id_barang');
		// $this->db->join('member m','m.id_member='.$this->table.".id_member","left");
		$this->db->where($this->table.".".$this->pk, $id);
		$query = $this->db->get();
		return $query->row();
	}
	
	public function getFilterTanggal($tanggal)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('detail_penjualan dp','dp.id_penjualan='.$this->table.".".$this->pk);
		$this->db->join('barang b','b.id_barang=dp.id_barang');
		$this->db->join('user u','u.id_user='.$this->table.".id_user");
		// $this->db->join('member m','m.id_member='.$this->table.".id_member","left");
		$this->db->like("tanggal", $tanggal);
		$this->db->group_by("penjualan.id_penjualan");
		$this->db->order_by($this->table.".".$this->pk, 'DESC');
		$query = $this->db->get();
		return $query->result_array();
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
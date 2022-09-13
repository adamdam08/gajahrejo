<?php
class Detail extends CI_Model
{
	public function getDetail($id)
	{
		$this->db->where('barang', $id);
		$query = $this->db->query("SELECT * FROM barang where id_barang = $id");
		return $query->row();
	}

	public function getDetailImg($id)
	{
		$query = $this->db->query("SELECT * FROM barangimg where id_barang = $id");
		return $query->result();
	}

	public function getDetailBanner($id)
	{
		$query = $this->db->query("SELECT * FROM barangimg where id_barang = $id");
		return $query->row();
	}

	public function Postbeli($inputData)
	{
		$query = $this->db->insert('pemesanan', $inputData);
	}

	public function userPenjual($id)
	{
		$query = $this->db->query("SELECT user.telepon FROM user LEFT OUTER JOIN barang ON user.id_user = barang.id_user WHERE id_barang=$id");
		return $query->row();
	}

	public function getDetailPemesanan()
	{
		$query = $this->db->query("SELECT * FROM barang");
		return $query->row();
	}

	public function getDetailPemesananID($id_order)
	{
		$query = $this->db->query("SELECT * FROM pemesanan where id_pemesanan = $id_order");
		return $query->row();
	}

	public function getDatakeranjang($id_user)
	{
		$query = $this->db->query("SELECT * FROM pemesanan where id_pembeli = $id_user");
		return $query->result();
	}

	public function getImageCount($id)
	{
		$query = $this->db->query("SELECT * FROM barangimg where id_barang = $id");
		return $query->num_rows();
	}

	public function DataPemesanan($id_penjual)
	{
		$query = $this->db->query("SELECT * FROM `pemesanan` where id_barang IN (SELECT id_barang from barang where id_user = $id_penjual)");
		return $query->result();
	}

	public function statusKonfirm($id_pemesanan)
	{
		$query = $this->db->query("UPDATE pemesanan SET status_pembelian = 'konfirmasi' WHERE id_pemesanan = $id_pemesanan;");
	}

	public function statusTolak($id_pemesanan)
	{
		$query = $this->db->query("UPDATE pemesanan SET status_pembelian='ditolak' WHERE id_pemesanan=$id_pemesanan;");
	}

	public function deleteProduct($id_barang){
		$query = $this->db->query("DELETE FROM `barang` WHERE `barang`.`id_barang` = $id_barang");
	}

	public function jumlahPesanan($id_pemesanan){
		$query = $this->db->query("SELECT * FROM `pemesanan` WHERE `id_pemesanan` = $id_pemesanan");
		return $query->row();
	}

	public function updateStock($id_barang, $stock){
		$query = $this->db->query("UPDATE barang set jumlahbarang=$stock WHERE id_barang=$id_barang");
	}

	public function hapusSetelahDitolak($id_pemesanan)
	{
		$query = $this->db->query("DELETE FROM `pemesanan` WHERE `pemesanan`.`id_pemesanan` = $id_pemesanan");
	}

	public function getBarang($id)
	{
		
		$query = $this->db->query("SELECT * FROM barang where id_user = $id");
		return $query->row();
	}
}

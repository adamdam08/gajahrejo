<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datapemesananpenjual extends CI_Controller
{

    public function index()
    {
        $this->load->model('Detail');
        $username = $this->session->userdata('username');
        $this->db->where('username =', $username);
        $this->db->or_where('telepon =', $username);
        $user = $this->db->get('user')->row_array();
        $data['nama'] = $user['username'];

        $id_penjual = $user['id_user'];
        $data['receipt'] = $this->Detail->DataPemesanan($id_penjual);

        if ($user == null) {
            redirect('home');
        } else {
            $this->load->view('templates/header');
            $this->load->view('templates/navbar_login', $data);
            $this->load->view('page/datapemesananpenjual', $data);
            $this->load->view('templates/footer');
        }
    }

    public function konfirmasi($id_pemesanan)
    {
        $this->load->model('Detail');
        $username = $this->session->userdata('username');
        $this->db->where('username =', $username);
        $this->db->or_where('telepon =', $username);
        $user = $this->db->get('user')->row_array();

        $data['nama'] = $user['username'];
        $id_penjual = $user['id_user'];
        $jumlahPesanan = $this->Detail->jumlahPesanan($id_pemesanan)->jumlah;
        $stock = $this->Detail->getBarang($id_penjual)->jumlahbarang;
        $id_barang = $this->Detail->getBarang($id_penjual)->id_barang;
        $resultStock = $stock - $jumlahPesanan;
        if ($id_pemesanan != null) {
            $this->Detail->statusKonfirm($id_pemesanan);
            $this->Detail->updateStock($id_barang, $resultStock);
            redirect('Datapemesananpenjual');
        }
    }

    public function tolak($id_pemesanan)
    {
        $this->load->model('Detail');
        $username = $this->session->userdata('username');
        $this->db->where('username =', $username);
        $this->db->or_where('telepon =', $username);
        $user = $this->db->get('user')->row_array();
        $data['nama'] = $user['username'];
        $id_penjual = $user['id_user'];

        $update = $this->Detail->statusKonfirm($id_pemesanan);
        $hapus = $this->Detail->hapusSetelahDitolak($id_pemesanan);
        redirect('Datapemesananpenjual');
    }
}

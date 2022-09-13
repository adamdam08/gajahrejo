<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stuff extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}
	public function upload()
	{
		$this->load->model('Multipleimage');
		$this->session->userdata('username');
		$this->form_validation->set_rules('namabarang', 'Nama Barang', 'required');
		$this->form_validation->set_rules('descbarang', 'Deskripsi Barang', 'required');
		$this->form_validation->set_rules('jenisbarang', 'Jenis Barang', 'required');
		$this->form_validation->set_rules('hargabarang', 'Harga Barang', 'required');
		$this->form_validation->set_rules('jumlahbarang', 'Jumlah Barang', 'required');

		$username = $this->session->userdata('username');
		$this->db->where('username =', $username);
		$this->db->or_where('telepon =', $username);
		$user = $this->db->get('user')->row_array();
		$data['nama'] = $user['username'];

		if ($this->form_validation->run() == false) {
			if ($user) {
				$this->load->view('templates/header');
				$this->load->view('templates/navbar_login', $data);
				$this->load->view('page/upload-barang');
				$this->load->view('templates/footer');
			} else {
				redirect('home');
			}
		} else {
			$id_user = $user['id_user'];
			$judul = $this->input->post('namabarang', true);
			$deskripsi = $this->input->post('descbarang', true);
			$jenis = $this->input->post('jenisbarang', true);
			$harga = $this->input->post('hargabarang', true);
			$jumlah = $this->input->post('jumlahbarang', true);
			$diskon = $this->input->post('diskon');

			$data = [
				'id_user' => $id_user,
				'namabarang' => $judul,
				'descbarang' => $deskripsi,
				'jenisbarang' => $jenis,
				'hargabarang' => $harga,
				'jumlahbarang' => $jumlah,
				'diskon' => $diskon
			];

			$insertbarang = $this->db->insert('barang', $data);
			if ($insertbarang) {
				$this->db->where('id_user =', $id_user);
				$this->db->order_by("id_barang", "desc");
				$barang = $this->db->get('barang')->row_array();

				// Hitung Jumlah File/Gambar yang dipilih
				$jumlahData = count($_FILES['image']['name']);

				// Lakukan Perulangan dengan maksimal ulang Jumlah File yang dipilih
				for ($i = 0; $i < $jumlahData; $i++) :

					// Inisialisasi Nama,Tipe,Dll. 
					$_FILES['file']['name']     = $_FILES['image']['name'][$i];
					$_FILES['file']['type']     = $_FILES['image']['type'][$i];
					$_FILES['file']['tmp_name'] = $_FILES['image']['tmp_name'][$i];
					$_FILES['file']['size']     = $_FILES['image']['size'][$i];

					// Konfigurasi Upload
					$config['upload_path']          = './snippets/img/barang/';
					$config['allowed_types']        = 'gif|jpg|png|pdf';

					// Memanggil Library Upload dan Setting Konfigurasi
					$this->load->library('upload', $config);
					$this->upload->initialize($config);

					if ($this->upload->do_upload('file')) { // Jika Berhasil Upload

						$fileData = $this->upload->data(); // Lakukan Upload Data

						// Membuat Variable untuk dimasukkan ke Database
						$uploadData[$i]['image'] = $fileData['file_name'];
						$uploadData[$i]['id_barang'] = $barang['id_barang'];
					}

				endfor; // Penutup For

				if ($uploadData !== null) { // Jika Berhasil Upload
					// Insert ke Database 
					$insert = $this->Multipleimage->upload($uploadData);
					if ($insert) {
						redirect('stuff/upload');
					}
				}
			}
		}
	}

	public function ereceipt()
	{

		$username = $this->session->userdata('username');
		$this->db->where('username =', $username);
		$this->db->or_where('telepon =', $username);
		$user = $this->db->get('user')->row_array();
		$data['nama'] = isset($user['username']);
		if ($user == null) {
			$this->load->view('templates/header');
			$this->load->view('templates/navbar_login', $data);
			$this->load->view('page/home');
			$this->load->view('templates/footer');
		} else {
			$this->load->view('templates/header');
			$this->load->view('templates/navbar_login', $data);
			$this->load->view('page/ereceipt');
			$this->load->view('templates/footer');
		}
	}

	public function barangdijual()
	{
		$username = $this->session->userdata('username');
		$this->db->where('username =', $username);
		$this->db->or_where('telepon =', $username);
		$user = $this->db->get('user')->row_array();
		$data['nama'] = isset($user['username']);

		if ($user == null) {
			$this->load->view('templates/header');
			$this->load->view('templates/navbar_login', $data);
			$this->load->view('page/home');
			$this->load->view('templates/footer');
		} else {
			$this->load->view('templates/header');
			$this->load->view('templates/navbar_login', $data);
			$this->load->view('page/productpenjual', $data);
			$this->load->view('templates/footer');
		}
	}
}

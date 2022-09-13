<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buy extends CI_Controller
{	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index($id_barang)
	{
		$this->load->model('Detail');
		$username = $this->session->userdata('username');
		$this->db->where('username =', $username);
		$this->db->or_where('telepon =', $username);
		$user = $this->db->get('user')->row_array();


		if ($user == null) {
			$data['detail'] = $this->Detail->getDetail($id_barang);
			$data['getImage'] = $this->Detail->getDetailImg($id_barang);
			$data['getBanner'] = $this->Detail->getDetailBanner($id_barang);
			$data['id_barang'] = $this->Detail->getDetail($id_barang)->id_barang;
			$id_barang = $this->Detail->getDetail($id_barang)->id_barang;
			$this->load->view('templates/header');
			$this->load->view('templates/navbar');
			$this->load->view('page/buy2', $data);
			$this->load->view('templates/footer');
		} else {
			$data['id_user'] = $user['id_user'];
			$data['nama'] = $user['username'];
			$data['alamat'] = $user['address'];
			$data['telepon'] = $user['telepon'];
			$data['detail'] = $this->Detail->getDetail($id_barang);
			$data['getImage'] = $this->Detail->getDetailImg($id_barang);
			$data['getBanner'] = $this->Detail->getDetailBanner($id_barang);
			$data['id_barang'] = $this->Detail->getDetail($id_barang)->id_barang;
			$id_barang = $this->Detail->getDetail($id_barang)->id_barang;
			$this->load->view('templates/header');
			$this->load->view('templates/navbar_login', $data);
			$this->load->view('page/buy', $data);
			$this->load->view('templates/footer');
		}
	}

	public function beliLogin($id_barang)
	{

		$this->load->model('Detail');
		$username = $this->session->userdata('username');
		$this->db->where('username =', $username);
		$this->db->or_where('telepon =', $username);
		$user = $this->db->get('user')->row_array();
		$id_user = $user['id_user'];

		$dataPenjual = $this->Detail->userPenjual($id_barang)->telepon;
		$linkbarang = $this->Detail->getDetail($id_barang)->namabarang;
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$telepon = $this->input->post('telepon');
		$jumlah = $this->input->post('qtybarang');

		$inputData = [
			'id_pembeli' => $id_user,
			'id_barang' => $id_barang,
			'status_login' => 1,
			'nama_pembeli' => $user['username'],
			'alamat' => $user['address'],
			'telepon' => $user['telepon'],
			'jumlah' => $jumlah,
		];

		$data['detail'] = $this->Detail->getDetail($id_barang);
		$data['getImage'] = $this->Detail->getDetailImg($id_barang);
		$data['getBanner'] = $this->Detail->getDetailBanner($id_barang);
		$data['id_barang'] = $this->Detail->getDetail($id_barang)->id_barang;

		if ($jumlah = null) {
		} else {

			$this->Detail->Postbeli($inputData);
			header('location: https://api.whatsapp.com/send?phone=' . $dataPenjual . '&text=Haii! saya ingin membeli produk anda bernama ' . $linkbarang);
		}
	}
	public function beliTanpaLogin($id_barang)
	{	$this->load->model('Detail');
		
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		function my_func ($field) {
			if (preg_match('(\+62((\d{3}([ -]\d{3,})([- ]\d{4,})?)|(\d+)))', $field ) ) 
			{
			    return TRUE;
			}else{
			    return FALSE;
			}
    	}
    	
		$this->form_validation->set_rules('telepon', 'Telepon', 'required|trim|max_length[15]|my_func', [
			'max_length' => "Nomor Telepon terlalu panjang",
			'my_func' => "Nomor Telepon tidak diawali +62"
		]);
		$this->form_validation->set_rules('qtybarang', 'Jumlah', 'required');

		
		$data['detail'] = $this->Detail->getDetail($id_barang);
		$data['getImage'] = $this->Detail->getDetailImg($id_barang);
		$data['getBanner'] = $this->Detail->getDetailBanner($id_barang);
		$data['id_barang'] = $this->Detail->getDetail($id_barang)->id_barang;


		if ($this->form_validation->run() ==false) {
			$this->load->view('templates/header');
			$this->load->view('templates/navbar');
			$this->load->view('page/buy2', $data);
			$this->load->view('templates/footer');
		} else {
			$dataPenjual = $this->Detail->userPenjual($id_barang)->telepon;
			$linkbarang = $this->Detail->getDetail($id_barang)->namabarang;
			$nama = $this->input->post('nama');
			$alamat = $this->input->post('alamat');
			$telepon = $this->input->post('telepon');
			$jumlah = $this->input->post('qtybarang');
			$inputData = [
				'id_barang' => $id_barang,
				'id_pembeli' => 0,
				'status_login' => 0,
				'nama_pembeli' => $nama,
				'alamat' => $alamat,
				'telepon' => $telepon,
				'jumlah' => $jumlah,

			];

			$query = $this->db->insert('pemesanan', $inputData);

			header('location: https://api.whatsapp.com/send?phone=' . $dataPenjual . '&text=Haii! saya ingin membeli produk anda bernama ' . $linkbarang);
		}
	}
}

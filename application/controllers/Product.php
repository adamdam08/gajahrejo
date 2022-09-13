<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{

	public function index()
	{
		$username = $this->session->userdata('username');
		$this->db->where('username =', $username);
		$this->db->or_where('telepon =', $username);
		$user = $this->db->get('user')->row_array();

		if ($user == null) {
			$this->load->view('templates/header');
			$this->load->view('templates/navbar');
			$this->load->view('page/product');
			$this->load->view('templates/footer');
		} else {
			$data['nama'] = $user['username'];
			$this->load->view('templates/header');
			$this->load->view('templates/navbar_login', $data);
			$this->load->view('page/product');
			$this->load->view('templates/footer');
		}
	}

	public function search()
	{
		$username = $this->session->userdata('username');
		$this->db->where('username =', $username);
		$this->db->or_where('telepon =', $username);
		$user = $this->db->get('user')->row_array();
		$data['nama'] = $user['username'];
		$data['nama_barang'] = $this->input->post('prod_name', TRUE);

		if ($user == null) {
			$this->load->view('templates/header');
			$this->load->view('templates/navbar');
			$this->load->view('page/product_search', $data);
			$this->load->view('templates/footer');
		} else {
			$data['nama'] = $user['username'];
			$this->load->view('templates/header');
			$this->load->view('templates/navbar_login', $data);
			$this->load->view('page/product_search', $data);
			$this->load->view('templates/footer');
		}
	}
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Promo extends CI_Controller
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
			$this->load->view('page/promo');
			$this->load->view('templates/footer');
		} else {
			$data['nama'] = $user['username'];
			$this->load->view('templates/header');
			$this->load->view('templates/navbar_login', $data);
			$this->load->view('page/promo');
			$this->load->view('templates/footer');
		}
	}
}

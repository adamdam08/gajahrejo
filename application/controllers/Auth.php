<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		$username = $this->session->userdata('username');
		$this->db->where('username =', $username);
		$this->db->or_where('telepon =', $username);
		$user = $this->db->get('user')->row_array();

		if ($user) {
			redirect('home');
		} else {
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');

			if ($this->form_validation->run() == false) {
				$data['title'] = 'Login Page';
				$this->load->view('templates/header', $data);
				$this->load->view('page/login');
				$this->load->view('templates/footer');
			} else {
				$this->_login();
			}
		}
	}

	public function _login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');


		$this->db->where('username =', $username);
		$this->db->or_where('telepon =', $username);
		$user = $this->db->get('user')->row_array();

		if ($user) {
			if (password_verify($password, $user['password'])) {
				$data = [
					'username' => $user['username'],
				];
				// "'$this->session->userdata('username')'"
				$this->session->set_userdata($data);
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun Ditemukan! </div>');
				redirect('home');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah!</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username tidak terdaftar!</div>');
			redirect('auth');
		}
	}


	public function register()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim|max_length[32]|is_unique[user.username]', [
			'is_unique' => "Username telah digunakan",
			'max_length' => "Inputan Username melebihi batas"
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]', [
			'min_length' => "Password terlalu pendek"
		]);
		$this->form_validation->set_rules('forename', 'Forename', 'required|trim');
		$this->form_validation->set_rules('surname', 'Surname', 'required|trim');
		$this->form_validation->set_rules('address', 'Address', 'required|trim');
		$this->form_validation->set_rules('city', 'City', 'required|trim');
		$this->form_validation->set_rules('province', 'Province', 'required|trim');
		$this->form_validation->set_rules('post_code', 'Post_code', 'required|trim|max_length[5]', [
			'max_length' => "Kode Pos Terlalu panjang"
		]);
		function my_func($field)
		{
			if (preg_match('(\+62((\d{3}([ -]\d{3,})([- ]\d{4,})?)|(\d+)))', $field)) {
				return TRUE;
			} else {
				return FALSE;
			}
			//return (bool)preg_match('', $field);
		}

		$this->form_validation->set_rules('phone_number', 'Phone_number', 'required|trim|max_length[15]|is_unique[data_account.telepon_takmir]|my_func', [
			'is_unique' => "Nomor Telepon telah digunakan",
			'max_length' => "Nomor Telepon terlalu panjang",
			'my_func' => "Nomor Telepon tidak diawali +62"
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header');
			$this->load->view('page/register');
			$this->load->view('templates/footer');
		} else {
			$username = $this->input->post('username', true);
			$password = $this->input->post('password');
			$forename = $this->input->post('forename', true);
			$surname = $this->input->post('surname', true);
			$address = $this->input->post('address', true);
			$city = $this->input->post('city', true);
			$province = $this->input->post('province', true);
			$post_code = $this->input->post('post_code', true);
			$phone_number = $this->input->post('phone_number', true);
			$data = [
				'username' => htmlspecialchars($username),
				'password' => password_hash($password, PASSWORD_DEFAULT),
				'forename' => htmlspecialchars($forename),
				'surname' => htmlspecialchars($surname),
				'address' => htmlspecialchars($address),
				'city' => htmlspecialchars($city),
				'province' => htmlspecialchars($province),
				'post_code' => $post_code,
				'telepon' => $phone_number,
				'date_created' => time()
			];
			$this->db->insert('user', $data);
			$this->index();


			/*if (!preg_match("/(^[^62]|\s)/i", $phone_number)) {
				
			}else{
				echo '<script>alert("Nomor telepon tidak diawali dengan 62")</script>';
				redirect('Auth/register'); 
			}
			
			$codeID = '62';
			$resultPhone = $codeID.$phone_number;*/
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		redirect('home');
	}
}

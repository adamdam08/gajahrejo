<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Password extends CI_Controller
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

        $data['nama'] = $user['username'];
        $this->form_validation->set_rules('password_old', 'Password_old', 'required|trim');
        $this->form_validation->set_rules('password_new', 'password_new', 'required|trim|min_length[8]', [
            'min_length' => "Password baru terlalu pendek"
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header');
            $this->load->view('templates/navbar_login', $data);
            $this->load->view('page/password');
            $this->load->view('templates/footer');
        } else {
            $this->_edit_password();
        }
    }

    public function _edit_password()
    {
        $username = $this->session->userdata('username');
        $this->db->where('username =', $username);
        $this->db->or_where('telepon =', $username);
        $user = $this->db->get('user')->row_array();

        $password_old = $this->input->post('password_old');
        $password_new = $this->input->post('password_new');

        if (password_verify($password_old, $user['password'])) {
            $data = [
                'password' => password_hash($password_new, PASSWORD_DEFAULT),
            ];
            $this->db->where('id', $user['id']);
            $this->db->update('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password telah diperbarui! </div>');
            redirect('password');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah! </div>');
            redirect('password');
        }
    }
}

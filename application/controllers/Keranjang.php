<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keranjang extends CI_Controller
{

    public function index()
    {
        $this->load->model('Detail');
        $username = $this->session->userdata('username');
        $this->db->where('username =', $username);
        $this->db->or_where('telepon =', $username);
        $user = $this->db->get('user')->row_array();
        $data['nama'] = $user['username'];

        $id_user = $user['id_user'];
        $data['receipt'] = $this->Detail->getDatakeranjang($id_user);

        if ($user == null) {
            redirect('home');
        } else {
            $this->load->view('templates/header');
            $this->load->view('templates/navbar_login', $data);
            $this->load->view('page/keranjang', $data);
            $this->load->view('templates/footer');
        }
    }
}

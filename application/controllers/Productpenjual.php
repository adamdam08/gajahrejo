<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Productpenjual extends CI_Controller
{

    public function index()
    {
        $username = $this->session->userdata('username');
        $this->db->where('username =', $username);
        $this->db->or_where('telepon =', $username);
        $user = $this->db->get('user')->row_array();
        $data['nama'] = $user['username'];
        if ($user == null) {
            redirect('home');
        } else {
            $this->load->view('templates/header');
            $this->load->view('templates/navbar_login', $data);
            $this->load->view('page/productpenjual');
            $this->load->view('templates/footer');
        }
    }
}

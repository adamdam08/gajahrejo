<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Favourite extends CI_Controller
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
            $this->load->view('page/favorit');
            $this->load->view('templates/footer');
        }
    }

    public function add($id_barang)
    {
        $username = $this->session->userdata('username');
        $this->db->where('username =', $username);
        $this->db->or_where('telepon =', $username);
        $user = $this->db->get('user')->row_array();
        $id = $user['id_user'];


        if ($user == null) {
            redirect('home');
        } else {
            $data = [
                'id_barang' => $id_barang,
                'id_user' => $id,
            ];
            $add_favourite = $this->db->insert('favourite', $data);
            if ($add_favourite) {
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                $this->db->error();
            }
        }
    }

    public function remove($id_barang)
    {
        $username = $this->session->userdata('username');
        $this->db->where('username =', $username);
        $this->db->or_where('telepon =', $username);
        $user = $this->db->get('user')->row_array();
        $id = $user['id_user'];

        if ($user == null) {
            redirect('home');
        } else {
            $data = [
                'id_barang' => $id_barang,
                'id_user' => $id,
            ];
            $delete_favourite = $this->db->delete('favourite', $data);

            if ($delete_favourite) {
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                $this->db->error();
            }
        }
    }
}

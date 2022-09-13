<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ereceipt extends CI_Controller
{
    public function cetak($id_barang)
    {
        $this->load->model('Detail');

        $username = $this->session->userdata('username');
        $this->db->where('username =', $username);
        $this->db->or_where('telepon =', $username);
        $user = $this->db->get('user')->row_array();

        // $id_barang = $this->input->post('id_barang');



        if ($user == null) {
            redirect('home');
        } else {
            $data['id_user'] = $user['id_user'];
            $data['detail'] = $this->Detail->getDetailPemesananID($id_barang);
            $this->load->view('templates/header');
            $this->load->view('page/ereceipt', $data);
        }
    }
}

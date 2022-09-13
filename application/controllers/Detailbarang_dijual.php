<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detailbarang_dijual extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *      http://example.com/index.php/welcome
     *  - or -
     *      http://example.com/index.php/welcome/index
     *  - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

    public function index($id_barang)
    {
        $this->load->model('Detail');
        $username = $this->session->userdata('username');
        $this->db->where('username =', $username);
        $this->db->or_where('telepon =', $username);
        $user = $this->db->get('user')->row_array();
        $data['nama'] = $user['username'];

        $data['detail'] = $this->Detail->getDetail($id_barang);
        $data['getImage'] = $this->Detail->getDetailImg($id_barang);
        $data['getBanner'] = $this->Detail->getDetailBanner($id_barang);
        $data['getImageCount'] = $this->Detail->getImageCount($id_barang);

        if ($user == null) {
            redirect('home');
        } else {
            $this->load->view('templates/header');
            $this->load->view('templates/navbar_login', $data);
            $this->load->view('page/editbarangpenjual', $data);
            $this->load->view('templates/footer');
        }
    }

    public function edit_data($id_barang)
    {
        $username = $this->session->userdata('username');
        $this->db->where('username =', $username);
        $this->db->or_where('telepon =', $username);
        $user = $this->db->get('user')->row_array();
        $data['nama'] = $user['username'];
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
        $this->db->where('id_barang', $id_barang);
        $updatebarang = $this->db->update('barang', $data);

        if ($updatebarang) {
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->db->error();
        }
    }

    public function delete_image($id_img, $image)
    {
        $data = [
            'id_img' => $id_img,
        ];
        unlink("snippets/img/barang/" . $image);
        $delete_img = $this->db->delete('barangimg', $data);

        if ($delete_img) {
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->db->error();
        }
    }

    public function delete_product($id_barang){
        $this->load->model('Detail');
        $query = $this->Detail->deleteProduct($id_barang);
        redirect('productpenjual');
    }

    public function add_image($id_barang)
    {
        $this->load->model('Multipleimage');
        $username = $this->session->userdata('username');
        $this->db->where('username =', $username);
        $this->db->or_where('telepon =', $username);
        $user = $this->db->get('user')->row_array();
        $data['nama'] = $user['username'];
        $id_user = $user['id_user'];

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
                $uploadData[$i]['id_barang'] = $id_barang;
            }

        endfor; // Penutup For

        if ($uploadData !== null) { // Jika Berhasil Upload
            // Insert ke Database 
            $insert = $this->Multipleimage->upload($uploadData);
            if ($insert) {
                redirect($_SERVER['HTTP_REFERER']);
            }
        }
    }
}

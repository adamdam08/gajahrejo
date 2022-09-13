<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bio extends CI_Controller
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

        $data['username'] = $user['username'];
        $data['forename'] = $user['forename'];
        $data['surname'] = $user['surname'];
        $data['address'] = $user['address'];
        $data['city'] = $user['city'];
        $data['province'] = $user['province'];
        $data['post_code'] = $user['post_code'];
        $data['telepon'] = $user['telepon'];

        $username_new = $this->input->post('username', true);
        $phone_number = $this->input->post('phone_number', true);

        if ($username_new != $data['username']) {
            $is_unique_username =  '|is_unique[user.username]';
        } else {
            $is_unique_username =  '';
        }

        $this->form_validation->set_rules('username', 'Username', 'required|trim|max_length[32]' . $is_unique_username, [
            'is_unique' => "Username telah digunakan",
            'max_length' => "Inputan Username melebihi batas"
        ]);
        $this->form_validation->set_rules('forename', 'Forename', 'required|trim');
        $this->form_validation->set_rules('surname', 'Surname', 'required|trim');
        $this->form_validation->set_rules('address', 'Address', 'required|trim');
        $this->form_validation->set_rules('city', 'City', 'required|trim');
        $this->form_validation->set_rules('province', 'Province', 'required|trim');

        $this->form_validation->set_rules('post_code', 'Post_code', 'required|trim|max_length[5]', [
            'max_length' => "Kode Pos Terlalu panjang"
        ]);

        if ($phone_number != $data['telepon']) {
            $is_unique_telepon =  '|is_unique[user.telepon]';
        } else {
            $is_unique_telepon =  '';
        }

        $this->form_validation->set_rules('phone_number', 'Phone_number', 'required|trim|max_length[13]' . $is_unique_telepon, [
            'is_unique' => "Nomor Telepon telah digunakan",
            'max_length' => "Nomor Telepon terlalu panjang"
        ]);


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header');
            $this->load->view('templates/navbar_login', $data);
            $this->load->view('page/bio', $data);
            $this->load->view('templates/footer');
        } else {
            $this->_edit_bio();
        }
    }

    public function _edit_bio()
    {
        $username_new = $this->input->post('username', true);
        $forename = $this->input->post('forename', true);
        $surname = $this->input->post('surname', true);
        $address = $this->input->post('address', true);
        $city = $this->input->post('city', true);
        $province = $this->input->post('province', true);
        $post_code = $this->input->post('post_code', true);
        $phone_number = $this->input->post('phone_number', true);

        $username = $this->session->userdata('username');
        $this->db->where('username =', $username);
        $this->db->or_where('telepon =', $username);
        $user = $this->db->get('user')->row_array();

        $data = [
            'username' => htmlspecialchars($username_new),
            'forename' => htmlspecialchars($forename),
            'surname' => htmlspecialchars($surname),
            'address' => htmlspecialchars($address),
            'city' => htmlspecialchars($city),
            'province' => htmlspecialchars($province),
            'post_code' => $post_code,
            'telepon' => $phone_number,
        ];

        $this->db->where('id', $user['id']);
        $updatebio = $this->db->update('user', $data);

        if ($updatebio) {
            $data = [
                'username' => $username_new,
            ];
            $this->session->set_userdata($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Biodata Diperbarui! </div>');
            redirect('bio');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal! </div>');
            redirect('bio');
        }
    }
}

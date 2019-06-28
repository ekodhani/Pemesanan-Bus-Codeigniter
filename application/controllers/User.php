<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
	{
        parent::__construct();
        $this->load->model('M_abtb');
        $this->load->library('form_validation');
        if (!$this->session->userdata('email')){
            redirect('login');
        }
	}

    public function index()
    {
        $data['judul'] = 'Daftar Bus';
        $data['user'] = $this->M_abtb->edit_data(['email' => $this->session->userdata('email')] , 'user')->row_array();
        $data['bus'] = $this->M_abtb->get_data('bis')->result();

        $this->load->view('tamplate/header_user', $data);
        $this->load->view('tamplate/sidebar_user', $data);
        $this->load->view('tamplate/topbar_user');
        $this->load->view('user/index', $data);
        $this->load->view('tamplate/footer_user');
    }

    public function bookingBus($id)
    {
        $data['judul'] = 'Booking Bus';
        $data['user'] = $this->M_abtb->edit_data(['email' => $this->session->userdata('email')], 'user')->row_array();
        $data['detail'] = $this->M_abtb->wkwk($id);

        $this->form_validation->set_rules('tgl_berangkat', 'Tanggal Keberangkatan', 'required|trim',[
            'required' => 'Tanggal Keberangkatan Mohon Di Isi !'
        ]);        

        if ($this->form_validation->run() == false){
            $this->load->view('tamplate/header_user', $data);
            $this->load->view('tamplate/sidebar_user', $data);
            $this->load->view('tamplate/topbar_user');
            $this->load->view('user/booking', $data);
            $this->load->view('tamplate/footer_user');
        } else {
            $data = [
                'id_pesan' => $this->M_abtb->kode_otomatis(),
                'email' => $this->session->userdata('email'),
                'kode_bis' => $id,
                'rute' => $this->input->post('rute'),
                'harga' => $this->input->post('harga'),
                'tgl_berangkat' => $this->input->post('tgl_berangkat'),
                'jam_berangkat' => $this->input->post('jam_berangkat'),
                'kursi' => $this->input->post('kursi'),
                'status' => 'menunggu pembayaran'
            ];
            $this->M_abtb->insert_data($data, 'pemesanan');
            $this->session->set_flashdata('message', '<div class="alert alert-success mb-3" role="alert">Selamat Booking Bus Sudah SHE UP !</div>');
            redirect('user/pemesanan');
        }
    }

    public function detailBus($id)
    {
        $data['judul'] = 'Detail';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['detail'] = $this->M_abtb->wkwk($id);

        $this->load->view('tamplate/header_user',$data);
        $this->load->view('tamplate/sidebar_user',$data);
        $this->load->view('tamplate/topbar_user');
        $this->load->view('user/detailbus',$data);
        $this->load->view('tamplate/footer_user');
    }

    public function edit_profil()
    {
        $data['judul'] = 'Edit Profil';
        $data['user'] = $this->M_abtb->edit_data(['email' => $this->session->userdata('email')], 'user')->row_array();

        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('password', 'Password Baru', 'required|trim|min_length[8]',[
            'min_length' => 'Minimal 8 Karakter'
        ]);
        $this->form_validation->set_rules('notelp', 'Nomor Telepon', 'numeric');


        if ($this->form_validation->run() == false) {
            $this->load->view('tamplate/header_user',$data);
            $this->load->view('tamplate/sidebar_user',$data);
            $this->load->view('tamplate/topbar_user');
            $this->load->view('user/profil',$data);
            $this->load->view('tamplate/footer_user');
        } else {
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $no_telp = $this->input->post('notelp');
            $password = $this->input->post('password');

            // Apakah ada gambar ?
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size']      = '2048';
                $config['max_width']     = '60';
                $config['max_height']    = '60';
                $config['upload_path']   = './assets/image/user/';

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')){
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('password', md5($password));
            $this->db->set('no_telp', $no_telp);
            $this->db->set('nama', $nama);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profil Telah Di Update Cuk!</div>');
			redirect('User');
        }
    }

    public function pemesanan()
    {
        $data['judul'] = 'Pesan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pemesanan'] = $this->M_abtb->edit_data(['email' => $this->session->userdata('email')], 'pemesanan')->result();
        

        $this->load->view('tamplate/header_user',$data);
        $this->load->view('tamplate/sidebar_user',$data);
        $this->load->view('tamplate/topbar_user');
        $this->load->view('user/pemesanan',$data);
        $this->load->view('tamplate/footer_user');
    }

    public function batalbooking($id)
    {
        $where = ['id_pesan' => $id];
        $this->M_abtb->delete_data($where, 'pemesanan');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pesanan Berhasil Di Batalkan</div>');
        redirect('user/pemesanan');
    }

    public function bayarbooking($id)
    {
        $data['judul'] = 'Payment';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pemesanan'] = $this->M_abtb->edit_data(['email' => $this->session->userdata('email'), 'id_pesan' => $id], 'pemesanan')->row_array();
        $data['bis'] = $this->db->get_where('bis', ['kode_bis' => $this->session->userdata('kode_bis')])->row_array();

        $this->load->view('tamplate/header_user',$data);
        $this->load->view('tamplate/sidebar_user',$data);
        $this->load->view('tamplate/topbar_user');
        $this->load->view('user/baybok',$data);
        $this->load->view('tamplate/footer_user');
    }

    public function transaksi()
    {
        $data['judul'] = 'Riwayat Pemesanan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['transaksi'] = $this->M_abtb->edit_data(['email' => $this->session->userdata('email')], 'transaksi')->result();

        $this->load->view('tamplate/header_user',$data);
        $this->load->view('tamplate/sidebar_user',$data);
        $this->load->view('tamplate/topbar_user');
        $this->load->view('user/riwayattransaksi',$data);
        $this->load->view('tamplate/footer_user');
    }
}
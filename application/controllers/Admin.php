<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        if (!$this->session->userdata('email')){
            redirect('login');
        }
    }

    public function index()
    {
        $data['judul'] = 'Welcome';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('tamplate/header_user', $data);
        $this->load->view('tamplate/sidebar_admin', $data);
        $this->load->view('tamplate/topbar_user');
        $this->load->view('admin/index', $data);
        $this->load->view('tamplate/footer_user');
    }


    // function bus
    public function daftarbus()
    {
        $data['judul'] = 'Daftar Bus';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['bus'] = $this->M_abtb->get_data('bis')->result();

        $this->load->view('tamplate/header_user',$data);
        $this->load->view('tamplate/sidebar_admin',$data);
        $this->load->view('tamplate/topbar_user');
        $this->load->view('admin/daftarbus',$data);
        $this->load->view('tamplate/footer_user');
    }

    public function tambah()
    {
        $data['judul'] = 'Tambah Data Bus';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('tamplate/header_user',$data);
        $this->load->view('tamplate/sidebar_admin',$data);
        $this->load->view('tamplate/topbar_user');
        $this->load->view('admin/tambah',$data);
        $this->load->view('tamplate/footer_user');
    }

    public function tambahact()
    {
        $nama = $this->input->post('nama');
        $kursi = $this->input->post('kursi');
        $kelas = $this->input->post('kelas');
        $keterangan = $this->input->post('keterangan');
        $rute = $this->input->post('rute');

        $this->form_validation->set_rules('nama', 'Nama Bis', 'trim|required');
		$this->form_validation->set_rules('kursi', 'Kursi', 'trim|required|numeric');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
		$this->form_validation->set_rules('rute', 'Rute', 'trim|required');
		if ($this->form_validation->run() != false) {
            // konfigurasi upload file
            $config['allowed_types'] = 'jpeg|jpg|png';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/image/bus/';
            $config['file_name'] = 'TJimage';

            $this->load->library('upload',$config);
            if($this->upload->do_upload('image')){
                $image = $this->upload->data();

                $data = array(
                    'nama_bis' => $nama,
                    'kursi' => $kursi,
                    'kelas' => $kelas,
                    'keterangan' => $keterangan,
                    'rute' => $rute,
                    'image' => $image['file_name']
                );
                $this->db->insert('bis', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat Data Telah Ditambahkan</div>');
                redirect('admin/daftarbus');
            } else {
            $data['judul'] = 'Tambah Data Bus';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('tamplate/header_user',$data);
            $this->load->view('tamplate/sidebar_admin',$data);
            $this->load->view('tamplate/topbar_user');
            $this->load->view('admin/tambah',$data);
            $this->load->view('tamplate/footer_user');
        }
    }
}

    public function detailBus($id)
    {
        $data['judul'] = 'Detail';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['detail'] = $this->M_abtb->wkwk($id);

        $this->load->view('tamplate/header_user',$data);
        $this->load->view('tamplate/sidebar_admin',$data);
        $this->load->view('tamplate/topbar_user');
        $this->load->view('admin/detailbus',$data);
        $this->load->view('tamplate/footer_user');
    }

    public function editBus($id)
    {
        $data['judul'] = 'Edit Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['detail'] = $this->M_abtb->wkwk($id);

        $this->form_validation->set_rules('nama_bis', 'Nama Bis', 'required|trim');
        $this->form_validation->set_rules('kursi', 'Jumlah Kursi', 'required|trim');
        $this->form_validation->set_rules('harga', 'Harga', 'required|trim|numeric');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_rules('rute', 'Rute', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('tamplate/header_user',$data);
            $this->load->view('tamplate/sidebar_admin',$data);
            $this->load->view('tamplate/topbar_user');
            $this->load->view('admin/editbus',$data);
            $this->load->view('tamplate/footer_user');
        } else {

            $kode_bis = $id;
            $nama_bis = $this->input->post('nama_bis');
            $kursi = $this->input->post('kursi');
            $jam_berangkat = $this->input->post('jam_berangkat');
            $kelas = $this->input->post('kelas');
            $harga = $this->input->post('harga');
            $keterangan = $this->input->post('keterangan');
            $rute = $this->input->post('rute');
            
            // Apakah ada gambar ?
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size']      = '2048';
                $config['upload_path']   = './assets/image/bus/';

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')){
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('rute', $rute);
            $this->db->set('keterangan', $keterangan);
            $this->db->set('harga', $harga);
            $this->db->set('kelas', $kelas);
            $this->db->set('jam_berangkat', $jam_berangkat);
            $this->db->set('kursi', $kursi);
            $this->db->set('nama_bis', $nama_bis);
            $this->db->where('kode_bis', $kode_bis);
            $this->db->update('bis');

            $this->session->set_flashdata('message', '<div class="alert alert-success">Data Bus Berhasil Di Update Min!</div>');
            redirect('admin/daftarbus');
        }
    }

    public function hapusBus($id)
    {
        $this->M_abtb->hapuswkwk($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Terhapus</div>');
        redirect('admin/daftarbus');
    }


    // function ngendaliin user
    public function hapususer($id)
    {
        $where = ['id_user' => $id];
        $this->M_abtb->delete_data($where, 'user');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Terhapus</div>');
        redirect('admin/datauser');
    }

    public function detailuser($id)
    {
        $data['judul'] = 'Detail';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['anggota'] = $this->db->get_where('user', ['id_user' => $id])->row_array();

        $this->load->view('tamplate/header_user',$data);
        $this->load->view('tamplate/sidebar_admin',$data);
        $this->load->view('tamplate/topbar_user');
        $this->load->view('admin/detailuser',$data);
        $this->load->view('tamplate/footer_user');
    }

    public function datauser()
    {
        $data['judul'] = 'Data Pengguna';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['anggota'] = $this->M_abtb->get_data('user')->result();
        

        $this->load->view('tamplate/header_user',$data);
        $this->load->view('tamplate/sidebar_admin',$data);
        $this->load->view('tamplate/topbar_user');
        $this->load->view('admin/datauser',$data);
        $this->load->view('tamplate/footer_user');
    }

    public function edit_profil()
    {
        $data['judul'] = 'Edit Profil';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('password', 'Password Baru', 'min_length[8]',[
            'min_length' => 'Minimal 8 Karakter'
        ]);
        $this->form_validation->set_rules('notelp', 'Nomor Telepon', 'numeric');

        if ($this->form_validation->run() == false) {
            $this->load->view('tamplate/header_user',$data);
            $this->load->view('tamplate/sidebar_admin',$data);
            $this->load->view('tamplate/topbar_user');
            $this->load->view('admin/profil',$data);
            $this->load->view('tamplate/footer_user');
        }else {
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

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profil Berhasil Di Update Min!</div>');
			redirect('admin');
        }
    }

    public function datatransaksi()
    {
        $data['judul'] = 'Data Transaksi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['transaksi'] = $this->M_abtb->get_data('transaksi')->result();

        $this->load->view('tamplate/header_user',$data);
        $this->load->view('tamplate/sidebar_admin',$data);
        $this->load->view('tamplate/topbar_user');
        $this->load->view('admin/datatransaksi',$data);
        $this->load->view('tamplate/footer_user');
    }
}

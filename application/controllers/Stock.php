<?php
class Stock extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Stock_model');
        $this->load->model('kategori_model');
        $this->load->model('Report_model');
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
    }


    function index()
    {
        $data['title'] = 'Stock';
        $data['icon'] = 'bx bx-package';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['barang'] = $this->Stock_model->get();
        $data['kategori'] = $this->kategori_model->get();
        $data['stok_rendah'] = $this->Stock_model->getJumlahBarangTerendah();
        $data['total'] = $this->Stock_model->getTotalBarang();
        $this->load->view('layout/header', $data);
        $this->load->view('stock//index', $data);
        $this->load->view('layout/footer');
    }


    function edit($id)
    {
        $data['title'] = 'Stock';
        $data['icon'] = 'bx bx-package';
        $data['Stock'] = $this->Stock_model->getById($id);
        $this->load->view('layout/header');
        $this->load->view('stock/edit');
        $this->load->view('layout/footer');
    }
    public function tambahStock()
    {
        $id = $this->input->post('id');
        $tambahStok = $this->input->post('amount');
        $jumlahStok = $this->Stock_model->getStokBarangById($id);
        $hasilTambah = $jumlahStok + $tambahStok;
        
        $harga = $this->Stock_model->getHargaBarangById($id);
        $pengeluaran = $harga * $tambahStok;
        $data = [
            'tanggal' => $this->input->post('tanggal'),
            'jenis' => "pengeluaran",
            'jumlah' => $pengeluaran
        ];
        $pemasukan = $this->Report_model->getTotalPemasukan();
        $pengeluaran_all = $this->Report_model->getTotalPengeluaran();
        $kas = $pemasukan - $pengeluaran_all;
        if ($kas > $pengeluaran) {
            $this->Stock_model->updateJumlahStokById($id, $hasilTambah);
            $this->Report_model->insertPengeluaran($data);
            $this->session->set_flashdata('status', 'Tambah stock berhasil');
        } else {
            $this->session->set_flashdata('stat', 'Uang Kas Tidak Cukup');
        }
        redirect('Stock');
    }

    function editStock()
    {
        $config['upload_path'] = './dist/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar')) {
            $upload_data = $this->upload->data();
            $gambar = $upload_data['file_name'];
        } else {
            $id = $this->input->post('id');
            $gambar = $this->Stock_model->get_image_by_id($id);
        }

        $data = [
            'nama_barang' => $this->input->post('name'),
            'gambar' => $gambar,
            'deskripsi' => $this->input->post('description'),
            'stok' => $this->input->post('amount'),
            'satuan' => $this->input->post('satuan'),
            'harga' => $this->input->post('price'),
            'id_kategori' => $this->input->post('category')
        ];
        $id = $this->input->post('id');
        $this->Stock_model->update(['id_barang' => $id], $data);
        $this->session->set_flashdata('status', 'Update barang berhasil');
        redirect('Stock');
    }

    public function insertStock()
    {
        $config['upload_path'] = './dist/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';

        $this->load->library('upload', $config);

        $defaultImage = '1.png';
        $gambar = $defaultImage;

        if ($this->upload->do_upload('gambar')) {
            $upload_data = $this->upload->data();
            $gambar = $upload_data['file_name'];
        } else {
            $error = array('error' => $this->upload->display_errors());
            print_r($error);
        }

        $barang = [
            'nama_barang' => $this->input->post('name'),
            'gambar' => $gambar,
            'deskripsi' => $this->input->post('description'),
            'stok' => $this->input->post('amount'),
            'satuan' => $this->input->post('satuan'),
            'id_kategori' => $this->input->post('category'),
            'harga' => $this->input->post('price'),
        ];

        $this->Stock_model->insert($barang);
        $this->session->set_flashdata('status', 'Insert barang berhasil');
        redirect('Stock');
    }

    public function deleteStock()
    {
        $id_barang = $this->input->post('id_barang');
        if (!empty($id_barang)) {
            $this->Stock_model->delete($id_barang);
            $error = $this->db->error();
            if ($error['code'] != 0) {
                $this->session->set_flashdata('status', 'Cancel request client terlebih dahulu');
            } else {
                $this->session->set_flashdata('status', 'Barang Selected Data Deleted');
            }
        }
        redirect('Stock');
    }

    public function deleteAll()
    {
        $checked_ids = $this->input->get('ids');

        if (!empty($checked_ids)) {
            $checked_id_array = explode(',', $checked_ids);
            $this->Stock_model->deleteSelected($checked_id_array);
            $error = $this->db->error();
            if ($error['code'] != 0) {
                $this->session->set_flashdata('status', 'Cancel request client terlebih dahulu');
            } else {
                $this->session->set_flashdata('status', 'Barang Selected Data Deleted');
            }
        } else {
            $this->session->set_flashdata('status', 'Select at least any ID');
        }
        redirect('Stock');
    }
}
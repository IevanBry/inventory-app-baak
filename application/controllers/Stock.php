<?php


class Stock extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Stock_model');
        $this->load->model('kategori_model');
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


    function edit()
    {
        $data['title'] = 'Stock';
        $data['icon'] = 'bx bx-package';
        $this->load->view('layout/header', $data);
        $this->load->view('stock/edit');
        $this->load->view('layout/footer');
    }

    function editStock()
    {

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
        redirect('Stock');
    }

    public function deleteStock()
    {
        $id_barang = $this->input->post('id_barang');

        // $image_path = FCPATH . 'path/to/images/' . $filename;

        // if (file_exists($image_path)) {
        //     unlink($image_path);
        // }

        if (!empty($id_barang)) {
            $this->Stock_model->delete($id_barang);
        }

        redirect('Stock');
    }

    public function deleteAll()
    {
        if(!empty($this->input->post('checkbox_value')))
        {
            $checkedBarang = $this->input->post('checkbox_value');
            $checked_id = [];
            foreach ($checkedBarang as $row) {
                array_push($checked_id, $row);
            }
            $this->Stock_model->deleteSelected($checked_id);
            $this->session->set_flashdata('status','Barang Selected Data Deleted');
            redirect('stock');

        } else {
            $this->session->set_flashdata('status','Select atleast any ID');
            redirect('stock');
        }
    }

}
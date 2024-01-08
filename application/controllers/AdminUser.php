<?php
class AdminUser extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
    }


    function index()
    {
        $data['title'] = 'User';
        $data['icon'] = 'bx bx-user';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user_list'] = $this->User_model->get();
        $this->load->view('layout/header', $data);
        $this->load->view('dashboard//user', $data);
        $this->load->view('layout/footer');
    }


    function edit($id)
    {
        $data['title'] = 'User';
        $data['icon'] = 'bx bx-user';
        $data['nama'] = $this->User_model->getById($id);
        $this->load->view('layout/header', $data);
        $this->load->view('AdminUser/edit');
        $this->load->view('layout/footer');
    }

    function editUser()
    {
        $data = [
            'nama' => htmlspecialchars($this->input->post('name', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'role' => "User",
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
        ];
        $id = $this->input->post('id');
        $this->User_model->update(['id_user' => $id], $data);
        redirect('AdminUser');
    }
    public function insertUser()
    {
        $this->form_validation->set_rules('nama', 'name', 'required|trim', [
            'required' => 'Nama Wajib Di Isi'
        ]);
        $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => '<span class="text-red-500">Email Ini Sudah Terdaftar</span>',
            'valid_email' => '<span class="text-red-500">Email Harus Valid</span>',
            'required' => '<span class="text-red-500">Email Wajib Di Isi</span>'
        ]);
        $this->form_validation->set_rules('password', 'password', 'required|trim|min_length[5]', [
            'min_length' => '<span class="text-red-500">Password Terlalu Pendek</span>',
            'required' => '<span class="text-red-500">Password Wajib Di Isi</span>'
        ]);
        $data = [
            'nama' => htmlspecialchars($this->input->post('name', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'role' => "User",
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
        ];
        $this->User_model->insert($data);
        redirect('AdminUser');
    }

    public function deleteUser()
    {
        $id_user = $this->input->post('id_user');

        if (!empty($id_user)) {
            $this->User_model->delete($id_user);
        }

        redirect('AdminUser');
    }
    public function deleteAll()
    {
        $checked_ids = $this->input->get('ids');

        if (!empty($checked_ids)) {
            $checked_id_array = explode(',', $checked_ids);
            $this->User_model->deleteSelected($checked_id_array);
            $this->session->set_flashdata('status', 'User Selected Data Deleted');
        } else {
            $this->session->set_flashdata('status', 'Select at least any ID');
        }
        redirect('AdminUser');
    }
}
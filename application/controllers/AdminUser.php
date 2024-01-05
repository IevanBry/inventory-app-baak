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
            'nama' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'role' => $this->input->post('role'),
            'password' => $this->input->post('password')
        ];
        $id = $this->input->post('id');
        $this->User_model->update(['id_user' => $id], $data);
        redirect('AdminUser');
    }
    public function insertUser()
    {
        $data = [
            'nama' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'role' => $this->input->post('role'),
            'password' => $this->input->post('password')
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
        if (!empty($this->input->post('checkbox_value'))) {
            $checkedUser = $this->input->post('checkbox_value');
            $checked_id = [];
            foreach ($checkedUser as $row) {
                array_push($checked_id, $row);
            }
            $this->User_model->deleteSelected($checked_id);
            $this->session->set_flashdata('status', 'User Selected Data Deleted');
            redirect('AdminUser');

        } else {
            $this->session->set_flashdata('status', 'Select atleast any ID');
            redirect('AdminUser');
        }
    }

}
<?php
class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model', 'userrole');
    }
    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('BaseController');
        }
        $this->form_validation->set_rules('email','Email','trim|required|valid_email',[
            'valid_email'=>'<span class="text-red-500">Email Harus Valid</span>',
            'required'=>'<span class="text-red-500">Email Wajib Di Isi</span>'
        ]);
        $this->form_validation->set_rules('password','Password','trim|required',[
            'required'=>'<span class="text-red-500">Password Wajib Di Isi</span>'
        ]);
        if ($this->form_validation->run() == FALSE) {
        $this->load->view("layout/auth_header");
        $this->load->view("auth/login");
        $this->load->view("layout/auth_footer");
        } else {
            $this->cek_login();
        }
    }
    public function register()
    {
        if ($this->session->userdata('email')) {
            redirect('BaseController');
        }
        $this->form_validation->set_rules('nama','Nama','required|trim',[
            'required'=> 'Nama Wajib Di Isi'
        ]);
        $this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[user.email]',[
            'is_unique'=>'<span class="text-red-500">Email Ini Sudah Terdaftar</span>',
            'valid_email'=>'<span class="text-red-500">Email Harus Valid</span>',
            'required'=>'<span class="text-red-500">Email Wajib Di Isi</span>'
        ]);
        $this->form_validation->set_rules('password1','Password','required|trim|min_length[5]',[
            'min_length'=>'<span class="text-red-500">Password Terlalu Pendek</span>',
            'required'=>'<span class="text-red-500">Password Wajib Di Isi</span>'
        ]);
        $this->form_validation->set_rules('password2','Password','required|trim|matches[password1]',[
            'required'=> '<span class="text-red-500">Password Wajib Di Isi</span>',
            'matches'=> '<span class="text-red-500">Password Tidak Sama</span>'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view("layout/auth_header");
            $this->load->view("auth/register");
            $this->load->view("layout/auth_footer");
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'role' => "User",
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            ];
            $this->userrole->insert($data);
            $this->session->set_flashdata('message', '<div class="p-4 mb-4 flex items-center gap-2 text-sm font-medium text-green-800 rounded-lg bg-green-100" role="alert"><i class="bx bx-check-circle text-xl"></i><span>Akun Berhasil Terdaftar</span>
            </div>');
            redirect('Auth');
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role');
        $this->session->set_flashdata('message', '<div class="p-4 mb-4 flex items-center gap-2 text-sm font-medium text-green-800 rounded-lg bg-green-100" role="alert"><i class="bx bx-check-circle text-xl"></i><span>Berhasil Logout!</span></div>');
        redirect('auth');
    }
    public function cek_login() {   
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->db->get_where('user', ['email'=> $email])->row_array();
        if ($user) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'email' => $user['email'],
                    'role' => $user['role'],
                    'id' => $user['id'],
                ];
                $this->session->set_userdata($data);
                if ($user['role'] == 'Admin') {
                    redirect('BaseController');
                } else {
                    redirect('User');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="p-4 mb-4 text-sm font-medium text-red-600 rounded-lg bg-red-100 flex items-center gap-2" role="alert"><i class="bx bx-error-circle text-xl"></i> <span>Password Salah!</span></div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="p-4 mb-4 text-sm font-medium flex items-center gap-2 text-red-600 rounded-lg bg-red-100" role="alert"><i class="bx bx-error-circle text-xl"></i><span>Email Belum Terdaftar!</span></div>');
                redirect('auth');
        }
    }
    public function blabal() {
        echo " BABABABA";
    }
}

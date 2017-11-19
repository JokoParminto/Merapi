<?php

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Load form helper library
        $this->load->helper('form');
        // Load form validation library
        $this->load->library('form_validation');
        // Load session library
        $this->load->library('session');
        // Load database
        $this->load->model('Data_auth_model');
        // enkripsi data
        $this->load->library('encryption');
    }
    // Show login page
    public function index()
    {
        $this->load->view('/login.php');
    }
    // Check for user login process
    public function user_login_process()
    {
        $data = array(
        'username' => $this->input->post('username'),
        'password' => $this->input->post('password')
        //'password' => $this->encryption->encrypt($this->input->post('password'))
        );
        $result = $this->Data_auth_model->login($data);
        if ($result == true) {
            $username = $this->input->post('username');
            $result = $this->Data_auth_model->read_user_information($username);
            if ($result != false) {
                $session_data = array(
                'username' => $result[0]->username,
                'email' => $result[0]->name,
                'id_user' => $result[0]->id_user,
                'level' => $result[0]->level,
                );
                // Add user data in session
                $this->session->set_userdata('logged_in', $session_data);
                if ($this->session->userdata['logged_in']['level'] == 0) {
                    print_r("ini admin");
                    redirect('dashboard/');
                }else{
                    print_r("silahkan buat halaman user");
                    redirect('dashboard/');
                }
            }
        } else {
            $data = array(
            'error_message' => 'Invalid Username or Password'
            );
            // $this->load->view('auth/', $data);
            redirect('auth/');
        }
        
    }

// Logout from admin page
    public function logout()
    {
        // Removing session data
        $sess_array = array(
        'username' => ''
        );
        $this->session->unset_userdata('logged_in', $sess_array);
        $data['message_display'] = 'Successfully Logout';
        //$this->load->view('/login.php', $data);
        redirect(base_url('auth/'));
        //redirect('/');
    }
}

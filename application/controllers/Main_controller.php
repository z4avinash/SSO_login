<?php

class Main_controller extends CI_Controller
{
    //constructor
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Main_model');
    }

    //clearing all the sessions
    public function clear()
    {
        $this->session->sess_destroy();
    }

    //login page
    public function login()
    {
        $this->load->view('login_view');
    }


    //check the user credential for authorized login
    public function checkUserLogin()
    {
        $this->form_validation->set_rules('username', 'Username: ', 'required');
        $this->form_validation->set_rules('password', 'Password: ', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login_view');
        } else {
            //getting the values of the input fields
            $login_username = $this->security->sanitize_filename($this->input->post('username'));
            $login_password = $this->security->sanitize_filename($this->input->post('password'));

            //check the user present in the database or not
            $returnedUser['user_id'] = $this->Main_model->checkUser($login_username);
            if (!empty($returnedUser['user_id'])) {
                if (!empty(password_verify($login_password, $returnedUser['user_id']['password']))) {
                    $this->session->set_userdata('user_id', $returnedUser['user_id']['user_id']);
                    $this->session->set_userdata('isLoggedIn', true);
                    $formArray['user_id'] = $this->session->userdata['user_id'];

                    //inset the data into table second
                    $this->Main_model->insertid($formArray);

                    //redirect after table insertion
                    redirect("http://10.10.10.141/projects/Avinash/youtube/main_controller/getId/{$this->session->userdata['user_id']}");
                } else {
                    echo "<script>alert('Wrong Username or Password!!')</script>";
                    $this->load->view('login_view');
                }
            }
        }
    }


    //force logout user
    public function forceLogout()
    {
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }
}

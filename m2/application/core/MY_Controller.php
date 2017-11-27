<?php
class MY_Controller extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        // Load session library
        $this->load->library('session');
        $this->load->library('encryption');
        $this->load->helper(array('form', 'url'));
        if (!$this->session->userdata['logged_in']) {
            redirect('ojologino/');
        }
    }
}

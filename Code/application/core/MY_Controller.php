<?php
class MY_Controller extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        // Load session library
        $this->load->library('session');
        $this->load->library('encryption');
        $this->load->helper(array('form', 'url'));
        //$t = 1;
        //while($t<100000000){ 
        //$t++;
        //}
        // $this->output->cache(1);
        if (!$this->session->userdata['logged_in']) {
            redirect('auth/');
        }
    }
}

<?php
class Dashboard extends MY_Controller{
    function __construct()
    {
        parent::__construct();
        
    }

    function index()
    {
        // $t = 1;
        // while($t<100000000){ $t++;}
        $data['_view'] = 'dashboard';
        $this->load->view('layouts/main',$data);
        // $this->output->cache(1);
    }
}

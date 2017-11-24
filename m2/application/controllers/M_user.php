<?php
class M_user extends MY_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_user_model');
    } 

    /*
     * Listing of m_users
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('m_user/index?');
        $config['total_rows'] = $this->M_user_model->get_all_m_users_count();
        $this->pagination->initialize($config);

        $data['m_users'] = $this->M_user_model->get_all_m_users($params);
        
        $data['_view'] = 'm_user/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new m_user
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'password' => $this->input->post('password'),
				'username' => $this->input->post('username'),
				'name' => $this->input->post('name'),
				'level' => $this->input->post('level'),
				'create_at' => $this->input->post('create_at'),
				'updated_at' => $this->input->post('updated_at'),
            );
            
            $m_user_id = $this->M_user_model->add_m_user($params);
            redirect('m_user/index');
        }
        else
        {            
            $data['_view'] = 'm_user/add';
            $this->load->view('layouts/main',$data);
        }
    } 

    /*
     * Deleting m_user
     */
    function remove($id_user)
    {
        $m_user = $this->M_user_model->get_m_user($id_user);

        // check if the m_user exists before trying to delete it
        if(isset($m_user['id_user']))
        {
            $this->M_user_model->delete_m_user($id_user);
            redirect('m_user/index');
        }
        else
            show_error('The m_user you are trying to delete does not exist.');
    }
    
}

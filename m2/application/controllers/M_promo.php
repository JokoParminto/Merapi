<?php
class M_promo extends MY_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_promo_model');
    } 

    /*
     * Listing of m_promo
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('m_promo/index?');
        $config['total_rows'] = $this->M_promo_model->get_all_m_promo_count();
        $this->pagination->initialize($config);

        $data['m_promo'] = $this->M_promo_model->get_all_m_promo($params);
        
        $data['_view'] = 'm_promo/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new m_promo
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('nama_promo','Nama Promo','required');
		$this->form_validation->set_rules('level_promo','Level Promo','required');
		$this->form_validation->set_rules('harga_promo','Harga Promo','required');
		$this->form_validation->set_rules('isi_promo','Isi Promo','required');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'nama_promo' => $this->input->post('nama_promo'),
				'isi_promo' => $this->input->post('isi_promo'),
				'harga_promo' => $this->input->post('harga_promo'),
				'level_promo' => $this->input->post('level_promo'),
            );
            
            $m_promo_id = $this->M_promo_model->add_m_promo($params);
            redirect('m_promo/index');
        }
        else
        {            
            $data['_view'] = 'm_promo/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a m_promo
     */
    function edit()
    {   
        $id_promo = $this->input->post('id_promo');
        // check if the m_promo exists before trying to edit it
        $data['m_promo'] = $this->M_promo_model->get_m_promo($id_promo);
        
        if(isset($data['m_promo']['id_promo']))
        {
            // $this->load->library('form_validation');

			// $this->form_validation->set_rules('nama_promo','Nama Promo','required');
			// $this->form_validation->set_rules('level_promo','Level Promo','required');
			// $this->form_validation->set_rules('harga_promo','Harga Promo','required');
			// $this->form_validation->set_rules('isi_promo','Isi Promo','required');
            //$this->form_validation->run()
			if(TRUE)     
            {   
                $params = array(
					'nama_promo' => $this->input->post('nama_promo'),
					'isi_promo' => $this->input->post('isi_promo'),
					'harga_promo' => $this->input->post('harga_promo'),
					'level_promo' => $this->input->post('level_promo'),
                );

                $update = $this->M_promo_model->update_m_promo($id_promo,$params);
                
                if ($update) {
                    $this->session->set_flashdata('success', 'Berhasil tambah data!');
                } else {
                    $this->session->set_flashdata('error', 'Gagal menambahkan data!');
                }
                //redirect('event_event/index');            
                redirect('m_promo/index');
            }
            else
            {
                $data['_view'] = 'm_promo/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The m_promo you are trying to edit does not exist.');
    } 

    /*
     * Deleting m_promo
     */
    function remove($id_promo)
    {
        $m_promo = $this->M_promo_model->get_m_promo($id_promo);

        // check if the m_promo exists before trying to delete it
        if(isset($m_promo['id_promo']))
        {
            $this->M_promo_model->delete_m_promo($id_promo);
            redirect('m_promo/index');
        }
        else
            show_error('The m_promo you are trying to delete does not exist.');
    }

    /*
     * Editing a event_event
     */
    public function edit_promo_by_id($id) {
        $data = $this->M_promo_model->get_m_promo($id);
        echo json_encode($data);
    }
    
}

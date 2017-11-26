<?php
class M_photo extends MY_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->library('upload');
        $this->load->helper('file');
        $this->load->model('M_photo_model');
        $this->load->library('image_lib');
    } 

    /*
     * Listing of m_photo
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('m_photo/index?');
        $config['total_rows'] = $this->M_photo_model->get_all_m_photo_count();
        $this->pagination->initialize($config);

        $data['m_photo'] = $this->M_photo_model->get_all_m_photo($params);
        for ($i=0; $i < count($data['m_photo']) ; $i++) {
            $data['m_photo'][$i]['file_photo'] = str_replace('.','_thumb.', $data['m_photo'][$i]['file_photo']);
        }
        //print_r($data['m_photo']);
        ////
        //die();
        $data['_view'] = 'm_photo/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new m_photo
     */
    function add()
    {   
        $id_photo = $this->input->post('id_photo');
        $cek_photo = $this->M_photo_model->get_m_photo($id_photo);
        
        $config['upload_path']          = './images/';
        $config['allowed_types']        = 'jpeg|jpg|png|JPEG|JPG|PNG';
        $config['encrypt_name']         = TRUE;
        
        $this->upload->initialize($config);
        $this->load->library('upload', $config);

        $this->upload->do_upload('gambar');
        $namafile = array('upload_data' => $this->upload->data());
        
  
       
        
        $config['image_library'] = 'gd2';
        //$config['source_image'] = './uploads/'.$filename.'.jpg';  #no need to make it static as you are allowing multiple extensions in allowed_types.
        $config['source_image'] = './images/'.$namafile['upload_data']['file_name'];
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = FALSE;
        $config['width']    = 500;
        $config['height']   = 500;
        $config['new_image'] = './images/thumbs/'.$namafile['upload_data']['file_name'];
        $this->load->library('image_lib', $config); 
        
        $this->image_lib->initialize($config);
        $this->image_lib->resize();
        
        
        $params = array(
             'nama_photo' => $this->input->post('nama_photo'),
             'desc_photo' => $this->input->post('desc_photo'),
             'letak_photo' => $this->input->post('letak_photo'),
             'file_photo' => $namafile['upload_data']['file_name'],

        );
        
        if ($cek_photo) {
            $thum = str_replace('.','_thumb.', $cek_photo['file_photo']);
            unlink($config['upload_path'].'/thumbs/'.$thum);
            unlink($config['upload_path'].'/'.$cek_photo['file_photo']);
            $m_photo_update = $this->M_photo_model->update_m_photo($id_photo,$params);
            if ($m_photo_update) {
                $this->session->set_flashdata('success', 'Berhasil update data!');
            } else {
                $this->session->set_flashdata('error', 'Gagal update data!');
            }
            redirect('m_photo/index');
        } else {
            $m_photo_id = $this->M_photo_model->add_m_photo($params); 
            if ($m_photo_id) {
                $this->session->set_flashdata('success', 'Berhasil tambah data!');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan data!');
            }
            redirect('m_photo/index');
        }
    }  

    /*
     * Editing a m_photo
     */
    function edit($id_photo)
    {   
        // check if the m_photo exists before trying to edit it
        $data['m_photo'] = $this->M_photo_model->get_m_photo($id_photo);
        
        if(isset($data['m_photo']['id_photo']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('nama_photo','Nama Photo','required');
			$this->form_validation->set_rules('desc_photo','Desc Photo','required');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'nama_photo' => $this->input->post('nama_photo'),
					'desc_photo' => $this->input->post('desc_photo'),
                );

                $this->M_photo_model->update_m_photo($id_photo,$params);            
                redirect('m_photo/index');
            }
            else
            {
                $data['_view'] = 'm_photo/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The m_photo you are trying to edit does not exist.');
    } 

    /*
     * Deleting m_photo
     */
    function remove($id_photo)
    {
        $m_photo = $this->M_photo_model->get_m_photo($id_photo);
        $config['upload_path']          = './images/';
        $thum = str_replace('.','_thumb.', $m_photo['file_photo']);
        unlink($config['upload_path'].'/thumbs/'.$thum);
        unlink($config['upload_path'].'/'.$m_photo['file_photo']);
        // check if the m_photo exists before trying to delete it
        if(isset($m_photo['id_photo']))
        {
            $this->M_photo_model->delete_m_photo($id_photo);
            redirect('m_photo/index');
        }
        else
            show_error('The m_photo you are trying to delete does not exist.');
    }

    /*
     * Editing a event_event
     */
    public function edit_photo_by_id($id) {
        $data = $this->M_photo_model->get_m_photo($id);
        echo json_encode($data);
    }
    
}

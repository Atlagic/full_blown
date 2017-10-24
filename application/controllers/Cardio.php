<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Home
 *
 * @author Aleksandar
 */
class Cardio extends Frontend_Controller{
    private $data = array();
    public function __construct() {
        parent::__construct();
        $this->data["css_data"][] = link_tag("css/style.css", "stylesheet", "text/css");
        $this->data["css_data"][] = link_tag("https://fonts.googleapis.com/css?family=Righteous", "stylesheet");
        $this->data["css_data"][] = link_tag("css/font-awesome.min.css", "stylesheet", "text/css");
        $this->data["css_data"][] = link_tag("css/jquery.lightbox-0.5.css", "stylesheet", "text/css");
        //$this->data["css_data"][] = link_tag("css/styles.css", "stylesheet", "text/css");
        
        $this->data["meta_data"][] = meta("keywords", "");
        $this->data["meta_data"][] = meta("author", "Aleksandar Atlagić");
        $this->data["meta_data"][] = meta("Content-type", "text/hmtl; charset=utf8", "equiv");
        
        $this->load->model('Menu_model');
        $this->data['menus'] = $this->Menu_model->menu();
        
        $this->load->model('Post_model');
        $this->data['posts'] = $this->Post_model->posts2();
        
        $this->load->model('Comment_model', 'cm');
        $this->data['comm'] = $this->cm->comm2();
    }
    
    public function index()
    {
        $this->load_view('cardio', $this->data);
    }
    
    public function insert_comm(){
        $comm = $this->input->post('comm');
        
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('comm','Comment','required|min_length[3]|max_length[60]');
       
        if( $this->form_validation->run() )
        {
            $this->load->model('Comment_model','cm');
            $insert = array(
                'comment' => $comm,
                'comment_date' => now(),
                'role' => $this->session->userdata('username'),
                'idPost' => 2
            );
            
            
            if ($this->cm->commIns($insert))
            {
                redirect('Cardio');
            }
        }
        else
        {
            $this->session->set_userdata('errors', validation_errors());
            redirect('Cardio');
        }
        
        
    }
}

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
class Gallery extends Frontend_Controller{
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
        
        $this->load->model('Gallery_model');
        $this->data['gallery'] = $this->Gallery_model->gallery();
        
        $this->load->library('pagination');
        
    }
    
    public function index()
    {
        $this->load_view('gallery', $this->data);  
        
        redirect(base_url('Gallery/paging/'));
    }
    public function paging($id = 0)
    {
        $config = array();
        $config['base_url'] = base_url().'Gallery/paging/';
        $config['total_rows'] = $this->Gallery_model->record_count();
        $config['per_page'] = 9; 
        $config["uri_segment"] = 3;
        $config['num_links'] = 2;
        
        $this->data['gallery'] = $this->Gallery_model->fetch_pictures($config['per_page'], $id);
        
        $this->pagination->initialize($config);
        $this->load_view("gallery", $this->data);
    }
     
}

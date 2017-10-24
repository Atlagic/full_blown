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
class About extends Frontend_Controller{
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
        
        $this->load->model('Model_polls', 'mp');
        $rand_poll = array_rand($this->mp->random()) + 1;
        $this->data['polls'] = $this->mp->getPoll($rand_poll);
        
    }
    
    public function index()
    {
        $this->load_view('about', $this->data);
    }
    
    public function insert_vote(){
        $this->load->model('Model_Polls', 'mp');
       
        if($this->input->post('vote'))
        {
             
          
           $voteid = $this->input->post('poll');
           $pollid = $this->input->post('poll_id');
           
           if(empty($voteid) || empty($pollid) ){
               $this->session->set_userdata('poll_error','Nothing selected');
                redirect('About'); 
           }else{
           
            $this->mp->addVote($voteid);
            
            $poll = $this->mp->getPoll($pollid);
            
            $this->session->set_userdata('sess_poll','You have already voted!');
            
            $this->session->set_userdata('poll_text','Thank you for your vote');
                        
            $this->session->set_userdata('poll_info', $poll);
            
            redirect('About'); 
           }
        }
        
    }
}

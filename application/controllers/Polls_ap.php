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
class Polls_ap extends CI_Controller{
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
        
        if($this->session->userdata('role') != 'admin')
        {
            redirect();
        }
    }
    
    public function index()
    {
        $this->load->view('head', $this->data);
        $this->load->view('header');
        $this->load->view('logo');
        $this->load->view('polls_menu');
        $this->load->view('polls_ap');
        $this->load->view('footer');
    }
}

<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Frontend_Controller
 *
 * @author Aleksandar
 */
class Frontend_Controller extends CI_Controller{
    public function __construct() {
        parent::__construct();
    }
    
    public function load_view($view, $vars = array())
    {
        $this->load->view('head', $vars);
        $this->load->view('header', $vars);
        $this->load->view('logo', $vars);
        $this->load->view('menu', $vars);
        $this->load->view($view, $vars);
        $this->load->view('footer', $vars);
    }
}

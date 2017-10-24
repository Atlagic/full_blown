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
class Register extends Frontend_Controller{
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
    }
    
    public function index()
    {
        $this->load_view('register', $this->data);
    }
    
    public function register()
    {
        $button = $this->input->post('btnRegister');
            if( $button )
            {
                echo 'nista';
                $name = $this->input->post('tbName');
                $lastname = $this->input->post('tbLastName');
                $email = $this->input->post('tbEmail');
                $username = $this->input->post('tbUsername');
                $password = $this->input->post('tbPassword');
                $password_conf = $this->input->post('tbPassword2');
                
                $this->load->library('form_validation');
                
                $this->form_validation->set_rules('tbName','Name','required|min_length[3]|max_length[20]|regex_match[/^[A-Z]{1}[a-z]{3,20}$/]');
                $this->form_validation->set_rules('tbLastName','Lastname','required|min_length[3]|max_length[30]|regex_match[/^[A-Z]{1}[a-z]{3,30}$/]');
                $this->form_validation->set_rules('tbEmail','Email','required|min_length[5]|max_length[50]|regex_match[/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/]');
                $this->form_validation->set_rules('tbUsername','Username','required|min_length[3]|max_length[30]|regex_match[/^[A-Z]{1}[a-z]{3,30}$/]');
                $this->form_validation->set_rules('tbPassword','Password','required|min_length[2]|max_length[100]|regex_match[/^[a-zA-Z]\w{3,14}$/]');
                $this->form_validation->set_rules('tbPassword2','Confirm password','required|min_length[2]|max_length[100]|regex_match[/^[a-zA-Z]\w{3,14}$/]');
                
//                $this->form_validation->set_message('required','Field %s is required!');
//                $this->form_validation->set_message('min_length[]','Length of characters in field %s is too short!');
//                $this->form_validation->set_message('max_length[]','Field %s have excess characters!');
//                $this->form_validation->set_message('regex_match[]','Reqular exception problem!');
                
                if( $this->form_validation->run() )
                {
                    $this->load->model('Register_model','rm');
                    
                    $this->rm->name = $name;
                    $this->rm->lastname = $lastname;
                    $this->rm->email = $email;
                    $this->rm->username=$username;
                    $this->rm->password=md5($password);
                    $this->rm->password_conf = $password_conf;
                    
                    $check = $this->rm->reg();
                  
                    
                    if($check)
                    {
                        $this->load->model('Register_model','rm');
                        
                        $this->rm->name = $name;
                        $this->rm->lastname = $lastname;
                        $this->rm->email = $email;
                        $this->rm->username=$username;
                        $this->rm->password=md5($password);
                        $this->rm->password_conf = $password_conf;
                        
                        $check = $this->rm->regDbInsert();
                        if($check)
                        {
                            redirect('Login');
                        }
                        else
                        {
                            echo $check;
                        }
                        
                    }
                    else 
                    { 
                        echo 'ne';
                        $this->session->set_userdata('errors','You are not registred!');
                        redirect('Register');
                       
                    }
                }
                else
                {
                    $this->session->set_userdata('errors', validation_errors());
                    redirect('Register');
                }
           }
    }
}
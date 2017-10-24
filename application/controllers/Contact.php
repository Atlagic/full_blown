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
class Contact extends Frontend_Controller{
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
        $this->load->helper('form');
        $this->load_view('contact', $this->data);
    }
    
    public function contact()
    {
        $button = $this->input->post('btnContact');
            if( $button )
            {
                $name = $this->input->post('tbName');
                $lastname = $this->input->post('tbLastName');
                $email = $this->input->post('tbEmail');
                $message = $this->input->post('txtaContact');
                
                $this->load->library('form_validation');
                
                $this->form_validation->set_rules('tbName','Name','required|min_length[3]|max_length[20]|regex_match[/^[A-Z]{1}[a-z]{3,20}$/]');
                $this->form_validation->set_rules('tbLastName','Lastname','required|min_length[3]|max_length[30]|regex_match[/^[A-Z]{1}[a-z]{3,30}$/]');
                $this->form_validation->set_rules('tbEmail','Email','required|min_length[5]|max_length[50]|regex_match[/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/]');
                $this->form_validation->set_rules('txtaContact','Message','required|min_length[5]|max_length[100]|regex_match[/^[A-Z]{1}[a-z]{3,100}$/]');
                
                if( $this->form_validation->run() )
                {
                    $this->load->model('Contact_model','cm');
                    
                    $this->cm->name = $name;
                    $this->cm->lastname = $lastname;
                    $this->cm->email = $email;
                    $this->cm->message = $message;
                    
                    $check = $this->cm->cont();
                   
                    if($check)
                    {
                        $this->load->library('email');
                        
                        $config['protocol'] = 'sendmail';
                        $config['mailpath'] = '/usr/sbin/sendmail';
                        $config['charset'] = 'utf8-unicode_ci';
                        $config['wordwrap'] = TRUE;

                        $this->email->initialize($config);
                        //echo "Message is sent!";
                        $from_email = $this->input->post('tbEmail');
                        $subject = 'Message';
                        $message = $this->input->post('txtaContact');
                        $to_email = 'aleksandar.atlagic.93.14@ict.edu.rs';
                        
                        $this->email->from($from_email, 'Blog');
                        $this->email->to($to_email);
                        $this->email->subject($subject);
                        $this->email->message($message);
                        return $this->email->send();
                        
//                        $this->email->from($from_email, 'Fitness');
//                        $this->email->to('aleksandar.atlagic.93.14@ict.edu.rs');
//                        $this->email->subject($subject);
//                        $this->email->message($message);
//                        $this->email->send(); 
//                        $this->session->set_flashdata('message','<div class="errors">Message is sent!</div>');
//                        redirect('home');
                        
                    }
                    else 
                    { 
                        $this->session->set_userdata('errors','You must login to send us a message!');
                        redirect('Contact');
                       
                    }
                }
                else
                {
                    $this->session->set_userdata('errors', validation_errors());
                    redirect('Contact');
                }
           }
    }
}
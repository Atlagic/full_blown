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
class Pages_ap extends CI_Controller{
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
        
        $this->load->model('Pages_model');
        $this->data['page'] = $this->Pages_model->list_page();
        $this->data['edit'] = false;
        
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
        $this->load->view('pages_menu');
        $this->load->view('pages_ap');
        $this->load->view('footer');
    }
    
    public function add()
    {
      $button = $this->input->post('btnInsert');
      if( $button ){
      $type='users';
      $name = $this->input->post('tbName');
      $title = $this->input->post('tbTitle');
      $data['check'] = true;
      
      $this->load->library('form_validation');
      
      $this->form_validation->set_rules('tbName','Name');
      $this->form_validation->set_rules('tbTitle','Title');

      
      
      
      
      
      if($this->form_validation->run()){
          
            $type='users';
            $this->load->model('Users_model','um');            
            $this->um->name = $name;
            $this->um->title = $title;
            
            $insert = array(
                'page_name' => $name,
                'page_title' => $title,
   
            );
 
            if($this->Pages_model->add($insert,$type)){
             $this->session->set_flashdata('poruka', 'Successfully');
             redirect('Pages_ap');
            }
            else{
            $this->session->set_flashdata('poruka', 'Error');
            redirect('Pages_ap');
            }
        }else
        {
            $this->session->set_userdata('errors', validation_errors());
            redirect('pages_ap');
        }
      }
    }
    public function delete($id)
    {
      $delete = array('page_id' => $id);
      if($this->Pages_model->delete($delete)){
         $this->session->set_flashdata('poruka', 'Successfully');
      }else{
        $this->session->set_flashdata('poruka', 'Error');
      }
      redirect('Pages_ap');
    }
    
    public function edit($id)
    {
     
    }
    
    public function update($id, $edit = false)
    {
        if($edit) {
            $this->data['user_detail'] = $this->Pages_model->get($id);
            $this->data['role'] = $this->Pages_model->getRole();
            $this->data['edit'] = true;
            $this->load->view('head', $this->data);
            $this->load->view('header');
            $this->load->view('logo');
            $this->load->view('posts_menu');
            $this->load->view('pages_ap', $this->data);
            $this->load->view('footer');
            return;
        }

        $is_post = $this->input->server('REQUEST_METHOD') == 'POST';
            
        $name = $this->input->post('tbName');
        $lastname = $this->input->post('tbTitle');
        
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('tbName','Name');
        $this->form_validation->set_rules('tbTitle','Title');

        if($is_post){
            

            $update = array(
                'page_name' => $name,
                'page_title' => $lastname,

            );             

            if($this->Pages_model->update($update,$id)){
             $this->session->set_flashdata('poruka', 'Successfully');
             redirect('pages_ap');
            }else{
            $this->session->set_flashdata('poruka', 'Error');
            redirect('pages_ap');
            }
            }else{
            redirect('pages_ap');
            }

}
}

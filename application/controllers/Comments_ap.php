<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Comments_ap
 *
 * @author Aleksandar
 */
class Comments_ap extends CI_Controller{
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
        $this->load->model('Comments_model');
        $this->data['comm'] = $this->Comments_model->list_comm();
        $this->data['edit'] = false;
        
        if($this->session->userdata('role') != 'admin')
        {
            redirect();
        }
         $this->load->library('form_validation');
    }
    
    public function index()
    {
        $this->load->view('head', $this->data);
        $this->load->view('header');
        $this->load->view('logo');
        $this->load->view('posts_menu');
        $this->load->view('comments_ap');
        $this->load->view('footer');
    }
    
    public function add()
  {
        $button = $this->input->post('btnInsert');
        if( $button ){
        $comment = $this->input->post('tbComment');
        $date = $this->input->post('tbDate');
        $role = $this->input->post('tbRole');
        $post = $this->input->post('tbPost');
        
        $this->load->library('form_validation');
        
        $is_post = $this->input->server('REQUEST_METHOD') == 'POST';
        $this->form_validation->set_rules('tbComment','Comment','trim|required|');
        $this->form_validation->set_rules('tbDate','Date','trim|required|');
        $this->form_validation->set_rules('tbRole','Role','trim|required|');
        $this->form_validation->set_rules('tbPost','Post','trim|required|');
      
      if($this->form_validation->run()){
            
            $type='users';
            $this->load->model('Comments_model');            
            $this->Comments_model->comment = $comment;
            $this->Comments_model->date = $date;
            $this->Comments_model->role = $role;
            $this->Comments_model->post=$post;
              
            $insert = array(
                'comment' => $comment,
                'comment_date' => $date,
                'role' => $role,
                'idPost' => $post
               
            );
       
           if($this->Comments_model->add($insert)){
             $this->session->set_flashdata('poruka', 'Successfully');
             redirect('Comments_ap');
            }else{
            $this->session->set_flashdata('poruka', 'Error');
            redirect('Comments_ap');
            }
      }else
        {
            $this->session->set_userdata('errors', validation_errors());
            redirect('Comments_ap');
        }
      }
    
  }
    public function update($id, $edit = false)
    {
        if($edit) {
            $this->data['post_detail'] = $this->Comments_model->get($id);
            $this->data['edit'] = true;
            $this->load->view('head', $this->data);
            $this->load->view('header');
            $this->load->view('logo');
            $this->load->view('posts_menu');
            $this->load->view('comments_ap', $this->data);
            $this->load->view('footer');
            return;
        }

        $is_post = $this->input->server('REQUEST_METHOD') == 'POST';
        $comment = $this->input->post('tbComment');
        $date = $this->input->post('tbDate');
        $role = $this->input->post('tbRole');
        $post = $this->input->post('tbPost');
         
        if($is_post){
          $update = array(
            'comment' => $comment,
            'comment_date' => $date,
            'role' => $role,
            'idPost' => $post
        );           

            if($this->Comments_model->update($update,$id)){
             $this->session->set_flashdata('poruka', 'Successfully');
             redirect('Comments_ap');
            }else{
            $this->session->set_flashdata('poruka', 'Error');
           redirect('Comments_ap');
            }
            }else{
            redirect('Comments_ap');
            }
    }
    public function delete($id)
    {
      $delete = array('comment_id' => $id);
      if($this->Comments_model->delete($delete)){
         $this->session->set_flashdata('poruka', 'Successfully');
      }else{
        $this->session->set_flashdata('poruka', 'Error');
      }
      redirect('Comments_ap');
    }
}

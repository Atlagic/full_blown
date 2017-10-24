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
class Posts_ap extends CI_Controller{
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
        $this->load->model('Post_model');
        $this->data['posts'] = $this->Post_model->list_posts();
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
        $this->load->view('posts_ap');
        $this->load->view('footer');
    }
    
    public function add()
  {
      $is_post = $this->input->server('REQUEST_METHOD') == 'POST';
      $this->form_validation->set_rules('tbName','Name','trim|required|min_length[5]');
      $this->form_validation->set_rules('tbTitle1','Title1','trim|required|min_length[8]');
      $this->form_validation->set_rules('tbTitle2','Title2','trim|required|valid_email');
      
      if($is_post){
            $name = $this->input->post('tbName');
            $title1 = $this->input->post('tbTitle1');
            $title2 = $this->input->post('tbTitle2');
            $dir_velike = "pictures/";
            $ime_fajla = $_FILES['tbPicture']['name'];
            $tmp_fajla = $_FILES['tbPicture']['tmp_name'];
            $tip_fajla = $_FILES['tbPicture']['type'];
            $putanja_slike = $dir_velike.$ime_fajla;
            if($tip_fajla == "image/jpg" || $tip_fajla == "image/jpeg" || $tip_fajla == "image/png"){
            move_uploaded_file($tmp_fajla, $putanja_slike);}
            $insert = array(
                'post_name' => $name,
                'post_title1' => $title1,
                'post_title2' => $title2,
                'post_pic' => $putanja_slike
            );
            if($this->Post_model->add($insert)){
             $this->session->set_flashdata('poruka', 'Successfully');
             redirect('Posts_ap');
            }else{
            $this->session->set_flashdata('poruka', 'Error');
            redirect('Posts_ap');
            }
            }else{
            $this->session->set_flashdata('poruka', 'Error!!!!');
            redirect('Posts_ap');
      }
    }
    
    public function update($id, $edit = false)
    {
        if($edit) {
            $this->data['post_detail'] = $this->Post_model->get($id);
            $this->data['edit'] = true;
            $this->load->view('head', $this->data);
            $this->load->view('header');
            $this->load->view('logo');
            $this->load->view('posts_menu');
            $this->load->view('posts_ap', $this->data);
            $this->load->view('footer');
            return;
        }

        $is_post = $this->input->server('REQUEST_METHOD') == 'POST';
        $name = $this->input->post('tbName');
        $title1 = $this->input->post('tbTitle1');
        $title2 = $this->input->post('tbTitle2');
        $dir_velike = "pictures/";
        $ime_fajla = $_FILES['tbPicture']['name'];
        $tmp_fajla = $_FILES['tbPicture']['tmp_name'];
        $tip_fajla = $_FILES['tbPicture']['type'];
        $putanja_slike = $dir_velike.$ime_fajla;
        if($tip_fajla == "image/jpg" || $tip_fajla == "image/jpeg" || $tip_fajla == "image/png"){
        move_uploaded_file($tmp_fajla, $putanja_slike);}
       
        
        if($is_post){
          $update = array(
            'post_name' => $name,
            'post_title1' => $title1,
            'post_title1' => $title2,
            'post_pic' => $putanja_slike
        );           

            if($this->Post_model->update($update,$id)){
             $this->session->set_flashdata('poruka', 'Successfully');
             redirect('Posts_ap');
            }else{
            $this->session->set_flashdata('poruka', 'Error');
           redirect('Posts_ap');
            }
            }else{
            redirect('Posts_ap');
            }
    }
    public function delete($id)
    {
      $delete = array('post_id' => $id);
      if($this->Post_model->delete($delete)){
         $this->session->set_flashdata('poruka', 'Successfully');
      }else{
        $this->session->set_flashdata('poruka', 'Error');
      }
      redirect('Posts_ap');
    }
}

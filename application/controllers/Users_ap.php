<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Users_ap
 *
 * @author Aleksandar
 */
class Users_ap extends CI_Controller{
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
        
        $this->load->model('Users_model');
        $this->data['user'] = $this->Users_model->list_users();
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
        $this->load->view('users_ap');
        $this->load->view('footer');    
    }
    
    public function add()
    {
      $button = $this->input->post('btnInsert');
      if( $button ){
      $type='users';
      $name = $this->input->post('tbName');
      $lastname = $this->input->post('tbLastName');
      $email = $this->input->post('tbEmail');
      $username = $this->input->post('tbUsername');
      $password = $this->input->post('tbPassword');
      $role = $this->input->post('tbIdRole');
      $str = md5($password);
      $data['check'] = true;
      
      $this->load->library('form_validation');
      
      $this->form_validation->set_rules('tbName','Name','trim|required|min_length[5]');
      $this->form_validation->set_rules('tbLastName','Lastname','trim|required|min_length[5]');
      $this->form_validation->set_rules('tbEmail','Email','trim|required|min_length[5]');
      $this->form_validation->set_rules('tbUsername','Username','trim|required|min_length[5]');
      $this->form_validation->set_rules('tbPassword','Password','trim|required|min_length[8]');
      
      
      
      
      
      if($this->form_validation->run()){
          
            $type='users';
            $this->load->model('Users_model','um');            
            $this->um->name = $name;
            $this->um->lastname = $lastname;
            $this->um->email = $email;
            $this->um->username=$username;
            $this->um->password=md5($password);
            $str = md5($password);
            
            $insert = array(
                'name' => $name,
                'lastname' => $lastname,
                'email' => $email,
                'username' => $username,
                'password' => $str,
                'idRole' => 2,
            );
            
            if($this->Users_model->check_user($username)){
                $this->session->set_flashdata('poruka', 'Username already taken.');
                redirect('Users_ap');
            }
            
            
            if($this->Users_model->add($insert,$type)){
             $this->session->set_flashdata('poruka', 'Successfully');
             redirect('Users_ap');
            }
            else{
            $this->session->set_flashdata('poruka', 'Error');
            redirect('Users_ap');
            }
        }else
        {
            $this->session->set_userdata('errors', validation_errors());
            redirect('users_ap');
        }
      }
    }
    public function delete($id)
    {
      $delete = array('idUser' => $id);
      if($this->Users_model->delete($delete)){
         $this->session->set_flashdata('poruka', 'Successfully');
      }else{
        $this->session->set_flashdata('poruka', 'Error');
      }
      redirect('Users_ap');
    }
    
    public function edit($id)
    {
     
    }
    
    public function update($id, $edit = false)
    {
        if($edit) {
            $this->data['user_detail'] = $this->Users_model->get($id);
            $this->data['role'] = $this->Users_model->getRole();
            $this->data['edit'] = true;
            $this->load->view('head', $this->data);
            $this->load->view('header');
            $this->load->view('logo');
            $this->load->view('posts_menu');
            $this->load->view('users_ap', $this->data);
            $this->load->view('footer');
            return;
        }

        $is_post = $this->input->server('REQUEST_METHOD') == 'POST';
            
        $name = $this->input->post('tbName');
        $lastname = $this->input->post('tbLastName');
        $email = $this->input->post('tbEmail');
        $username = $this->input->post('tbUsername');
        $password = $this->input->post('tbPassword');
        $role = $this->input->post('tbRole');
        $str = md5($password);
        $this->form_validation->set_rules('tbName','Name','trim|required|min_length[5]');
        $this->form_validation->set_rules('tbLastName','Lastname','trim|required|min_length[5]');
        $this->form_validation->set_rules('tbEmail','Email','trim|required|min_length[5]');
        $this->form_validation->set_rules('tbUsername','Username','trim|required|min_length[5]');
        $this->form_validation->set_rules('tbPassword','Password','trim|required|min_length[8]');
        if($is_post){
            

            $update = array(
                'name' => $name,
                'lastname' => $lastname,
                'email' => $email,
                'username' => $username,
                'password' => $str,
                'idRole' => $role,
            );             

            if($this->Users_model->update($update,$id)){
             $this->session->set_flashdata('poruka', 'Successfully');
             redirect('users_ap');
            }else{
            $this->session->set_flashdata('poruka', 'Error');
            redirect('users_ap');
            }
            }else{
            redirect('users_ap');
            }

}

}   
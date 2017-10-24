<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pic
 *
 * @author Aleksandar
 */
class Pic extends CI_Controller
{
   public function __construct() 
   {
        parent::__construct();
            $this->load->library('image_lib');
   }
   
   public function index()
   {
        $this->load->view('pic', array('eroor' => ''));
   }
   
   public function upload()
    {
        
        $config['upload_path'] = './images/photos/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        //$config['max_size'] = 600;
        //$config['max_width'] = 600;
        //$config['max_height'] = 600;
        
        $this->load->library('upload', $config);
        
        if( !$this->upload->do_upload('file'))
        {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('pic', $error);
        }
        else
        {           
            $data = array('pic' => $this->upload->data()); 
            
            $this->resize($data['pic']['full_path'], $data['pic']['file_name']);                
        }
    }
    
    public function resize($path, $file)
    {
        $config['image_library'] = 'gd2';
        $config['source_image']	= $path;
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = 200;
        $config['height'] = 200;
        $config['new_image'] = './images/'.$file;

        $this->image_lib->initialize($config);
        $this->image_lib->resize();

   }
}

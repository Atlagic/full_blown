<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Post_model
 *
 * @author Aleksandar
 */
class Post_model extends CI_Model{
    
    private $post_id;
    private $post_pic;
    private $post_name;
    private $post_title1;
    private $post_title2;
    
    public function __construct() {
        parent::__construct();
        
        $this->load->database();
        
    }
    
    public function posts()
    {
        $query = sprintf("SELECT * FROM posts WHERE post_id = 1");
        $res = $this->db->query($query)->result();
        return $res;
    }
    
    public function posts2()
    {
        $query = sprintf("SELECT * FROM posts WHERE post_id = 2");
        $res = $this->db->query($query)->result();
        return $res;
    }
    
    public function posts3()
    {
        $query = sprintf("SELECT * FROM posts WHERE post_id = 3");
        $res = $this->db->query($query)->result();
        return $res;
    }
    
    function list_posts()
    {
        $query = "SELECT * FROM posts";  
        return $res = $this->db->query($query)->result_array();
    }
    
     public function add($data)
    {
        return $query=$this->db->insert('posts', $data);
    }
    public function update($data, $id)
    {
        $this->db->where('post_id',$id);
        return $this->db->update('posts', $data);
    }
    
     
    public function get($id)
    {
        $this->db->where('post_id', $id);
        return $this->db->get('posts')->result_array();
    }
    
    public function delete($data){
        return $query=$this->db->delete('posts', $data);
    }
}

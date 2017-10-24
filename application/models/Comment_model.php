<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Comment_model
 *
 * @author Aleksandar
 */
class Comment_model extends CI_Model{
    public $comm;
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function commIns($data)
    {
        return $this->db->insert('comments', $data);
    }
    public function comm()
    {
        $query = "SELECT * FROM comments WHERE idPost = 1";
        return $res = $this->db->query($query)->result();
    }
    public function comm2()
    {
        $query = "SELECT * FROM comments WHERE idPost = 2";
        return $res = $this->db->query($query)->result();
    }
    public function comm3()
    {
        $query = "SELECT * FROM comments WHERE idPost = 3";
        return $res = $this->db->query($query)->result();
    }
   
}

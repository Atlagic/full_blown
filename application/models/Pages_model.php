<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pages_model
 *
 * @author Aleksandar
 */
class Pages_model extends CI_Model{
    public $name;
    public $title;
    
    public function __construct() 
    {
        parent::__construct();
        $this->load->database();
    }
    function list_page()
    {
        $query = "SELECT * FROM pages";
            
        return $res = $this->db->query($query)->result_array();
    }
    
    
//    function check(){            
//        $query = "SELECT * FROM users JOIN rols ON rols.idRole = users.idRole WHERE username = '".$this->username."' AND password = '".$this->password."'";
//            
//        return $res = $this->db->query($query)->result_array();            
//    }
//    
//    public function check_user($username)
//    {   
//            $this->db->select('*');
//            $this->db->from('users');
//            $this->db->join('rols','rols.idRole=users.idRole');
//            $this->db->where('username',$username);
//            $query = $this->db->get();
//            return $query->result_array();
//    }
    
    public function add($data, $type)
    {
        if ($type == 'users') {
            return $query=$this->db->insert('pages', $data);
        } 
    }
    
    public function delete($data){
        return $query=$this->db->delete('pages', $data);
    }
    
    public function get($id)
    {
        $this->db->where('page_id', $id);
        return $this->db->get('pages')->result_array();
    }
    
    public function update($data, $id)
    {
        $this->db->where('page_id',$id);
        return $this->db->update('pages', $data);
    }
    
    public function getRole()
    {
        $query = $this->db->get('rols');
        return $query->result_array();
    }
}

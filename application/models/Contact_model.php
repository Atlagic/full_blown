<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Contact_model
 *
 * @author Aleksandar
 */
class Contact_model extends CI_Model{
    
    public $name;
    public $lastname;
    public $email;
    public $message;
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function cont()
    {
        $query = "SELECT * FROM users WHERE name = '".$this->name."' AND lastname = '".$this->lastname."' AND email = '".$this->email."'";
        return $res = $this->db->query($query);
    }
}

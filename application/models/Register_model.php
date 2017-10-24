<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Register_model
 *
 * @author Aleksandar
 */
class Register_model extends CI_Controller{
    public $name;
    public $lastname;
    public $email;
    public $username;
    public $password;
    public $password_conf;
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function reg()
    {
        $query = "SELECT * FROM users WHERE name = '".$this->name."' AND lastname = '".$this->lastname."' AND email = '".$this->email."' AND username = '".$this->username."' AND password = '".$this->password."' AND confirm = '".$this->password_conf."'";
        return $res = $this->db->query($query);
    }
    
    public function regDbInsert()
    {
        $query = "INSERT INTO users VALUES('','$this->name', '$this->lastname', '$this->email', '$this->username', '$this->password', '$this->password_conf', 2)";
        return $res = $this->db->query($query);
    }
}

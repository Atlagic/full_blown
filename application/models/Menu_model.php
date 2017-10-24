<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Menu_model
 *
 * @author Aleksandar
 */
class Menu_model extends CI_Model{
    private $page_id;
    private $page_name;
    private $page_title;
    
    public function __construct() {
        parent::__construct();
    }
    
    public function menu()
    {
        $query = "SELECT * FROM pages";
        return $this->db->query($query)->result();
    }
}

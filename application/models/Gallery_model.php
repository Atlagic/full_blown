<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Gallery_model
 *
 * @author Aleksandar
 */
class Gallery_model extends CI_Model{
    
    private $picture_id;
    private $picture;
    private $big_picture;
    private $picture_title;
    
    public function __construct() {
        parent::__construct();
    }
    
    public function gallery()
    {
        $query = "SELECT * FROM gallery";
        $res = $this->db->query($query)->result();
        return $res;
    }
    
    public function record_count() {
        return $this->db->count_all("gallery");
    }
    
    public function fetch_pictures($limit, $start) {

        $query = "SELECT * FROM gallery LIMIT $limit, $start";

        return $this->db->get('gallery', $limit, $start)->result();
   }
}

<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Gallery
 *
 * @author Aleksandar
 */
class Pagination extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    
//    public function record_count() {
//        return $this->db->count_all("gallery");
//    }
//    
//    public function fetch_pictures($limit, $start) {
//        $this->db->limit($limit, $start);
//        $query = $this->db->post("gallery");
//
//        if ($query->num_rows() > 0) {
//            foreach ($query->result() as $row) {
//                $data[] = $row;
//            }
//            return $data;
//        }
//        return false;
//   }
}

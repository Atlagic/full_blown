<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Model_polls
 *
 * @author Aleksandar
 */
class Model_polls extends CI_Model{
    private $id_poll;
    private $name;
    private $text;
    private $id_vote;
    private $num_votes;
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getPoll($id){
        $query =    "SELECT * 
                    FROM polls p INNER JOIN answers a
                    ON p.poll_id = a.poll_id
                    INNER JOIN votes v
                    ON a.vote_id = v.vote_id
                    WHERE p.poll_id =".$id;
        //var_dump($query);
        return $this->db->query($query)->result_array();
    }
    

    public function getPollIds(){
         $query =    "SELECT id  FROM polls";
         return $this->db->query($query)->result_array();
    }
    public function getPollName($id){
         $query ="SELECT * FROM polls WHERE poll_id =".$id;
         return $this->db->query($query)->result_array();
    }
    
    public function addVote($id){
        $query ="SELECT * FROM votes WHERE vote_id =".$id;
        $num = $this->db->query($query)->row_array();
        $num['num_votes']+=1;
        $query ="UPDATE votes SET num_votes= ".$num['num_votes']." WHERE vote_id =".$id;
        $this->db->query($query);
        return $this->db->affected_rows();
        
    }
    public function random()
    {
        $query = "SELECT poll_id FROM polls";
        return $this->db->query($query)->result_array();
    }
}

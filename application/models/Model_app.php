<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Model_app
 *
 * @author Imam
 */
class Model_app extends CI_Model {
    //put your code here
    public function view($table){
        return $this->db->get($table);
    }
     public function insert($table,$data){
        return $this->db->insert($table,$data);
    }
}

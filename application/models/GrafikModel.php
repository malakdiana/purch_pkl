<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class GrafikModel extends CI_Model {
   
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
       
           
    }

    public function getSupplier(){
    	$this->db->select('supplier, sum()')
    }
}
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class GrafikModel extends CI_Model {
   
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
       
           
    }

    public function getSupplier(){
    	$query= $this->db->select('supplier, sum(qty*harga) as jumlah')->from('bayangan')->join('po','po.id_po = bayangan.id_po')->group_by('po.supplier')->order_by('jumlah','DESC')->limit(5)->get();
    	  $results=array();
            if($query->num_rows() > 0){
            return $query->result();
            }else{
            return $results;
            }
    }
}
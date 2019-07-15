<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class EtaModel extends CI_Model {
   
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
       
           
    }

     public function getPo($tgl){
     
		$this->db->select('bayangan.id_bayangan, bayangan.id_po,bayangan.id_pr,bayangan.id_item,po.supplier,po.tgl_po,po.no_po,po.eta,po.franco,purch_req.section,purch_req.pr_no,bayangan.item,item.unit_name,bayangan.qty , konfirmasi, invoice, remarks');
		//$this->db->select('*');
		$this->db->from('bayangan');
		$this->db->join('purch_req','id_pr = purch_req.id','left');
     	$this->db->join('po','bayangan.id_po = po.id_po','left');
     	$this->db->join('item','bayangan.id_item = item.id_item','left');
     		
     	$this->db->where('eta', $tgl);
     	
     	$query = $this->db->get();
           $results=array();
            if($query->num_rows() > 0){
            return $query->result();
            }else{
            return $results;
            }
     }

        public function getDelay($tgl,$tgl2){
     
        $this->db->select('bayangan.id_bayangan, bayangan.id_po,bayangan.id_pr,bayangan.id_item,po.supplier,po.tgl_po,po.no_po,eta.tanggal,po.franco,purch_req.section,purch_req.pr_no,bayangan.item,item.unit_name,bayangan.qty , eta.konfirmasi, eta.invoice, eta.remarks,eta.id');
        //$this->db->select('*');
        $this->db->from('bayangan');
        $this->db->join('purch_req','id_pr = purch_req.id','left');
        $this->db->join('po','bayangan.id_po = po.id_po','left');
        $this->db->join('item','bayangan.id_item = item.id_item','left');
        $this->db->join('eta','bayangan.id_bayangan = eta.id_bayangan','left');
        $this->db->where('eta.tanggal >=', $tgl);
        $this->db->where('eta.tanggal <=', $tgl2);
        
        $query = $this->db->get();
           $results=array();
            if($query->num_rows() > 0){
            return $query->result();
            }else{
            return $results;
            }
     }

      public function getExport(){
     
        $this->db->select('bayangan.id_bayangan, bayangan.id_po,bayangan.id_pr,bayangan.id_item,po.supplier,po.tgl_po,po.no_po,po.eta,po.franco,purch_req.section,purch_req.pr_no,bayangan.item,item.unit_name,bayangan.qty , konfirmasi, invoice, remarks');
        //$this->db->select('*');
        $this->db->from('bayangan');
        $this->db->join('purch_req','id_pr = purch_req.id','left');
        $this->db->join('po','bayangan.id_po = po.id_po','left');
        $this->db->join('item','bayangan.id_item = item.id_item','left');
        
        $query = $this->db->get();
           $results=array();
            if($query->num_rows() > 0){
            return $query->result();
            }else{
            return $results;
            }
     }

      public function getExportbydate($tgl1,$tgl2){
     
        $this->db->select('bayangan.id_bayangan, bayangan.id_po,bayangan.id_pr,bayangan.id_item,po.supplier,po.tgl_po,po.no_po,po.eta,po.franco,purch_req.section,purch_req.pr_no,bayangan.item,item.unit_name,bayangan.qty , konfirmasi, invoice, remarks');
        //$this->db->select('*');
        $this->db->from('bayangan');
        $this->db->join('purch_req','id_pr = purch_req.id','left');
        $this->db->join('po','bayangan.id_po = po.id_po','left');
        $this->db->join('item','bayangan.id_item = item.id_item','left');
        $this->db->where('po.eta >=', $tgl1);
        $this->db->where('po.eta <=', $tgl2);
        
        $query = $this->db->get();
           $results=array();
            if($query->num_rows() > 0){
            return $query->result();
            }else{
            return $results;
            }
     }



      public function konfirmasi($id){
         $data = array(
        'konfirmasi' => "OK",
      
        );
        $this->db->where('id_bayangan',$id);
         $this->db->update('bayangan', $data);
    }
     public function invoice($id){
         $data = array(
        'invoice' => "OK",
      
        );
        $this->db->where('id_bayangan',$id);
         $this->db->update('bayangan', $data);
    }
       public function konfirmasiDelay($id){
         $data = array(
        'konfirmasi' => 1,
      
        );
        $this->db->where('id',$id);
         $this->db->update('eta', $data);
    }
     public function invoiceDelay($id){
         $data = array(
        'invoice' => 1,
      
        );
        $this->db->where('id',$id);
         $this->db->update('eta', $data);
    }

    public function addRemarks(){
        $id= $this->input->post('id_bayangan');
        $remarks = $this->input->post('remarks');
        if(!empty($this->input->post('tanggal'))){
            $remarks= $remarks.' , Delay tanggal :'.$this->input->post('tanggal');
        }
       $data = array(
        'remarks' => $remarks,
      
        );
        $this->db->where('id_bayangan',$id);
         $this->db->update('bayangan', $data);  
    }
 public function addRemarksDelay(){
        $id= $this->input->post('id');
        $remarks = $this->input->post('remarks');
        if(!empty($this->input->post('tanggal'))){
            $remarks= $remarks.' , Delay tanggal :'.$this->input->post('tanggal');
        }
       $data = array(
        'remarks' => $remarks,
      
        );
        $this->db->where('id',$id);
         $this->db->update('eta', $data);  
    }

    public function delay(){
        $id_bayangan = $this->input->post('id_bayangan');
          $tanggal = $this->input->post('tanggal');
        $data = array(
            'id_bayangan' => $id_bayangan,
            'konfirmasi' =>0,
            'invoice' => 0,
            'tanggal' => $tanggal
        );
        $this->db->insert('eta',$data);
    }
}
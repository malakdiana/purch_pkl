<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class GrafikModel extends CI_Model {
   
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
       
           
    }

    public function getSupplier(){
        $tgl=date('m/Y');
    	$query= $this->db->select('supplier, sum(qty*harga) as jumlah')->from('bayangan')->join('po','po.id_po = bayangan.id_po')->where("SUBSTRING_INDEX(SUBSTRING_INDEX(tgl_po,' ',1),'/',-2) =",$tgl)->group_by('po.supplier')->order_by('jumlah','DESC')->get();
    	  $results=array();
            if($query->num_rows() > 0){
            return $query->result();
            }else{
            return $results;
            }
    }
      public function getSupplierr($tgl){
        $query= $this->db->select('supplier, sum(qty*harga) as jumlah')->from('bayangan')->join('po','po.id_po = bayangan.id_po')->where('month(tgl_po)',$tgl)->group_by('po.supplier')->order_by('jumlah','DESC')->limit(5)->get();
 $results=array();
            if($query->num_rows() > 0){
            return $query->result();
            }else{
            return $results;
            }
    }

    public function getSection(){
          $tgl=date('m/Y');
             $query=$this->db->query("SELECT s.nama_section, p.jumlah from section as s left join ( SElect pr.section, sum(qty*harga) as jumlah from purch_req as pr inner join bayangan as b on b.id_pr=pr.id inner join po on po.id_po = b.id_po where SUBSTRING_INDEX(SUBSTRING_INDEX(po.tgl_po,' ',1),'/',-2) = '$tgl' GROUP BY pr.section ) as p on s.nama_section=p.section ORDER BY p.jumlah ASC");
        // $query =  $this->db->select('nama_section, sum(qty*harga) as jumlah')->from('bayangan')->join('purch_req','purch_req.id= bayangan.id_pr')->join('section','purch_req.section = section.nama_section', 'RIGHT')->group_by('section')->order_by('jumlah','asc')->get();
          $results=array();
            if($query->num_rows() > 0){
            return $query->result();
            }else{
            return $results;
            }
    }

    public function getPrOpen(){
        $query = $this->db->select('count(*) as jumlah')->from('purch_req')->where('status','OPEN')->get();
         $results=array();
            if($query->num_rows() > 0){
            return $query->result();
            }else{
            return $results;
            }
    }
     public function getQrOpen(){
        $query = $this->db->select('count(*) as jumlah')->from('penawaran')->where('status',0)->get();
         $results=array();
            if($query->num_rows() > 0){
            return $query->result();
            }else{
            return $results;
            }
    }

    public function eta(){
        $tgl = mktime(0, 0, 0, date("m"), date("d")+1, date("Y"));
        $tgl =  date("Y-m-d", $tgl);

        $query = $this->db->select('count(*) as jumlah')->from('po')->where('eta',$tgl)->get();
            $results=array();
            if($query->num_rows() > 0){
            return $query->result();
            }else{
            return $results;
            }
    }

    public function delay(){
         $tgl = mktime(0, 0, 0, date("m"), date("d")+1, date("Y"));
        $tgl =  date("Y-m-d", $tgl);

        $query = $this->db->select('count(*) as jumlah')->from('eta')->where('tanggal >=',$tgl)->get();
            $results=array();
            if($query->num_rows() > 0){
            return $query->result();
            }else{
            return $results;
            }
    }

         public function getExport($tgldownload){
          
            $query= $this->db->select('supplier, sum(qty*harga) as jumlah')->from('bayangan')->join('po','po.id_po = bayangan.id_po')->where("SUBSTRING_INDEX(SUBSTRING_INDEX(tgl_po,' ',1),'/',-2) =",$tgldownload)->group_by('po.supplier')->order_by('jumlah','DESC')->get();
            $results=array();
            if($query->num_rows() > 0){
            return $query->result();
            }else{
            return $results;
            }

    }
      public function getExport2($tgldownload){
          
                    $query=$this->db->query("SELECT s.nama_section, p.jumlah from section as s left join ( SElect pr.section, sum(qty*harga) as jumlah from purch_req as pr inner join bayangan as b on b.id_pr=pr.id inner join po on po.id_po = b.id_po where SUBSTRING_INDEX(SUBSTRING_INDEX(po.tgl_po,' ',1),'/',-2) = '$tgldownload' GROUP BY pr.section ) as p on s.nama_section=p.section ORDER BY p.jumlah DESC");
            $results=array();
            if($query->num_rows() > 0){
            return $query->result();
            }else{
            return $results;
            }

    }


}
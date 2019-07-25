<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class InvoiceModel extends CI_Model {
   
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
       
           
    }
    public function getDocrecByPo($id){
       $query=  $this->db->select('*')->from('doc_receipt')->join('detail_docrec','detail_docrec.id_receipt = doc_receipt.id_receipt ')->where('detail_docrec.id_po',$id)->order_by('detail_docrec.id_receipt','ASC')->limit(1)->get();
        $results=array();
            if($query->num_rows() > 0){
            return $query->result();
            }else{
            return $results;
            }
    }

    public function getDocRecById($id){
        $query= $this->db->select('*')->from('doc_receipt')->join('supplier', 'doc_receipt.id_supplier = supplier.id_supplier')->where('id_receipt', $id)->get();
          $results=array();
            if($query->num_rows() > 0){
            return $query->result();
            }else{
            return $results;
            }

    }
    public function editDetail(){
        $data= array(
            'no_invoice'=> $this->input->post('no_invoice'),
            'tgl_invoice'=> $this->input->post('tgl_invoice')
        );
        $this->db->where('id_detail', $this->input->post('id_detail'));
        $this->db->update('detail_docrec', $data);

    }

    public function getPre(){
    $query=$this->db->select('*')->from('prepared')->get();
 $results=array();
            if($query->num_rows() > 0){
            return $query->result();
            }else{
            return $results;
            }
}

public function updatePre(){
    $data=array(
        'kode_nama' => $this->input->post('kode_nama')

    );
    $this->db->where('id_prepared',1);
    $result=$this->db->update('prepared',$data);
     return $result;
}

    public function addDocRec(){

    	$tambahan = "";

    	if(!empty($this->input->post('tambahan'))){
    	$tambahan = "-".$this->input->post('tambahan');
    	}
    	   $no_docrec = "REC"."-".$this->input->post('no_rec')."/"."PUR"."-"."SAI"."/".$this->input->post('bulan')."/".$this->input->post('tahun').$tambahan;
    	   $ceknomor= $this->db->select('*')->from('doc_receipt')->where('no_receipt',$no_docrec)->get();
        if($ceknomor->num_rows() > 0){
              echo "<script type='text/javascript'>alert('nomor sama');</script>";

        }else{
    	   $data = array(
        'vp_date' =>$this->input->post('vp_date'),
        'no_receipt' => $no_docrec,
        'id_supplier' =>$this->input->post('supplier'),
        );
    	     $this->db->insert('doc_receipt', $data);

    	   $cek =$this->db->select('*')->from('doc_receipt')->where('no_receipt',$no_docrec)->get();
       foreach ($cek->result() as $key) {
         $id_receipt = $key->id_receipt;
       }

    	  $this->insertDetail($id_receipt);
    	 echo "<script type='text/javascript'>alert('Berhasil')</script>";

    }


}

public function hapusDetail($id){
    $this->db->where('id_detail',$id);
    $result= $this->db->delete('detail_docrec');
    return $result;
}

public function updateDocRec(){
    $data=array(
        "vp_date" => $this->input->post('vp_date')
    );
    $this->db->where('id_receipt', $this->input->post('id_receipt'));
    $result = $this->db->update('doc_receipt', $data);
    return $result;
}

public function insertDetail($id_receipt){
  $id_po=array();$barang=array();$no_invoice=array();$tgl_invoice= array();
  $id_po=$this->input->post('no_po');
  $barang=$this->input->post('barang');
  $no_invoice=$this->input->post('no_invoice');
  $tgl_invoice=$this->input->post('invoice_date');
    $jumlah=$this->input->post('jumlah');
    for ($i=0; $i < count($id_po) ; $i++) { 
    	      $data = array(
        'id_receipt' => $id_receipt,
        'id_po' => $id_po[$i],
        'barang' => $barang[$i],
        'no_invoice' => $no_invoice[$i],
        'tgl_invoice' => $tgl_invoice[$i]       
        );
  $this->db->insert('detail_docrec', $data);
    }



}

public function getDocRec(){
	  $this->db->select('doc_receipt.id_receipt , vp_date,no_receipt, doc_receipt.id_supplier, nama_supplier,id_detail,detail_docrec.id_po,po.no_po, barang, no_invoice, tgl_invoice,');
            $this->db->from('doc_receipt');
            $this->db->join('detail_docrec','detail_docrec.id_receipt = doc_receipt.id_receipt','left');
            $this->db->join('po','po.id_po = detail_docrec.id_po','left');
            $this->db->join('supplier', 'doc_receipt.id_supplier = supplier.id_supplier','left');
                 $this->db->order_by('doc_receipt.id_receipt', 'desc');
            $query = $this->db->get();
           $results=array();
            if($query->num_rows() > 0){
            return $query->result();
            }else{
            return $results;
            }
}

public function poToPrint(){
	  
	$query = $this->db->query("select * from po join supplier on po.id_supplier= supplier.id_supplier  where id_po in (select id_po from detail_docrec)");

 $results=array();
            if($query->num_rows() > 0){
            return $query->result();
            }else{
            return $results;
            }

}

public function getPoByDoc($id){
    $query= $this->db->select('*')->from('detail_docrec')->join('po','detail_docrec.id_po = po.id_po')->where('id_receipt', $id)->get();
          $results=array();
            if($query->num_rows() > 0){
            return $query->result();
            }else{
            return $results;
            }
}

public function getInvoice($id_po){
	$query= $this->db->select('*')->from('detail_docrec')->where('id_po',$id_po)->get();
	$results=array();
            if($query->num_rows() > 0){
            return $query->result();
            }else{
            return $results;
            }
}


}
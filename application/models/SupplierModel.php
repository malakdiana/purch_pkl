<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class SupplierModel extends CI_Model {
   
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
       
           
    }

     public function getSupplier()
    {

              $this->db->select('*');
            $this->db->from('supplier');

           $this->db->order_by('id_supplier','DESC');  
            $query = $this->db->get();
            if($query->num_rows() > 0){
            return $query->result();
        }
    }
    public function updateSupplier(){

    	$id_supplier = $this->input->post('id_supplier');
    	

        $data = array(
        	'nama_supplier' => $this->input->post('nama_supplier'),
        'alamat' => $this->input->post('alamat'),
        'kota' => $this->input->post('kota'),
        'no_telp' => $this->input->post('no_telp'),
        'no_fax' => $this->input->post('no_fax'),
        'attention' => $this->input->post('attention'),
        'no_hp' => $this->input->post('no_hp'),
        'nomer_rek' => $this->input->post('nomer_rek'),
        'bank' => $this->input->post('bank'),
        'atas_nama' => $this->input->post('atas_nama'),
        'tgl_input' => $this->input->post('tgl_input'),
        'terms' => $this->input->post('terms'),
        'ppn' => $this->input->post('ppn'),
        'supply' => $this->input->post('supply'),
        'status' => $this->input->post('status'),
        'perjanjian' => $this->input->post('perjanjian'),
        'remarks' => $this->input->post('remarks'),
      
        );

        
        $this->db->where('id_supplier', $id_supplier);
        $this->db->update('supplier', $data);
    }
    public function deleteSupplier($id){
         $this->db->where('id_supplier', $id);
        $this->db->delete('supplier');

    }
    public function tambahSupplier(){
        $data = array(
        'nama_supplier' => $this->input->post('nama_supplier'),
        'alamat' => $this->input->post('alamat'),
        'kota' => $this->input->post('kota'),
        'no_telp' => $this->input->post('no_telp'),
        'no_fax' => $this->input->post('no_fax'),
        'attention' => $this->input->post('attention'),
        'no_hp' => $this->input->post('no_hp'),
        'nomer_rek' => $this->input->post('nomer_rek'),
        'bank' => $this->input->post('bank'),
        'atas_nama' => $this->input->post('atas_nama'),
        'tgl_input' => $this->input->post('tgl_input'),
        'terms' => $this->input->post('terms'),
        'ppn' => $this->input->post('ppn'),
        'supply' => $this->input->post('supply'),
        'status' => $this->input->post('status'),
        'perjanjian' => $this->input->post('perjanjian'),
        'remarks' => $this->input->post('remarks'),
      
        );
         $this->db->insert('supplier', $data);

    }

    public function importSupplier($dataarray){
        //$this->db->insert('supplier', $data);

        for ($i = 0; $i < count($dataarray); $i++) {
            $data = array(
                // 'nama_supplier' =>$dataarray[$i]['nama_supplier'],
                // 'alamat' => $dataarray[$i]['alamat'],
                // 'kota' => $dataarray[$i]['kota'],
                //      'no_telp' => $dataarray[$i]['no_telp'],
                //           'no_fax' => $dataarray[$i]['no_fax'],
                //           'attention' => $dataarray[$i]['attention'],
                //           'no_hp' => $dataarray[$i]['no_hp'],
                //           'tgl_input' => $dataarray[$i]['tgl_input'],
                //           'terms' => $dataarray[$i]['terms'],
                //           'ppn' => $dataarray[$i]['ppn'],
                //           'supply' => $dataarray[$i]['supply'],
                //           'status' => $dataarray[$i]['status'],
                //           'perjanjian' => $dataarray[$i]['perjanjian'],
                //           'remarks' => $dataarray[$i]['remarks'],

                'nama' => $dataarray[$i]['nama'],
                'no_telp' => $dataarray[$i]['no_telp'],
                //'tanggal_lahir' => $dataarray[$i]['tanggal_lahir']
            );
            //ini untuk menambahkan apakah dalam tabel sudah ada data yang sama
            //apabila data sudah ada maka data di-skip
            // saya contohkan kalau ada data nama yang sama maka data tidak dimasukkan
           
                $this->db->insert('coba', $data);
          
    }
}
private $_batchImport;
 
    public function setBatchImport($batchImport) {
        $this->_batchImport = $batchImport;
    }
 
    // save data
    public function importData() {
        $data = $this->_batchImport;
        $this->db->insert_batch('supplier', $data);
    }
}
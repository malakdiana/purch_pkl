<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Purch_req extends CI_Controller {
	///

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Purch_reqModel');
        $this->load->model('QrModel');
         $this->load->helper('url','form');
        // $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
         // $this->load->library('excel','upload');
         if (!$this->session->userdata('logged_in')) {
          redirect('Login','refresh');
        }
          $this->load->library('Excel','upload');


    
    }

public function index()
	{
         $datax['notif']= $this->QrModel->getNotifikasi(); $datax['edit']= $this->QrModel->getNotifEdit();
		$data['Purch_req']= $this->Purch_reqModel->getPurch_req();
        if($this->session->userdata('logged_in')['hak_akses']==1){
		$this->load->view('admin/header',$datax);
        $this->load->view('admin/Purch_req',$data);

        }else if($this->session->userdata('logged_in')['hak_akses']==2){
        $data['Purch_req']= $this->Purch_reqModel->getPurch_req_section();
        $this->load->view('user/header',$datax);
        $this->load->view('user/Purch_req',$data);

        }else if($this->session->userdata('logged_in')['hak_akses']==4){
        $data['Purch_req']= $this->Purch_reqModel->getPurch_req_personal();
        $this->load->view('Personal/header',$datax);
        $this->load->view('Personal/Purch_req',$data);

    }
   
	}

    public function search(){
        $json = [];
        $this->load->database();

        
        if(!empty($this->input->get("q"))){
            $this->db->like('nama_barang', $this->input->get("q"));
            $query = $this->db->select('no as id,nama_barang as text')->limit(10)->get("barang");
            $json = $query->result();
        }else{
 $query = $this->db->select('no as id,nama_barang as text')->limit(10)->get("barang");
            $json = $query->result();
        }

        
        echo json_encode($json);
    }

       public function tambahPR(){
         $datax['notif']= $this->QrModel->getNotifikasi(); $datax['edit']= $this->QrModel->getNotifEdit();
        $this->load->model('SectionModel');
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
               
        $this->load->model('Unit_barangModel');

            $data['unit']= $this->Unit_barangModel->getUnit_barang();
        $this->form_validation->set_rules('tgl', 'tgl', 'trim|required');
        if ($this->form_validation->run()==FALSE) {
             $data['section']=$this->SectionModel->getSection();
              if($this->session->userdata('logged_in')['hak_akses']==1){
            $this->load->view('admin/header',$datax);
            $this->load->view('admin/tambahPR', $data);
        }else{
              $this->load->view('user/header',$datax);
            $this->load->view('user/tambahPR', $data);
        }
          
        }else{
            $this->Purch_reqModel->tambahPR();
            
            redirect('Purch_req/', 'refresh');
        }

    }

       

     public function tambahItem($id){
         $datax['notif']= $this->QrModel->getNotifikasi(); $datax['edit']= $this->QrModel->getNotifEdit();
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
       
        $this->load->model('Unit_barangModel');

            $data['unit']= $this->Unit_barangModel->getUnit_barang();
            $data['id']=$id;
            $data['list']=$this->Purch_reqModel->getPrById($id);
            $data['detail']=$this->Purch_reqModel->getItem_barang($id);

               if($this->session->userdata('logged_in')['hak_akses']==1){
            $this->load->view('admin/header',$datax);
            $this->load->view('admin/tambahItem_barang',$data);
        }else{
              $this->load->view('user/header',$datax);
            $this->load->view('admin/tambahItem_barang',$data);
        }
           

    }

    public function tambah($id){
         $this->Purch_reqModel->tambahItem_barang($id);
                $this->session->set_flashdata('tambahItem','<div class="alert alert-success" role="alert">SUKSES TAMBAH DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
          
            redirect('Purch_req', 'refresh');
    }


    public function GetItem_barang($id,$status){
         $datax['notif']= $this->QrModel->getNotifikasi(); $datax['edit']= $this->QrModel->getNotifEdit();
        $data['status_fa']=$status;

            $data['Purch_req']= $this->Purch_reqModel->GetItem_barang($id);
            $data['detail']= $this->Purch_reqModel->jumlahQty($id);
            $this->load->model('BarangModel');
            $data['barang']= $this->BarangModel->getBarang(); $data['id']=$id;
                if($this->session->userdata('logged_in')['hak_akses']==1){
            $this->load->view('admin/header',$datax);
            $this->load->view('admin/GetItem_barang',$data);

        }else if($this->session->userdata('logged_in')['hak_akses']==2){
            $this->load->view('user/header',$datax);
            $this->load->view('user/GetItem_barang',$data);
          }else if($this->session->userdata('logged_in')['hak_akses']==4){
            $this->load->view('Personal/header',$datax);
            $this->load->view('Personal/GetItem_barang',$data);
         
            }  

    }

     public function GetItem_barang_user($id){
         $datax['notif']= $this->QrModel->getNotifikasi(); $datax['edit']= $this->QrModel->getNotifEdit();

            $data['Purch_req']= $this->Purch_reqModel->GetItem_barang($id);
            $data['detail']= $this->Purch_reqModel->jumlahQty($id);
            $this->load->model('BarangModel');
            $data['barang']= $this->BarangModel->getBarang(); $data['id']=$id;
                if($this->session->userdata('logged_in')['hak_akses']==1){
            $this->load->view('admin/header',$datax);
            $this->load->view('admin/GetItem_barang',$data);

        }else if($this->session->userdata('logged_in')['hak_akses']==2){
            $this->load->view('user/header',$datax);
            $this->load->view('user/GetItem_barang',$data);
          }else if($this->session->userdata('logged_in')['hak_akses']==4){
            $this->load->view('Personal/header',$datax);
            $this->load->view('Personal/GetItem_barang',$data);
         
           

    }
  }

    public function updateItem(){

       
        $this->Purch_reqModel->updateItem();
                $this->session->set_flashdata('editItem','<div class="alert alert-success" role="alert">SUKSES UPDATE DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                $id = $this->input->post('id');
               // echo $this->input->post('status');die();
                if($this->input->post('status')==""){
 redirect("Purch_req/GetItem_barang_user/$id", 'refresh');
                }else{
                     $status = $this->input->post('status');
            redirect("Purch_req/GetItem_barang/$id/$status", 'refresh');
        }
    }

    public function hapusItem($id,$id_item,$status){

        $x= $this->Purch_reqModel->hapusItem($id_item);
        if($x == null){
            echo "<script>alert('Item tidak bisa dihapus karena memiliki nomor PO')</script>";
        }else{
                $this->session->set_flashdata('editItem','<div class="alert alert-success" role="alert">SUKSES HAPUS ITEM <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            }
            redirect("Purch_req/GetItem_barang/$id/$status", 'refresh');
    }
    public function hapusItem_user($id,$id_item){

        $x= $this->Purch_reqModel->hapusItem($id_item);
        if($x == null){
            echo "<script>alert('Item tidak bisa dihapus karena memiliki nomor PO')</script>";
        }else{
                $this->session->set_flashdata('editItem','<div class="alert alert-success" role="alert">SUKSES HAPUS ITEM <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            }
            redirect("Purch_req/GetItem_barang_user/$id", 'refresh');
    }

      function deleteItem(){
        $id = $this->input->post('id_item');
        $data=$this->Purch_reqModel->hapusItem($id);
        // $query= $this->db->select('*')->from('item')->where('id_item',$id)->get();
        //  foreach ($query->result() as $key) {
        //    $id_purch = $key->id_purch;
        //  }

        //  $query= $this->db->select('id_purch, sum(qty) as jumlah')->where('id_purch', $id_purch)->get('item');
        //  foreach ($query->result() as $key) {
        //    $jumlahitem = $key->jumlah;
        //  }
        //   $query= $this->db->select('sum(qty) as jumlah')->where('id_pr', $id_purch)->get('bayangan');
        //  foreach ($query->result() as $key) {
        //    $jumlahbay = $key->jumlah;
        //  }
        //  if($jumlahitem==$jumlahbay){
        //   $dat=array(
        //     'status' => 'CLOSED'
        //   );
        //   $this->db->where('id',  $itemName[$i]);
        //   $this->db->update('purch_req',$dat);
        //  }
        echo json_encode($data);
    }

   

    public function deletePurch_req($id){
        $this->Purch_reqModel->deletePurch_req($id);
               
    }

      public function Verify($id){

        $this->Purch_reqModel->Verify($id);
        
            
            redirect("Purch_req/", 'refresh');
    }

       public function Verifyitem($id){

        $this->Purch_reqModel->Verifyitem($id);
        redirect("Purch_req/GetItem_barang/$id/1", 'refresh');
            
          //  redirect("Purch_req/", 'refresh');
    }

      public function InsertPo($id){
         $datax['notif']= $this->QrModel->getNotifikasi(); $datax['edit']= $this->QrModel->getNotifEdit();
       $query = $this->db->select('*')->from('item')->join('purch_req', 'item.id_purch = purch_req.id')->where('item.id_item',$id)->get();
       $status=0;
       $idp=0;
       foreach ($query->result() as $key ) {
           if($key->status_fa == 1){
            $status=1;
          
           }
             $idp= $key->id_purch;
       }
       if($status == 1){
        $data['list'] = $this->Purch_reqModel->getItemById($id);
        $data['qtysisa'] = $this->Purch_reqModel->getQtySisa($id);
        $this->load->view('admin/header',$datax);
        $this->load->view('admin/InsertPo', $data);
    }else{
          echo "<script>alert('Belum di verifikasi')</script>";
           redirect('Purch_req/GetItem_barang/'.$idp.'/'.$status, 'refresh');

    }

    }
    public function getPo(){
          $this->load->database();

        
        if(!empty($this->input->get("q"))){
            $this->db->like('no_po', $this->input->get("q"));
            $query = $this->db->select('id_po as id,no_po as text')->where('status',0)->get("po");
            $json = $query->result();
        }else{
            $query = $this->db->select('id_po as id,no_po as text')->where('status',0)->get("po");
            $json = $query->result();
        }

        
        echo json_encode($json);
    }
     public function getBarang(){
          $this->load->database();

        
        if(!empty($this->input->get("q"))){
            $this->db->like('nama_barang', $this->input->get("q"));
            $query = $this->db->select('no_barang as id,nama_barang as text')->get("barang");
            $json = $query->result();
        }else{
             $query = $this->db->select('no_barang as id,nama_barang as text')->get("barang");
            $json = $query->result();
        }

        
        echo json_encode($json);
    }

    public function insertPrtoPo($id){
          $this->load->database();
        $query = $this->db->select('*')->from('item')->join('purch_req','item.id_purch=purch_req.id')->where('id_item',$id)->get();
        foreach ($query->result() as $key) {
            $id_pr = $key->id_purch;
            $status = $key->status_fa;
        }

        if($this->input->post('qty_po') > $this->input->post('qty') ){
            echo "<script>alert('Gagal di tambahkan, quantity terlalu banyak')</script>";
        redirect('Purch_req/GetItem_barang/'.$id_pr.'/'.$status, 'refresh');
        }else{
              $this->Purch_reqModel->insertPrtoPo();  
              echo "<script>alert('Berhasil di tambahkan')</script>";
             redirect('Purch_req/GetItem_barang/'.$id_pr.'/'.$status, 'refresh');
        }
     
    }


      public function export(){
   
    $excel = new PHPExcel();
  
    $excel->getProperties()->setCreator('My Notes Code')
                 ->setLastModifiedBy('My Notes Code')
                 ->setTitle("Data Purchase Requisition")
                 ->setSubject("PR")
                 ->setDescription("Laporan Semua Data Purchase Requisition")
                 ->setKeywords("Data PO");
 
    $style_col = array(
      'font' => array('bold' => true), // Set font nya jadi bold
      'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
      ),
      'borders' => array(
        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
      )
    );
    // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
    $style_row = array(
      'alignment' => array(
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
      ),
      'borders' => array(
        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
      )
    );
   
    // Buat header tabel nya pada baris ke 3
    $excel->setActiveSheetIndex(0)->setCellValue('A1', "No"); // Set kolom A3 dengan tulisan "NO"
    $excel->setActiveSheetIndex(0)->setCellValue('B1', "TANGGAL"); // Set kolom B3 dengan tulisan "NIS"
    $excel->setActiveSheetIndex(0)->setCellValue('C1', "NIK"); // Set kolom C3 dengan tulisan "NAMA"
    $excel->setActiveSheetIndex(0)->setCellValue('D1', "PIC"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
    $excel->setActiveSheetIndex(0)->setCellValue('E1', "SECTION"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('F1', "NO_PR"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('G1', "ITEM"); // Set kolom E3 dengan tulisan "ALAMAT"
  
    $excel->setActiveSheetIndex(0)->setCellValue('H1', "QTY"); // Set kolom E3 dengan tulisan "ALAMAT"// Set kolom E3 
    $excel->setActiveSheetIndex(0)->setCellValue('I1', "UNIT"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('J1', "DETAIL"); 
  $excel->getActiveSheet()->getStyle('A1')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('B1')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('C1')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('D1')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('E1')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('F1')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('G1')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('H1')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('I1')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('J1')->applyFromArray($style_col);


   
    $siswa = $this->Purch_reqModel->getPrJoin();
    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
    $numrow = 2; // Set baris pertama untuk isi tabel adalah baris ke 4
    foreach($siswa as $data){ // Lakukan looping pada variabel siswa
      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->tgl);
      $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->nik);
      $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->pic_request);
      $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->section);
      $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->pr_no);
      $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->item_barang);
      $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->qty);
      $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->unit_name);
      $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->detail);
      
      
      $no++; // Tambah 1 setiap kali looping
      $numrow++; // Tambah 1 setiap kali looping
    }
    // Set width kolom
    //$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
    $excel->getActiveSheet()->getColumnDimension('B')->setWidth(30); // Set width kolom B
    $excel->getActiveSheet()->getColumnDimension('C')->setWidth(30); // Set width kolom C
   
    $excel->getActiveSheet()->getColumnDimension('D')->setWidth(25);
    $excel->getActiveSheet()->getColumnDimension('E')->setWidth(25);
    $excel->getActiveSheet()->getColumnDimension('F')->setWidth(25);
    $excel->getActiveSheet()->getColumnDimension('G')->setWidth(25);
    $excel->getActiveSheet()->getColumnDimension('H')->setWidth(25);
    $excel->getActiveSheet()->getColumnDimension('I')->setWidth(25);
    $excel->getActiveSheet()->getColumnDimension('J')->setWidth(25);
  
    $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
    // Set orientasi kertas jadi LANDSCAPE
    $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
    // Set judul file excel nya
    $excel->getActiveSheet(0)->setTitle("Laporan Data Pr");
    $excel->setActiveSheetIndex(0);
   
    $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
    ob_end_clean();
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Data Pr.xlsx"');
    $write->save('php://output');
  }
  public function kosongkan(){
    $this->db->empty_table('item');
    $this->db->empty_table('purch_req');
    
    redirect('Purch_req');
  }

	
}

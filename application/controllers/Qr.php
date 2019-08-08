<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Qr extends CI_Controller {
	///

	public function __construct()
    {
        parent::__construct();
        $this->load->model('QrModel');
        $this->load->model('SectionModel');
         $this->load->helper('url','form');
        // $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
         $this->load->library('upload');
         if (!$this->session->userdata('logged_in')) {
        redirect('Login','refresh');
      }
  $this->load->library('Excel','upload');

 

    }

public function index()
	{

      $data['icon']= $this->QrModel->getIcon();
     $datax['notif']= $this->QrModel->getNotifikasi();
      $datax['edit']= $this->QrModel->getNotifEdit();
		$data['Qr']=$this->QrModel->getQr();
        if($this->session->userdata('logged_in')['hak_akses']==1){
             $this->load->view('admin/header',$datax);
        $this->load->view('admin/quotation',$data);
        
    }else if($this->session->userdata('logged_in')['hak_akses']==2){
             $this->load->view('user/header',$datax);
        $this->load->view('user/Qr',$data);
    }else if($this->session->userdata('logged_in')['hak_akses']==4){
             $this->load->view('Personal/header',$datax);
        $this->load->view('Personal/Qr',$data);
		
    }
   
	}

  public function komen($id){
    $this->QrModel->addKomen($id);
    if($this->session->userdata('logged_in')['hak_akses']==1){
    redirect('Qr/detailQuotation/'.$id);
  }else{
      redirect('Qr/detailQuotationUser/'.$id);
  }
  }

       public function tambahQR (){ 
        $datax['notif']= $this->QrModel->getNotifikasi();
        $this->load->model('SectionModel');
        $this->load->helper('url', 'form');
    
            $data['section']=$this->SectionModel->getSection();

            if($this->session->userdata('logged_in')['hak_akses']==2){
            $this->load->view('user/header',$datax);
            $this->load->view('user/tambahQR', $data);
            $this->load->view('admin/footer');
            }else if($this->session->userdata('logged_in')['hak_akses']==4){
            $this->load->view('Personal/header',$datax);
            $this->load->view('Personal/tambahQR', $data);
            $this->load->view('admin/footer');
    
    }
       
                
        

    }

    public function addQr(){
            $config['upload_path'] = './assets/file_qr/';
            $config['allowed_types'] = 'pdf|jpg|png|jpeg|doc|docx|xlsx';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if(!$this->upload->do_upload('fupload')){
               $this->QrModel->tambahQRnoGambar();
               $this->session->set_flashdata('tambahQR','<div class="alert alert-success" role="alert">SUKSES TAMBAH DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Qr/tracking', 'refresh');
            }else{
                $this->QrModel->tambahQR();
               $this->session->set_flashdata('tambahQR','<div class="alert alert-success" role="alert">SUKSES TAMBAH DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Qr/tracking', 'refresh');
            }
    }

     public function addQrPersonal(){
            $config['upload_path'] = './assets/file_qr/';
            $config['allowed_types'] = 'pdf|jpg|png|jpeg|doc|docx|xlsx';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if(!$this->upload->do_upload('fupload')){
               $this->QrModel->tambahQRnoGambar();
               $this->session->set_flashdata('tambahQR','<div class="alert alert-success" role="alert">SUKSES TAMBAH DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Qr/tracking_personal', 'refresh');
            }else{
                $this->QrModel->tambahQR();
               $this->session->set_flashdata('tambahQR','<div class="alert alert-success" role="alert">SUKSES TAMBAH DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Qr/tracking_personal', 'refresh');
            }
    }

    public function tambahVendor($id){
       $datax['notif']= $this->QrModel->getNotifikasi(); $datax['edit']= $this->QrModel->getNotifEdit();
        $data['id']=$id;
        $data['vendor']=$this->QrModel->getListVendor($id);
        $this->load->view('admin/header',$datax);
            $this->load->view('admin/tambahVendor',$data);

    }

     public function listvendor($id){
       $datax['notif']= $this->QrModel->getNotifikasi(); $datax['edit']= $this->QrModel->getNotifEdit();
        $data['id']=$id;
        $data['vendor']=$this->QrModel->getListVendor($id);
         if($this->session->userdata('logged_in')['hak_akses']==1){
        $this->load->view('admin/header',$datax);
            $this->load->view('user/list_vendor',$data);
          }
          else if($this->session->userdata('logged_in')['hak_akses']==2){
        $this->load->view('user/header',$datax);
            $this->load->view('user/list_vendor',$data);
          }else if($this->session->userdata('logged_in')['hak_akses']==4){
        $this->load->view('Personal/header',$datax);
            $this->load->view('Personal/list_vendor',$data);
          } else{
        $this->load->view('read_only/header');
            $this->load->view('user/list_vendor',$data);
          }

    }

    public function editVendor(){
          $id = $this->input->post('id');
          $files=$_FILES['fupload'];
        $config['upload_path'] = './assets/file_qr/';
                   $config['upload_path'] = './assets/file_qr/';
            $config['allowed_types'] = 'pdf|jpg|png|jpeg|doc|docx|xlsx';
            $config['max_size']= 1000000000;
            $config['max_width']= 10240;
            $config['max_height']=7680;
        
             $_FILES['userfile']['name']= $files['name'];
             $_FILES['userfile']['type']= $files['type'];
       
              $_FILES['userfile']['tmp_name']= $files['tmp_name'];
               $_FILES['userfile']['error']= $files['error'];
                $_FILES['userfile']['size']= $files['size'];
                $this->load->library('upload', $config);
$this->upload->initialize($config);

          if($this->upload->do_upload('userfile')){
  $this->QrModel->editVendorDetail();
           redirect('Qr/tambahVendor/'.$id, 'refresh');
                 

            }else{
               $this->QrModel->editVendor();
                redirect('Qr/tambahVendor/'.$id, 'refresh');
            }
    }

    public function editQr($id){
       $datax['notif']= $this->QrModel->getNotifikasi(); $datax['edit']= $this->QrModel->getNotifEdit();
        $data['list'] = $this->QrModel->getQrById($id);
        $this->load->view('admin/header',$datax);
        $this->load->view('admin/editQuotation', $data);
        $this->load->view('admin/footer');
    }

        public function editQrUser($id){
           $datax['notif']= $this->QrModel->getNotifikasi();
        $data['list'] = $this->QrModel->getQrById($id);
        if($this->session->userdata('logged_in')['hak_akses']==2){
        $this->load->view('user/header',$datax);
        $this->load->view('user/editQR', $data);
        $this->load->view('admin/footer');
        }else if($this->session->userdata('logged_in')['hak_akses']==4){
        $this->load->view('Personal/header',$datax);
        $this->load->view('Personal/editQR', $data);
        $this->load->view('admin/footer');
      }
    }

    public function hapusVendor($id,$qr){

      $query=$this->db->select('*')->from('detail_penawaran')->where('id_detail',$id)->get();
    
      foreach ($query->result() as $key ) {
          $detail = $key->detail;
      }
   $url = FCPATH.'/assets/file_qr/'.$detail;
      unlink($url);


      $this->db->where('id_detail', $id);
      $this->db->delete('detail_penawaran');
    

      $query=$this->db->select('*')->from('detail_penawaran')->where('id_penawaran',$qr)->get();
      if ($query->num_rows() == 1) {
        $this->db->set('status', 3);
        $this->db->where('id_penawaran', $qr);
      $this->db->update('penawaran');
      }else if($query->num_rows() == 0) {
        $this->db->set('status', 0);
        $this->db->where('id_penawaran', $qr);
      $this->db->update('penawaran');
    
    }
    redirect('Qr/tambahVendor/'.$qr);
  }



    public function detailQuotation($id){
       $datax['notif']= $this->QrModel->getNotifikasi(); $datax['edit']= $this->QrModel->getNotifEdit();
      $data['komen']= $this->QrModel->getKomen($id);
       $data['list'] = $this->QrModel->getQrById($id);
        $this->load->view('admin/header',$datax);
        $this->load->view('admin/detailQuotation', $data);
        $this->load->view('admin/footer');
    }

    public function baca($id){
      $this->db->set('status_lihat',1);
      $this->db->where('id_penawaran',$id);
      $this->db->where('user !=',$this->session->userdata('logged_in')['username'] );
      $this->db->update('komen');
      if($this->session->userdata('logged_in')['hak_akses']==1){
      redirect('Qr/detailQuotation/'.$id);
    }else{
       redirect('Qr/detailQuotationUser/'.$id);
    }
    }
      public function bacaEdit($id){
      $this->db->set('status_edit',0);
      $this->db->where('id_penawaran',$id);
      $this->db->update('penawaran');
      
      redirect('Qr/detailQuotation/'.$id);

    }

    public function detailQuotationUser($id){
        $datax['notif']= $this->QrModel->getNotifikasi();
         $data['komen']= $this->QrModel->getKomen($id);
       $data['list'] = $this->QrModel->getQrById($id);
       if($this->session->userdata('logged_in')['hak_akses']==2){
        $this->load->view('user/header',$datax);
        $this->load->view('admin/detailQuotation', $data);
        $this->load->view('admin/footer');
      }else if($this->session->userdata('logged_in')['hak_akses']==4){
        $this->load->view('Personal/header',$datax);
        $this->load->view('Personal/detailQuotation', $data);
        $this->load->view('admin/footer');
         }

    }

    public function detailQuotationAll($id){
      $datax['notif']= $this->QrModel->getNotifikasi();
         $data['komen']= $this->QrModel->getKomen($id);
       $data['list'] = $this->QrModel->getQrById($id);
       if($this->session->userdata('logged_in')['hak_akses']==2){
        $this->load->view('user/header',$datax);
        $this->load->view('user/detailQuotationAll', $data);
        $this->load->view('admin/footer');
      }else if($this->session->userdata('logged_in')['hak_akses']==4){
        $this->load->view('Personal/header',$datax);
 $this->load->view('user/detailQuotationAll', $data);
        $this->load->view('admin/footer');
         }else{
         $this->load->view('read_only/header');
        $this->load->view('read_only/editQuotation', $data);
        $this->load->view('admin/footer');
    }
    }

    public function editQuotation($id){
      $config['upload_path'] = './assets/file_qr/';
            $config['allowed_types'] = 'pdf|jpg|png|jpeg|doc|docx|xlsx';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
                $this->load->library('upload', $config);
$this->upload->initialize($config);

          if($this->upload->do_upload('fupload')){

  $this->QrModel->editQuotationGambar();
   $this->session->set_flashdata('editQr','<div class="alert alert-success" role="alert">SUKSES EDIT QUOTATION <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
               redirect('Qr/', 'refresh');
                 

            }else{
             
               $this->QrModel->editQuotation();
                  $this->session->set_flashdata('editQr','<div class="alert alert-success" role="alert">SUKSES EDIT QUOTATION <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
               redirect('Qr/', 'refresh');
            } 
    }


    public function editQuotationUser($id){
     $config['upload_path'] = './assets/file_qr/';
            $config['allowed_types'] = 'pdf|jpg|png|jpeg|doc|docx|xlsx';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
                $this->load->library('upload', $config);
$this->upload->initialize($config);
          if($this->upload->do_upload('fupload')){

  $this->QrModel->editQuotationGambar();
   $this->session->set_flashdata('editQr','<div class="alert alert-success" role="alert">SUKSES EDIT QUOTATION <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');


               redirect('Qr/tracking', 'refresh');
                 

            }else{
             
               $this->QrModel->editQuotation();
                  $this->session->set_flashdata('editQr','<div class="alert alert-success" role="alert">SUKSES EDIT QUOTATION <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
               redirect('Qr/tracking', 'refresh');
            } 
    }


    public function editQuotationPersonal($id){
     $config['upload_path'] = './assets/file_qr/';
            $config['allowed_types'] = 'pdf|jpg|png|jpeg|doc|docx|xlsx';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
                $this->load->library('upload', $config);
$this->upload->initialize($config);
          if($this->upload->do_upload('fupload')){

  $this->QrModel->editQuotationGambar();
   $this->session->set_flashdata('editQr','<div class="alert alert-success" role="alert">SUKSES EDIT QUOTATION <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

              
               redirect('Qr/tracking_personal', 'refresh');
                 

            }else{
             
               $this->QrModel->editQuotation();
                  $this->session->set_flashdata('editQr','<div class="alert alert-success" role="alert">SUKSES EDIT QUOTATION <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
               redirect('Qr/tracking_personal', 'refresh');
            } 
    }

    public function tambahVen($id){

        $id=array();
        $vendor=array();
        $harga=array();
       $tgl = date('Y-m-d');
        $id= $this->input->post('id');
        $vendor= $this->input->post('vendor');
        $harga= $this->input->post('harga');
        $cek= true;
        $number_of_files = sizeof($_FILES['userfiles']['tmp_name']);

        $files=$_FILES['userfiles'];
        $config['upload_path'] = './assets/file_qr/';
            $config['allowed_types'] = 'pdf|jpg|png|jpeg|doc|docx|xlsx';
            $config['max_size']= 1000000000;
            $config['max_width']= 10240;
            $config['max_height']=7680;
        
        for ($i=0; $i < $number_of_files ; $i++) { 
            
            $_FILES['userfile']['name']= $files['name'][$i];
             $_FILES['userfile']['type']= $files['type'][$i];
              $_FILES['userfile']['tmp_name']= $files['tmp_name'][$i];
               $_FILES['userfile']['error']= $files['error'][$i];
                $_FILES['userfile']['size']= $files['size'][$i];
                $this->upload->initialize($config);
                $d = $harga[$i];
             $d = str_replace('Rp', '', $d);
              $d = str_replace('.', '', $d);
               $d = str_replace(' ', '', $d);
            if($this->upload->do_upload('userfile')){
                $data = array(
                    'id_penawaran' => $id[$i],
                    'tanggal' => $tgl,
                    'nama_vendor' => $vendor[$i],
                    'harga' => $d,
                    'detail' => $this->upload->data('file_name'),
                      'status' => 1,
            );
         $this->db->insert('detail_penawaran', $data);
         $this->session->set_flashdata('tambahVendor','<div class="alert alert-success" role="alert">SUKSES TAMBAH DATA VENDOR <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
         $ids = $id[$i];
       
            }else{
               $data = array(
                    'id_penawaran' => $id[$i],
                    'tanggal' => $tgl,
                    'nama_vendor' => $vendor[$i],
                    'harga' => $d,
                      'status' => 1,
            );
         $this->db->insert('detail_penawaran', $data);
         $this->session->set_flashdata('tambahVendor','<div class="alert alert-success" role="alert">SUKSES TAMBAH DATA VENDOR <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
         $ids = $id[$i];
               
            }
            
        }

        if ($this->cekVendor($ids) ==1){
           $data2 = array(
            'status' =>3);
         }else if($this->cekVendor($ids) >=1){
           $data2 = array(
            'status' =>1);
         }
         
         $this->db->where('id_penawaran',$ids );
         $this->db->update('penawaran',$data2);

         redirect("Qr/tambahVendor/$ids", 'refresh');

    }

    public function cekVendor($no){
      $query=$this->db->select('count(*) as jumlah')->from('detail_penawaran')->where('id_penawaran',$no)->get();
        //$results=array();
      $jumlah=0;
            if($query->num_rows() > 0){
               foreach ($query->result() as $key ) {
                $jumlah = $key->jumlah;
                return $jumlah;
        
      }


            }else{
            return $jumlah;
            }

  
    }

    public function tracking()
    {   $datax['notif']= $this->QrModel->getNotifikasi();
      $data['icon']= $this->QrModel->getIcon();
     $data['Qr']=$this->QrModel->getQr_tracking();
        $this->load->view('user/header',$datax);
        $this->load->view('user/Tracking_Qr',$data);
        
    }

    public function tambahCatatan(){
      $this->QrModel->tambahCatatan();
      redirect('Qr');
    }

    public function tracking_personal()
    {  
        $data['icon']= $this->QrModel->getIcon();
        $datax['notif']= $this->QrModel->getNotifikasi();
        $data['Qr']=$this->QrModel->getQr_tracking_personal();

        $this->load->view('Personal/header',$datax);
        $this->load->view('Personal/Tracking_Qr',$data);
      
    }

    public function endChat($id){
      $this->db->set('status', 2);
      $this->db->where('id_penawaran',$id);
      $this->db->update('komen');
        if($this->session->userdata('logged_in')['hak_akses']==1){
                 redirect('Qr/');
        
    }else if($this->session->userdata('logged_in')['hak_akses']==2){
             redirect('Qr/tracking');
    }else if($this->session->userdata('logged_in')['hak_akses']==4){
           redirect('Qr/tracking_personal');
    
    }
 

    }


      public function export(){
   
    $excel = new PHPExcel();
  
    $excel->getProperties()->setCreator('My Notes Code')
                 ->setLastModifiedBy('My Notes Code')
                 ->setTitle("Data Quotation")
                 ->setSubject("QR")
                 ->setDescription("Laporan Semua Data Quotation Request")
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
    $excel->setActiveSheetIndex(0)->setCellValue('C1', "TANGGAL_BUTUH"); // Set kolom C3 dengan tulisan "NAMA"
    $excel->setActiveSheetIndex(0)->setCellValue('D1', "KODE_QR"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
    $excel->setActiveSheetIndex(0)->setCellValue('E1', "SECTION"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('F1', "PIC"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('G1', "ITEM"); // Set kolom E3 dengan tulisan "ALAMAT"
  
    $excel->setActiveSheetIndex(0)->setCellValue('H1', "BAHAN"); // Set kolom E3 dengan tulisan "ALAMAT"// Set kolom E3 
    $excel->setActiveSheetIndex(0)->setCellValue('I1', "DETAIL"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('J1', "NAMA_VENDOR"); 
    $excel->setActiveSheetIndex(0)->setCellValue('K1', "HARGA");
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
        $excel->getActiveSheet()->getStyle('K1')->applyFromArray($style_col);


   
    $siswa = $this->QrModel->getQrJoin();
    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
    $numrow = 2; // Set baris pertama untuk isi tabel adalah baris ke 4
    foreach($siswa as $data){ // Lakukan looping pada variabel siswa
      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->tanggal);
      $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->tanggal_butuh);
      $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->kode_qr);
      $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->section);
      $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->pic);
      $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->item);
      $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->bahan);
      $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->detail);
      $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->nama_vendor);
      $excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data->harga);
      
      
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
  
      $excel->getActiveSheet()->getColumnDimension('K')->setWidth(25);
  
    $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
    // Set orientasi kertas jadi LANDSCAPE
    $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
    // Set judul file excel nya
    $excel->getActiveSheet(0)->setTitle("Laporan Data QR");
    $excel->setActiveSheetIndex(0);
   
    $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
    ob_end_clean();
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Data QR.xlsx"');
    $write->save('php://output');
  }
  public function kosongkan(){
    $this->db->empty_table('detail_penawaran');
    $this->db->empty_table('penawaran');
    
    redirect('Qr');
  }


     
	
}

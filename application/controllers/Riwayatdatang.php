<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayatdatang extends CI_Controller {
	///

	public function __construct()
    {
        parent::__construct();
         $this->load->model('RiwayatdatangModel');
         $this->load->model('Purch_reqModel');
         $this->load->helper('url','form');
          $this->load->helper('url','form','download');
          $this->load->library('excel','upload');
        // $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
         // $this->load->library('excel','upload');

    
    }

public function index()
	{
		$data['Po']= $this->RiwayatdatangModel->getPo();
        
		$this->load->view('Admin/header');
        $this->load->view('Admin/Riwayatdatang',$data);
 }

public function inserttanggal(){
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
        $this->load->model('RiwayatdatangModel');
         
        $this->form_validation->set_rules('tgl_dtg', 'tgl_dtg', 'trim|required');
        if ($this->form_validation->run()==FALSE) {
            $this->load->view('Admin/header');
            $this->load->view('Admin/Riwayatdatang');
            $this->load->view('Admin/footer');

            $this->session->set_flashdata('tambah Data Kedatangan','<div class="alert alert-success" role="alert">GAGAL TAMBAH DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        }else{
           
            $xx = $this->RiwayatdatangModel->inserttanggal();

            if($xx == 1){
              echo "<script>alert('Gagal di tambahkan, quantity terlalu banyak')</script>";
              redirect('Riwayatdatang', 'refresh');
            }else{
                $this->session->set_flashdata('tambah Data Kedatangan','<div class="alert alert-success" role="alert">SUKSES TAMBAH DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('Riwayatdatang', 'refresh');
            }

              
        }

    }

    public function detaildatang($id)
    {
        $data['Detail']= $this->RiwayatdatangModel->getDetail($id);
        
        $this->load->view('Admin/header');
        $this->load->view('Admin/Detailriwayat',$data);
 }

  public function deleteriwayat($id, $id_bayangan){
        $this->RiwayatdatangModel->deleteriwayat($id, $id_bayangan);
                $this->session->set_flashdata('deleteRiwayat','<div class="alert alert-success" role="alert">SUKSES DELETE DATA <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Riwayatdatang/detaildatang/'.$id_bayangan, 'refresh');
    }


    public function export(){
    // Load plugin PHPExcel nya
    //include APPPATH.'third_party/PHPExcel/PHPExcel.php';
    
    // Panggil class PHPExcel nya
    $excel = new PHPExcel();
    // Settingan awal fil excel
    $excel->getProperties()->setCreator('My Notes Code')
                 ->setLastModifiedBy('My Notes Code')
                 ->setTitle("Data riwayatdatang")
                 ->setSubject("riwayatdatang")
                 ->setDescription("Laporan Semua Data riwayatdatang")
                 ->setKeywords("Data riwayatdatang");
    // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
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
    // Set kolom A3 dengan tulisan "NO"
    $excel->setActiveSheetIndex(0)->setCellValue('A1', "TANGGAL PO"); // Set kolom B3 dengan tulisan "NIS"
    $excel->setActiveSheetIndex(0)->setCellValue('B1', "NOMER PO"); // Set kolom C3 dengan tulisan "NAMA"
    $excel->setActiveSheetIndex(0)->setCellValue('C1', "ETA"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
    // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('D1', "NOMER PR"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('E1', "ITEM"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('F1', "QTY TO PO");
    $excel->setActiveSheetIndex(0)->setCellValue('G1', "TANGGAL DATANG");
    $excel->setActiveSheetIndex(0)->setCellValue('H1', "QTY DATANG"); // Set kolom E3 dengan tulisan "ALAMAT"// Set kolom E3 
     // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->getActiveSheet()->getStyle('A1')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('B1')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('C1')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('D1')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('E1')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('F1')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('G1')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('H1')->applyFromArray($style_col);
   
   

    // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
    $siswa = $this->RiwayatdatangModel->getExport();
    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
    $numrow = 2; // Set baris pertama untuk isi tabel adalah baris ke 4
    foreach($siswa as $data){ // Lakukan looping pada variabel siswa
      
      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $data->tgl_po);
      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->no_po);
      $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->eta);
      
      $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->no_pr);
      $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->item);
      $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->qty);
      $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->tgl_dtg);
      $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->qty_dtg);
     
      
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
    
    
    $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
    // Set orientasi kertas jadi LANDSCAPE
    $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
    // Set judul file excel nya
    $excel->getActiveSheet(0)->setTitle("Laporan Data riwayatdatang");
    $excel->setActiveSheetIndex(0);
   
    $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
    ob_end_clean();
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Data riwayatdatang.xlsx"');
    $write->save('php://output');
  }

   
}

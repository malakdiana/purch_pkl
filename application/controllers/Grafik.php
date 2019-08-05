<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grafik extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('GrafikModel');
		   $this->load->model('QrModel');
		 $this->load->helper('url','form','download');
		  $this->load->library('excel','upload');
		       $this->load->database();
if (!$this->session->userdata('logged_in')) {
	      redirect('Login','refresh');
	    }

	
	}

public function index()
	{ $datax['notif']= $this->QrModel->getNotifikasi(); $datax['edit']= $this->QrModel->getNotifEdit();
		$data['grafik']= $this->GrafikModel->getSupplier();
		$data['pr'] = $this->GrafikModel->getPrOpen();
		$data['qr'] = $this->GrafikModel->getQrOpen();
		$data['eta'] = $this->GrafikModel->eta();
		$data['delay'] = $this->GrafikModel->delay();
		$data['section'] = $this->GrafikModel->getSection();
		$this->load->view('admin/header',$datax);
   // $this->load->view('admin/footer');
       $this->load->view('admin/grafik2',$data);
   
	}

	public function setting(){
		 $datax['notif']= $this->QrModel->getNotifikasi(); $datax['edit']= $this->QrModel->getNotifEdit();
		$data['user']= $this->AddModel->getUser();
		$this->load->view('admin/header',$datax);
		$this->load->view('admin/setting',$data);
	}

	  function getSupplier(){
        $tgl= $this->input->post('tgl');
      
        $dataa=$this->db->select('supplier, sum(qty*harga) as jumlah')->from('bayangan')->join('po','po.id_po = bayangan.id_po')->where("SUBSTRING_INDEX(SUBSTRING_INDEX(tgl_po,' ',1),'/',-2) =",$tgl)->group_by('po.supplier')->order_by('jumlah','DESC')->get();
        echo json_encode($dataa->result());
    }
      function getSection(){
       $tgl= $this->input->post('tgl');
         $dataa=$this->db->query("SELECT s.nama_section, p.jumlah from section as s left join ( SElect pr.section, sum(qty*harga) as jumlah from purch_req as pr inner join bayangan as b on b.id_pr=pr.id inner join po on po.id_po = b.id_po where SUBSTRING_INDEX(SUBSTRING_INDEX(po.tgl_po,' ',1),'/',-2) = '$tgl' GROUP BY pr.section ) as p on s.nama_section=p.section ORDER BY p.jumlah ASC");
        echo json_encode($dataa->result());
    }

       public function export(){
    // Load plugin PHPExcel nya
    //include APPPATH.'third_party/PHPExcel/PHPExcel.php';
    
    // Panggil class PHPExcel nya
    $excel = new PHPExcel();
    // Settingan awal fil excel
    $excel->getProperties()->setCreator('My Notes Code')
                 ->setLastModifiedBy('My Notes Code')
                 ->setTitle("Grafik amount supplier")
                 ->setSubject("Grafik")
                 ->setDescription("Laporan Grafik amount supplier")
                 ->setKeywords("Grafik amount supplier");
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
    //$excel->setActiveSheetIndex(0)->setCellValue('A1', "no"); // Set kolom A3 dengan tulisan "NO"
    $excel->setActiveSheetIndex(0)->setCellValue('A1', "supplier"); // Set kolom B3 dengan tulisan "NIS"
    $excel->setActiveSheetIndex(0)->setCellValue('B1', "presentasi jumlah"); // Set kolom C3 dengan tulisan "NAMA"
    // Set kolom E3 dengan tulisan "ALAMAT"
   
    //$excel->getActiveSheet()->getStyle('A1')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('A1')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('B1')->applyFromArray($style_col);
   
   
    // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
    $tgldownload= $this->input->post('tgldownload');
    $siswa = $this->GrafikModel->getExport($tgldownload);
    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
    $numrow = 2; // Set baris pertama untuk isi tabel adalah baris ke 4
    foreach($siswa as $data){ // Lakukan looping pada variabel siswa
      //$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $data->no);
      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $data->supplier);
      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->jumlah);
     
    
     
      
      $no++; // Tambah 1 setiap kali looping
      $numrow++; // Tambah 1 setiap kali looping
    }
    // Set width kolom
    $excel->getActiveSheet()->getColumnDimension('A')->setWidth(30); // Set width kolom A
    $excel->getActiveSheet()->getColumnDimension('B')->setWidth(30); // Set width kolom B
   
    //$excel->getActiveSheet()->getColumnDimension('E')->setWidth(25);
   
    $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
    // Set orientasi kertas jadi LANDSCAPE
    $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
    // Set judul file excel nya
    $excel->getActiveSheet(0)->setTitle("Laporan Grafik amount supplier");
    $excel->setActiveSheetIndex(0);
   
    $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
    ob_end_clean();
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Grafik amount supplier.xlsx"');
    $write->save('php://output');
  }
}
	


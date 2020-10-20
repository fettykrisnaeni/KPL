<?php
session_start();
error_reporting(0);
require "../../assets/PHPExcel/PHPExcel.php";
include "../../db/connection.php";
$excel = new PHPExcel();

// Settingan awal file excel
$excel->getProperties()->setCreator('My Notes Code')
             ->setLastModifiedBy('My Notes Code')
             ->setTitle("Data Survey")
             ->setSubject("Survey")
             ->setDescription("Laporan Data Survey")
             ->setKeywords("Data Survey");



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



$excel->setActiveSheetIndex(0)->setCellValue('A1', "LAPORAN DATA HASIL SURVEY KEPUASAN NASABAH"); // Set kolom A1 dengan tulisan "DATA SISWA"
$excel->getActiveSheet()->mergeCells('A1:G1'); // Set Merge Cell pada kolom A1 sampai F1
$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1


// Buat header tabel nya pada baris ke 3
$excel->setActiveSheetIndex(0)->setCellValue('A3', "No."); // Set kolom A3 dengan tulisan "NO"
$excel->setActiveSheetIndex(0)->setCellValue('B3', "Nama User"); // Set kolom B3 dengan tulisan "NIS"
$excel->setActiveSheetIndex(0)->setCellValue('C3', "Respon"); // Set kolom C3 dengan tulisan "NAMA"
$excel->setActiveSheetIndex(0)->setCellValue('D3', "Jenis Transaksi"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
$excel->setActiveSheetIndex(0)->setCellValue('E3', "Keterangan"); // Set kolom E3 dengan tulisan "TELEPON"
$excel->setActiveSheetIndex(0)->setCellValue('F3', "Tanggal"); // Set kolom F3 dengan tulisan "ALAMAT"
$excel->setActiveSheetIndex(0)->setCellValue('G3', "Posisi"); // Set kolom G3 dengan tulisan "Proses"


// Apply style header yang telah kita buat tadi ke masing-masing kolom header
$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);


// Set height baris ke 1, 2 dan 3
$excel->getActiveSheet()->getRowDimension('1')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('2')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('3')->setRowHeight(20);


  if($_GET[user] !='' && $_GET[tgl_akhir] !='' && $_GET[tgl_awal] !=''){
    $data=mysqli_query($connection, "SELECT * from hasil_survey WHERE id_user='$_GET[user]' AND ((tanggal_waktu) BETWEEN '$_GET[tgl_awal]' AND '$_GET[tgl_akhir]')  ");

  }

  elseif($_GET[user] =='' && $_GET[tgl_akhir] !='' && $_GET[tgl_awal] !=''){
    $data=mysqli_query($connection, "SELECT * from hasil_survey WHERE tanggal_waktu BETWEEN '$_GET[tgl_awal]' AND '$_GET[tgl_akhir]'  ");

  }

  elseif($_GET[user] !='' && $_GET[tgl_akhir] =='' && $_GET[tgl_awal] ==''){
    $data=mysqli_query($connection, "SELECT * from hasil_survey WHERE id_user='$_GET[user]' ");

  }

  elseif($_GET[user] =='' && $_GET[tgl_akhir] =='' && $_GET[tgl_awal] =='') {
    $data=mysqli_query($connection, "SELECT * from hasil_survey");
  }
  
  $jml = mysqli_num_rows($data);

  $n=0;
  $numrow = 4;
                    
  if($jml==0){
    $excel->setActiveSheetIndex(0)->setCellValue('A4','-- Data Kosong --');
    $excel->getActiveSheet()->mergeCells('A4:G4'); // Set Merge Cell pada kolom A1 sampai F1
  }

  else {
    while($row=mysqli_fetch_array($data)){
                
      $user=mysqli_query($connection, "SELECT * from user where id_user=$row[id_user]");
      $oke = mysqli_fetch_array($user);
      $n++;

      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $n);
      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $oke['nama']);
      $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $row['respon']);
      $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $row['jenis_transaksi']);
      $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $row['keterangan']);
      $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $row['tanggal_waktu']);
      $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $oke['posisi']);        

      $numrow++;
    }

  }

// Set width kolom
$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
$excel->getActiveSheet()->getColumnDimension('B')->setWidth(25); // Set width kolom B
$excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
$excel->getActiveSheet()->getColumnDimension('D')->setWidth(25); // Set width kolom D
$excel->getActiveSheet()->getColumnDimension('E')->setWidth(50); // Set width kolom E
$excel->getActiveSheet()->getColumnDimension('F')->setWidth(25); // Set width kolom F
$excel->getActiveSheet()->getColumnDimension('G')->setWidth(25); // Set width kolom F


// Set orientasi kertas jadi LANDSCAPE
$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);


// Set judul file excel nya
$excel->getActiveSheet(0)->setTitle("Laporan Hasil Survey"); //filename
$excel->setActiveSheetIndex(0);


// Proses file excel
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="Laporan Hasil Survey.xlsx"'); // Set nama file excel nya
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');
// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0



$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
$write->save('php://output');


?>

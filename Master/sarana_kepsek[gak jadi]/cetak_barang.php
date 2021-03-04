<?php
	session_start();
	include "config.php";
	include "../assets/pdf/fpdf.php";

	$pdf = new FPDF("P", "mm", "A4");
	$pdf->AddPage();

	//$pdf->Image('../img/logo1.jpg',10,8,50);
	$pdf->SetFont('Arial', 'B', 18);
	$pdf->Text(62, 25, "SURAT IZIN OPERASIONAL");

	$pdf->Text(52, 31, "KLINIK PRATAMA RAWAT JALAN");

	$pdf->SetFont('Arial', 'U', 16);
	$pdf->Text(47, 45, "KEPUTUSAN KEPALA DINAS KESEHATAN ");

	$no = $_GET['No'];
	$query=mysqli_query($conn, "SELECT * from Data_Pemohon where No='$no'");
	$lihat=mysqli_fetch_array($query);


	$pdf->SetFont('Arial', '', 12);
	$pdf->Text(63, 50, "No: " .$lihat['Nomer_Urut']);

	$pdf->SetFont('Arial', 'B', 16);
	$pdf->Text(90, 60, "Tentang");

	$pdf->SetFont('Arial', 'B', 18);
	$pdf->Text(35, 70, "Izin  Operasional Klinik Pratama Rawat Jalan");

	$pdf->SetFont('Arial', 'B', 14);
	$pdf->Text(92, 84, "Kepada");

	$pdf->SetFont('Arial', '', 12);
	$pdf->Text(43, 90, "Badan Usaha                           : ".$lihat['Badan_Hukum']);
	$pdf->SetFont('Arial', '', 12);
	$pdf->Text(43, 95, "No. dan Tgl. Akte Notaris         : ".$lihat['No_Notaris_atau_Menteri_Kehakiman']);
	$pdf->SetFont('Arial', '', 12);
	$pdf->Text(43, 100, "Tempat Kedudukan                  : ".$lihat['Tempat_Kedudukan']);
	$pdf->SetFont('Arial', '', 12);
	$pdf->Text(43, 105, "No. Izin Mendirikan Bangunan : ".$lihat['No_IMB']);

	$pdf->SetFont('Arial', 'B', 22);
	$pdf->Text(52, 120, "Untuk  menyelenggarakan :");

	$pdf->SetFont('Arial', '', 12);
	$pdf->Text(31, 130, "KLINIK  PRATAMA RAWAT JALAN : ".$lihat['Klinik_Pratama']);
	$pdf->SetFont('Arial', '', 12);
	$pdf->Text(31, 135, "A L A M A T                                       : ".$lihat['Alamat_Klinik']);
	$pdf->SetFont('Arial', '', 12);
	$pdf->Text(31, 140, "PENANGGUNG  JAWAB                  : ".$lihat['Penanggung_Jawab']);
	$pdf->SetFont('Arial', '', 12);

	$tgl_berlaku = $lihat['Tgl_Berlaku'];
	setlocale(LC_ALL, 'IND');
	$tgl_berlaku1 = strftime("%d %B %Y", strtotime($tgl_berlaku));

	$tgl_jtempo = $lihat['Tgl_JatuhTempo'];
	setlocale(LC_ALL, 'IND');
	$tgl_jtempo1 = strftime("%d %B %Y", strtotime($tgl_jtempo));

	$tgl_keluar = $lihat['Tgl_Dikeluarkan'];
	setlocale(LC_ALL, 'IND');
	$tgl_keluar1 = strftime("%d %B %Y", strtotime($tgl_keluar));
	

	$pdf->Text(31, 145, "B E R L A K U 											                        : "."Selama ".$lihat['Lama_Izin']. "terhitung dari");
  $pdf->Text(103, 150, $tgl_berlaku1. " s/d ". $tgl_jtempo1 );

	$pdf->SetFont('Arial', '', 12);
	$pdf->Text(130, 165, "Ditetapkan di: ". "SURABAYA");
	$pdf->SetFont('Arial', '', 12);
	$pdf->Text(130, 170, "Pada tanggal: ".$tgl_keluar1);
	$pdf->SetFont('Arial', '', 12);
	$pdf->Text(130, 172, "_________________________");
	$pdf->Text(144, 178, "KEPALA DINAS,");

  $pdf->SetFont('Arial', 'U', 12);
	$pdf->Text(133, 205, "drg. Febria Rachmanita, MA ");

	$pdf->SetFont('Arial', '', 12);
	$pdf->Text(139, 210, "Pembina Utama Muda  ");
	$pdf->Text(134, 215, "NIP 196502281992032008  ");




	// $pdf->Text(48, 30, "KLINIK PRATAMA RAWAT JALAN");
	// $pdf->Text(48, 30, "KLINIK PRATAMA RAWAT JALAN");
	// $pdf->Text(48, 30, "KLINIK PRATAMA RAWAT JALAN");
	// $pdf->Text(48, 30, "KLINIK PRATAMA RAWAT JALAN");
	// $pdf->Text(48, 30, "KLINIK PRATAMA RAWAT JALAN");
	// $pdf->Text(48, 30, "KLINIK PRATAMA RAWAT JALAN");
	// $pdf->Text(48, 30, "KLINIK PRATAMA RAWAT JALAN");
	// $pdf->Text(48, 30, "KLINIK PRATAMA RAWAT JALAN");

	// $pdf->SetFont('Arial', '', 14);
	// $pdf->Text(70, 55, "LAPORAN bla bla");
	//
	// $no = $_GET['No'];
	// $query=mysqli_query($conn, "SELECT * from Data_Pemohon where No='$no'");
	// $lihat=mysqli_fetch_array($query);
	//
	// $pdf->Text(50, 65, "ak " .$lihat['Nomer_Urut']. " ku");

	// $pdf->SetFont('Arial', '', 12);
	// $pdf->Text(10, 65, "No Laporan");
	// $pdf->Text(50, 65, " : ".$id);
	//
	// $pdf->Text(10, 70, "Nama Pelanggan");
	// $pdf->Text(50, 70, " : ".$nama);
	//
	// $pdf->Text(10, 75, "Kontak");
	// $pdf->Text(50, 75, " : ".$telepon." / ".$email);
	//
	// $pdf->Text(10, 80, "Hari, Tanggal");
	// $pdf->Text(50, 80, " : ".SearchDay($tanggal).", ".ReportDate($tanggal));
	//
	// $pdf->SetXY(10, 85);
	// $pdf->cell(0, 5, "", 1,0, 'R');
	//
	// $pdf->Text(15, 89, "Isi Keluhan");
	// $pdf->Text(50, 89, " : ".$permintaan);
	//
	// $pdf->SetXY(10, 90);
	// $pdf->cell(0, 110, "", 1,0, 'R');
	//
	//
	// $pdf->SetXY(10, 200);
	// $pdf->cell(0, 35, "", 1,0, 'R');
	// $pdf->Text(150, 210, "Dilaporkan Oleh:", 1,0,'R');
	// $pdf->Text(151, 230, ".........................", 0,0,'R');


	$pdf->Output("Surat izin operasional.pdf","I");
?>

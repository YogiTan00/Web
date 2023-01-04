<?php
Class ReportDataKaryawan extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('pdf');
    }
    
    function index(){
        $pdf = new FPDF('L','mm','legal');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->setTopMargin(22);
        $pdf->setLeftMargin(5);
        
        // Logo
        $pdf->Image(base_url('img/Bethel.jpg'),10,15,55);
        $pdf->Cell(80);
        $pdf->SetTextColor(0,0,128);
        $pdf->SetFont('Times','B',20);
        $pdf->Cell(420,7,'Bethel',0,1,'C');
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Times','',12);
        $pdf->Cell(345,7,'Sekolah SMA Bethel',0,1,'R');
        $pdf->SetTextColor(0,0,0);
        $pdf->Cell(345,7,'RW.3, Dadap, Kec. Kosambi, Tangerang, Banten 15211',0,1,'R');
        $pdf->SetTextColor(0,0,128);
        $pdf->Cell(345,7,'Sekolah SD Bethel',0,1,'R');
        $pdf->SetTextColor(0,0,0);
        $pdf->Cell(345,7,'Perumahan, Jl. Villa Taman Bandara No.Blok B, Dadap, Kec. Kosambi, Tangerang, Banten 15211',0,1,'R');
        $pdf->Cell(345,7,'0821-2200-3767',0,1,'R');
        $pdf->Ln(15);

        // mencetak string 
        $pdf->SetTextColor(0,0,0);
        $pdf->SetFont('Times','B',18);
        $pdf->Cell(350,7,'Daftar Siswa',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Times','B',11);
        $pdf->Cell(21,6,'ID',1,0,'C');
        $pdf->Cell(55,6,'FULLNAME',1,0,'C');
        $pdf->Cell(25,6,'GENDER',1,0,'C');
        $pdf->Cell(25,6,'RELIGION',1,0,'C');
        $pdf->Cell(55,6,'ADDRESS',1,0,'C');
        $pdf->Cell(28,6,'PHONE',1,0,'C');
        $pdf->Cell(16,6,'ACTIVE',1,1,'C');
        
        $pdf->SetFont('Times','',11);
        $data_siswa = $this->db->get('dt_siswa')->result();
        foreach ($data_siswa as $row){
            $pdf->Cell(21,6,$row->id,1,0);
            $pdf->Cell(55,6,$row->fullname,1,0);
            $pdf->Cell(25,6,$row->gender,1,0);
            $pdf->Cell(25,6,$row->religion,1,0);
            $pdf->Cell(55,6,$row->address,1,0);
            $pdf->Cell(28,6,$row->phone,1,0);
            $pdf->Cell(16,6,$row->active,1,1,'C');
        }
        $pdf->Output('daftar_siswa','I');
    }
}
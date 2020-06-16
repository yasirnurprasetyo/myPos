<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Laporan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array("ModelItem","ModelCustomer","ModelSuplier","ModelGrafik"));
        date_default_timezone_set('Asia/Jakarta');
        notLogin();
    }

    public function barang()
    {
        $filename = "Daftar List Barang/Item";
        $listItem = $this->ModelItem->getAll();
        $file = new Spreadsheet;
        $file->setActiveSheetIndex(0)
        ->mergeCells("A1:F1")
        ->setCellValue("A1",$filename)
        ->setCellValue("A2","No")
        ->setCellValue("B2","Kode Barang")
        ->setCellValue("C2","Nama Barang")
        ->setCellValue("D2","Kategori")
        ->setCellValue("E2","Unit")
        ->setCellValue("F2","Stock Barang");

        $file->setActiveSheetIndex(0)
        ->getStyle("A1")
        ->applyFromArray($this->header());
        $file->setActiveSheetIndex(0)
        ->getStyle("A2:F2")
        ->applyFromArray($this->header());

        $file->setActiveSheetIndex(0)->getColumnDimension("A")->setAutoSize(true);
		$file->setActiveSheetIndex(0)->getColumnDimension("B")->setAutoSize(true);
		$file->setActiveSheetIndex(0)->getColumnDimension("C")->setAutoSize(true);
		$file->setActiveSheetIndex(0)->getColumnDimension("D")->setAutoSize(true);
		$file->setActiveSheetIndex(0)->getColumnDimension("E")->setAutoSize(true);
		$file->setActiveSheetIndex(0)->getColumnDimension("F")->setAutoSize(true);

        $baris = 3;
        $no = 1;
        foreach ($listItem as $s){
            $file->setActiveSheetIndex(0)
            ->setCellValue("A".$baris, $no++)
            ->setCellValue("B".$baris, $s->barcode)
            ->setCellValue("C".$baris, $s->nama)
            ->setCellValue("D".$baris, $s->kategori_nama)
            ->setCellValue("E".$baris, $s->unit_nama)
            ->setCellValue("F".$baris, $s->stock);
            $baris++;
        }
        $writer = new Xlsx($file);
        $filename = $filename . ".xlsx";
        header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment;filename:='$filename'");
        header("Cache-Control: max-age-0");
        $writer->save("php://output");
    }

    public function customer()
    {
        $filename = "Daftar List Customer/Pelanggan";
        $listCustomer = $this->ModelCustomer->getAll();
        $file = new Spreadsheet;
        $file->setActiveSheetIndex(0)
        ->mergeCells("A1:E1")
        ->setCellValue("A1",$filename)
        ->setCellValue("A2","No")
        ->setCellValue("B2","Nama")
        ->setCellValue("C2","Jenis Kelamin")
        ->setCellValue("D2","Nomor Telepon")
        ->setCellValue("E2","Alamat");

        $file->setActiveSheetIndex(0)
        ->getStyle("A1")
        ->applyFromArray($this->header());
        $file->setActiveSheetIndex(0)
        ->getStyle("A2:E2")
        ->applyFromArray($this->header());
        
        $file->setActiveSheetIndex(0)->getColumnDimension("A")->setAutoSize(true);
		$file->setActiveSheetIndex(0)->getColumnDimension("B")->setAutoSize(true);
		$file->setActiveSheetIndex(0)->getColumnDimension("C")->setAutoSize(true);
		$file->setActiveSheetIndex(0)->getColumnDimension("D")->setAutoSize(true);
		$file->setActiveSheetIndex(0)->getColumnDimension("E")->setAutoSize(true);

        $baris = 3;
        $no = 1;
        foreach ($listCustomer as $s){
            $file->setActiveSheetIndex(0)
            ->setCellValue("A".$baris, $no++)
            ->setCellValue("B".$baris, $s->nama)
            ->setCellValue("C".$baris, $s->jk == "L" ? "Laki-laki" : "Perempuan")
            ->setCellValue("D".$baris, $s->tlpn)
            ->setCellValue("E".$baris, $s->alamat);
            $baris++;
        }
        $writer = new Xlsx($file);
        $filename = $filename . ".xlsx";
        header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment;filename:='$filename'");
        header("Cache-Control: max-age-0");
        $writer->save("php://output");
    }

    public function suplier()
    {
        $filename = "Daftar List Suplier";
        $listSuplier = $this->ModelSuplier->getAll();
        $file = new Spreadsheet;
        $file->setActiveSheetIndex(0)
        ->mergeCells("A1:F1")
        ->setCellValue("A1",$filename)
        ->setCellValue("A2","No")
        ->setCellValue("B2","Nama Suplier")
        ->setCellValue("C2","Nomor Telepon")
        ->setCellValue("D2","Alamat")
        ->setCellValue("E2","Deskripsi");

        $file->setActiveSheetIndex(0)
        ->getStyle("A1")
        ->applyFromArray($this->header());
        $file->setActiveSheetIndex(0)
        ->getStyle("A2:E2")
        ->applyFromArray($this->header());
        
        $file->setActiveSheetIndex(0)->getColumnDimension("A")->setAutoSize(true);
		$file->setActiveSheetIndex(0)->getColumnDimension("B")->setAutoSize(true);
		$file->setActiveSheetIndex(0)->getColumnDimension("C")->setAutoSize(true);
		$file->setActiveSheetIndex(0)->getColumnDimension("D")->setAutoSize(true);
		$file->setActiveSheetIndex(0)->getColumnDimension("E")->setAutoSize(true);
    
        $baris = 3;
        $no = 1;
        foreach ($listSuplier as $s){
            $file->setActiveSheetIndex(0)
            ->setCellValue("A".$baris, $no++)
            ->setCellValue("B".$baris, $s->nama)
            ->setCellValue("C".$baris, $s->tlpn)
            ->setCellValue("D".$baris, $s->alamat)
            ->setCellValue("E".$baris, $s->deskripsi);
            $baris++;
        }
        $writer = new Xlsx($file);
        $filename = $filename . ".xlsx";
        header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment;filename:='$filename'");
        header("Cache-Control: max-age-0");
        $writer->save("php://output");
    }

    private function borderStyle() {
        return array(
            'borders' => array(
                'allBorders' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => array('argb' => '00000000'),
                ),
            ),
        );
    }
 
    private function header() {
        return array(
            'font' => array(
                'bold' => true,
                'size' => 12
            ),
            'alignment' => array(
                'horizontal' => "center",
            ),
        );
    }
 
    private function setFont($size = 12, $bold = false, $alignment = "left") {
        return array(
            'font' => array(
                'bold' => $bold,
                'size' => $size
            ),
            'alignment' => array(
                'horizontal' => $alignment,
            ),
        );
    }
 
    private function dataAlign($align) {
        return array(
            'alignment' => array(
                'horizontal' => $align,
            ),
        );
    }

    public function lap_stock_barang()
    {
        $data['report'] = $this->ModelGrafik->statistik_stok();
		$this->load->view('laporan/grafik_stock_item', $data);
    }
}
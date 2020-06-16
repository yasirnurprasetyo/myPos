<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Report extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("ModelBarang");
        date_default_timezone_set('Asia/Jakarta');
        notLogin();
    }

    
}
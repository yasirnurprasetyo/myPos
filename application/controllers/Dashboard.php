<?php
class Dashboard extends CI_Controller {
	
	function __construct()
    {
        parent::__construct();
        notLogin();
        //checkAdmin();
        $this->load->model(array("ModelSales","ModelStock","ModelItem","ModelSales"));
        // $this->load->library('form_validation');
    }

	
	public function index()
	{
		notLogin();
        // $data['trans'] = $this->ModelSales->getJoinChart();
        // $data['stockin'] = $this->ModelStock->getSIn();
        // $data['stockout'] = $this->ModelStock->getSOut();
        // $data['row'] = $this->ModelSales->getMinStock();
        $chart = $this->ModelSales->getJoinChart();
        $stockin = $this->ModelStock->getSIn();
        $stockout = $this->ModelStock->getSOut();
        $sisa = $this->ModelItem->getMinStock();
        $transaksi = $this->ModelSales->hitungTransaksi();
        $barangterjual = $this->ModelItemTransaksi->hitungItemTerjual();
        $pendapatan = $this->ModelSales->hitungPendapatan();
        $data = array(
            "trans" => $chart,
            "sisas" => $sisa,
            "stockin" => $stockin,
            "stockout" => $stockout,
            "transaksi" => $transaksi,
            "barangterjual" => $barangterjual,
            "pendapatan" => $pendapatan
        );
        // echo var_dump($data);
        $this->template->load('template','dashboard', $data);
	}

    
}
<?php
Class Fungsi
{
    protected $ci;

    public function __construct()
    {
        $this->ci =& get_instance();
    }

    function user_login(){
        $this->ci->load->model('ModelUser');
        $user_id = $this->ci->session->userdata('userid');
        $user_data = $this->ci->ModelUser->get($user_id)->row();
        return $user_data;
    }

    function pdfGenerator($html, $filename, $paper, $orientation){
        $dompdf = new Dompdf\Dompdf();
        $dompdf->loadHtml($html);
        //setting kertas
        $dompdf->setPaper($paper, $orientation);
        //render html ke pdf
        $dompdf->render();
        //output generated pdf ke browser
        $dompdf->stream($filename, array('Attachment' => 0)); //attachment untuk menampilkan dulu sebelum di download
    }

    public function countItem()
    {
        $this->ci->load->model('ModelItem');
        return $this->ci->ModelItem->get()->num_rows();
    }

    public function countSuplier()
    {
        $this->ci->load->model('ModelSuplier');
        return $this->ci->ModelSuplier->get()->num_rows();
    }

    public function countCustomer()
    {
        $this->ci->load->model('ModelCustomer');
        return $this->ci->ModelCustomer->get()->num_rows();
    }

    public function countUser()
    {
        $this->ci->load->model('ModelUser');
        return $this->ci->ModelUser->get()->num_rows();
    }

    public function getJoinChart(){
        $this->ci->load->model('ModelSales');
        return $this->ci->ModelSuplier->get()->result();
    }
}

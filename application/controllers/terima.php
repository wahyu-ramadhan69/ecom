<?php
defined('BASEPATH') or exit('No direct script access allowed');

class terima extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pembeli_model', 'terima');
        $this->load->library('form_validation');
    }

    public function prosesterima($id)
    {

        $id = array('id' => $id);
        $this->Pembeli_model->Delete('transaksi', $id);
        $this->session->set_flashdata('sukses', 'Pesanan diterima');

        $id    = $this->input->post('id');
        $nama_produk        = $this->input->post('nama_produk');
        $total_harga           = $this->input->post('total_harga');

        $customer_data = array(
            'id_transaksi' => $id,
            'nama_produk' => $nama_produk,
            'harga' => $total_harga,
            'tanggal' => date('Y-m-d'),
        );

        $this->terima->terima($customer_data);

        redirect(base_url('pesanan'));
    }
}

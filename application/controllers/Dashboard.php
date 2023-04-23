<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') != "login") {
			redirect(base_url("login"));
		}
		$this->load->helper('cookie');
		$this->load->library('session');

		$this->load->model("M_user"); //load model read
		$this->load->model("M_view"); //load model read

	}
	public function index()
	{
		$username = $this->session->userdata('username');
		$data['data_user'] = $this->M_user->getUserLogin($username);
		$bulan_ini = date('n');
		$bulan_lalu = date('n')-1;
		$tahun_ini = date('Y');
		$tahun_lalu = date('Y')-1;
		$periode_bulan_ini = $bulan_ini."-".$tahun_ini;
		$periode_bulan_lalu = $bulan_lalu."-".$tahun_ini;
				
		$data['penjualan_bulan_ini'] = $this->M_view->penjualan_bulan_ini($periode_bulan_ini);
		$data['penjualan_tahun_ini'] = $this->M_view->penjualan_tahun_ini($tahun_ini);
		$data['penjualan_bulan_lalu'] = $this->M_view->penjualan_bulan_lalu($periode_bulan_lalu);
		$data['penjualan_tahun_lalu'] = $this->M_view->penjualan_tahun_lalu($tahun_lalu);

		$data['penjualan_by_barang'] = $this->M_view->penjualan_by_barang($periode_bulan_ini);
		$data['penjualan_by_customer'] = $this->M_view->penjualan_by_customer($periode_bulan_ini);

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view("dashboard", $data);
	}
}

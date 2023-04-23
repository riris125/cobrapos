<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') != "login") {
			redirect(base_url("login"));
		}
		$this->load->helper('cookie');
		$this->load->library('session');

		$this->load->model("M_view");
		$this->load->model("M_edit");
		$this->load->model("M_add");
		$this->load->model("M_delete");
		$this->load->library('session');
	}
	public function index()
	{
		$username = $this->session->userdata('username');
		$data['user'] = $this->M_view->getUserLogin($username);
		$data['barang'] = $this->M_view->barang();
		$data['kategori'] = $this->M_view->kategori();

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view("barang", $data);
	}
	public function edit($id)
	{
		$data['barang'] = $this->M_view->barangbyid($id);
		$data['kategori'] = $this->M_view->kategori();
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view("barang_edit", $data);
	}
	public function edit_simpan()
	{
		$id = $this->input->post('id');
		$id_barang = $this->input->post('id_barang');
		$id_kategori = $this->input->post('id_kategori');
		$nama_barang = $this->input->post('nama_barang');
		$merk = $this->input->post('merk');
		$harga_beli = $this->input->post('harga_beli');
		$harga_jual = $this->input->post('harga_jual');
		$satuan_barang = $this->input->post('satuan_barang');
		$stok = $this->input->post('stok');
		$tgl_update = $this->input->post('tgl_update');

		$data = array(
			'id_barang' => $id_barang,
			'id_kategori' => $id_kategori,
			'nama_barang' => $nama_barang,
			'merk' => $merk,
			'harga_beli' => $harga_beli,
			'harga_jual' => $harga_jual,
			'satuan_barang' => $satuan_barang,
			'stok' => $stok,
			'tgl_update' => $tgl_update
		);

		//$this->M_edit->pengajuan_edit($data);

		$this->M_edit->barang($data, $id);
		$this->session->set_flashdata('flash', 'Diubah');
		redirect('barang');
	}
	public function tambah_simpan()
	{
		$id_barang = $this->input->post('id_barang');
		$id_kategori = $this->input->post('id_kategori');
		$nama_barang = $this->input->post('nama_barang');
		$merk = $this->input->post('merk');
		$harga_beli = $this->input->post('harga_beli');
		$harga_jual = $this->input->post('harga_jual');
		$satuan_barang = $this->input->post('satuan_barang');
		$stok = $this->input->post('stok');
		$tgl_input = $this->input->post('tgl_input');

		$data = array(
			'id_barang' => $id_barang,
			'id_kategori' => $id_kategori,
			'nama_barang' => $nama_barang,
			'merk' => $merk,
			'harga_beli' => $harga_beli,
			'harga_jual' => $harga_jual,
			'satuan_barang' => $satuan_barang,
			'stok' => $stok,
			'tgl_input' => $tgl_input
		);

		$this->M_add->add_barang($data);
		$this->session->set_flashdata('flash', 'Disimpan');
		redirect('barang');
	}
	public function hapus($id)
	{
		$this->M_delete->hapus_barang($id);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('barang');
	}

	public function cari($key)
	{
		$data['barang'] = $this->M_view->barangbykey($key);

		//print_r($data);

		//die;
	}
}

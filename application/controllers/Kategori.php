<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
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
		$data['kategori'] = $this->M_view->kategori();

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view("kategori", $data);
	}
	public function edit_simpan()
	{
		$id_kategori = $this->input->post('id_kategori');
		$nama_kategori = $this->input->post('nama_kategori');

		$this->M_edit->kategori($id_kategori, $nama_kategori);
		$this->session->set_flashdata('flash', 'Diubah');
		redirect('kategori');
	}
	public function tambah_simpan()
	{
		$nama_kategori = $this->input->post('nama_kategori');
		$tgl_input = date("j F Y, G:i");

		$this->M_add->add_kategori($nama_kategori, $tgl_input);
		$this->session->set_flashdata('flash', 'Disimpan');
		redirect('kategori');
	}
	public function hapus($id_kategori)
	{
		$this->M_delete->hapus_kategori($id_kategori);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('kategori');
	}
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
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
		$data['customer'] = $this->M_view->customer();
		
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view("customer", $data);
	}
	public function edit_simpan()
	{
		$id_member = $this->input->post('id_member');
		$nm_member = $this->input->post('nm_member');
		$alamat_member = $this->input->post('alamat_member');
		$telepon = $this->input->post('telepon');
		$email = $this->input->post('email');
		$NIK = $this->input->post('NIK');
		$this->M_edit->customer($id_member,$nm_member,$alamat_member,$telepon,$email,$NIK);
		$this->session->set_flashdata('flash', 'Diubah');
		redirect('customer');
	}
	public function tambah_simpan()
	{
		$nm_member = $this->input->post('nm_member');
		$alamat_member = $this->input->post('alamat_member');
		$telepon = $this->input->post('telepon');
		$email = $this->input->post('email');
		$NIK = $this->input->post('NIK');
		
		$this->M_add->add_customer($nm_member,$alamat_member,$telepon,$email,$NIK);
		$this->session->set_flashdata('flash', 'Disimpan');
		redirect('customer');
	}
	public function hapus($id_member)
	{
		$this->M_delete->hapus_customer($id_member);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('customer');
	}
}

<?php


class M_add extends CI_Model
{
    function add_kategori($nama_kategori, $tgl_input)
    {
        $sql = "INSERT INTO kategori (id_kategori, nama_kategori, tgl_input) VALUES  ('', '$nama_kategori', '$tgl_input')";
        $this->db->query($sql);
    }
    function add_barang($data)
    {
        $this->db->insert('barang', $data);
        return true;
    }
    function add_customer($nm_member,$alamat_member,$telepon,$email,$NIK)
    {
        $sql = "INSERT INTO member (id_member, nm_member, alamat_member, telepon, email, NIK ) VALUES  ('', '$nm_member', '$alamat_member', '$telepon', '$email','$NIK')";
        $this->db->query($sql);
    }
    function add_profil($user,$pass_hash)
    {
        $sql = "INSERT INTO login (id_login, user, pass ) VALUES  ('', '$user', '$pass_hash')";
        $this->db->query($sql);
    }
    function add_keranjang($id_barang, $kasir, $jumlah, $total, $tgl)
    {
        $sql = "INSERT INTO penjualan (id_barang, id_login, jumlah, total, tanggal_input) VALUES  ('$id_barang', '$kasir', '$jumlah', '$total', '$tgl')";
        $this->db->query($sql);
    }
}

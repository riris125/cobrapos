<?php


class M_edit extends CI_Model
{
    function kategori($id_kategori, $nama_kategori)
    {
        $sql = "UPDATE kategori SET nama_kategori = '$nama_kategori' WHERE id_kategori = '$id_kategori'";
        $this->db->query($sql);
    }
    function barang($data, $id)
    {
        $this->db->update('barang', $data, array('id' => $id));
    }
    function customer($id_member, $nm_member,$alamat_member,$telepon,$email,$NIK)
    {
        $sql = "UPDATE member SET nm_member = '$nm_member', alamat_member = '$alamat_member', telepon = '$telepon', email = '$email', NIK = '$NIK' WHERE id_member = '$id_member'";
        $this->db->query($sql);
    }
    function profil($id_login, $user, $pass_hash)
    {
        $sql = "UPDATE login SET user = '$user', pass = '$pass_hash' WHERE id_login = '$id_login'";
        $this->db->query($sql);
    }
    function keranjang_id($id_penjualan, $jumlah, $total)
    {
        $sql = "UPDATE penjualan SET jumlah = '$jumlah', total = '$total' WHERE id_penjualan = '$id_penjualan'";
        $this->db->query($sql);
    }
    function stok_id($id_barang, $stok)
    {
        $sql = "UPDATE barang SET stok = '$stok' WHERE id_barang = '$id_barang'";
        $this->db->query($sql);
    }

}

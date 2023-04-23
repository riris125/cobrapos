<?php
class M_delete extends CI_Model
{

    function hapus_kategori($id_kategori)
    {
        $sql = "DELETE FROM kategori WHERE id_kategori = '$id_kategori'";
        $this->db->query($sql);
    }
    function hapus_barang($id)
    {
        $sql = "DELETE FROM barang WHERE id = '$id'";
        $this->db->query($sql);
    }
    function hapus_customer($id_member)
    {
        $sql = "DELETE FROM member WHERE id_member = '$id_member'";
        $this->db->query($sql);
    }
    function hapus_profil($id_login)
    {
        $sql = "DELETE FROM login WHERE id_login = '$id_login'";
        $this->db->query($sql);
    }
    function hapus_keranjang()
    {
        $sql = "DELETE FROM penjualan";
        $this->db->query($sql);
    }
    function hapus_keranjang_id($id_penjualan)
    {
        $sql = "DELETE FROM penjualan WHERE id_penjualan = '$id_penjualan'";
        $this->db->query($sql);
    }
}

<?php


class M_view extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function getUserLogin($username = null)
    {
        if ($username === null) {
            return $this->db->get('login')->result_array();
        } else {
            return $this->db->get_where('login', ['user' => $username])->result_array();
        }
    }

    public function kategori()
    {
        $query = $this->db->query("SELECT * from kategori ");
        return $query->result();
    }
    public function barang()
    {
        $sql = "SELECT a.*, b.nama_kategori FROM barang a 
        LEFT JOIN kategori b ON a.id_kategori = b.id_kategori";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function customer()
    {
        $query = $this->db->query("SELECT * from member ");
        return $query->result();
    }
    public function profil()
    {
        $query = $this->db->query("SELECT * from login ");
        return $query->result();
    }
    public function barangbyid($id)
    {
        $sql = "SELECT a.*, b.nama_kategori FROM barang a 
        LEFT JOIN kategori b ON a.id_kategori = b.id_kategori
        WHERE a.id = '$id' ";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function barangbykey($cari)
    {
        $sql = "SELECT barang.*, kategori.id_kategori, kategori.nama_kategori
        from barang inner join kategori on barang.id_kategori = kategori.id_kategori
        where barang.id_barang like '%$cari%' or barang.nama_barang like '%$cari%' or barang.merk like '%$cari%'";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function hasil_penjualan()
    {
        $sql = "SELECT penjualan.* , barang.id_barang, barang.nama_barang from penjualan 
        left join barang on barang.id_barang=penjualan.id_barang 
        
        ORDER BY id_penjualan";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function jumlah()
    {
        $sql = "SELECT SUM(total) as bayar FROM penjualan";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function barang_id($id_barang)
    {
        $sql = "SELECT * FROM barang WHERE id_barang = '$id_barang'";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function member()
    {
        $sql = "SELECT * FROM member";
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    public function penjualan_bulan_ini($periode_bulan_ini)
    {
        $sql = "SELECT SUM(total) as total FROM nota WHERE periode = '$periode_bulan_ini'";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function penjualan_tahun_ini($tahun_ini)
    {
        $sql = "SELECT SUM(total) as total FROM nota WHERE periode like '%$tahun_ini'";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function penjualan_bulan_lalu($periode_bulan_lalu)
    {
        $sql = "SELECT SUM(total) as total FROM nota WHERE periode = '$periode_bulan_lalu'";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function penjualan_tahun_lalu($tahun_lalu)
    {
        $sql = "SELECT SUM(total) as total FROM nota WHERE periode like '%$tahun_lalu'";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function penjualan_by_barang($periode_bulan_ini)
    {
        $sql = "SELECT sum(a.total) as total, sum(a.jumlah) as jumlah, 
        b.harga_jual, b.nama_barang, b.stok 
        FROM nota a LEFT JOIN barang b ON a.id_barang = b.id_barang 
        WHERE a.periode = '$periode_bulan_ini' 
        GROUP BY a.id_barang";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function penjualan_by_customer($periode_bulan_ini)
    {
        $sql = "SELECT sum(a.total) as total, sum(a.jumlah) as jumlah, b.nm_member 
        FROM nota a LEFT JOIN member b ON a.id_member = b.id_member 
        WHERE a.periode = '$periode_bulan_ini' 
        GROUP BY a.id_member
        ORDER BY total DESC";
        $query = $this->db->query($sql);
        return $query->result();
    }

}

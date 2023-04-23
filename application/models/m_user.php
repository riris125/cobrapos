<?php


class M_user extends CI_Model
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
    public function getUser($username = null)
    {
        if ($username === null) {
            //return $this->db->get('tb_user')->result_array();
            $query = $this->db2->query("SELECT a.*,b.*,c.* from tb_user a
            LEFT JOIN tb_kantor b ON b.id_kantor = a.id_kantor
            LEFT JOIN tb_jabatan c ON c.id_jabatan = a.id_jabatan
            ");
            return $query->result();
        } else {
            //return $this->db->get_where('tb_user', ['username' => $username])->result_array();
            $query = $this->db2->query("SELECT a.*,b.*,c.* from tb_user a
            LEFT JOIN tb_kantor b ON b.id_kantor = a.id_kantor
            LEFT JOIN tb_jabatan c ON c.id_jabatan = a.id_jabatan
            WHERE a.username = '$username'");
            return $query->result();
        }
    }
    function profil_ubah($username, $fullname, $email, $twitter, $facebook, $instagram, $foto)
    {
        $sql = "UPDATE tb_user SET fullname = '$fullname', email = '$email', twitter = '$twitter', facebook = '$facebook', instagram = '$instagram', foto = '$foto' WHERE username = '$username'";
        $this->db2->query($sql);
    }
    function password_ubah($username, $password)
    {
        $sql = "UPDATE tb_user SET password = '$password' WHERE username = '$username'";
        $this->db2->query($sql);
    }
    public function getKantor()
    {
        $query = $this->db2->query("SELECT * from tb_kantor order by nama_kantor desc ");
        return $query->result();
    }
    public function getKantor2($carikantor)
    {
        $query = $this->db2->query("SELECT * from tb_kantor WHERE nama_kantor != '$carikantor'");
        return $query->result();
    }
}

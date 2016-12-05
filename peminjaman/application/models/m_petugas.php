<?php
class M_petugas extends CI_Model{
    private $table="tb_anggota";
    
    function cek($username,$password){
        $this->db->where("user_ang",$username);
        $this->db->where("password_ang",$password);
        return $this->db->get("tb_anggota");
    }
	
	function id_anggota($username,$password){
		$sql = mysql_query("Select * from tb_anggota where user_ang = '$username' AND password_ang = '$password'");
			$rows = mysql_num_rows($sql);
			$data =mysql_fetch_array($sql);
			if($rows>0){
				$id_anggota = $data[id_anggota];
			}
			return $id_anggota;
	}
	
	function nama($username,$password){
		$sql = mysql_query("Select * from tb_anggota where user_ang = '$username' AND password_ang = '$password'");
			$rows = mysql_num_rows($sql);
			$data =mysql_fetch_array($sql);
			if($rows>0){
				$nama 		= $data[nama_ang];
			}
			return $nama;
	}
    
    function semua(){
        return $this->db->get("admin");
    }
    
    function cekKode($kode){
        $this->db->where("username",$kode);
        return $this->db->get("admin");
    }
    
    function cekId($kode){
        $this->db->where("id_admin",$kode);
        return $this->db->get("admin");
    }
    
    function update($id,$info){
        $this->db->where("id_admin",$id);
        $this->db->update("admin",$info);
    }
    
    function simpan($info){
        $this->db->insert("admin",$info);
    }
    
    function hapus($kode){
        $this->db->where("id_admin",$kode);
        $this->db->delete("admin");
    }
}
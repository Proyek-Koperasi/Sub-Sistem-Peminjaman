<?php
class M_Laporan extends CI_Model{
    #code
    

    
    function detailpeminjaman($tanggal1,$tanggal2){
        return $this->db->query("select * from tbl_pinjaman where tgl_pinjaman between '$tanggal1' and '$tanggal2' group by id_pinjaman");
    }
    
    
    function detailpengembalian($tanggal1,$tanggal2){
        return $this->db->query("select * from tbl_angsuran where tgl_angsuran between '$tanggal1' and '$tanggal2' group by id_angsuran");
    }
	
	function cariangsuran($id){
        return $this->db->query("select * from tbl_angsuran where id_pinjaman='$id'");
    }
	
	function detailanggota($id_anggota){
        return $this->db->query("select * from tbl_pinjaman where id_anggota='$id_anggota'");
    }
	
}

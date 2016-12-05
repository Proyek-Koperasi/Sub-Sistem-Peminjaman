<?php
class M_Pengembalian extends CI_Model{
    
    function cariPinjaman($no){
        $query=$this->db->query("select * from tbl_pinjaman where id_pinjaman='PINJAM-FK-20161030093716'");
        return $query;
    }
    
    function tampilBuku($no){
        $query=$this->db->query("select a.*,b.judul,b.pengarang
                                from transaksi a,buku b
                                where a.id_transaksi='$no' and
                                a.id_transaksi not in(select id_transaksi from pengembalian)
                                and a.kode_buku=b.kode_buku");
        return $query;
    }
    
	function nootomatis(){
		
        $today=date('Ymd');
		
		$time=date('his');
        
        $nextNoTransaksi='ANGSUR-FK-'.$today.$time;
        
        return $nextNoTransaksi;
    }
	
    function simpan($info){
        $this->db->insert("pengembalian",$info);
    }
    
    function update($no,$update){
        $this->db->where("id_transaksi",$no);
        $this->db->update("transaksi",$update);
    }
    
    function cari_by_id_pinjaman($id_pinjaman){
        $query=$this->db->query("select * from tbl_pinjaman where id_pinjaman like '%$id_pinjaman%'");
        return $query;
    }
}
<?php
class M_Peminjaman extends CI_Model{
    private $table="tbl_peminjaman";
    
	function session(){
		
        $session_id=$this->session->userdata('username');
        
        return $session_id;
    }
	
	function id_anggota($cari){
		$this->db->like("id_anggota",$cari);
        return $this->db->get("anggota");
	}
	
    function nootomatis(){
		
        $today=date('Ymd');
		
		$time=date('his');
        
        $nextNoTransaksi='PINJAM-FK-'.$today.$time;
        
        return $nextNoTransaksi;
    }
	
    function totalangsuran(){
		$jumlahpinjaman=$this->input->post('jumlahpinjaman');
		$bunga=$this->input->post('bunga');
		$cicilan=$this->input->post('cicilan');
		
		$totalangsuran=(($bunga/100)*$jumlahpinjaman)+$jumlahpinjaman;
		return $totalangsuran;
	}
	
	function jumlahangsuran(){
		$jumlahpinjaman=$this->input->post('jumlahpinjaman');
		$bunga=$this->input->post('bunga');
		$cicilan=$this->input->post('cicilan');
		
		$totalangsuran=(($bunga/100)*$jumlahpinjaman)+$jumlahpinjaman;
		$jumlahangsuran=$totalangsuran/$cicilan;
		return $jumlahangsuran;
	}
	
    function getAnggota(){
        return $this->db->get("anggota");
    }
    
    
    function simpanTmp($info){
        $this->db->insert("tmp",$info);
    }
    
    function tampilTmp(){
        return $this->db->get("tmp");
    }
    
    function cekTmp($kode){
        $this->db->where("kode_buku",$kode);
        return $this->db->get("tmp");
    }
    
    function jumlahTmp(){
        return $this->db->count_all("tmp");
    }
    
    function hapusTmp($kode){
        $this->db->where("kode_buku",$kode);
        $this->db->delete("tmp");
    }
    
    function simpan($peminjaman){
        $this->db->insert("tbl_pinjaman",$peminjaman);
    }
    
    function pencarianbuku($cari){
        $this->db->like("judul",$cari);
        return $this->db->get("buku");
    }
    
}
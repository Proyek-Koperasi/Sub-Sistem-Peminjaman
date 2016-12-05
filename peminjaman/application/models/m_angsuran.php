<?php
class M_Angsuran extends CI_Model{
    private $table="tbl_pinjaman";
    
	function nootomatis(){
		
        $today=date('Ymd');
		
		$time=date('his');
        
        $nextNoTransaksi='ANGSUR-FK-'.$today.$time;
        
        return $nextNoTransaksi;
    }
	
	function semua(){
		$this->db->where('acc','1');
        return $this->db->get("tbl_pinjaman");
    }
	
    function jumlah(){
        return $this->db->count_all($this->table);
    }
	
	function cek($id){
        $this->db->where("id_pinjaman",$id);
        $query=$this->db->get($this->table);
        
        return $query;
    }
	
	function simpan($info){
        $this->db->insert("tbl_angsuran",$info);
    }
	
	function update($id_pinjaman,$data){
		$this->db->where('id_pinjaman', $id_pinjaman);
		$this->db->update('tbl_pinjaman', $data);
	}
    
    
}
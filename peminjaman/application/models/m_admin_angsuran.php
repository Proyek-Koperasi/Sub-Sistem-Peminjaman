<?php
class M_Admin_Angsuran extends CI_Model{
    private $table="tbl_angsuran";
    
	function nootomatis(){
		
        $today=date('Ymd');
		
		$time=date('his');
        
        $nextNoTransaksi='ANGSUR-FK-'.$today.$time;
        
        return $nextNoTransaksi;
    }
	
	function semua(){
		$this->db->where('acc','0');
        return $this->db->get("tbl_angsuran");
    }
	
    function jumlah(){
        return $this->db->count_all($this->table);
    }
	
	function cek($id){
        $this->db->where("id_pinjaman",$id);
        $query=$this->db->get($this->table);
        
        return $query;
    }
	
	
	function update($id_angsuran,$data){
		$this->db->where('id_angsuran', $id_angsuran);
		$this->db->update('tbl_angsuran', $data);
	}
    
    
}
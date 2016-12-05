<?php
class Pengembalian extends CI_Controller{
    #code
    
    function __construct(){
        parent::__construct();
        $this->load->library(array('template','form_validation'));
        $this->load->model('m_pengembalian');
        
        if(!$this->session->userdata('username')){
            redirect('web');
        }
    }
    
    function index(){
        $data['title']="Pengembalian Buku";
        $data['tanggal']=date('Y-m-d');
		$data['noauto'] = $this->m_pengembalian->nootomatis();
        $this->template->display('pengembalian/index',$data);
    }
    
    function cariPinjaman(){
        $no=$this->input->post('no');
        $transaksi=$this->m_pengembalian->cariPinjaman($no);
        if($transaksi->num_rows()>0){
            $transaksi=$transaksi->row_array();
            echo $transaksi['tgl_pinjam']."|".$transaksi['nama']."|".$transaksi['jml_pinjam']."|".$transaksi['jml_angsur'];
        }
        
        
    }
    
    function tampil(){
        $no=$_GET['no'];
        $data['buku']=$this->m_pengembalian->tampilBuku($no)->result();
        $transaksi=$this->m_pengembalian->cariTransaksi($no)->row_array();
        
        $this->load->view('pengembalian/tampilbuku',$data);
    }
    
    function simpan(){
        $info=array(
            'id_transaksi'=>$this->input->post('no'),
            'tgl_pengembalian'=>date('Y-m-d'),
            'denda'=>$this->input->post('denda'),
            'nominal'=>$this->input->post('nominal')
        );
        $this->m_pengembalian->simpan($info);
        
        //update status peminjaman dari N menjadi Y
        $no=$this->input->post('no');
        $update=array(
            'status'=>"Y"
        );
        $this->m_pengembalian->update($no,$update);
        
        $this->m_pengembalian->simpan($info);
    }
    
    function cari_by_id_pinjaman(){
        $id_pinjaman=$this->input->post('id_pinjaman');
        $data['pencarian']=$this->m_pengembalian->cari_by_id_pinjaman($id_pinjaman)->result();
        $this->load->view('pengembalian/pencarian',$data);
    }
    
}

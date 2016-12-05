<?php
class Admin_Angsuran extends CI_Controller{
    
    private $limit=20;
    
    function __construct(){
        parent::__construct();
        $this->load->library(array('template','pagination','form_validation','upload'));
        $this->load->model('m_admin_angsuran');
		$this->gallery_path_url = base_url() . 'upload';
		 $this->load->helper(array('url','html','form'));
    }
    
    function index($offset=0,$order_column='id_angsuran',$order_type='asc'){
        if(empty($offset)) $offset=0;
        if(empty($order_column)) $order_column='id_angsuran';
        if(empty($order_type)) $order_type='asc';
        
        //load data
        $data['angsuran']=$this->m_admin_angsuran->semua($this->limit,$offset,$order_column,$order_type)->result();
        $data['title']="Daftar Permohonan Pinjaman";
        
        $config['base_url']=site_url('admin_angsuran/index/');
        $config['total_rows']=$this->m_admin_angsuran->jumlah();
        $config['per_page']=$this->limit;
        $config['uri_segment']=3;
        $this->pagination->initialize($config);
        $data['pagination']=$this->pagination->create_links();
        
        
        if($this->uri->segment(3)=="delete_success")
            $data['message']="<div class='alert alert-success'>Data berhasil dihapus</div>";
        else if($this->uri->segment(3)=="add_success")
            $data['message']="<div class='alert alert-success'>Data Berhasil disimpan</div>";
        else
            $data['message']='';
            $this->template->display('admin_angsuran/index',$data);
    }
    
    
    function edit($id){
        $data['title']="Tambah Angsuran";
        
            $data['pinjaman']=$this->m_admin_peminjaman->cek($id)->row_array();
            $data['message']="";
            $this->template->display('admin_peminjaman/edit',$data);
        
    }
    
	function setuju(){
		$acc="1";
		$id_pinjaman=$this->input->post(no);
		$data = array(
			'acc' => $acc
			);
		$this->m_admin_peminjaman->update($id_pinjaman,$data);
		redirect('admin_peminjaman/index/add_success');
	}

    
    function _set_rules(){
        $this->form_validation->set_rules('gambar','Gambar','required');
        $this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
    }
}
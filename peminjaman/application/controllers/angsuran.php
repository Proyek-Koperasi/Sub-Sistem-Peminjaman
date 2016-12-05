<?php
class Angsuran extends CI_Controller{
    
    private $limit=20;
    
    function __construct(){
        parent::__construct();
        $this->load->library(array('template','pagination','form_validation','upload'));
        $this->load->model('m_angsuran');
		$this->gallery_path_url = base_url() . 'assets/upload';
		 $this->load->helper(array('url','html','form'));
        
        if(!$this->session->userdata('username')){
            redirect('web');
        }
    }
    
    function index($offset=0,$order_column='id_angsuran',$order_type='asc'){
        if(empty($offset)) $offset=0;
        if(empty($order_column)) $order_column='id_angsuran';
        if(empty($order_type)) $order_type='asc';
        
        //load data
        $data['angsuran']=$this->m_angsuran->semua($this->limit,$offset,$order_column,$order_type)->result();
        $data['title']="Data Angsuran";
        
        $config['base_url']=site_url('angsuran/index/');
        $config['total_rows']=$this->m_angsuran->jumlah();
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
            $this->template->display('angsuran/index',$data);
    }
    
    
    function edit($id){
        $data['title']="Tambah Angsuran";
        
            $data['pinjaman']=$this->m_angsuran->cek($id)->row_array();
            $data['message']="";
			$data['nama'] = $this->session->userdata("nama");
			$data['noauto'] = $this->m_angsuran->nootomatis();
			$data['tanggal'] = date ('Y-m-d');
            $this->template->display('angsuran/edit',$data);
        
    }
    
    
    function tambah(){
		
            $id=$this->input->post('noauto');
            $cek=$this->m_angsuran->cek($id);
            if($cek->num_rows()>0){
                $data['message']="<div class='alert alert-warning'>Faktur sudah digunakan</div>";
                $this->template->display('angsuran/index',$data);
            }else{
				//setting konfiguras upload image
							$config['upload_path'] = './upload/';
							$config['allowed_types'] = 'jpg|png';
							$config['max_size']	= '1000'; //in kb
							$config['max_width']  = '1024';
							$config['max_height']  = '768';
					$this->load->library('upload');         // <- load library
					$this->upload->initialize($config);
					//if upload failed
					if ( ! $this->upload->do_upload('image')){
						echo $this->upload->display_errors();
					//if upload success
					
					}else{
					$data = $this->upload->data();
					$nama_file= $data['raw_name'].$data['file_ext'];
					$id_pinjaman=$this->input->post('no');
						$info=array(
						'id_angsuran'=>$this->input->post('noauto'),
						'tgl_angsuran'=>$this->input->post('tanggal'),
						'angsuranke'=>$this->input->post('cicilanke'),
						'id_pinjaman'=>$this->input->post('no'),
						'image'=>$nama_file
						);
						$data = array(
						'cicilanke' => $this->input->post('cicilanke'),
						);
						$this->m_angsuran->update($id_pinjaman,$data);
						$this->m_angsuran->simpan($info);
						redirect('angsuran/index/add_success');
					}
            }
    }
    

    
    function _set_rules(){
        $this->form_validation->set_rules('gambar','Gambar','required');
        $this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
    }
}
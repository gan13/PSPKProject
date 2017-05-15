<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Alternatif extends CI_Controller
{
    function __construct()
    {
        parent::__construct();        
        $this->load->library('form_validation');
        $this->load->library('m_db');
        if(akses()!="user")
        {
			redirect(base_url().'logout');
		}
		$this->load->model('Alternatif_model','mod_alternatif');
    }
    
    function index()
    {
        $meta['judul']="Semua Alternatif";
        $this->load->view('tema/header',$meta);
        $d['data']=$this->mod_alternatif->alternatif_data();
        $this->load->view(akses().'/data/alternatif/alternatifview',$d);
        $this->load->view('tema/footer');
    }
    
    function add()
    {
		$this->form_validation->set_rules('nama','Nama Alternatif','required');
		if($this->form_validation->run()==TRUE)
		{
			$nama=$this->input->post('nama');
			if($this->mod_alternatif->alternatif_add($nama)==TRUE)
			{
				set_header_message('success','Tambah alternatif','Berhasil menambah alternatif');
				redirect(base_url(akses()).'/data/alternatif');
			}else{
				set_header_message('danger','Tambah alternatif','Gagal menambah alternatif');
				redirect(base_url(akses()).'/data/alternatif/add');
			}
		}else{
			$meta['judul']="Tambah Alternatif";
        	$this->load->view('tema/header',$meta);
        	$this->load->view(akses().'/data/alternatif/alternatifadd');
        	$this->load->view('tema/footer');
		}
	}
	
	function edit()
    {
		$this->form_validation->set_rules('alternatifid','ID Alternatif','required');
		$this->form_validation->set_rules('nama','Nama Alternatif','required');
		if($this->form_validation->run()==TRUE)
		{
			$alternatifid=$this->input->post('alternatifid');
			$nama=$this->input->post('nama');
			if($this->mod_alternatif->alternatif_edit($alternatifid,$nama)==TRUE)
			{
				set_header_message('success','Ubah Alternatif','Berhasil mengubah alternatif');
				redirect(base_url(akses()).'/data/alternatif');
			}else{
				set_header_message('danger','Ubah Alternatif','Gagal mengubah alternatif');
				redirect(base_url(akses()).'/data/alternatif');
			}
		}else{
			$id=$this->input->get('id');
			$meta['judul']="Ubah Alternatif";
        	$this->load->view('tema/header',$meta);
        	$d['data']=$this->mod_alternatif->alternatif_data(array('alternatif_id'=>$id));
        	$this->load->view(akses().'/data/alternatif/alternatifedit',$d);
        	$this->load->view('tema/footer');
		}
	}
	
	function delete()
	{
		$id=$this->input->get('id');
		if($this->mod_alternatif->alternatif_delete($id)==TRUE)
		{
			set_header_message('success','Hapus Alternatif','Berhasil menghapus alternatif');
			redirect(base_url(akses()).'/data/alternatif');
		}else{
			set_header_message('danger','Hapus Alternatif','Gagal menghapus alternatif');
			redirect(base_url(akses()).'/data/alternatif');
		}
	}    
}

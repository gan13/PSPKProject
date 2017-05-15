<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Kriteria extends CI_Controller
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
		
		$this->load->model('kriteria_model','mod_kriteria');
    }
    
    function index()
    {        
        $meta['judul']="Kriteria";
        $this->load->view('tema/header',$meta);
		$output=array();
        $dKriteria=$this->mod_kriteria->kriteria_data();
		foreach($dKriteria as $rK)
		{
			$output[$rK->kriteria_id]=$rK->nama_kriteria;
		}		
    	$d['arr']=$output;
    	$d['b_id']=3;
    	$this->load->view(akses().'/master/matriks/matrikutama',$d);
        $this->load->view('tema/footer');
    }
    
    function add()
    {
		$this->form_validation->set_rules('nama','Nama Kriteria','required');
		if($this->form_validation->run()==TRUE)
		{
			$nama=$this->input->post('nama');
			if($this->mod_kriteria->kriteria_add($nama)==TRUE)
			{
				redirect(base_url(akses()).'/ahp/kriteria');
			}else{
				redirect(base_url(akses()).'/ahp/kriteria/add');
			}
		}else{
			$meta['judul']="Tambah Kriteria Utama";
        	$this->load->view('tema/header',$meta);
        	$this->load->view(akses().'/ahp/kriteria/kriteriaadd');
        	$this->load->view('tema/footer');
		}
	}
    
    function updatedata()
    {
		foreach($_POST as $k=>$v)
		{
			$s=array(
			'kriteria_id'=>$k,
			);
			$d=array(
			'nama_kriteria'=>$v,
			);
			$this->m_db->edit_row('kriteria',$d,$s);
		}
		redirect(base_url(akses().'/ahp/kriteria'));
	}
	
	function deletedata()
	{
		$s=array(
		'kriteria_id'=>$this->input->get('id'),
		);		
		$this->m_db->delete_row('kriteria',$s);
		redirect(base_url(akses().'/ahp/kriteria'));
	}
    
    function updateutama()
    {
    	$error=FALSE;
    	$b_id=$this->input->post('b_id');
    	if(!empty($b_id))
    	{
			
		
    	$msg="";
    	$s=array(
    	'kriteria_nilai_id !='=>''
    	);
    	$this->m_db->delete_row('kriteria_nilai',$s);
    	    	
    	$cr=$this->input->post('crvalue');
    	if($cr > 0.01)
    	{
    		$msg="Gagal diupdate karena nilai CR kurang dari 0.01";
			$error=TRUE;
		}else{
			foreach($_POST as $k=>$v)
			{
				if($k!="crvalue" && $k!="b_id")
				{									
				foreach($v as $x=>$x2)
				{
					$d=array(
					'b_id'=>$b_id,
					'kriteria_id_dari'=>$k,
					'kriteria_id_tujuan'=>$x,
					'nilai'=>$x2,
					);
					$this->m_db->add_row('kriteria_nilai',$d);
				}
				}
			}
			$msg="Berhasil update nilai kriteria";
			$error=FALSE;
		}
    			
    	
    	if($error==FALSE)
    	{			
			echo json_encode(array('status'=>'ok','msg'=>$msg));
		}else{
			echo json_encode(array('status'=>'no','msg'=>$msg));
		}
		
		}else{
			$msg="Gagal mengubah nilai kriteria";
			echo json_encode(array('status'=>'no','msg'=>$msg));
		}
		
	}    
}

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
		$this->load->model('Kriteria_model','mod_kriteria');
    }
    
    function index()
    {        
        $meta['judul']="Matrik Alternatif";
        $this->load->view('tema/header',$meta);
        $d['kriteria']=$this->mod_kriteria->kriteria_data();
        $this->load->view(akses().'/master/matriks/kriteriacontainer',$d);
        $this->load->view('tema/footer');
    }
    
    function gethtml()
    {
    	$id=$this->input->get('kriteria');
		$output=array();
        $dAlternatif=$this->mod_alternatif->alternatif_data();
		foreach($dAlternatif as $rK)
		{
			$output[$rK->alternatif_id]=$rK->nama_alternatif;
		}		
    	$d['arr']=$output;
    	$d['kriteria_id']=$id;
    	$this->load->view(akses().'/master/matriks/matrikalternatif',$d);
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
    	$kriteriaid=$this->input->post('kriteriaid');
    	if(!empty($kriteriaid))
    	{			
	    	$msg="";
	    	$s=array(
	    	'alternatif_nilai_id !='=>''
	    	);
	    	$this->m_db->delete_row('alternatif_nilai',$s);
	    	    	
	    	$cr=$this->input->post('crvalue');
	    	if($cr > 0.01)
	    	{
	    		$msg="Gagal diupdate karena nilai CR kurang dari 0.01";
				$error=TRUE;
			}else{
				foreach($_POST as $k=>$v)
				{
					if($k!="crvalue" && $k!="kriteriaid")
					{									
						foreach($v as $x=>$x2)
						{
							$d=array(
							'kriteria_id'=>$kriteriaid,
							'alternatif_id_dari'=>$k,
							'alternatif_id_tujuan'=>$x,
							'nilai'=>$x2,
							);
							$this->m_db->add_row('alternatif_nilai',$d);
						}
					}
				}
				$msg="Berhasil update nilai alternatif";
			 	$error=FALSE;
			}	
	    	if($error==FALSE)
	    	{			
				echo json_encode(array('status'=>'ok','msg'=>$msg));
			}else{
				echo json_encode(array('status'=>'no','msg'=>$msg));
			}
		}else{
			$msg="Gagal mengubah nilai alternatif";
			echo json_encode(array('status'=>'no','msg'=>$msg));
		}
	}   
}

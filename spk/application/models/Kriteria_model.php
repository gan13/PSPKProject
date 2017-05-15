<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Kriteria_model extends CI_Model
{	
	private $tb_kriteria='kriteria';	
	private $tb_kriteria_nilai='kriteria_nilai';
    function __construct()
    {
         $this->load->library('m_db');
    }
    
    function kriteria_data($where=array(),$order="kriteria_id ASC")
    {
		$d=$this->m_db->get_data($this->tb_kriteria,$where,$order);
		return $d;
	}
	
	function kriteria_info($kriteriaID,$output)
	{
		$s=array(
		'kriteria_id'=>$kriteriaID,
		);
		$item=$this->m_db->get_row($this->tb_kriteria,$s,$output);
		return $item;
	}
	
	function kriteria_add($nama)
	{
		$d=array(
		'nama_kriteria'=>$nama,
		);
		if($this->m_db->add_row($this->tb_kriteria,$d)==TRUE)
		{
			return true;
		}else{
			return false;
		}
	}
	
	function kriteria_edit($kriteriaID,$nama)
	{
		$s=array(
		'kriteria_id'=>$kriteriaID,
		);
		$d=array(
		'nama_kriteria'=>$nama,
		);
		if($this->m_db->edit_row($this->tb_kriteria,$d,$s)==TRUE)
		{
			return true;
		}else{
			return false;
		}
	}
	
	function kriteria_delete($kriteriaID)
	{
		$s=array(
		'kriteria_id'=>$kriteriaID,
		);
		if($this->m_db->delete_row($this->tb_kriteria,$s)==TRUE)
		{
			return true;
		}else{
			return false;
		}
	}	
}
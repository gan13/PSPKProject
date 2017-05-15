<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Alternatif_model extends CI_Model
{	
	private $tb_alternatif='alternatif';	
	private $tb_alternatif_nilai='alternatif_nilai';
    function __construct()
    {
         $this->load->library('m_db');
    }
    
    function alternatif_data($where=array(),$order="alternatif_id ASC")
    {
		$d=$this->m_db->get_data($this->tb_alternatif,$where,$order);
		return $d;
	}
	
	function alternatif_info($alternatifID,$output)
	{
		$s=array(
		'alternatif_id'=>$alternatifID,
		);
		$item=$this->m_db->get_row($this->tb_alternatif,$s,$output);
		return $item;
	}
	
	function alternatif_add($nama)
	{
		$d=array(
		'nama_alternatif'=>$nama,
		);
		if($this->m_db->add_row($this->tb_alternatif,$d)==TRUE)
		{
			return true;
		}else{
			return false;
		}
	}
	
	function alternatif_edit($alternatifID,$nama)
	{
		$s=array(
		'alternatif_id'=>$alternatifID,
		);
		$d=array(
		'nama_alternatif'=>$nama,
		);
		if($this->m_db->edit_row($this->tb_alternatif,$d,$s)==TRUE)
		{
			return true;
		}else{
			return false;
		}
	}
	
	function alternatif_delete($alternatifID)
	{
		$s=array(
		'alternatif_id'=>$alternatifID,
		);
		if($this->m_db->delete_row($this->tb_alternatif,$s)==TRUE)
		{
			return true;
		}else{
			return false;
		}
	}
}
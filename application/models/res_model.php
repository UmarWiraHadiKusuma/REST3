<?php if( ! defined('BASEPATH')) exit ('No direct script access allowed');

class Res_model extends CI_Model{

	function __construct(){

		parent::__construct();
	}

	function insert($insert){
		if($insert->db->insert('data',$insert)){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	function update($id,$update){
		if($this->db->update('data',$update,'id = \''.$id.'\'')){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	function delete($id){
		$delete['id_file'] = $id;
		if($this->db->delete('data',$delete)){

			return TRUE;
		}else{
			return FALSE;
		}
	}

	function select($select=NULL,$awal=0,$akhir=10){
		if(! is_null($select))$this->db->like($select);
		$query = $this->db->get('data',$akhir,$awal);
		return $query->result();
	}

	function view($select=NULL){
		if(! is_null($select))$this->db->like($select);
		$query = $this->db->get('data');
		$arr = $query->result_array();
		if($query->num_rows > 0){
			return $arr[0]; 
		}else{
			return FALSE;
		}
	}

	function penerima($idu){
		$this->db->where('id<>',$idu);
		$query = $this->db->get('data');
		return $query->result();
	}

}
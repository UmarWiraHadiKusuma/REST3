<?php if(! defined('BASEPATH')) exit('No direct script access allowd');

require APPPATH.'/libraries/REST_Controller.php';

class Rest extends REST_Controller
{

	function __construct()
	 {
	 	parent::__construct();
		$this->load->model(array('res_model'));
	}

	function get_all(){

		$dt = $this->res_model->select();
		$data1 = json_encode(dt);

		header('HTTP/1.1:200');
		header('Status: 200');
		header('Content-Length: '.strlen($data1));
		exit($data1);

	}


	function cari_nama($namares){
		$select['namares'] = $namares;
		$dt = $this->res_model->select($select);
		$data1 = json_encode($dt);

		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($data1));
		exit('$data1');

	}

	function cari_id($id){

		$select['id'] = $id;
		$dt = $this->res_model->select($select);
		$data1 = json_encode($dt);

		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($data1));
		exit($data1);
	}

}

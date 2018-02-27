<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends MY_Controller {
	public function myTemp($data){
		$this->lte2($data);
	}

	public function standar($data){
		$this->load->view('standar/index', $data);
	}
	
	public function lte($data){
		$this->load->view('lte/index', $data);
	}

	public function lte2($data){
		$this->load->view('lte2/index', $data);
	}

	public function lte2top($data){
		$this->load->view('lte2top/index', $data);
	}
}

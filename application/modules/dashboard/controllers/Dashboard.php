<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller
{

function __construct() {
    parent::__construct();
}

public function index(){
	$data['user'] = $this->ion_auth->user()->row();

    $data['module']  = 'dashboard';
    $data['title'] = 'Dashboard';
    $data['page']  = 'dashboard_v';

    echo Modules::run('template/myTemp', $data);
}

public function _custom_query($mysql_query) {
    $query = $this->db->query($mysql_query);
    return $query;
}

}

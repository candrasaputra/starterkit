<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfectcontroller extends MY_Controller
{

function __construct() {
    parent::__construct();
}

public function index(){
    $data['module']  = 'perfectcontroller';
    $data['title'] = 'Perfectcontroller';
    $data['page']  = 'perfectview_v';

    echo Modules::run('template/myTemp', $data);
}

/*Kode Dasar*/
private function get($order_by){
    $this->load->model('perfectcontroller_m');
    $query = $this->perfectcontroller_m->get($order_by);
    return $query;
}

private function get_with_limit($limit, $offset, $order_by) {
    $this->load->model('perfectcontroller_m');
    $query = $this->perfectcontroller_m->get_with_limit($limit, $offset, $order_by);
    return $query;
}

private function get_where($id){
    $this->load->model('perfectcontroller_m');
    $query = $this->perfectcontroller_m->get_where($id);
    return $query;
}

private function get_where_custom($col, $value, $order_by) {
    $this->load->model('perfectcontroller_m');
    $query = $this->perfectcontroller_m->get_where_custom($col, $value, $order_by);
    return $query;
}

private function get_where_double_custom($col1, $val1, $col2, $val2, $order_by) {
    $this->load->model('perfectcontroller_m');
    $query = $this->perfectcontroller_m->get_where_double_custom($col1, $val1, $col2, $val2, $order_by);
    return $query;
}

private function _insert($data){
    $this->load->model('perfectcontroller_m');
    $this->perfectcontroller_m->_insert($data);
}

private function _update($id, $data){
    $this->load->model('perfectcontroller_m');
    $this->perfectcontroller_m->_update($id, $data);
}

private function _delete($id){
    $this->load->model('perfectcontroller_m');
    $this->perfectcontroller_m->_delete($id);
}

private function count_where($column, $value) {
    $this->load->model('perfectcontroller_m');
    $count = $this->perfectcontroller_m->count_where($column, $value);
    return $count;
}

private function get_max() {
    $this->load->model('perfectcontroller_m');
    $max_id = $this->perfectcontroller_m->get_max();
    return $max_id;
}

private function _custom_query($mysql_query) {
    $this->load->model('perfectcontroller_m');
    $query = $this->perfectcontroller_m->_custom_query($mysql_query);
    return $query;
}

}

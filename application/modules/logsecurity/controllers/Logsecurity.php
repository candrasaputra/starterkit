<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logsecurity extends MY_Controller
{

function __construct() {
    parent::__construct();
}

public function index(){
    if (!$this->ion_auth->in_role(3)) {
        show_error('Anda Tidak Memiliki Hak Untuk Mengakses Halaman Ini!!', 1, 'Error Hak Akses');
    }

    $data['module']  = 'logsecurity';
    $data['title'] = 'Log Keamanan';
    $data['page']  = 'logsecurity_v';

    echo Modules::run('template/myTemp', $data);
}

public function ajax_list(){
    date_default_timezone_set("Asia/Jakarta");
    $this->load->model('Logsecurity_m');
    $this->load->helper('log');

    $this->load->helper('date');

    $now = time();

    // will echo "2 hours ago" (at the time of this post)
    // echo timespan($post_date, $now) . ' lalu';

    $list = $this->Logsecurity_m->get_datatables();
    $data = array();
    $no = $_POST['start'];
    foreach ($list as $value) {
        $no++;
        $row = array();
        $row[] = mylog($value->lsAction);
        $row[] = $value->lsDescription;
        $row[] = $value->lsIp;
        $row[] = "<a href='".base_url('profile/lihat/').$value->id."'>".$value->first_name."</a>";
        $row[] = timespan(strtotime($value->createdDate), $now, 1) . ' lalu';
    
        $data[] = $row;
    }

    $output = array(
        "draw" => $_POST['draw'],
        "recordsTotal" => $this->Logsecurity_m->count_all(),
        "recordsFiltered" => $this->Logsecurity_m->count_filtered(),
        "data" => $data,
    );
    //output to json format
    echo json_encode($output);
}

/*Kode Dasar*/
private function get($order_by){
    $this->load->model('Logsecurity_m');
    $query = $this->Logsecurity_m->get($order_by);
    return $query;
}

private function get_with_limit($limit, $offset, $order_by) {
    $this->load->model('Logsecurity_m');
    $query = $this->Logsecurity_m->get_with_limit($limit, $offset, $order_by);
    return $query;
}

private function get_where($id){
    $this->load->model('Logsecurity_m');
    $query = $this->Logsecurity_m->get_where($id);
    return $query;
}

private function get_where_custom($col, $value, $order_by) {
    $this->load->model('Logsecurity_m');
    $query = $this->Logsecurity_m->get_where_custom($col, $value, $order_by);
    return $query;
}

private function get_where_double_custom($col1, $val1, $col2, $val2, $order_by) {
    $this->load->model('Logsecurity_m');
    $query = $this->Logsecurity_m->get_where_double_custom($col1, $val1, $col2, $val2, $order_by);
    return $query;
}

private function _insert($data){
    $this->load->model('Logsecurity_m');
    $this->Logsecurity_m->_insert($data);
}

private function _update($id, $data){
    $this->load->model('Logsecurity_m');
    $this->Logsecurity_m->_update($id, $data);
}

private function _delete($id){
    $this->load->model('Logsecurity_m');
    $this->Logsecurity_m->_delete($id);
}

private function count_where($column, $value) {
    $this->load->model('Logsecurity_m');
    $count = $this->Logsecurity_m->count_where($column, $value);
    return $count;
}

private function get_max() {
    $this->load->model('Logsecurity_m');
    $max_id = $this->Logsecurity_m->get_max();
    return $max_id;
}

private function _custom_query($mysql_query) {
    $this->load->model('Logsecurity_m');
    $query = $this->Logsecurity_m->_custom_query($mysql_query);
    return $query;
}

}

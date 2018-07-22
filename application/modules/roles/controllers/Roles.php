<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Roles extends MY_Controller
{

function __construct() {
    parent::__construct();
}

public function index(){
    $data['module']  = 'roles';
    $data['title'] = 'Roles';
    $data['page']  = 'roles_v';

    echo Modules::run('template/myTemp', $data);
}

public function add(){
    $data['module']  = 'roles';
    $data['title'] = 'Tambah Role';
    $data['page']  = 'addroles_v';

    echo Modules::run('template/myTemp', $data);
}

public function proses_add_role(){
    $data = array(
        'roleName' => $this->input->post('roleName'),
        'roleAlias' => $this->input->post('roleAlias'),
    );

    $this->_insert($data);

    redirect('users');
}

public function prosess_add($group_id='', $roleID=''){
    $this->load->model('rolesgroups/rolesgroups_m');
    $user = $this->ion_auth->user()->row();

    $data = array(
        'roleID' => $roleID,
        'group_id' => $group_id
        );

    $this->rolesgroups_m->_insert($data);

    $message = array(
        'st' => 1,
        "status" => TRUE,
        'msg' => "Aktif!",
    );

    echo json_encode($message);
}

public function prosess_delete($group_id='', $roleID=''){
    $this->load->model('rolesgroups/rolesgroups_m');
    $user = $this->ion_auth->user()->row();
    
    $this->rolesgroups_m->_delete_double('roleID', $roleID, 'group_id', $group_id);

    $message = array(
        'st' => 1,
        "status" => TRUE,
        'msg' => "Tidak Aktif!",
    );

    echo json_encode($message);
}

public function listroles(){
    $data['get_roles']  = $this->get('roleID')->result();

    $this->load->view('listroles_v', $data);
}

public function edit_roles($roleID=''){
    $this->load->model('roles_m');
    $this->load->model('rolesgroups/rolesgroups_m');

    $num_row = $this->get_where($roleID)->num_rows();

    if ($num_row == 1) {
        $data['module']  = 'roles';
        $data['title'] = 'Edit Roles';
        $data['page']  = 'editroles_v';

        $data['get_role'] = $this->get_where($roleID)->row();

        $data['groups'] = $this->ion_auth->groups()->result_array();
        $data['currentGroups'] = $this->rolesgroups_m->get_roles_groups($roleID)->result();

        echo Modules::run('template/myTemp', $data);
    }else{
        show_404();
    }
}

public function proses_update_roles(){
    $this->load->model('users/groups_m');

    // Deklarasi data user ion auth
    $user = $this->ion_auth->user()->row();

    $this->form_validation->set_rules('roleAlias', 'Nama Alias', 'trim|required');
    $roleku =  $this->encryption->decrypt($this->input->post("roleku"));

    if ($this->form_validation->run($this) === FALSE) {
        echo json_encode(array('st'=>0, 'msg'=>'ERROR: <br/>' . validation_errors()));
    }else{
        $dataRole = array(
            'roleAlias' => $this->input->post('roleAlias'),
        );

        $this->_update($roleku, $dataRole);

        // Pesan sukses
        $message = array(
            'st'=>1,
            'msg'=>'Sukses!',
        );
        echo json_encode($message);
    }
}

public function delete($roleID=''){
  $this->_delete($roleID);
  redirect('users');
}

/*Kode Dasar*/
protected function get($order_by){
    $this->load->model('Roles_m');
    $query = $this->Roles_m->get($order_by);
    return $query;
}

protected function get_with_limit($limit, $offset, $order_by) {
    $this->load->model('Roles_m');
    $query = $this->Roles_m->get_with_limit($limit, $offset, $order_by);
    return $query;
}

protected function get_where($id){
    $this->load->model('Roles_m');
    $query = $this->Roles_m->get_where($id);
    return $query;
}

protected function get_where_custom($col, $value, $order_by) {
    $this->load->model('Roles_m');
    $query = $this->Roles_m->get_where_custom($col, $value, $order_by);
    return $query;
}

protected function _insert($data){
    $this->load->model('Roles_m');
    $this->Roles_m->_insert($data);
}

protected function _update($id, $data){
    $this->load->model('Roles_m');
    $this->Roles_m->_update($id, $data);
}

protected function _delete($id){
    $this->load->model('Roles_m');
    $this->Roles_m->_delete($id);
}

protected function count_where($column, $value) {
    $this->load->model('Roles_m');
    $count = $this->Roles_m->count_where($column, $value);
    return $count;
}

protected function get_max() {
    $this->load->model('Roles_m');
    $max_id = $this->Roles_m->get_max();
    return $max_id;
}

protected function _custom_query($mysql_query) {
    $this->load->model('Roles_m');
    $query = $this->Roles_m->_custom_query($mysql_query);
    return $query;
}

}

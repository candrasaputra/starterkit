<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Changepwd extends MY_Controller
{

function __construct() {
    parent::__construct();
}

public function index(){
    $user = $this->ion_auth->user()->row();
    $data['module']  = 'changepwd';
    $data['title'] = 'Ubah Password';

    $this->load->view('changepwd_v', $data);
}

public function process_ubah(){
    $this->load->model('users/users_m');
    $this->load->library(array('ion_auth'));
    $this->load->library('ownlog');

    $user = $this->ion_auth->user()->row();

    $this->form_validation->set_rules('old', '<strong>Password Lama</strong>', 'required');
    $this->form_validation->set_rules('new', '<strong>Password Baru</strong>', "trim|required|min_length[8]");
    $this->form_validation->set_rules('new_confirm', '<strong>Ulangi Password Baru</strong>', "trim|required|matches[new]");

    if ($this->form_validation->run($this) === FALSE) {
        $this->session->set_flashdata('message', validation_errors());
        $this->ownlog->log_security(6, $user->id);
        redirect('changepwd');
    }else{
        $this->session->set_flashdata('message', 'Password Berhasil diubah!!');

        $this->ownlog->log_security(5, $user->id, "berhasil mengubah password");

        $identity = $this->session->userdata('identity');

        $change = $this->ion_auth->change_password($identity, $this->input->post('old'), $this->input->post('new'));

        if ($change)
        {
            //if the password was successfully changed
            $data = array(
                'changePwd' => 1,
            );
            $this->users_m->_update($user->id, $data);
            // log the user out
            $logout = $this->ion_auth->logout();

            $this->session->set_flashdata('message', "Password berhasil diubah, silahkan masuk dengan password yang baru!");
            redirect('login');
        }
        else
        {
            $this->session->set_flashdata('message', $this->ion_auth->errors());
            redirect('changepwd', 'refresh');
        }
    }
}

private function _custom_query($mysql_query) {
    $this->load->model('changepwd_m');
    $query = $this->changepwd_m->_custom_query($mysql_query);
    return $query;
}

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ownlog {

    public function log_security($code='', $user='', $des='')
    {
    	$CI =& get_instance();
    	$CI->load->library('user_agent');
    	$CI->load->model('logsecurity/logsecurity_m');

    	$ip = !empty($CI->input->ip_address()) ? $CI->input->ip_address() : '';
    	$platform = !empty($CI->agent->platform()) ? $CI->agent->platform() : '';
    	$browser = !empty($CI->agent->browser()) ? $CI->agent->browser() : '';
    	$lsBrowserVersion = !empty($CI->agent->version()) ? $CI->agent->version() : '';

    	switch ($code) {
    		case '1':
    			$action = 'login_berhasil';
    			break;

    		case '2':
    			$action = 'login_gagal';
    			break;
    		
    		case '3':
    			$action = 'logout_berhasil';
    			break;

    		case '4':
    			$action = 'logout_gagal';
    			break;

    		case '5':
    			$action = 'ganti_password_berhasil';
    			break;

    		case '6':
    			$action = 'ganti_password_gagal';
    			break;

    		case '7':
    			$action = 'ganti_waroeng_berhasil';
    			break;

    		case '8':
    			$action = 'ganti_waroeng_gagal';
    			break;

    		default:
    			$action = 'undefined';
    			break;
    	}

    	$data = array(
    		'lsAction' => $action,
    		'lsIp' => $ip,
    		'lsPlatform' => $platform,
    		'lsBrowser' => $browser,
    		'lsBrowserVersion' => $lsBrowserVersion,
            'lsDescription' => $des,
    		'createdDate' => date('Y-m-d H:i:s'),
    		'createdUserID' => $user
    	);

    	if ($CI->logsecurity_m->_insert($data)) {
    		return true;
    	} else {
    		return false;
    	}
    }
}
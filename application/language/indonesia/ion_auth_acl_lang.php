<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Name:  Ion Auth ACL - English
 *
 * Version: 1.0.0
 *
 * Author: Steve Goodwin
 *		   steve@weblogics.co.uk
 *         @steveg1987
 *
 * Location: http://github.com/steve-goodwin/ion_auth_acl
 *
 * Created:  18.09.2015
 *
 * Description:  Add's ACL (access control list) based on the existing Ion Auth library for codeigniter
 *
 * Requirements: PHP5 or above
 *
 */

// Permissions
$lang['permission_key_required']                    =   'Permission key dibutuhkan';
$lang['permission_already_exists']                  =   'Permission key telah tersedia';
$lang['permission_creation_successful']             =   'Permission berhasil dibuat';
$lang['permission_update_successful']               =   'Permission berhasil diubah';
$lang['permission_delete_unsuccessful']             =   'Tidak dapat menghapus permission';
$lang['permission_key_admin_not_alter']             =   'Admin permission key tidak dapat diubah';
$lang['permission_delete_notallowed']               =   'Tidak dapat menghapus administrators\' permission';

// Group Permissions
$lang['group_permissions_group_id_required']        =   'Group ID dibutuhkan';
$lang['group_permissions_permission_id_required']   =   'Permission ID dibutuhkan';
$lang['group_permissions_value_required']           =   'Value dibutuhkan';
$lang['group_permission_add_unsuccessful']          =   'Permission tidak dapat ditambahkan kedalam group ini';
$lang['group_permission_delete_unsuccessful']       =   'Permission tidak dapat dihapus dari group ini';
$lang['group_permission_delete_successful']         =   'Permission telah berhasil di hapus dari group ini';

// User Permissions
$lang['user_permissions_user_id_required']          =   'User ID dibutuhkan';
$lang['user_permissions_permission_id_required']    =   'Permission ID dibutuhkan';
$lang['user_permissions_value_required']            =   'Value dibutuhkan';
$lang['user_permission_add_unsuccessful']           =   'Permission tidak dapat ditambahkan kedalam user ini';
$lang['user_permission_delete_unsuccessful']        =   'Permission tidak dapat dihapus dari this user ini';
$lang['user_permission_delete_successful']          =   'Permission telah berhasil di hapus dari user ini';

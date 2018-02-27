<?php
/**
 * Fungsi Tanggal untuk mengubah log kedalam bahasa indonesia.
 * @author Candra Saputra
 * @version 1.0
 */
if (!function_exists('mylog')) {
    function mylog ($log)
    {
        if (!empty($log)) {
            switch ($log) {
                case 'login_berhasil':
                    $action = '<span>'.$log.'</span>';
                    break;

                case 'login_gagal':
                    $action = '<span class="text-red">'.$log.'</span>';
                    break;
                
                case 'logout_berhasil':
                    $action = '<span>'.$log.'</span>';
                    break;

                case 'logout_gagal':
                    $action = '<span class="text-red">'.$log.'</span>';
                    break;

                case 'ganti_password_berhasil':
                    $action = '<span>'.$log.'</span>';
                    break;

                case 'ganti_password_gagal':
                    $action = '<span class="text-red">'.$log.'</span>';
                    break;

                case 'ganti_waroeng_berhasil':
                    $action = '<span>'.$log.'</span>';
                    break;

                case 'ganti_waroeng_gagal':
                    $action = '<span class="text-red">'.$log.'</span>';
                    break;

                default:
                    $action = '<span class="text-red">Kesalahan Sistem!</span>';
                    break;
            }
        }

        return $action;
    }
}
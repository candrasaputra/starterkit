<?php
/**
 * Untuk mencatat aktifitas user kedalam db useractivity
 * @author Candra Saputra
 * @version 1.0
 */
if (!function_exists('ua')) {
    function ua ($outletID, $form, $usedDate, $makeDate, $fd, $action, $note)
    {
        $user = $this->ion_auth->user()->row();

        $uaPlatform = '';
        $uaBrowser = '';
        $uaIP = $user->ip_address;
        $uaMac = '';
        $createdDate = date('Y-m-d H:i:s');
        $createdUserID = $user->id;
    }
}
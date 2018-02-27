<?php
/**
 * Fungsi Tanggal untuk mengubah tanggal kedalam bahasa indonesia.
 * @author Candra Saputra
 * @version 1.0
 */
if (!function_exists('tanggal')) {
    function tanggal ($tanggal)
    {
        if (!empty($tanggal)) {
            $hari = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu");
            $bulan = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
            $dayW = date('w', strtotime($tanggal));
            $month = date('n', strtotime($tanggal));

            $dayJ = date('j', strtotime($tanggal));

            $yearY = date('Y', strtotime($tanggal));

            return $hari[$dayW].", $dayJ $bulan[$month] $yearY";
        }
    }

    function tanggalpendek ($tanggal)
    {
        if (!empty($tanggal)) {
            $bulan = array("", "Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agus", "Sep", "Okt", "Nov", "Des");
            $dayW = date('w', strtotime($tanggal));
            $month = date('n', strtotime($tanggal));

            $dayJ = date('j', strtotime($tanggal));

            $yearY = date('Y', strtotime($tanggal));

            return "$dayJ $bulan[$month] $yearY";
        }
    }

    function tanggalindonesia ($date_format = 'l, j F Y | H:i', $timestamp = '', $suffix = '') {
        if (trim ($timestamp) == '')
        {
                $timestamp = time ();
        }
        elseif (!ctype_digit ($timestamp))
        {
            $timestamp = strtotime ($timestamp);
        }
        # remove S (st,nd,rd,th) there are no such things in indonesia :p
        $date_format = preg_replace ("/S/", "", $date_format);
        $pattern = array (
            '/Mon[^day]/','/Tue[^sday]/','/Wed[^nesday]/','/Thu[^rsday]/',
            '/Fri[^day]/','/Sat[^urday]/','/Sun[^day]/','/Monday/','/Tuesday/',
            '/Wednesday/','/Thursday/','/Friday/','/Saturday/','/Sunday/',
            '/Jan[^uary]/','/Feb[^ruary]/','/Mar[^ch]/','/Apr[^il]/','/May/',
            '/Jun[^e]/','/Jul[^y]/','/Aug[^ust]/','/Sep[^tember]/','/Oct[^ober]/',
            '/Nov[^ember]/','/Dec[^ember]/','/January/','/February/','/March/',
            '/April/','/June/','/July/','/August/','/September/','/October/',
            '/November/','/December/',
        );
        $replace = array ( 
            'Sen','Sel','Rab','Kam','Jum','Sab','Min',
            'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu',
            'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des',
            'Januari','Februari','Maret','April','Juni','Juli','Agustus','Sepember',
            'Oktober','November','Desember',
        );
        $date = date ($date_format, $timestamp);
        $date = preg_replace ($pattern, $replace, $date);
        $date = "{$date} {$suffix}";
        return $date;
    }

    function tanggalwaktu ($tanggal)
    {
        if (!empty($tanggal)) {
            $hari = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu");
            $bulan = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
            $dayW = date('w', strtotime($tanggal));
            $month = date('n', strtotime($tanggal));

            $dayJ = date('j', strtotime($tanggal));

            $yearY = date('Y', strtotime($tanggal));

            $time = date('H:i:s', strtotime($tanggal));

            return $hari[$dayW]." , $dayJ $bulan[$month] $yearY - $time";
        }
    }

    function bulanpanjang($tanggal){
      if (!empty($tanggal)) {
            $bulan = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
            $bulanke = date('n', strtotime($tanggal));
            return "$bulan[$bulanke]";
        }
    }

    function bulanpendek($tanggal){
      if (!empty($tanggal)) {
            $bulan = array("", "Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agus", "Sep", "Okt", "Nov", "Des");
            $bulanke = date('n', strtotime($tanggal));
            return "$bulan[$bulanke]";
        }
    }

    function waktu($tanggal)
    {
        if (!empty($tanggal)) {
            $time = date('H:i:s', strtotime($tanggal));

            return $time;
        }
    }

    function harike($fdUsedDate='', $day='Tuesday')
    {
        switch (date("Y-m-d", strtotime($fdUsedDate . "$day"))) {
          case date("Y-m-d", strtotime($fdUsedDate . "First $day of this month")):
              return 'First';
              break;

          case date("Y-m-d", strtotime($fdUsedDate . "Second $day of this month")):
              return 'Second';
              break;

          case date("Y-m-d", strtotime($fdUsedDate . "Third $day of this month")):
              return 'Third';
              break;

          case date("Y-m-d", strtotime($fdUsedDate . "Fourth $day of this month")):
              return 'Fourth';
              break;

          case date("Y-m-d", strtotime($fdUsedDate . "Fifth $day of this month")):
              return 'Fifth';
              break;

          case date("Y-m-d", strtotime($fdUsedDate . "Sixth $day of this month")):
              return 'Sixth';
              break;

          case date("Y-m-d", strtotime($fdUsedDate . "Seventh $day of this month")):
              return 'Seventh';
              break;

          default:
              # code...
              break;
        }
    }
}
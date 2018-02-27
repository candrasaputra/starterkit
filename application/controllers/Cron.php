<?php

class Cron extends MX_Controller {

        public function __construct()
        {
                parent::__construct();
        }

        public function index()
        {

        }

        public function myname($name='')
        {
                echo "My Name is $name".PHP_EOL;
        }

        public function activity()
        {
                $today = date("Y-m-d H:i:s");
                $sql = "
                        INSERT INTO `cron` (`note`) VALUES('Melakukan cron pada jam $today')
                ";
                $this->db->query($sql);
        }
}
?>
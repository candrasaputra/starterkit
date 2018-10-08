<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seeds extends MX_Controller {
	
	function __construct()
	{
		 parent::__construct();
		 // initiate faker
		 $this->faker = Faker\Factory::create();
	}

	public function index()
	{
		echo "ss";
	}

	public function run()
	{
		$this->userSeed(26);
	}

	public function userSeed($limit='')
	{
		$this->load->model('users/users_m');
		$data = array();
		
		for ($i = 0; $i < $limit; $i++) {
			$data[] = array(
					'ip_address' => mt_rand(0, 1) ? $this->faker->ipv4 : $this->faker->ipv6,
					'username' => $this->faker->unique()->userName,
					'password' => '$2y$08$sNnbL.HdpVilxeQFpU59VuJLBcs9OE18P6.fiwbMQcI85xdYvUgRK',
					'created_on' => '1268889823',
					'last_login' => '1268889823',
					'active' => mt_rand(0, 1) ? '0' : '1',
					'first_name' => $this->faker->firstName,
					'last_name' => $this->faker->lastName,
					'company' => $this->faker->company,
					'phone' => $this->faker->phoneNumber,
					'image' => 'default.jpg',
					'changePwd' => mt_rand(0, 1) ? '0' : '1'
			);
		}

		$this->users_m->_insert_batch($data);

		$status = array(
			'status' => 'Sukses',
			'msg' => 'Seed tabel user berhasil dibuat!' );

		echo json_encode($status);
	}
}

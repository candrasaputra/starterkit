<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_psstarter extends CI_Migration {

	
	public function up()
	{
		// Drop table 'groups' if it exists
		$this->dbforge->drop_table('groups', TRUE);

		// Table structure for table 'groups'
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'MEDIUMINT',
				'constraint' => '8',
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'name' => array(
				'type' => 'VARCHAR',
				'constraint' => '20',
			),
			'description' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			)
		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('groups');

		// Dumping data for table 'groups'
		$data = array(
			array(
				'id' => '1',
				'name' => 'admin',
				'description' => 'Administrator'
			),
			array(
				'id' => '2',
				'name' => 'members',
				'description' => 'General User'
			)
		);
		$this->db->insert_batch('groups', $data);


		// Drop table 'users' if it exists
		$this->dbforge->drop_table('users', TRUE);

		// Table structure for table 'users'
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'MEDIUMINT',
				'constraint' => '8',
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'ip_address' => array(
				'type' => 'VARCHAR',
				'constraint' => '16'
			),
			'username' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'password' => array(
				'type' => 'VARCHAR',
				'constraint' => '80',
			),
			'salt' => array(
				'type' => 'VARCHAR',
				'constraint' => '40'
			),
			'email' => array(
				'type' => 'VARCHAR',
				'constraint' => '100'
			),
			'activation_code' => array(
				'type' => 'VARCHAR',
				'constraint' => '40',
				'null' => TRUE
			),
			'forgotten_password_code' => array(
				'type' => 'VARCHAR',
				'constraint' => '40',
				'null' => TRUE
			),
			'forgotten_password_time' => array(
				'type' => 'INT',
				'constraint' => '11',
				'unsigned' => TRUE,
				'null' => TRUE
			),
			'remember_code' => array(
				'type' => 'VARCHAR',
				'constraint' => '40',
				'null' => TRUE
			),
			'created_on' => array(
				'type' => 'INT',
				'constraint' => '11',
				'unsigned' => TRUE,
			),
			'last_login' => array(
				'type' => 'INT',
				'constraint' => '11',
				'unsigned' => TRUE,
				'null' => TRUE
			),
			'active' => array(
				'type' => 'TINYINT',
				'constraint' => '1',
				'unsigned' => TRUE,
				'null' => TRUE
			),
			'first_name' => array(
				'type' => 'VARCHAR',
				'constraint' => '50',
				'null' => TRUE
			),
			'last_name' => array(
				'type' => 'VARCHAR',
				'constraint' => '50',
				'null' => TRUE
			),
			'company' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => TRUE
			),
			'phone' => array(
				'type' => 'VARCHAR',
				'constraint' => '20',
				'null' => TRUE
			),
			'changePwd' => array(
				'type' => 'TINYINT',
				'constraint' => '1',
				'default' => 0
			)

		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('users');

		// Dumping data for table 'users'
		$data = array(
			'id' => '1',
			'ip_address' => '127.0.0.1',
			'username' => 'administrator',
			'password' => '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36',
			'salt' => '',
			'email' => 'admin@admin.com',
			'activation_code' => '',
			'forgotten_password_code' => NULL,
			'created_on' => '1268889823',
			'last_login' => '1268889823',
			'active' => '1',
			'first_name' => 'Admin',
			'last_name' => 'istrator',
			'company' => 'ADMIN',
			'phone' => '0',
			'changePwd' => 1,
		);
		$this->db->insert('users', $data);


		// Drop table 'users_groups' if it exists
		$this->dbforge->drop_table('users_groups', TRUE);

		// Table structure for table 'users_groups'
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'MEDIUMINT',
				'constraint' => '8',
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'user_id' => array(
				'type' => 'MEDIUMINT',
				'constraint' => '8',
				'unsigned' => TRUE
			),
			'group_id' => array(
				'type' => 'MEDIUMINT',
				'constraint' => '8',
				'unsigned' => TRUE
			)
		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('users_groups');

		// Dumping data for table 'users_groups'
		$data = array(
			array(
				'id' => '1',
				'user_id' => '1',
				'group_id' => '1',
			),
			array(
				'id' => '2',
				'user_id' => '1',
				'group_id' => '2',
			)
		);
		$this->db->insert_batch('users_groups', $data);


		// Drop table 'login_attempts' if it exists
		$this->dbforge->drop_table('login_attempts', TRUE);

		// Table structure for table 'login_attempts'
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'MEDIUMINT',
				'constraint' => '8',
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'ip_address' => array(
				'type' => 'VARCHAR',
				'constraint' => '16'
			),
			'login' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null', TRUE
			),
			'time' => array(
				'type' => 'INT',
				'constraint' => '11',
				'unsigned' => TRUE,
				'null' => TRUE
			)
		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('login_attempts');

		// Drop table 'permissions' if it exists
		$this->dbforge->drop_table('permissions', TRUE);

		// Table structure for table 'permissions'
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => '11',
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'perm_key' => array(
				'type' => 'VARCHAR',
				'constraint' => '30'
			),
			'perm_name' => array(
				'type' => 'VARCHAR',
				'constraint' => '100'
			)
		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('permissions');
		
		// Dumping data for table 'permissions'
		$data = array(
			array(
				'id' => '1',
				'perm_key' => 'access_admin',
				'perm_name' => 'access_admin'
			)
		);
		$this->db->insert_batch('permissions', $data);

		// Drop table 'groups_permissions' if it exists
		$this->dbforge->drop_table('groups_permissions', TRUE);

		// Table structure for table 'groups_permissions'
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => '11',
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'group_id' => array(
				'type' => 'INT',
				'constraint' => '11',
				'unsigned' => TRUE
			),
			'perm_id' => array(
				'type' => 'INT',
				'constraint' => '11',
				'unsigned' => TRUE
			),
			'value' => array(
				'type' => 'TINYINT',
				'constraint' => '4',
				'DEFAULT ' => 0
			),
			'created_at' => array(
				'type' => 'INT',
				'constraint' => '11'
			),
			'updated_at' => array(
				'type' => 'INT',
				'constraint' => '11'
			)
		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('groups_permissions');

		// Dumping data for table 'groups_permissions'
		$data = array(
			array(
				'id' => '1',
				'group_id' => '1',
				'perm_id' => '1',
				'value' => 1
			)
		);
		$this->db->insert_batch('groups_permissions', $data);

		// Drop table 'users_permissions' if it exists
		$this->dbforge->drop_table('users_permissions', TRUE);

		// Table structure for table 'users_permissions'
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => '11',
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'user_id' => array(
				'type' => 'MEDIUMINT',
				'constraint' => '8',
				'unsigned' => TRUE
			),
			'perm_id' => array(
				'type' => 'INT',
				'constraint' => '11',
				'unsigned' => TRUE
			),
			'value' => array(
				'type' => 'TINYINT',
				'constraint' => '1',
				'DEFAULT ' => 0
			),
			'created_at' => array(
				'type' => 'INT',
				'constraint' => '11'
			),
			'updated_at' => array(
				'type' => 'INT',
				'constraint' => '11'
			)
		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('users_permissions');
	}

	public function down()
	{
		$this->dbforge->drop_table('users', TRUE);
		$this->dbforge->drop_table('groups', TRUE);
		$this->dbforge->drop_table('users_groups', TRUE);
		$this->dbforge->drop_table('login_attempts', TRUE);
		$this->dbforge->drop_table('permissions', TRUE);
		$this->dbforge->drop_table('groups_permissions', TRUE);
		$this->dbforge->drop_table('users_permissions', TRUE);
	}

}

?>
<?php

class m111222_183233_create_user_tables extends CDbMigration
{
	public function up()
	{
		$this->createTable('users', array(
			'id'		=> 'pk',
			'username'  => 'varchar(20) NOT NULL',
			'email'		=> 'varchar(128) NOT NULL',
			'password'	=> 'varchar(128) NOT NULL',
			'activkey'	=> 'varchar(128) NOT NULL DEFAULT ""',
			'create_at'	=> 'TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP',
			'lastvisit_at' => 'TIMESTAMP NOT NULL DEFAULT "0000-00-00 00:00:00"',
			'superuser'	=> 'int(1) NOT NULL DEFAULT "0"',
			'status'	=> 'int(1) NOT NULL DEFAULT "0"',
			'KEY status (status)',
			'KEY superuser (superuser)',
		), 'ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=3'); 
		
		$sql = "ALTER TABLE users ADD CONSTRAINT uc_username UNIQUE (username)";
		$command = $this->getDbConnection()->createCommand($sql);
		$command->execute();	

		$sql = "ALTER TABLE users ADD CONSTRAINT uc_email UNIQUE (email)";
		$command = $this->getDbConnection()->createCommand($sql);
		$command->execute();	

		$sql = "INSERT INTO users 
			(`id`,`username`,`email`,`password`,`activkey`,`superuser`,`status`) VALUES 
			(1,'admin','webmaster@example.com','21232f297a57a5a743894a0e4a801fc3','9a24eff8c15a6a141ece27eb6947da0f',1,1),
			(2,'demo','demo@example.com','fe01ce2a7fbac8fafaed7c982a04e229','099f825543f7850cc038b90aaff39fac',0,1)";
		$command = $this->getDbConnection()->createCommand($sql);
		$command->execute();

		$this->createTable('profiles', array(
			'user_id'   => 'pk',
			'lastname'  => 'varchar(50) NOT NULL DEFAULT ""',
			'firstname' => 'varchar(50) NOT NULL DEFAULT ""',
			'FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE',
		), 'ENGINE=InnoDB DEFAULT CHARSET=utf8'); 

		$sql = "INSERT INTO profiles 
			(`user_id`,`lastname`,`firstname`) VALUES 
			(1,'Admin','Administrator'),
			(2,'Demo','Demo')";
		$command = $this->getDbConnection()->createCommand($sql);
		$command->execute();
		
		$this->createTable('profiles_fields', array(
			'id'              => 'pk',
			'varname'         => 'varchar(50) NOT NULL',
			'title'           => 'varchar(255) NOT NULL',
			'field_type'      => 'varchar(50) NOT NULL',
			'field_size'      => 'varchar(15) NOT NULL DEFAULT "0"',
			'field_size_min'  => 'varchar(15) NOT NULL DEFAULT "0"',
			'required'        => 'int(1) NOT NULL DEFAULT "0"',
			'match'           => 'varchar(255) NOT NULL DEFAULT ""',
			'range'           => 'varchar(255) NOT NULL DEFAULT ""',
			'error_message'   => 'varchar(255) NOT NULL DEFAULT ""',
			'other_validator' => 'varchar(5000) NOT NULL DEFAULT ""',
			'default'         => 'varchar(255) NOT NULL DEFAULT ""',
			'widget'          => 'varchar(255) NOT NULL DEFAULT ""',
			'widgetparams'    => 'varchar(5000) NOT NULL DEFAULT ""',
			'position'        => 'int(3) NOT NULL DEFAULT "0"',
			'visible'         => 'int(1) NOT NULL DEFAULT "0"',
			'KEY varname (varname,widget,visible)',
		), 'ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=3'); 

		$sql = "INSERT INTO profiles_fields 
			(`id`,`varname`,`title`,`field_type`,`field_size`,`field_size_min`,`required`,`match`,`range`,`error_message`,`other_validator`,`default`,`widget`,`widgetparams`,`position`,`visible`) VALUES 
			(1,'lastname','Last Name','VARCHAR',50,3,1,'','','Incorrect Last Name (length between 3 and 50 characters).','','','','',1,3),
			(2,'firstname','First Name','VARCHAR',50,3,1,'','','Incorrect First Name (length between 3 and 50 characters).','','','','',0,3)";
		$command = $this->getDbConnection()->createCommand($sql);
		$command->execute();
	}

	public function down()
	{
		$this->dropTable('profiles_fields');
		$this->dropTable('profiles');
		$this->dropTable('users');
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}
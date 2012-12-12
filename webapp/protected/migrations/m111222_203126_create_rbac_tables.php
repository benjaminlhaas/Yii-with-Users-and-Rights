<?php

class m111222_203126_create_rbac_tables extends CDbMigration
{
	public function up()
	{
		$this->createTable('AuthItem', array(
			'name'        => 'varchar(64) NOT NULL',
			'type'        => 'integer NOT NULL',
			'description' => 'text',
			'bizrule'     => 'text',
			'data'        => 'text',
			'PRIMARY KEY (name)',
		), 'ENGINE=InnoDB DEFAULT CHARSET=utf8'); 

		$sql = "INSERT INTO AuthItem 
			(`name`,`type`,`description`,`bizrule`,`data`) VALUES 
			('Admin',2,NULL,NULL,'N;'),
			('Authenticated',2,NULL,NULL,'N;'),
			('Guest',2,NULL,NULL,'N;')";
		$command = $this->getDbConnection()->createCommand($sql);
		$command->execute();

		$this->createTable('AuthItemChild', array(
			'parent' => 'varchar(64) NOT NULL',
			'child' => 'varchar(64) NOT NULL',
			'PRIMARY KEY (parent,child)',
			'FOREIGN KEY (parent) REFERENCES AuthItem (name) ON DELETE CASCADE ON UPDATE CASCADE',
			'FOREIGN KEY (child) REFERENCES AuthItem (name) ON DELETE CASCADE ON UPDATE CASCADE'
		), 'ENGINE=InnoDB DEFAULT CHARSET=utf8');

		$this->createTable('AuthAssignment', array(
			'itemname' => 'varchar(64) NOT NULL',
			'userid'   => 'varchar(64) NOT NULL',
			'bizrule'  => 'text',
			'data'     => 'text',
			'PRIMARY KEY (itemname,userid)',
			'FOREIGN KEY (itemname) REFERENCES AuthItem (name) ON DELETE CASCADE ON UPDATE CASCADE'
		), 'ENGINE=InnoDB DEFAULT CHARSET=utf8');

		$sql = "INSERT INTO AuthAssignment (`itemname`,`userid`,`bizrule`,`data`) VALUES ('Admin',1,NULL,'N;')";
		$command = $this->getDbConnection()->createCommand($sql);
		$command->execute();
		
		$this->createTable('Rights', array(
			'itemname' => 'varchar(64) NOT NULL',
			'type'     => 'integer NOT NULL',
			'weight'   => 'integer NOT NULL',
			'PRIMARY KEY (itemname)',
			'FOREIGN KEY (itemname) REFERENCES AuthItem (name) ON DELETE CASCADE ON UPDATE CASCADE'
		), 'ENGINE=InnoDB DEFAULT CHARSET=utf8');
	}

	public function down()
	{
		$this->dropTable('AuthAssignment');
		$this->dropTable('AuthItemChild');
		$this->dropTable('Rights');
		$this->dropTable('AuthItem');
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
<?php

class m210419_072715_create_initial_table extends CDbMigration
{
	public function up()
	{
		$this->createTable('tbl_user', array(
            'id' => 'pk AUTO_INCREMENT',
			'username' => 'varchar(128)',
			'password' => 'varchar(128)',
			'email' => 'varchar(128)',
        ));

		$this->createTable('tbl_document', array(
            'ID' => 'pk AUTO_INCREMENT',
			'Number' => 'varchar(200)',
			'DocumentTypeID' => 'int(10)',
            'Title' => 'varchar(200)',
			'StatusID' => 'int(10)',
			'RevisionReference' => 'varchar(200)',
			'Details' => 'varchar(200)',
			'DateCreated' => 'datetime',
			'ReviewDate' => 'datetime',
        ));

		$this->createTable('tbl_documentstatus', array(
            'ID' => 'pk AUTO_INCREMENT',
			'Name' => 'varchar(200)',
			'DateCreated' => 'datetime',
        ));

		$this->createTable('tbl_documenttype', array(
            'ID' => 'pk AUTO_INCREMENT',
			'Name' => 'varchar(200)',
			'ParentID' => 'int(11)',
			'DateCreated' => 'datetime',
        ));

		$this->addForeignKey('FK_Document_Status', 'tbl_document', 'StatusID', 'tbl_documentstatus', 'ID', 'RESTRICT', 'RESTRICT');
		$this->addForeignKey('FK_Parent_VirtualFolder', 'tbl_documenttype', 'ParentID', 'tbl_documenttype', 'ID', 'RESTRICT', 'RESTRICT');
		$this->addForeignKey('FK_Document_Type', 'tbl_document', 'DocumentTypeID', 'tbl_documenttype', 'ID', 'RESTRICT', 'RESTRICT');
	}

	public function down()
	{
		echo "m210419_072715_create_initial_table does not support migration down.\n";
		return false;
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
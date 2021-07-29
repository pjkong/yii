<?php

class m210514_074500_insert_default_data extends CDbMigration
{
	public function safeUp()
	{
        $this->insert('tbl_documentstatus', [
            'Name' => 'Open',
            'DateCreated' => date('Y-m-d H:i:s'),
        ]);

        $this->insert('tbl_documentstatus', [
            'Name' => 'Reviewed',
            'DateCreated' => date('Y-m-d H:i:s'),
        ]);
        
        $this->insert('tbl_documentstatus', [
            'Name' => 'Closed',
            'DateCreated' => date('Y-m-d H:i:s'),
        ]);

        $this->insert('tbl_documenttype', [
            'Name' => 'Audit',
            'DateCreated' => date('Y-m-d H:i:s'),
        ]);
	}

	public function safeDown()
	{
        echo "m210514_074500_insert_default_data does not support migration down.\n";
		return false;
	}
}
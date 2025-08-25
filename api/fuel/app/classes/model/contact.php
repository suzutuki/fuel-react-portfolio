<?php

class Model_Contact extends \Orm\Model
{
    protected static $_table_name = 'contacts';
    protected static $_primary_key = array('id');
    
    protected static $_properties = array(
        'id' => array(
            'data_type' => 'int',
            'null' => false,
        ),
        'name' => array(
            'data_type' => 'varchar',
            'null' => false,
        ),
        'email' => array(
            'data_type' => 'varchar',
            'null' => false,
        ),
        'subject' => array(
            'data_type' => 'varchar',
            'null' => true,
        ),
        'message' => array(
            'data_type' => 'text',
            'null' => false,
        ),
        'created_at' => array(
            'data_type' => 'datetime',
            'null' => false,
        ),
    );
    
    protected static $_observers = array(
        'Orm\Observer_CreatedAt' => array(
            'events' => array('before_insert'),
            'mysql_timestamp' => true,
        ),
    );
}
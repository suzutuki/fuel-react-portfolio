<?php

class Model_Skill extends \Orm\Model
{
    protected static $_table_name = 'skills';
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
        'category' => array(
            'data_type' => 'varchar',
            'null' => false,
        ),
        'proficiency' => array(
            'data_type' => 'int',
            'null' => false,
            'default' => 0,
        ),
        'created_at' => array(
            'data_type' => 'datetime',
            'null' => false,
        ),
        'updated_at' => array(
            'data_type' => 'datetime',
            'null' => false,
        ),
    );
    
    protected static $_observers = array(
        'Orm\Observer_CreatedAt' => array(
            'events' => array('before_insert'),
            'mysql_timestamp' => true,
        ),
        'Orm\Observer_UpdatedAt' => array(
            'events' => array('before_save'),
            'mysql_timestamp' => true,
        ),
    );
}
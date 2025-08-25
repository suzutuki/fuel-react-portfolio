<?php

class Model_Project extends \Orm\Model
{
    protected static $_table_name = 'projects';
    protected static $_primary_key = array('id');
    
    protected static $_properties = array(
        'id' => array(
            'data_type' => 'int',
            'null' => false,
        ),
        'title' => array(
            'data_type' => 'varchar',
            'null' => false,
        ),
        'description' => array(
            'data_type' => 'text',
            'null' => false,
        ),
        'long_description' => array(
            'data_type' => 'text',
            'null' => true,
        ),
        'technologies' => array(
            'data_type' => 'text',
            'null' => false,
        ),
        'image_url' => array(
            'data_type' => 'varchar',
            'null' => true,
        ),
        'images' => array(
            'data_type' => 'text',
            'null' => true,
        ),
        'demo_url' => array(
            'data_type' => 'varchar',
            'null' => true,
        ),
        'github_url' => array(
            'data_type' => 'varchar',
            'null' => true,
        ),
        'featured' => array(
            'data_type' => 'tinyint',
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
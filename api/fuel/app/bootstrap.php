<?php

Fuel::init(array(
    'name' => 'portfolio_api',
    'init' => true,
    'auto_loader' => function($class) {
        static $classes = array(
            'Controller_Api' => APPPATH.'classes/controller/api.php',
            'Controller_Portfolio' => APPPATH.'classes/controller/portfolio.php',
            'Controller_Projects' => APPPATH.'classes/controller/projects.php',
            'Controller_Contact' => APPPATH.'classes/controller/contact.php',
            'Controller_Dbtest' => APPPATH.'classes/controller/dbtest.php',
            'Model_Project' => APPPATH.'classes/model/project.php',
            'Model_Skill' => APPPATH.'classes/model/skill.php',
            'Model_Contact' => APPPATH.'classes/model/contact.php',
        );

        if (array_key_exists($class, $classes)) {
            require $classes[$class];
            return true;
        }

        return false;
    }
));

Autoloader::add_classes(array(
    'Controller_Api' => APPPATH.'classes/controller/api.php',
    'Controller_Portfolio' => APPPATH.'classes/controller/portfolio.php',
    'Controller_Projects' => APPPATH.'classes/controller/projects.php',
    'Controller_Contact' => APPPATH.'classes/controller/contact.php',
    'Controller_Dbtest' => APPPATH.'classes/controller/dbtest.php',
    'Model_Project' => APPPATH.'classes/model/project.php',
    'Model_Skill' => APPPATH.'classes/model/skill.php',
    'Model_Contact' => APPPATH.'classes/model/contact.php',
));
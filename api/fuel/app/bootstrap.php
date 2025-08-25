<?php

Autoloader::add_classes(array(
    'Controller_Api' => APPPATH.'classes/controller/api.php',
    'Controller_Portfolio' => APPPATH.'classes/controller/portfolio.php',
    'Controller_Projects' => APPPATH.'classes/controller/projects.php',
    'Controller_Contact' => APPPATH.'classes/controller/contact.php',
    'Model_Project' => APPPATH.'classes/model/project.php',
    'Model_Skill' => APPPATH.'classes/model/skill.php',
    'Model_Contact' => APPPATH.'classes/model/contact.php',
));

Autoloader::add_namespace('Fuel\\Core', COREPATH.'classes/');
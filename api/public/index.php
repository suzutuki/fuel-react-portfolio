<?php

define('DOCROOT', __DIR__.DIRECTORY_SEPARATOR);
define('APPPATH', realpath(__DIR__.'/../fuel/app/').DIRECTORY_SEPARATOR);
define('PKGPATH', realpath(__DIR__.'/../fuel/packages/').DIRECTORY_SEPARATOR);
define('COREPATH', realpath(__DIR__.'/../fuel/core/').DIRECTORY_SEPARATOR);

if (file_exists(DOCROOT.'../fuel/core/classes/autoloader.php'))
{
    require DOCROOT.'../fuel/core/classes/autoloader.php';
}
else
{
    die('No FuelPHP installation found!');
}

Autoloader::init();
Fuel::init();
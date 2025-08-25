<?php

return array(
    '_root_'  => 'welcome/index',
    '_404_'   => 'welcome/404',
    
    // API Routes
    'api/portfolio' => 'portfolio/index',
    'api/projects' => 'projects/index',
    'api/projects/(:segment)' => 'projects/show/$1',
    'api/skills' => 'portfolio/skills',
    'api/contact' => 'contact/index',
);
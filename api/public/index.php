<?php

header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

// Handle OPTIONS request for CORS
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

// Simple routing
$request_uri = $_SERVER['REQUEST_URI'];
$path = parse_url($request_uri, PHP_URL_PATH);
$path = str_replace('/fuel-react-portfolio/api/public', '', $path);
$path = trim($path, '/');

// Default to home if no path
if (empty($path)) {
    $path = 'home';
}

switch ($path) {
    case 'home':
        echo json_encode([
            'status' => 'success',
            'page' => 'home',
            'data' => [
                'title' => 'Welcome to My Portfolio',
                'subtitle' => 'Full Stack Developer & Designer',
                'description' => 'I create modern web applications with React, TypeScript, and PHP.',
                'hero' => [
                    'name' => 'Your Name',
                    'role' => 'Full Stack Developer',
                    'bio' => 'Passionate about creating beautiful and functional web applications.',
                    'skills' => ['React', 'TypeScript', 'PHP', 'FuelPHP', 'MySQL', 'CSS']
                ],
                'featured_projects' => [
                    [
                        'id' => 1,
                        'title' => 'React Portfolio',
                        'description' => 'A modern portfolio website built with React and TypeScript',
                        'technologies' => ['React', 'TypeScript', 'CSS'],
                        'image' => '/images/project1.jpg'
                    ],
                    [
                        'id' => 2,
                        'title' => 'API Backend',
                        'description' => 'RESTful API built with PHP and MySQL',
                        'technologies' => ['PHP', 'MySQL', 'REST'],
                        'image' => '/images/project2.jpg'
                    ]
                ],
                'contact' => [
                    'email' => 'your.email@example.com',
                    'github' => 'https://github.com/yourusername',
                    'linkedin' => 'https://linkedin.com/in/yourusername'
                ]
            ]
        ]);
        break;
    
    case 'api/status':
        echo json_encode([
            'status' => 'success',
            'message' => 'API is working',
            'version' => '1.0.0',
            'timestamp' => date('Y-m-d H:i:s')
        ]);
        break;
    
    default:
        http_response_code(404);
        echo json_encode([
            'status' => 'error',
            'message' => 'Endpoint not found',
            'path' => $path
        ]);
        break;
}
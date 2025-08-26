<?php

class Controller_Welcome extends Controller_Api
{
    public function action_index()
    {
        return $this->send_response(array(
            'message' => 'Welcome to Portfolio API',
            'version' => '1.0.0',
            'endpoints' => array(
                'GET /api/portfolio' => 'Get portfolio information',
                'GET /api/projects' => 'Get all projects',
                'GET /api/projects/{id}' => 'Get specific project',
                'GET /api/skills' => 'Get skills data',
                'POST /api/contact' => 'Submit contact form'
            )
        ));
    }
    
    public function action_404()
    {
        return $this->send_error('Endpoint not found', 404);
    }
}
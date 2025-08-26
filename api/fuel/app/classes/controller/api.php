<?php

class Controller_Api extends Controller
{
    public function before()
    {
        parent::before();
        
        // Set CORS headers
        $this->response->set_header('Access-Control-Allow-Origin', '*');
        $this->response->set_header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
        $this->response->set_header('Access-Control-Allow-Headers', 'Content-Type, Authorization');
        
        // Handle preflight requests
        if (Input::method() === 'OPTIONS')
        {
            return $this->response();
        }
    }
    
    protected function send_response($data, $status = 200)
    {
        Response::forge(json_encode($data), $status, array(
            'Content-Type' => 'application/json',
            'Access-Control-Allow-Origin' => '*'
        ))->send(true);
        exit;
    }
    
    protected function send_error($message, $status = 400)
    {
        return $this->send_response(array('error' => $message), $status);
    }
}
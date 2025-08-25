<?php

class Controller_Api extends Controller_Rest
{
    public function before()
    {
        parent::before();
        
        // Set CORS headers
        $this->response->set_header('Access-Control-Allow-Origin', '*');
        $this->response->set_header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
        $this->response->set_header('Access-Control-Allow-Headers', 'Content-Type, Authorization');
        
        // Handle preflight requests
        if ($this->request->method === 'OPTIONS')
        {
            return $this->response();
        }
    }
    
    protected function send_response($data, $status = 200)
    {
        $this->response->set_status($status);
        $this->response->set_header('Content-Type', 'application/json');
        return $this->response($data);
    }
    
    protected function send_error($message, $status = 400)
    {
        return $this->send_response(array('error' => $message), $status);
    }
}
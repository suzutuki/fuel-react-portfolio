<?php

class Controller_Contact extends Controller_Api
{
    public function action_index()
    {
        if (Input::method() === 'POST') {
            return $this->action_submit();
        }
        
        return $this->send_error('Method not allowed', 405);
    }
    
    public function action_submit()
    {
        try {
            $input = json_decode(file_get_contents('php://input'), true);
            
            $validation = Validation::forge();
            $validation->add('name', 'Name')->add_rule('required')->add_rule('min_length', 2);
            $validation->add('email', 'Email')->add_rule('required')->add_rule('valid_email');
            $validation->add('message', 'Message')->add_rule('required')->add_rule('min_length', 10);
            
            if (!$validation->run($input)) {
                return $this->send_error('Validation failed: ' . implode(', ', $validation->error_message()), 400);
            }
            
            $contact = new Model_Contact();
            $contact->name = $input['name'];
            $contact->email = $input['email'];
            $contact->subject = isset($input['subject']) ? $input['subject'] : '';
            $contact->message = $input['message'];
            $contact->created_at = date('Y-m-d H:i:s');
            
            if ($contact->save()) {
                return $this->send_response(array('message' => 'Message sent successfully'));
            } else {
                return $this->send_error('Failed to save message', 500);
            }
            
        } catch (Exception $e) {
            return $this->send_error('Failed to submit contact form', 500);
        }
    }
}
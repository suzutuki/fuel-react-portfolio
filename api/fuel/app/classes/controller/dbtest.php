<?php

class Controller_Dbtest extends Controller
{
    public function action_index()
    {
        $response = array();
        
        try {
            // Test basic database connection
            $db = Database::instance();
            $response['connection'] = 'SUCCESS';
            
            // Test query execution
            $result = DB::select('VERSION()')->execute();
            $version = $result->current();
            $response['mysql_version'] = array_values($version)[0];
            
            // Test if our database exists
            $db_check = DB::select('SCHEMA_NAME')
                ->from('information_schema.SCHEMATA')
                ->where('SCHEMA_NAME', '=', 'portfolio_db')
                ->execute();
            
            if ($db_check->count() > 0) {
                $response['database_exists'] = true;
                
                // Test if tables exist
                $tables = DB::select('TABLE_NAME')
                    ->from('information_schema.TABLES')
                    ->where('TABLE_SCHEMA', '=', 'portfolio_db')
                    ->execute();
                
                $table_names = array();
                foreach ($tables as $table) {
                    $table_names[] = $table['TABLE_NAME'];
                }
                $response['tables'] = $table_names;
                
                // Test ORM models if tables exist
                if (in_array('projects', $table_names)) {
                    try {
                        $project_count = Model_Project::count();
                        $response['project_count'] = $project_count;
                        $response['project_model'] = 'SUCCESS';
                    } catch (Exception $e) {
                        $response['project_model'] = 'FAILED: ' . $e->getMessage();
                    }
                }
                
                if (in_array('skills', $table_names)) {
                    try {
                        $skill_count = Model_Skill::count();
                        $response['skill_count'] = $skill_count;
                        $response['skill_model'] = 'SUCCESS';
                    } catch (Exception $e) {
                        $response['skill_model'] = 'FAILED: ' . $e->getMessage();
                    }
                }
                
                if (in_array('contacts', $table_names)) {
                    try {
                        $contact_count = Model_Contact::count();
                        $response['contact_count'] = $contact_count;
                        $response['contact_model'] = 'SUCCESS';
                    } catch (Exception $e) {
                        $response['contact_model'] = 'FAILED: ' . $e->getMessage();
                    }
                }
                
            } else {
                $response['database_exists'] = false;
                $response['message'] = 'Database "portfolio_db" does not exist. Please run the setup scripts.';
            }
            
        } catch (Exception $e) {
            $response['connection'] = 'FAILED';
            $response['error'] = $e->getMessage();
        }
        
        // Set headers for JSON response
        $this->response->set_header('Content-Type', 'application/json');
        $this->response->set_header('Access-Control-Allow-Origin', '*');
        
        return $this->response($response);
    }
}
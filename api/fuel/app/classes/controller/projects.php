<?php

class Controller_Projects extends Controller_Api
{
    public function action_index()
    {
        try {
            $projects = Model_Project::find('all');
            $projects_data = array();
            
            foreach ($projects as $project) {
                $projects_data[] = array(
                    'id' => $project->id,
                    'title' => $project->title,
                    'description' => $project->description,
                    'technologies' => json_decode($project->technologies),
                    'image_url' => $project->image_url,
                    'demo_url' => $project->demo_url,
                    'github_url' => $project->github_url,
                    'featured' => (bool) $project->featured,
                    'created_at' => $project->created_at
                );
            }
            
            return $this->send_response($projects_data);
        } catch (Exception $e) {
            return $this->send_error('Failed to fetch projects', 500);
        }
    }
    
    public function action_show($id)
    {
        try {
            $project = Model_Project::find($id);
            
            if (!$project) {
                return $this->send_error('Project not found', 404);
            }
            
            $project_data = array(
                'id' => $project->id,
                'title' => $project->title,
                'description' => $project->description,
                'long_description' => $project->long_description,
                'technologies' => json_decode($project->technologies),
                'image_url' => $project->image_url,
                'images' => json_decode($project->images),
                'demo_url' => $project->demo_url,
                'github_url' => $project->github_url,
                'featured' => (bool) $project->featured,
                'created_at' => $project->created_at
            );
            
            return $this->send_response($project_data);
        } catch (Exception $e) {
            return $this->send_error('Failed to fetch project', 500);
        }
    }
}
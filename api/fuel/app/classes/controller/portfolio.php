<?php

class Controller_Portfolio extends Controller_Api
{
    public function action_index()
    {
        try {
            $portfolio_data = array(
                'name' => 'Your Name',
                'title' => 'Full Stack Developer',
                'bio' => 'Passionate developer with expertise in modern web technologies.',
                'email' => 'your.email@example.com',
                'phone' => '+1 (555) 123-4567',
                'location' => 'Your City, Country',
                'social' => array(
                    'github' => 'https://github.com/yourusername',
                    'linkedin' => 'https://linkedin.com/in/yourusername',
                    'twitter' => 'https://twitter.com/yourusername'
                )
            );
            
            return $this->send_response($portfolio_data);
        } catch (Exception $e) {
            return $this->send_error('Failed to fetch portfolio data', 500);
        }
    }
    
    public function action_skills()
    {
        try {
            $skills = Model_Skill::find('all');
            $skills_data = array();
            
            foreach ($skills as $skill) {
                $skills_data[] = array(
                    'id' => $skill->id,
                    'name' => $skill->name,
                    'category' => $skill->category,
                    'proficiency' => $skill->proficiency
                );
            }
            
            return $this->send_response($skills_data);
        } catch (Exception $e) {
            return $this->send_error('Failed to fetch skills', 500);
        }
    }
}
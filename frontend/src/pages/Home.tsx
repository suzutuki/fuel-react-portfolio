import React, { useEffect, useState } from 'react';
import { Link } from 'react-router-dom';
import { portfolioApi, projectsApi } from '../services/api';
import { Portfolio, Project, Skill } from '../types';
import './Home.css';

export const Home: React.FC = () => {
  const [portfolio, setPortfolio] = useState<Portfolio | null>(null);
  const [featuredProjects, setFeaturedProjects] = useState<Project[]>([]);
  const [skills, setSkills] = useState<Skill[]>([]);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    const fetchData = async () => {
      try {
        const [portfolioData, projectsData, skillsData] = await Promise.all([
          portfolioApi.getPortfolio(),
          projectsApi.getProjects(),
          portfolioApi.getSkills()
        ]);
        
        setPortfolio(portfolioData);
        setFeaturedProjects(projectsData.filter(p => p.featured).slice(0, 3));
        setSkills(skillsData);
      } catch (error) {
        console.error('Error fetching data:', error);
      } finally {
        setLoading(false);
      }
    };

    fetchData();
  }, []);

  if (loading) {
    return <div className="loading">Loading...</div>;
  }

  return (
    <div className="home">
      <section className="hero">
        <div className="container">
          <div className="hero-content">
            <h1 className="hero-title">
              Hi, I'm {portfolio?.name || 'Your Name'}
            </h1>
            <h2 className="hero-subtitle">
              {portfolio?.title || 'Full Stack Developer'}
            </h2>
            <p className="hero-description">
              {portfolio?.bio || 'Passionate developer with expertise in modern web technologies.'}
            </p>
            <div className="hero-actions">
              <Link to="/projects" className="btn btn-primary">
                View My Work
              </Link>
              <Link to="/contact" className="btn btn-outline">
                Get In Touch
              </Link>
            </div>
          </div>
        </div>
      </section>

      <section className="section">
        <div className="container">
          <h2 className="section-title">Featured Projects</h2>
          <div className="grid grid-3">
            {featuredProjects.map(project => (
              <div key={project.id} className="card project-card">
                {project.image_url && (
                  <img src={project.image_url} alt={project.title} className="project-image" />
                )}
                <h3 className="project-title">{project.title}</h3>
                <p className="project-description">{project.description}</p>
                <div className="project-technologies">
                  {project.technologies.map(tech => (
                    <span key={tech} className="tech-tag">{tech}</span>
                  ))}
                </div>
                <div className="project-links">
                  <Link to={`/projects/${project.id}`} className="btn btn-primary">
                    View Details
                  </Link>
                </div>
              </div>
            ))}
          </div>
          <div className="text-center">
            <Link to="/projects" className="btn btn-outline">
              View All Projects
            </Link>
          </div>
        </div>
      </section>

      <section className="section skills-section">
        <div className="container">
          <h2 className="section-title">Skills & Technologies</h2>
          <div className="skills-grid">
            {skills.reduce((acc: { [key: string]: Skill[] }, skill) => {
              if (!acc[skill.category]) {
                acc[skill.category] = [];
              }
              acc[skill.category].push(skill);
              return acc;
            }, {}).map ? Object.entries(skills.reduce((acc: { [key: string]: Skill[] }, skill) => {
              if (!acc[skill.category]) {
                acc[skill.category] = [];
              }
              acc[skill.category].push(skill);
              return acc;
            }, {})).map(([category, categorySkills]) => (
              <div key={category} className="skill-category">
                <h3 className="category-title">{category}</h3>
                <div className="skills-list">
                  {categorySkills.map(skill => (
                    <div key={skill.id} className="skill-item">
                      <span className="skill-name">{skill.name}</span>
                      <div className="skill-bar">
                        <div 
                          className="skill-progress" 
                          style={{ width: `${skill.proficiency}%` }}
                        ></div>
                      </div>
                    </div>
                  ))}
                </div>
              </div>
            )) : null}
          </div>
        </div>
      </section>
    </div>
  );
};
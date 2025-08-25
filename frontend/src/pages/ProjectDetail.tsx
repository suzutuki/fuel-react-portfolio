import React, { useEffect, useState } from 'react';
import { useParams, Link } from 'react-router-dom';
import { projectsApi } from '@/services/api';
import { Project } from '@/types';
import './ProjectDetail.css';

export const ProjectDetail: React.FC = () => {
  const { id } = useParams<{ id: string }>();
  const [project, setProject] = useState<Project | null>(null);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState<string | null>(null);

  useEffect(() => {
    const fetchProject = async () => {
      if (!id) return;
      
      try {
        const data = await projectsApi.getProject(parseInt(id));
        setProject(data);
      } catch (error) {
        console.error('Error fetching project:', error);
        setError('Failed to load project details');
      } finally {
        setLoading(false);
      }
    };

    fetchProject();
  }, [id]);

  if (loading) {
    return <div className="loading">Loading project...</div>;
  }

  if (error || !project) {
    return (
      <div className="error-page">
        <div className="container">
          <h1>Project Not Found</h1>
          <p>{error || 'The requested project could not be found.'}</p>
          <Link to="/projects" className="btn btn-primary">
            Back to Projects
          </Link>
        </div>
      </div>
    );
  }

  return (
    <div className="project-detail">
      <div className="container">
        <div className="project-header">
          <Link to="/projects" className="back-link">
            ← Back to Projects
          </Link>
          <h1 className="project-title">{project.title}</h1>
          <div className="project-meta">
            <span className="project-date">
              {new Date(project.created_at).toLocaleDateString('en-US', {
                year: 'numeric',
                month: 'long',
                day: 'numeric'
              })}
            </span>
            {project.featured && <span className="featured-badge">Featured</span>}
          </div>
        </div>

        <div className="project-content">
          {project.image_url && (
            <div className="project-hero-image">
              <img src={project.image_url} alt={project.title} />
            </div>
          )}

          <div className="project-info">
            <div className="project-description">
              <h2>About This Project</h2>
              <p>{project.long_description || project.description}</p>
            </div>

            <div className="project-technologies">
              <h3>Technologies Used</h3>
              <div className="tech-tags">
                {project.technologies.map(tech => (
                  <span key={tech} className="tech-tag">{tech}</span>
                ))}
              </div>
            </div>

            <div className="project-links">
              <h3>Project Links</h3>
              <div className="links-container">
                {project.demo_url && (
                  <a href={project.demo_url} target="_blank" rel="noopener noreferrer" className="btn btn-primary">
                    View Live Demo
                  </a>
                )}
                {project.github_url && (
                  <a href={project.github_url} target="_blank" rel="noopener noreferrer" className="btn btn-outline">
                    View Source Code
                  </a>
                )}
              </div>
            </div>

            {project.images && project.images.length > 0 && (
              <div className="project-gallery">
                <h3>Project Gallery</h3>
                <div className="gallery-grid">
                  {project.images.map((image, index) => (
                    <img key={index} src={image} alt={`${project.title} screenshot ${index + 1}`} />
                  ))}
                </div>
              </div>
            )}
          </div>
        </div>
      </div>
    </div>
  );
};
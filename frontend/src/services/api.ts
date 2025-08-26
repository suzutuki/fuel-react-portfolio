import axios from 'axios';
import { Project, Skill, Portfolio, ContactForm } from '../types';

const API_BASE_URL = process.env.NODE_ENV === 'production' 
  ? '/api' 
  : 'http://localhost/fuel-react-portfolio/api/public/api';

const api = axios.create({
  baseURL: API_BASE_URL,
  headers: {
    'Content-Type': 'application/json',
  },
});

export const portfolioApi = {
  async getPortfolio(): Promise<Portfolio> {
    const response = await api.get('/portfolio');
    return response.data;
  },

  async getSkills(): Promise<Skill[]> {
    const response = await api.get('/skills');
    return response.data;
  },
};

export const projectsApi = {
  async getProjects(): Promise<Project[]> {
    const response = await api.get('/projects');
    return response.data;
  },

  async getProject(id: number): Promise<Project> {
    const response = await api.get(`/projects/${id}`);
    return response.data;
  },
};

export const contactApi = {
  async submitContact(data: ContactForm): Promise<{ message: string }> {
    const response = await api.post('/contact', data);
    return response.data;
  },
};

export default api;
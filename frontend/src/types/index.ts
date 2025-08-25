export interface Project {
  id: number;
  title: string;
  description: string;
  long_description?: string;
  technologies: string[];
  image_url?: string;
  images?: string[];
  demo_url?: string;
  github_url?: string;
  featured: boolean;
  created_at: string;
}

export interface Skill {
  id: number;
  name: string;
  category: string;
  proficiency: number;
}

export interface Portfolio {
  name: string;
  title: string;
  bio: string;
  email: string;
  phone: string;
  location: string;
  social: {
    github?: string;
    linkedin?: string;
    twitter?: string;
  };
}

export interface ContactForm {
  name: string;
  email: string;
  subject?: string;
  message: string;
}

export interface ApiResponse<T> {
  data?: T;
  error?: string;
}
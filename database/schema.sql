-- Portfolio Database Schema
-- MySQL Database for FuelPHP + React Portfolio

-- Create database (run this separately if needed)
-- CREATE DATABASE portfolio_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
-- USE portfolio_db;

-- Projects table
CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `long_description` text,
  `technologies` text NOT NULL COMMENT 'JSON array of technologies used',
  `image_url` varchar(500),
  `images` text COMMENT 'JSON array of additional project images',
  `demo_url` varchar(500),
  `github_url` varchar(500),
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX `idx_featured` (`featured`),
  INDEX `idx_created_at` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Skills table
CREATE TABLE IF NOT EXISTS `skills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `proficiency` int(3) NOT NULL DEFAULT 0 COMMENT 'Proficiency level 0-100',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX `idx_category` (`category`),
  INDEX `idx_proficiency` (`proficiency`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Contact messages table
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255),
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX `idx_email` (`email`),
  INDEX `idx_created_at` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert sample data

-- Sample projects
INSERT INTO `projects` (`title`, `description`, `long_description`, `technologies`, `image_url`, `demo_url`, `github_url`, `featured`) VALUES
('E-Commerce Platform', 'Full-stack e-commerce application with payment integration', 'A comprehensive e-commerce platform built with modern web technologies. Features include user authentication, product catalog, shopping cart, order management, and secure payment processing using Stripe API. The application follows responsive design principles and includes an admin dashboard for inventory management.', '["React", "Node.js", "Express", "MongoDB", "Stripe", "JWT"]', 'https://via.placeholder.com/600x400/3182ce/ffffff?text=E-Commerce+Platform', 'https://demo.example.com', 'https://github.com/username/ecommerce', 1),

('Task Management App', 'Collaborative task management tool with real-time updates', 'A collaborative task management application that helps teams organize their work efficiently. Built with React and Firebase, it features real-time synchronization, drag-and-drop functionality, team collaboration, file attachments, and deadline tracking. The app includes different view modes (kanban, list, calendar) and supports team permissions.', '["React", "TypeScript", "Firebase", "Material-UI", "React DnD"]', 'https://via.placeholder.com/600x400/48bb78/ffffff?text=Task+Manager', 'https://taskapp.example.com', 'https://github.com/username/taskmanager', 1),

('Weather Dashboard', 'Weather forecast application with location-based services', 'A modern weather dashboard that provides detailed weather information and forecasts. Features include current weather conditions, 7-day forecast, interactive maps, location search, favorite locations, and weather alerts. The app uses OpenWeatherMap API and includes beautiful data visualizations using Chart.js.', '["Vue.js", "JavaScript", "Chart.js", "OpenWeatherMap API", "CSS3"]', 'https://via.placeholder.com/600x400/f56565/ffffff?text=Weather+Dashboard', 'https://weather.example.com', 'https://github.com/username/weather', 1),

('Blog CMS', 'Content management system for blogging platform', 'A full-featured content management system designed for bloggers and content creators. Built with Laravel and Vue.js, it includes a rich text editor, media management, SEO optimization, user roles and permissions, comment system, and social media integration. The admin panel provides analytics and content scheduling features.', '["Laravel", "Vue.js", "MySQL", "Tailwind CSS", "Quill.js"]', 'https://via.placeholder.com/600x400/9f7aea/ffffff?text=Blog+CMS', 'https://blog.example.com', 'https://github.com/username/blog-cms', 0),

('Portfolio Website', 'Personal portfolio website showcasing projects and skills', 'This very portfolio website you are viewing! Built with React, TypeScript, and FuelPHP backend. Features include responsive design, project showcase, contact form, skills visualization, and admin panel for content management. The site is optimized for performance and SEO.', '["React", "TypeScript", "FuelPHP", "MySQL", "CSS3"]', 'https://via.placeholder.com/600x400/ed8936/ffffff?text=Portfolio+Website', 'https://portfolio.example.com', 'https://github.com/username/portfolio', 0);

-- Sample skills
INSERT INTO `skills` (`name`, `category`, `proficiency`) VALUES
-- Frontend
('React', 'Frontend', 90),
('Vue.js', 'Frontend', 85),
('TypeScript', 'Frontend', 88),
('JavaScript', 'Frontend', 92),
('HTML5', 'Frontend', 95),
('CSS3', 'Frontend', 90),
('Tailwind CSS', 'Frontend', 85),
('Sass/SCSS', 'Frontend', 80),

-- Backend
('Node.js', 'Backend', 87),
('PHP', 'Backend', 85),
('Laravel', 'Backend', 82),
('FuelPHP', 'Backend', 78),
('Express.js', 'Backend', 85),
('Python', 'Backend', 75),
('Django', 'Backend', 70),

-- Database
('MySQL', 'Database', 85),
('MongoDB', 'Database', 80),
('PostgreSQL', 'Database', 75),
('Redis', 'Database', 70),

-- DevOps & Tools
('Git', 'DevOps', 90),
('Docker', 'DevOps', 75),
('AWS', 'DevOps', 70),
('Linux', 'DevOps', 80),
('Nginx', 'DevOps', 75),

-- Design
('Figma', 'Design', 80),
('Adobe XD', 'Design', 75),
('Photoshop', 'Design', 70);
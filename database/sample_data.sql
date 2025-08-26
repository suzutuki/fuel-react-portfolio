-- Sample Data for Portfolio Database
-- This file contains sample data to populate the portfolio database

USE `portfolio_db`;

-- Insert sample projects
INSERT INTO `projects` (`title`, `description`, `long_description`, `technologies`, `image_url`, `images`, `demo_url`, `github_url`, `featured`, `created_at`, `updated_at`) VALUES
('E-Commerce Platform', 'Full-stack e-commerce application with payment integration', 'A comprehensive e-commerce platform built with React and Node.js. Features include user authentication, product catalog, shopping cart, payment processing with Stripe, order management, and admin dashboard. The application uses Redux for state management and Material-UI for styling.', 'React, TypeScript, Node.js, Express, MongoDB, Stripe API, Redux, Material-UI', '/images/projects/ecommerce.jpg', '["/images/projects/ecommerce-1.jpg", "/images/projects/ecommerce-2.jpg", "/images/projects/ecommerce-3.jpg"]', 'https://demo-ecommerce.example.com', 'https://github.com/username/ecommerce-platform', 1, NOW(), NOW()),

('Task Management System', 'Collaborative project management tool with real-time updates', 'A modern task management system inspired by Trello and Asana. Built with React and Firebase, it features real-time collaboration, drag-and-drop interface, team management, file attachments, and progress tracking. Users can create boards, lists, and cards with due dates and assignments.', 'React, TypeScript, Firebase, Material-UI, React DnD, React Router', '/images/projects/taskmanager.jpg', '["/images/projects/taskmanager-1.jpg", "/images/projects/taskmanager-2.jpg"]', 'https://demo-taskmanager.example.com', 'https://github.com/username/task-manager', 1, NOW(), NOW()),

('Weather App', 'Real-time weather application with location-based forecasts', 'A responsive weather application that provides current weather conditions and 7-day forecasts. Features geolocation support, city search, weather maps, and detailed weather information including humidity, wind speed, and UV index. Built with React and integrated with OpenWeatherMap API.', 'React, JavaScript, OpenWeatherMap API, CSS3, Responsive Design', '/images/projects/weather.jpg', '["/images/projects/weather-1.jpg", "/images/projects/weather-2.jpg"]', 'https://demo-weather.example.com', 'https://github.com/username/weather-app', 0, NOW(), NOW()),

('Blog Platform', 'Content management system with markdown support', 'A full-featured blog platform with user authentication, markdown editor, comment system, and SEO optimization. Includes admin panel for content management, user roles, and analytics dashboard. Built with Next.js for server-side rendering and optimized performance.', 'Next.js, React, TypeScript, Prisma, PostgreSQL, Markdown, Tailwind CSS', '/images/projects/blog.jpg', '["/images/projects/blog-1.jpg", "/images/projects/blog-2.jpg"]', 'https://demo-blog.example.com', 'https://github.com/username/blog-platform', 0, NOW(), NOW()),

('Portfolio Website', 'Personal portfolio showcasing projects and skills', 'This very portfolio website built with FuelPHP backend API and React TypeScript frontend. Features project showcase, skills section, contact form, and responsive design. Includes admin panel for content management and analytics.', 'React, TypeScript, FuelPHP, MySQL, Sass, Responsive Design', '/images/projects/portfolio.jpg', '["/images/projects/portfolio-1.jpg", "/images/projects/portfolio-2.jpg"]', 'https://your-portfolio.example.com', 'https://github.com/username/fuel-react-portfolio', 1, NOW(), NOW());

-- Insert sample skills
INSERT INTO `skills` (`name`, `category`, `proficiency`, `created_at`, `updated_at`) VALUES
-- Frontend Technologies
('React', 'Frontend', 90, NOW(), NOW()),
('TypeScript', 'Frontend', 85, NOW(), NOW()),
('JavaScript', 'Frontend', 95, NOW(), NOW()),
('HTML5', 'Frontend', 95, NOW(), NOW()),
('CSS3', 'Frontend', 90, NOW(), NOW()),
('Sass/SCSS', 'Frontend', 85, NOW(), NOW()),
('Tailwind CSS', 'Frontend', 80, NOW(), NOW()),
('Material-UI', 'Frontend', 75, NOW(), NOW()),
('Vue.js', 'Frontend', 70, NOW(), NOW()),
('Next.js', 'Frontend', 80, NOW(), NOW()),

-- Backend Technologies
('Node.js', 'Backend', 85, NOW(), NOW()),
('Express.js', 'Backend', 80, NOW(), NOW()),
('PHP', 'Backend', 85, NOW(), NOW()),
('FuelPHP', 'Backend', 75, NOW(), NOW()),
('Laravel', 'Backend', 70, NOW(), NOW()),
('Python', 'Backend', 75, NOW(), NOW()),
('Django', 'Backend', 65, NOW(), NOW()),

-- Databases
('MySQL', 'Database', 85, NOW(), NOW()),
('PostgreSQL', 'Database', 75, NOW(), NOW()),
('MongoDB', 'Database', 80, NOW(), NOW()),
('Redis', 'Database', 70, NOW(), NOW()),
('Firebase', 'Database', 75, NOW(), NOW()),

-- Tools & DevOps
('Git', 'Tools', 90, NOW(), NOW()),
('Docker', 'Tools', 75, NOW(), NOW()),
('AWS', 'Tools', 70, NOW(), NOW()),
('Linux', 'Tools', 80, NOW(), NOW()),
('Webpack', 'Tools', 75, NOW(), NOW()),
('npm/yarn', 'Tools', 85, NOW(), NOW()),

-- Design
('Figma', 'Design', 70, NOW(), NOW()),
('Adobe Photoshop', 'Design', 65, NOW(), NOW()),
('Responsive Design', 'Design', 90, NOW(), NOW()),
('UI/UX Design', 'Design', 75, NOW(), NOW());

-- Insert sample contact messages
INSERT INTO `contacts` (`name`, `email`, `subject`, `message`, `created_at`) VALUES
('John Doe', 'john.doe@example.com', 'Project Collaboration', 'Hi! I came across your portfolio and I\'m impressed with your work. I have a project that I think would be perfect for your skills. Would you be interested in discussing a potential collaboration?', NOW()),
('Jane Smith', 'jane.smith@company.com', 'Job Opportunity', 'Hello, I\'m a recruiter at TechCorp and we have an exciting full-stack developer position that matches your profile perfectly. Would you be open to a conversation about this opportunity?', DATE_SUB(NOW(), INTERVAL 2 DAY)),
('Mike Johnson', 'mike@startup.com', 'Freelance Work', 'We\'re a startup looking for a talented developer to help us build our MVP. Your portfolio shows exactly the kind of skills we need. Can we schedule a call to discuss the details?', DATE_SUB(NOW(), INTERVAL 5 DAY));
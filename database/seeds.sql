-- Additional seed data for development and testing
-- Run this after the main schema.sql

-- Additional sample projects for testing pagination and filtering
INSERT INTO `projects` (`title`, `description`, `long_description`, `technologies`, `image_url`, `demo_url`, `github_url`, `featured`) VALUES
('Restaurant Finder', 'Location-based restaurant discovery app with reviews', 'A mobile-first web application that helps users discover restaurants based on their location. Features include GPS integration, restaurant search and filtering, user reviews and ratings, photo galleries, and reservation booking. Built with React Native Web for cross-platform compatibility.', '["React Native", "Expo", "Firebase", "Google Maps API", "TypeScript"]', 'https://via.placeholder.com/600x400/38b2ac/ffffff?text=Restaurant+Finder', 'https://restaurants.example.com', 'https://github.com/username/restaurant-finder', 0),

('Cryptocurrency Tracker', 'Real-time cryptocurrency price tracking dashboard', 'A comprehensive cryptocurrency tracking application that provides real-time price updates, portfolio management, price alerts, and detailed market analysis. Features interactive charts, news integration, and portfolio performance tracking. Uses WebSocket connections for live price updates.', '["React", "Redux", "WebSocket", "Chart.js", "CoinGecko API"]', 'https://via.placeholder.com/600x400/f6ad55/ffffff?text=Crypto+Tracker', 'https://crypto.example.com', 'https://github.com/username/crypto-tracker', 0),

('Learning Management System', 'Online education platform with course management', 'A comprehensive learning management system designed for online education. Features include course creation and management, video streaming, interactive quizzes, student progress tracking, discussion forums, and certificate generation. Built with scalability in mind to handle thousands of concurrent users.', '["Next.js", "PostgreSQL", "Prisma", "Video.js", "Stripe", "WebRTC"]', 'https://via.placeholder.com/600x400/8b5cf6/ffffff?text=Learning+Management+System', 'https://lms.example.com', 'https://github.com/username/lms', 0),

('Social Media Dashboard', 'Analytics dashboard for social media management', 'A powerful analytics dashboard that aggregates data from multiple social media platforms. Features include post scheduling, engagement analytics, audience insights, competitor analysis, and automated reporting. Integrates with major social platforms including Twitter, Facebook, and Instagram APIs.', '["Angular", "D3.js", "Node.js", "MongoDB", "Social Media APIs"]', 'https://via.placeholder.com/600x400/ec4899/ffffff?text=Social+Media+Dashboard', 'https://social.example.com', 'https://github.com/username/social-dashboard', 0);

-- Additional skills for more comprehensive categories
INSERT INTO `skills` (`name`, `category`, `proficiency`) VALUES
-- Mobile Development
('React Native', 'Mobile', 80),
('Flutter', 'Mobile', 70),
('Expo', 'Mobile', 85),
('iOS Development', 'Mobile', 65),
('Android Development', 'Mobile', 65),

-- Testing
('Jest', 'Testing', 85),
('Cypress', 'Testing', 80),
('PHPUnit', 'Testing', 75),
('Selenium', 'Testing', 70),

-- API & Integration
('REST APIs', 'API', 90),
('GraphQL', 'API', 75),
('WebSocket', 'API', 80),
('OAuth', 'API', 85),
('Stripe API', 'API', 80),

-- Additional Backend
('Ruby on Rails', 'Backend', 65),
('Java Spring', 'Backend', 60),
('.NET Core', 'Backend', 55),

-- Cloud Services
('Firebase', 'Cloud', 85),
('Heroku', 'Cloud', 80),
('Vercel', 'Cloud', 85),
('DigitalOcean', 'Cloud', 75);

-- Sample contact messages for testing
INSERT INTO `contacts` (`name`, `email`, `subject`, `message`) VALUES
('John Doe', 'john.doe@example.com', 'Project Inquiry', 'Hi! I am interested in discussing a potential web development project. Could we schedule a call to discuss the requirements?'),
('Sarah Johnson', 'sarah.j@company.com', 'Collaboration Opportunity', 'We are looking for a skilled developer to join our team on a React project. Would you be interested in a freelance opportunity?'),
('Mike Chen', 'mike.chen@startup.com', 'Portfolio Feedback', 'I came across your portfolio and I am impressed with your work. I would like to discuss a potential full-time opportunity at our startup.'),
('Emma Wilson', 'emma@design.studio', 'Design Partnership', 'Hello! I am a UI/UX designer and I loved your portfolio. Would you be interested in collaborating on some projects together?');

-- Create indexes for better performance (if not already created)
CREATE INDEX IF NOT EXISTS `idx_projects_title` ON `projects` (`title`);
CREATE INDEX IF NOT EXISTS `idx_skills_name` ON `skills` (`name`);
CREATE INDEX IF NOT EXISTS `idx_contacts_name` ON `contacts` (`name`);
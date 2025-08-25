# FuelPHP + React Portfolio

A modern portfolio application built with FuelPHP backend API and React TypeScript frontend, designed to run in a XAMPP environment.

## 🚀 Features

- **Modern Tech Stack**: FuelPHP backend with React TypeScript frontend
- **Responsive Design**: Mobile-first design with modern UI components
- **RESTful API**: Clean API architecture with proper error handling
- **Database Integration**: MySQL database with comprehensive schema
- **XAMPP Ready**: Pre-configured for XAMPP development environment
- **TypeScript**: Full TypeScript support for better development experience
- **Modern Workflows**: Development and production build processes

## 📁 Project Structure

```
fuel-react-portfolio/
├── api/                          # FuelPHP Backend
│   ├── fuel/
│   │   ├── app/
│   │   │   ├── classes/
│   │   │   │   ├── controller/   # API Controllers
│   │   │   │   └── model/        # Database Models
│   │   │   └── config/           # Configuration files
│   │   └── core/                 # FuelPHP Core (to be installed)
│   └── public/                   # Public API entry point
├── frontend/                     # React TypeScript Frontend
│   ├── src/
│   │   ├── components/           # Reusable UI components
│   │   ├── pages/               # Page components
│   │   ├── services/            # API services
│   │   ├── types/               # TypeScript type definitions
│   │   └── utils/               # Utility functions
│   └── public/                  # Public assets
├── database/                    # Database schema and seeds
├── .htaccess                   # Apache rewrite rules
└── xampp-config.md             # XAMPP configuration guide
```

## 🛠️ Installation & Setup

### Prerequisites

- XAMPP (Apache, MySQL, PHP 7.4+)
- Node.js (v16+)
- npm or yarn

### Step 1: Download FuelPHP

```bash
# Download FuelPHP 1.8.x from https://fuelphp.com/downloads
# Extract to api/fuel/core/ directory
```

### Step 2: Install Dependencies

```bash
# Install project dependencies
npm run install:all
```

### Step 3: Database Setup

1. Start XAMPP (Apache + MySQL)
2. Open phpMyAdmin (http://localhost/phpmyadmin)
3. Create database `portfolio_db`
4. Import `database/schema.sql`
5. Import `database/seeds.sql` (optional sample data)

### Step 4: Configuration

1. Update database credentials in `api/fuel/app/config/db.php`
2. Follow XAMPP configuration in `xampp-config.md`
3. Ensure mod_rewrite is enabled in Apache

### Step 5: Build & Run

```bash
# Development mode
npm run dev

# Build for production
npm run build
```

## 🌐 API Endpoints

- `GET /api/portfolio` - Get portfolio information
- `GET /api/projects` - Get all projects
- `GET /api/projects/{id}` - Get specific project
- `GET /api/skills` - Get skills data
- `POST /api/contact` - Submit contact form

## 🎨 Frontend Features

- **Home Page**: Hero section, featured projects, skills showcase
- **Projects Page**: Filterable project gallery with detailed views
- **Contact Page**: Contact form with validation
- **Responsive Navigation**: Mobile-friendly header with hamburger menu
- **Modern UI**: Clean, professional design with smooth animations

## 🔧 Development Workflow

### Available Scripts

```bash
npm run dev          # Start development servers
npm run build        # Build for production
npm run test         # Run frontend tests
npm run setup        # Complete setup process
```

### Frontend Development

```bash
cd frontend
npm start            # Start React development server
npm run build        # Build for production
npm test             # Run tests
```

## 📱 Responsive Design

The application is fully responsive and optimized for:
- Desktop (1200px+)
- Tablet (768px - 1199px)
- Mobile (< 768px)

## 🎯 Customization

### Updating Portfolio Content

1. **Projects**: Add/edit projects in the database `projects` table
2. **Skills**: Modify skills in the database `skills` table
3. **Personal Info**: Update portfolio data in `api/fuel/app/classes/controller/portfolio.php`
4. **Styling**: Customize CSS in the respective component CSS files

### Adding New Features

1. **Backend**: Add controllers in `api/fuel/app/classes/controller/`
2. **Frontend**: Add components in `frontend/src/components/`
3. **Database**: Update schema in `database/schema.sql`

## 🚀 Deployment

### Production Build

```bash
npm run build
```

### Deployment Options

1. **Shared Hosting**: Upload to your hosting provider's public_html
2. **VPS**: Configure Apache virtual host
3. **Cloud**: Deploy on platforms like Heroku, DigitalOcean

## 🛡️ Security Considerations

- CORS headers properly configured
- SQL injection protection via FuelPHP ORM
- Input validation on all forms
- XSS protection enabled
- Environment-based configuration

## 🐛 Troubleshooting

### Common Issues

1. **404 API Errors**
   - Check Apache mod_rewrite is enabled
   - Verify .htaccess files are present

2. **Database Connection**
   - Verify MySQL is running
   - Check credentials in config/db.php

3. **CORS Issues**
   - Ensure API controllers include CORS headers

See `xampp-config.md` for detailed troubleshooting guide.

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Test thoroughly
5. Submit a pull request

## 📄 License

This project is licensed under the MIT License. See LICENSE file for details.

## 👨‍💻 Author

**Your Name**
- GitHub: [@yourusername](https://github.com/yourusername)
- LinkedIn: [Your Name](https://linkedin.com/in/yourname)
- Email: your.email@example.com

---

Built with ❤️ using FuelPHP, React, and TypeScript
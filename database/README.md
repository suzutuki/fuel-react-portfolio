# Database Setup Instructions

This directory contains the MySQL database schema and setup files for the Portfolio project.

## Files

- `portfolio_schema.sql` - Database schema with table definitions
- `sample_data.sql` - Sample data to populate the database
- `setup.sql` - Complete setup script (runs both schema and sample data)

## Setup Instructions

### Option 1: Using phpMyAdmin (Recommended for XAMPP)

1. Start XAMPP and ensure MySQL is running
2. Open phpMyAdmin (usually at http://localhost/phpmyadmin)
3. Click on "Import" tab
4. Choose file: `database/setup.sql`
5. Click "Go" to execute

### Option 2: Using MySQL Command Line

1. Open terminal/command prompt
2. Navigate to the project directory
3. Run the following command:
```bash
mysql -u root -p < database/setup.sql
```

### Option 3: Step by Step

1. Create the database and tables:
```bash
mysql -u root -p < database/portfolio_schema.sql
```

2. Insert sample data:
```bash
mysql -u root -p < database/sample_data.sql
```

## Database Configuration

The database configuration is located in:
- `api/fuel/app/config/db.php`

Default settings:
- Database: `portfolio_db`
- Host: `localhost`
- Username: `root`
- Password: (empty)

## Tables Created

### projects
- Stores portfolio project information
- Fields: id, title, description, long_description, technologies, image_url, images, demo_url, github_url, featured, created_at, updated_at

### skills
- Stores technical skills and proficiency levels
- Fields: id, name, category, proficiency, created_at, updated_at

### contacts
- Stores contact form submissions
- Fields: id, name, email, subject, message, created_at

## Sample Data Included

The setup includes sample data for:
- 5 sample projects (3 featured)
- 25+ technical skills across different categories
- 3 sample contact messages

## Verification

After setup, you can verify the installation by:
1. Checking that `portfolio_db` database exists
2. Confirming all 3 tables are created
3. Verifying sample data is inserted

You can test the API endpoints:
- GET `/api/projects` - Should return sample projects
- GET `/api/skills` - Should return sample skills
- POST `/api/contact` - Should accept contact form submissions
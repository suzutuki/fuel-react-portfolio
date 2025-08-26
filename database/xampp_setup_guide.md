# XAMPP Database Setup Guide

## Prerequisites

1. **Start XAMPP Services**
   - Open XAMPP Control Panel
   - Start Apache service
   - Start MySQL service 
   - Ensure both services show "Running" status

## Database Setup Options

### Option 1: Using phpMyAdmin (Recommended)

1. Open your browser and go to: `http://localhost/phpmyadmin`
2. Click "Import" tab
3. Choose file: `database/setup.sql` from this project
4. Click "Go" to execute

### Option 2: Using MySQL Command Line

1. Open command prompt as Administrator
2. Navigate to XAMPP MySQL directory:
   ```cmd
   cd C:\xampp\mysql\bin
   ```
3. Connect to MySQL:
   ```cmd
   mysql.exe -u root -p
   ```
4. When prompted for password, just press Enter (default is no password)
5. Create database manually:
   ```sql
   SOURCE C:\xampp\htdocs\fuel-react-portfolio\database\setup.sql
   ```

### Option 3: Manual Database Creation via phpMyAdmin

If the import fails, create manually:

1. Go to `http://localhost/phpmyadmin`
2. Click "New" to create database
3. Database name: `portfolio_db`
4. Collation: `utf8mb4_unicode_ci`
5. Click "Create"
6. Click on the new database
7. Click "SQL" tab
8. Copy and paste the contents of `database/portfolio_schema.sql`
9. Click "Go"
10. Repeat for `database/sample_data.sql`

## Verification

After setup, verify by visiting: `http://localhost/fuel-react-portfolio/api/fuel/public/dbtest`

You should see JSON response with:
- `"connection": "SUCCESS"`
- `"database_exists": true`
- `"tables": ["projects", "skills", "contacts"]`
- Record counts for each table

## Troubleshooting

### MySQL Won't Start
- Check if port 3306 is already in use
- Stop any other MySQL services
- Restart XAMPP as Administrator

### Connection Timeout
- Verify MySQL service is running in XAMPP Control Panel
- Check Windows Firewall isn't blocking port 3306
- Try restarting XAMPP services

### Database Not Found
- Ensure database was created successfully
- Check database name is exactly `portfolio_db`
- Verify user `root` has access (default XAMPP setup)

### Permission Errors
- Run XAMPP Control Panel as Administrator
- Check file permissions on XAMPP directory
- Ensure antivirus isn't blocking XAMPP

## FuelPHP Configuration

The database configuration is in:
`api/fuel/app/config/db.php`

Default settings for XAMPP:
- Host: `localhost`
- Port: `3306`
- Database: `portfolio_db`
- Username: `root`
- Password: (empty)
- Charset: `utf8mb4`

## API Endpoints

After successful setup, these endpoints should work:

- `GET /api/projects` - List all projects
- `GET /api/projects/{id}` - Get specific project
- `GET /api/skills` - List all skills  
- `POST /api/contact` - Submit contact form
- `GET /dbtest` - Database connection test
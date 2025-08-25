# XAMPP Configuration Guide

## Apache Configuration

### 1. Enable mod_rewrite
Ensure mod_rewrite is enabled in your Apache configuration:
- Open XAMPP Control Panel
- Click "Config" next to Apache
- Select "PHP (php.ini)"
- Uncomment the line: `LoadModule rewrite_module modules/mod_rewrite.so`

### 2. Virtual Host Setup (Optional but Recommended)

Add this to your `httpd-vhosts.conf` file:

```apache
<VirtualHost *:80>
    ServerName portfolio.local
    DocumentRoot "C:/xampp/htdocs/fuel-react-portfolio"
    
    <Directory "C:/xampp/htdocs/fuel-react-portfolio">
        AllowOverride All
        Require all granted
    </Directory>
    
    # API routing
    Alias /api "C:/xampp/htdocs/fuel-react-portfolio/api/public"
    <Directory "C:/xampp/htdocs/fuel-react-portfolio/api/public">
        AllowOverride All
        Require all granted
    </Directory>
    
    # Frontend routing
    Alias /frontend "C:/xampp/htdocs/fuel-react-portfolio/frontend/build"
    <Directory "C:/xampp/htdocs/fuel-react-portfolio/frontend/build">
        AllowOverride All
        Require all granted
        
        # Handle React Router
        RewriteEngine On
        RewriteCond %{REQUEST_FILENAME} !-f
        RewriteCond %{REQUEST_FILENAME} !-d
        RewriteRule . /index.html [L]
    </Directory>
</VirtualHost>
```

### 3. Add to hosts file
Add this line to your `C:\Windows\System32\drivers\etc\hosts` file:
```
127.0.0.1    portfolio.local
```

## PHP Configuration

### 1. Enable required extensions
In `php.ini`, ensure these extensions are enabled:
```ini
extension=pdo_mysql
extension=mysqli
extension=openssl
extension=curl
extension=json
```

### 2. Set memory and execution limits
```ini
memory_limit = 512M
max_execution_time = 300
upload_max_filesize = 10M
post_max_size = 10M
```

## MySQL Configuration

### 1. Database Setup
- Open phpMyAdmin (http://localhost/phpmyadmin)
- Create a new database named `portfolio_db`
- Import the SQL schema from `database/schema.sql`

### 2. User Setup (Optional)
Create a dedicated database user:
```sql
CREATE USER 'portfolio_user'@'localhost' IDENTIFIED BY 'secure_password';
GRANT ALL PRIVILEGES ON portfolio_db.* TO 'portfolio_user'@'localhost';
FLUSH PRIVILEGES;
```

## URL Structure

After configuration, your application will be accessible at:
- Frontend: http://portfolio.local/frontend (or http://localhost/fuel-react-portfolio/frontend/build)
- API: http://portfolio.local/api (or http://localhost/fuel-react-portfolio/api/public)
- Admin Panel: http://portfolio.local/api/admin (if implemented)

## Troubleshooting

### Common Issues:

1. **404 Errors on API calls**
   - Check if mod_rewrite is enabled
   - Verify .htaccess files are present and readable

2. **Database Connection Errors**
   - Verify MySQL is running in XAMPP
   - Check database credentials in `api/fuel/app/config/db.php`

3. **CORS Issues**
   - Ensure CORS headers are set in the API controllers
   - Check browser developer tools for specific errors

4. **React Build Issues**
   - Run `npm run build` in the frontend directory
   - Ensure build files are served correctly by Apache
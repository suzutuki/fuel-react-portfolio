-- Database Setup Script
-- Run this script to set up the complete portfolio database

-- Include schema
SOURCE portfolio_schema.sql;

-- Include sample data
SOURCE sample_data.sql;

-- Show completion message
SELECT 'Database setup completed successfully!' as message;
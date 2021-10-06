# create databases
CREATE DATABASE IF NOT EXISTS `test_performance_test`;

# create test user and grant rights
CREATE USER 'test'@'localhost' IDENTIFIED BY 'test';
GRANT ALL PRIVILEGES ON *.* TO 'test'@'%';
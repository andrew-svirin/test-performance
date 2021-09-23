# create databases
CREATE DATABASE IF NOT EXISTS `test_performance`;
CREATE DATABASE IF NOT EXISTS `test_performance_test`;
CREATE DATABASE IF NOT EXISTS `test_performance_test_clone_1`;

# create test user and grant rights
CREATE USER 'test'@'localhost' IDENTIFIED BY 'test';
GRANT ALL PRIVILEGES ON *.* TO 'test'@'%';
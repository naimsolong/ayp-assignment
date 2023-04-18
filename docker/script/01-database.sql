-- create databases
CREATE DATABASE IF NOT EXISTS `ayp`;
CREATE DATABASE IF NOT EXISTS `ayp_test`;

-- create root user and grant rights
CREATE USER 'dbuser'@'%' IDENTIFIED BY 'dbpassword';
GRANT ALL ON *.* TO 'dbuser'@'%';
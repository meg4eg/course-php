CREATE DATABASE my_deal
DEFAULT CHARACTER SET utf8
DEFAULT COLLATE utf8_general_ci;
USE my_deal;
CREATE TABLE projects (
project_id INT AUTO_INCREMENT PRIMARY KEY,
project_name VARCHAR(50) NOT NULL,
user_id INT
);
CREATE TABLE users (
id INT AUTO_INCREMENT PRIMARY KEY,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
email VARCHAR(128) NOT NULL UNIQUE,
name VARCHAR(128) NOT NULL,
password VARCHAR(50) NOT NULL
);
CREATE TABLE tasks (
task_id INT AUTO_INCREMENT PRIMARY KEY,
data TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
done ENUM('1','0') NOT NULL DEFAULT '0', 
task_name VARCHAR(128) NOT NULL,
file VARCHAR(255) DEFAULT NULL,
done_time DATE,
user_id INT,
project_id INT
)
CREATE USER 'admin'@'localhost' IDENTIFIED BY '12345678';
GRANT ALL PRIVILEGES ON * . * TO 'admin'@'localhost';

CREATE DATABASE `php_course`;
use `php_course`;
CREATE TABLE `students` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstName` varchar(45) DEFAULT NULL,
  `lastName` varchar(465) DEFAULT NULL,
  `track` varchar(45) DEFAULT NULL,
  `gender` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`)
) 

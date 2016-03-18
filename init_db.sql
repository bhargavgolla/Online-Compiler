CREATE DATABASE test;
USE test;

CREATE TABLE users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password CHAR(32) NOT NULL
);

INSERT INTO users (username, password) VALUES('user', MD5('user'));

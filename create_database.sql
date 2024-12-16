CREATE DATABASE travel_db;
CREATE USER 'root'@'localhost' IDENTIFIED BY '123456';
GRANT ALL PRIVILEGES ON travel_db.* TO 'root'@'localhost';
FLUSH PRIVILEGES;
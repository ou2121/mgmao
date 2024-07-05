CREATE DATABASE IF NOT EXISTS gestion_bus;

USE gestion_bus;

CREATE TABLE IF NOT EXISTS buses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    marque VARCHAR(50) NOT NULL,
    numero_parc VARCHAR(20) NOT NULL,
    numero_immatriculation VARCHAR(20) NOT NULL,
    numero_chassis VARCHAR(50) NOT NULL,
    kilometrage INT NOT NULL,
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    date_modification TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Insérer quelques données d'exemple
INSERT INTO buses (marque, numero_parc, numero_immatriculation, numero_chassis, kilometrage) VALUES
('Mercedes', 'BP001', 'AB-123-CD', 'MBZN1234567890', 50000),
('Volvo', 'BP002', 'EF-456-GH', 'VLVO9876543210', 75000);

-- إنشاء قاعدة البيانات
CREATE DATABASE bus_management_system;
USE bus_management_system;

-- جدول المستخدمين
CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    user_type ENUM('chef', 'admin', 'ingenieur') NOT NULL
);

CREATE TABLE `gestion_bus`. (`numbus` INT NOT NULL , `dateheure` DATETIME NOT NULL , `demandeur` VARCHAR NOT NULL , `description` TEXT NOT NULL ) ENGINE = InnoDB; 

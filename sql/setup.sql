-- Crear la base de datos
CREATE DATABASE IF NOT EXISTS url_shortener_db;
USE url_shortener_db;

-- Crear la tabla para almacenar las URLs
CREATE TABLE IF NOT EXISTS urls (
    id INT AUTO_INCREMENT PRIMARY KEY,
    long_url TEXT NOT NULL,
    short_code VARCHAR(10) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

#Script de creacion de Base de Datos y Tabla
DROP DATABASE IF EXISTS bdfetch;

CREATE DATABASE bdfetch;

USE bdfetch;

CREATE TABLE IF NOT EXISTS bdfetch.url(
    IdURL INT NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria',
    URL VARCHAR(200),
    Comentario TEXT,
    Fecha DATETIME,
    PRIMARY KEY (IdURL)
);

SELECT * FROM bdfetch.url;

USE mysql;

CREATE USER 'prueba'@'localhost' IDENTIFIED BY 'M3gaman121212$';

GRANT ALL PRIVILEGES ON bdfetch.* TO 'prueba'@'localhost';

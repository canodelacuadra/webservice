-- Active: 1631262383358@@127.0.0.1@3306

CREATE DATABASE
    recursos_multimedia DEFAULT CHARACTER SET = 'utf8mb4';

use recursos_multimedia;

CREATE TABLE
    recursos_multimedia (
        id INT NOT NULL AUTO_INCREMENT,
        nombre VARCHAR(255) NOT NULL,
        tipo VARCHAR(255) NOT NULL,
        ruta VARCHAR(255) NOT NULL,
        PRIMARY KEY (id)
    );

INSERT INTO
    recursos_multimedia (nombre, tipo, ruta)
VALUES (
        'Imagen de prueba',
        'imagen',
        '/ruta/a/la/imagen/de/prueba.jpg'
    );

INSERT INTO
    recursos_multimedia (nombre, tipo, ruta)
VALUES (
        'video de prueba',
        'imagen',
        '/ruta/a/el/video/de/prueba.jpg'
    );

SELECT * FROM recursos_multimedia;
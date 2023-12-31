DROP DATABASE IF EXISTS recursos_multimedia;

CREATE DATABASE recursos_multimedia;

USE recursos_multimedia;

CREATE TABLE
    recursos_multimedia (
        id INT NOT NULL AUTO_INCREMENT,
        nombre VARCHAR(255) NOT NULL,
        tipo VARCHAR(255) NOT NULL,
        ruta VARCHAR(255) NOT NULL,
        date TIMESTAMP,
        PRIMARY KEY (id)
    );

CREATE TABLE
    usuarios (
        id INT NOT NULL AUTO_INCREMENT,
        nombre_usuario VARCHAR(255) NOT NULL,
        contraseña VARCHAR(255) NOT NULL,
        rol VARCHAR(255) NOT NULL,
        date TIMESTAMP,
        PRIMARY KEY (id)
    );

INSERT INTO
    recursos_multimedia (nombre, tipo, ruta)
VALUES (
        'Imagen de prueba',
        'imagen',
        '/ruta/a/la/imagen/de/prueba.jpg'
    ),  (
    'Vídeo de prueba',
    'video',
    '/ruta/a/el/video/de/prueba.jpg'
),
    (
        'Audio de prueba',
        'audio',
        '/ruta/a/el/audio/de/prueba.jpg'
    );

INSERT INTO
    usuarios (
        nombre_usuario,
        contraseña,
        rol
    )
VALUES (
        'usuario1',
        'd3b073411116d881f520b2b5a5c74982b8a94140091ba86a3d9100d0b0b29873',
        'usuario'
    ), (
        'usuario2',
        'f42f85812218687182027959112307063208688574817583944640799218206',
        'administrador'
    ), (
        'usuario3',
        '9a234160963343686199641808408380348987368833600899702901778428',
        'invitado'
    );
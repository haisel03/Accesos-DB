CREATE DATABASE accesos_db;

USE accesos_db;

-- --------------------------------------------------------
CREATE TABLE accesos_db.usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    correo VARCHAR(100) NOT NULL UNIQUE,
    telefono VARCHAR(15),
    creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE DATABASE admin_tareas;

use admin_tareas;

CREATE TABLE tarea(
  id INT(11) PRIMARY KEY AUTO_INCREMENT,
  titulo VARCHAR(255) NOT NULL,
  descripcion TEXT,
  fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

DESCRIBE tarea;
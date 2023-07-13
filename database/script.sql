create database inventario;
use inventario;



CREATE TABLE autos (
  id INT(11) PRIMARY KEY AUTO_INCREMENT,
  marca VARCHAR(30) NOT NULL,
  precio FLOAT,
  kilometraje DOUBLE,
  color VARCHAR(25) NOT NULL
);

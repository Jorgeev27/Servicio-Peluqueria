DROP DATABASE IF EXISTS serviciopeluqueria;
CREATE DATABASE serviciopeluqueria DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;

CREATE TABLE empleados(
    id_empleado INT(20) NOT NULL,
    nombre_empleado VARCHAR(255) NOT NULL,
    nombreusuario_empleado VARCHAR(255) NOT NULL,
    apellido1 VARCHAR(255) NOT NULL,
    apellido2 VARCHAR(255) NOT NULL,
    DNI VARCHAR(15) NOT NULL,
    correoelectronico_empleado VARCHAR(255) NOT NULL,
    PRIMARY KEY (id_empleado)
) ENGINE=InnoDB;

CREATE TABLE clientes(
    id_cliente INT(20) NOT NULL AUTO_INCREMENT,
    nombre_cliente VARCHAR(255) NOT NULL,
    nombreusuario_cliente VARCHAR (255) NOT NULL,
    apellido1 VARCHAR(255) NOT NULL,
    apellido2 VARCHAR(255) NOT NULL,
    DNI VARCHAR(15) NOT NULL,
    correoelectronico_cliente VARCHAR (255) NOT NULL,
    telefono_movil VARCHAR(13) NULL,
    PRIMARY KEY (id_cliente)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS usuarios(
    usuario VARCHAR(20) NOT NULL,
    contrasena VARCHAR(255) NOT NULL,
    PRIMARY KEY (usuario)
) ENGINE=InnoDB;

CREATE TABLE cortepelo(
    id_cortepelo INT(20) NOT NULL AUTO_INCREMENT,
    nombre_cortepelo VARCHAR(255) NOT NULL,
    precio_cortepelo DECIMAL(10,2) NOT NULL,
    id_tipocorte INT(20) NOT NULL AUTO_INCREMENT,
    nombre_tipocorte VARCHAR(255) NOT NULL,
    PRIMARY KEY (id_cortepelo),
    FOREIGN KEY (id_tipocorte) REFERENCES tipocorte(id_tipocorte) ON UPDATE CASCADE,
    UNIQUE(nombre_cortepelo)
) ENGINE=InnoDB;

CREATE TABLE tipocorte(
    id_tipocorte INT(20) NOT NULL AUTO_INCREMENT,
    nombre_tipocorte VARCHAR(255) NOT NULL,
    id_cortepelo INT(20) NOT NULL AUTO_INCREMENT,
    nombre_cortepelo VARCHAR(255) NOT NULL,
    PRIMARY KEY (id_tipocorte),
    FOREIGN KEY (id_cortepelo) REFERENCES cortepelo(id_cortepelo) ON UPDATE CASCADE,
    UNIQUE(nombre_tipocorte)
) ENGINE=InnoDB;

CREATE TABLE citacorte(
    fecha VARCHAR(20) NOT NULL,
    hora VARCHAR(20) NOT NULL,
    id_cliente INT(20) NOT NULL AUTO_INCREMENT,
    nombre_cliente VARCHAR(255) NOT NULL,
    id_cortepelo INT(20) NOT NULL AUTO_INCREMENT,
    nombre_cortepelo VARCHAR(255) NOT NULL,
    precio_cortepelo DECIMAL(10,2) NOT NULL,
    id_tipocorte INT(20) NOT NULL AUTO_INCREMENT,
    nombre_tipocorte VARCHAR(255) NOT NULL,
    PRIMARY KEY (fecha),
    FOREIGN KEY(id_cliente) REFERENCES clientes(id_cliente) ON UPDATE CASCADE,
    FOREIGN KEY(id_cortepelo) REFERENCES cortepelo(id_cortepelo) ON UPDATE CASCADE,
    FOREIGN KEY(id_tipocorte) REFERENCES tipocorte(id_tipocorte) ON UPDATE CASCADE
) ENGINE=InnoDB;
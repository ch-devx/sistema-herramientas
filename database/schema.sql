CREATE DATABASE IF NOT EXISTS sistema_herramientas
CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE sistema_herramientas;

CREATE TABLE usuarios (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    usuario VARCHAR(50) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    creado_en DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE categorias (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL UNIQUE
);

CREATE TABLE trabajadores (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    cedula VARCHAR(20) NOT NULL UNIQUE,
    cargo VARCHAR(80),
    activo TINYINT(1) DEFAULT 1
);

CREATE TABLE herramientas (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    codigo VARCHAR(50) NOT NULL UNIQUE,
    categoria_id INT,
    estado ENUM('disponible','prestada','mantenimiento') DEFAULT 'disponible',
    observaciones TEXT,
    registrado_en DATETIME DEFAULT CURRENT_TIMESTAMP,
    activo TINYINT(1) DEFAULT 1,
    FOREIGN KEY (categoria_id) REFERENCES categorias(id)
);

CREATE TABLE prestamos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    herramienta_id INT NOT NULL,
    trabajador_id INT NOT NULL,
    fecha_prestamo DATETIME DEFAULT CURRENT_TIMESTAMP,
    fecha_devolucion DATETIME,
    estado_devolucion VARCHAR(100),
    observaciones_devolucion TEXT,
    cerrado TINYINT(1) DEFAULT 0,
    FOREIGN KEY (herramienta_id) REFERENCES herramientas(id),
    FOREIGN KEY (trabajador_id) REFERENCES trabajadores(id)
);

INSERT INTO usuarios (nombre, usuario, password_hash) VALUES (
    'Administrador',
    'admin',
    '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'
);
CREATE DATABASE booksmydb;
USE booksmydb;

CREATE TABLE usuarios (
	id_usuario INT UNSIGNED NOT NULL AUTO_INCREMENT, 
	nombre	VARCHAR(120) NOT NULL,
	password VARCHAR(120) NOT NULL,
	PRIMARY KEY(id_usuario)
) engine = InnoDB;

CREATE TABLE libros (
	id_libro INT UNSIGNED NOT NULL AUTO_INCREMENT, 
	nombre	VARCHAR(120) NOT NULL,
	autor VARCHAR(120) NOT NULL,
	saga VARCHAR(120),
	paginas INT,
	leido VARCHAR(5) NOT NULL,
	id_usuario INT UNSIGNED NOT NULL,
	PRIMARY KEY (id_libro),
	FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario)
) engine = InnoDB;

CREATE TABLE lecturas (
	id_lectura INT UNSIGNED NOT NULL AUTO_INCREMENT, 
	id_libro INT UNSIGNED NOT NULL,
	id_usuario INT UNSIGNED NOT NULL,
	inicio DATE NOT NULL,
	fin DATE,
	PRIMARY KEY (id_lectura),
	FOREIGN KEY (id_libro) REFERENCES libros(id_libro),
	FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario)
) engine = InnoDB;

INSERT INTO usuarios (nombre, password) 
VALUES ('Admin', '21232f297a57a5a743894a0e4a801fc3');

INSERT INTO libros (nombre, autor, saga, paginas, leido, id_usuario)
VALUES ('Harry Potter y La Piedra Filosofal', 'J.K. Rowling', 'Harry Potter', '256', 'Yes', '1');

INSERT INTO libros (nombre, autor, saga, paginas, leido, id_usuario)
VALUES ('Juego de Tronos', 'George R.R. Martin', 'Canción de Hielo y Fuego', '800', 'No', '1');
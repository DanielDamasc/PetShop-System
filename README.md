--  SQL para testar o projeto --

CREATE DATABASE pet;
USE pet;

CREATE TABLE user (
id int(2) AUTO_INCREMENT primary key,
email varchar(100) NOT NULL,
senha char(60) NOT NULL
);

-- email: ex@gmail.com --
-- senha: 123 --

INSERT INTO user (email, senha) VALUES ("ex@gmail.com", "$2y$10$iKfYCjPYXYDERVH.JVdJF.XDzFfGZTdE9S9cWi61YPzlhOro/ZF5y");

CREATE TABLE servico (
id int(2) AUTO_INCREMENT primary key,
clienteNome varchar(50) NOT NULL,
clienteEmail varchar(100) NOT NULL,
clienteTelefone varchar(11) NOT NULL,
animalTipo varchar(6) NOT NULL,
animalNome varchar(50) NOT NULL,
animalRaca varchar(50) NOT NULL,
servicoTipo varchar(5) NOT NULL,
valor decimal(5,2) NOT NULL
);

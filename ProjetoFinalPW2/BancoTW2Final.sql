CREATE DATABASE esperanca_verde;
USE esperanca_verde;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    email VARCHAR(50) UNIQUE NOT NULL,
    senha VARCHAR(50) NOT NULL,
    tipo ENUM('admin', 'voluntario', 'doador') NOT NULL
);

CREATE TABLE categorias_projetos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL
);

CREATE TABLE projetos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    descricao TEXT,
    categoria_id INT,
    FOREIGN KEY (categoria_id) REFERENCES categorias_projetos(id)
);


INSERT INTO usuarios (nome, email, senha, tipo) VALUES
('Admin 1', 'admin1@esperancaverde.org', 'senha1', 'admin'),
('Admin 2', 'admin2@esperancaverde.org', 'senha2', 'admin');

INSERT INTO projetos (nome, descricao, categoria_id) VALUES
('Projeto Reflorestar', 'Descrição do projeto Reflorestar', 1),
('Educando para o Futuro', 'Descrição do projeto Educando', 2),
('Comunidade Verde', 'Descrição do projeto Comunidade', 3);



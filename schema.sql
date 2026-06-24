CREATE DATABASE Techforge;
USE Techforge;

CREATE TABLE Categoria (
    id_categoria INT PRIMARY KEY AUTO_INCREMENT,
    nome_categoria VARCHAR(50) NOT NULL
);

CREATE TABLE Produto (
    id_produto INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(200) NOT NULL,
    qtdInicial INT NOT NULL,
    valorUnt DECIMAL(10,2) NOT NULL,
    id_categoria INT,
    FOREIGN KEY (id_categoria) REFERENCES Categoria(id_categoria)
);

INSERT INTO Categoria(nome_categoria) VALUES
('Processadores'),
('Placas de Vídeo'),
('Placas-Mãe'),
('Memórias RAM'),
('SSDs'),
('HDs'),
('Fontes de Alimentação'),
('Gabinetes'),
('Coolers'),
('Water Coolers'),
('Monitores'),
('Teclados'),
('Mouses'),
('Headsets'),
('Caixas de Som'),
('Webcams'),
('Impressoras'),
('No-Breaks'),
('Adaptadores'),
('Cabos');


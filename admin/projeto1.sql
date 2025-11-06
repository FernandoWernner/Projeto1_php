-- projeto1.sql
DROP DATABASE IF EXISTS projeto1;
CREATE DATABASE projeto1 CHARACTER SET utf8 COLLATE utf8_general_ci;
USE projeto1;

-- Tabela clientes (COM CAMPOS COMPLETOS)
CREATE TABLE clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(150) NOT NULL,
    email VARCHAR(100),
    telefone VARCHAR(20),
    endereco TEXT,
    cidade VARCHAR(100),
    estado CHAR(2),
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO clientes (nome, email, telefone, endereco, cidade, estado) VALUES
('João Silva', 'joao@email.com', '(11) 9999-8888', 'Rua A, 123 - Centro', 'São Paulo', 'SP'),
('Maria Souza', 'maria@email.com', '(41) 7777-6666', 'Av. B, 456 - Jardim', 'Curitiba', 'PR'),
('Carlos Lima', 'carlos@email.com', '(71) 5555-4444', 'Praça C, 789 - Centro', 'Salvador', 'BA');

-- Tabela produtos (COM CAMPOS CORRETOS)
CREATE TABLE produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(150) NOT NULL,
    descricao TEXT,
    preco DECIMAL(10,2) NOT NULL DEFAULT 0.00,
    estoque INT NOT NULL DEFAULT 0,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO produtos (nome, descricao, preco, estoque) VALUES
('Camiseta básica', 'Camiseta 100% algodão, cor branca', 39.90, 20),
('Caneca personalizada', 'Caneca de cerâmica 350ml', 24.50, 50),
('Caderno 100 folhas', 'Caderno espiral, miolo pautado', 12.00, 100);
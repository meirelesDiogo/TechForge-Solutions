# 🖥️ TechForge - Sistema de Gestão de Ativos de Hardware

![Status](https://img.shields.io/badge/status-concluído-success)
![HTML](https://img.shields.io/badge/HTML-5-orange)
![CSS](https://img.shields.io/badge/CSS-3-blue)
![JavaScript](https://img.shields.io/badge/JavaScript-ES6-yellow)
![PHP](https://img.shields.io/badge/PHP-8-purple)
![MySQL](https://img.shields.io/badge/MySQL-Database-blue)

## 📌 Sobre o Projeto

O **TechForge** é um Sistema de Gestão de Ativos de Hardware (SGAH) desenvolvido para auxiliar no controle de estoque de componentes de informática.

A aplicação permite cadastrar, visualizar, editar, excluir e movimentar produtos, substituindo controles manuais por um sistema integrado com banco de dados.

O projeto foi desenvolvido utilizando **HTML, CSS, JavaScript, PHP e MySQL**.

---

## 🚀 Funcionalidades

### 📊 Dashboard
- Exibição de indicadores do estoque.
- Quantidade total de itens cadastrados.
- Identificação de produtos com estoque baixo.

### 📋 Gerenciamento de Produtos
- Cadastro de novos componentes.
- Listagem dos produtos cadastrados.
- Pesquisa por nome ou categoria.
- Edição de informações.
- Exclusão de produtos.

### 📦 Controle de Estoque
- Registro de entrada de produtos.
- Registro de saída de produtos.
- Validação para evitar estoque negativo.
- Atualização automática da quantidade disponível.

---

## 🛠️ Tecnologias Utilizadas

### Front-end
- **HTML5** → Estrutura das páginas.
- **CSS3** → Estilização e responsividade.
- **JavaScript** → Interações e validações da interface.

### Back-end
- **PHP** → Comunicação com o servidor e regras do sistema.

### Banco de Dados
- **MySQL** → Armazenamento e gerenciamento dos dados.

---
## 🗄️ Banco de Dados

O projeto utiliza o banco de dados **TechForge** em MySQL.

O arquivo `schema.sql` contém:

- Criação do banco de dados
- Criação das tabelas:
  - Categoria
  - Produto
- Inserção das categorias iniciais
- Relacionamento entre produtos e categorias

Modelo do relacionamento:


Categoria (1) ---- (N) Produto
Cada produto pertence a uma categoria através de chave estrangeira.

---
## 📂 Estrutura do Projeto


TechForge/
│
├── index.php # Página principal / Dashboard
├── cadastro.php # Cadastro de produtos
├── editar.php # Edição de produtos
├── estoque.php # Movimentação de estoque
├── data.php # Listagem e dados dos produtos
├── excluir.php # Exclusão de produtos
├── conexao.php # Conexão com banco MySQL
├── conclusao.php # Finalização do fluxo do sistema
│
├── schema.sql # Script de criação do banco de dados
│
└── README.md

---

## ⚙️ Como executar o projeto

### 1. Clone o repositório

```bash
git clone https://github.com/seuusuario/TechForge.git
2. Configure o banco de dados

Abra o MySQL e execute o arquivo:

database/techforge.sql

Ele irá criar:

Banco TechForge
Tabela Categoria
Tabela Produto
Categorias iniciais
3. Configure a conexão

Edite o arquivo:

config/conexao.php

Exemplo:

$host = "localhost";
$user = "root";
$senha = "";
$db = "TechForge";
4. Inicie o servidor

Com XAMPP/WAMP:

Coloque o projeto dentro:

htdocs

Acesse:

localhost/TechForge
🎯 Objetivo

Criar uma solução simples e eficiente para gerenciamento de componentes de hardware, permitindo maior organização, controle de estoque e facilidade na manutenção dos dados.

👨‍💻 Desenvolvedor

Diogo Alexandre

Desenvolvedor Full Stack em formação 🚀

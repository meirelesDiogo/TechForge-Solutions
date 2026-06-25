Aqui tem o conteúdo completo do README.md atualizado e formatado para que possa copiar facilmente para o seu projeto:

Markdown
# 🖥️ TechForge - Sistema de Gestão de Ativos de Hardware

![Status](https://img.shields.io/badge/status-conclu%C3%ADdo-brightgreen)
![HTML](https://img.shields.io/badge/HTML-5-orange)
![CSS](https://img.shields.io/badge/CSS-3-blue)
![JavaScript](https://img.shields.io/badge/JavaScript-ES6-yellow)
![PHP](https://img.shields.io/badge/PHP-8-purple)
![MySQL](https://img.shields.io/badge/MySQL-Database-blue)

## 📌 Sobre o Projeto

O **TechForge** é um Sistema de Gestão de Ativos de Hardware (SGAH) desenvolvido para auxiliar no controle de estoque de componentes de informática.

A aplicação permite cadastrar, visualizar, editar, excluir e movimentar produtos, substituindo controlos manuais por um sistema integrado com base de dados.

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
- **JavaScript** → Interações e validações da interface (`script.js` / `style.css`).

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
`Categoria (1) ---- (N) Produto`
Cada produto pertence a uma categoria através de chave estrangeira.

---

## 📂 Estrutura do Projeto

Abaixo está a estrutura atualizada dos arquivos do projeto conforme organizados no diretório raiz:

TechForge/
│
├── cadastro.php       # Página de cadastro de novos componentes de hardware
├── conclusao.php      # Tela de confirmação/finalização do fluxo do sistema
├── conexao.php        # Script de conexão com o banco de dados MySQL
├── data.php           # Manipulação, processamento e listagem de dados dos produtos
├── Demanda.docx       # Documento com o levantamento de requisitos e escopo
├── editar.php         # Página para edição de informações de produtos existentes
├── entrada.php        # Interface/Script para registro de entrada de itens no estoque
├── estoque.php        # Painel geral de visualização e controle do estoque
├── excluir.php        # Script responsável pela exclusão de registros
├── index.php          # Página principal / Dashboard de indicadores
├── README.md          # Documentação do projeto (este arquivo)
├── saida.php          # Interface/Script para registro de saída de itens do estoque
├── schema.sql         # Script SQL de criação do banco de dados e tabelas
├── script.js          # Lógica Front-end, interações dinâmicas e validações
└── style.css          # Folha de estilos CSS para design visual e responsividade


---

## ⚙️ Como executar o projeto

### 1. Clone o repositório
```bash
git clone [https://github.com/seuusuario/TechForge.git](https://github.com/seuusuario/TechForge.git)
2. Configure o banco de dados
Abra a sua ferramenta de gerenciamento MySQL (como o phpMyAdmin) e execute o script contido no arquivo raiz:

schema.sql
Ele irá criar:

Banco de dados TechForge

Tabela Categoria

Tabela Produto

Categorias iniciais para testes

3. Configure a conexão
Edite as credenciais diretamente no arquivo raiz:

conexao.php
Exemplo de configuração padrão:

PHP
$host = "localhost";
$user = "root";
$senha = "";
$db = "TechForge";
4. Inicie o servidor local
Se estiver utilizando XAMPP ou WAMP:

Mova ou copie a pasta do projeto para o diretório de servidores locais (ex: htdocs ou www).

Certifique-se de que os módulos Apache e MySQL estão ativos no painel do seu servidor.

Acesse no navegador:

http://localhost/TechForge
🎯 Objetivo
Criar uma solução simples, moderna e eficiente para o gerenciamento de componentes de hardware, permitindo maior organização no inventário, rastreabilidade na movimentação (entradas e saídas) e facilidade na tomada de decisões.

👨‍💻 Desenvolvedor
Diogo Alexandre Desenvolvedor Full Stack em formação 🚀

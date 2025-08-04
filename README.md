# 🌀 TTricking PHP Site

Bem-vindo ao repositório do **TTricking**, um site pessoal que combina acrobacias, tecnologia e desenvolvimento web. Este projeto é desenvolvido com **PHP puro** utilizando arquitetura **MVC**, com uma futura integração ao backend em **Laravel** e frontend em **React**.
O foco desse projeto é criar todas as funções a mão na tora sem uso de frame works(como se fazia antigamente)

## 🚀 Funcionalidades

- ✅ Sistema de Posts com paginação
- ✅ Área de Produtos com imagens e descrições
- ✅ Upload de arquivos com validação de tamanho e extensão
- ✅ Sistema de Login com autenticação de sessão
- ✅ Comentários em posts
- ✅ Middleware de segurança (CSRF, Session)
- ✅ Barra de navegação responsiva
- ✅ Pesquisa por título de post
- ✅ Flash messages e redirecionamentos amigáveis

## 🛠️ Tecnologias Utilizadas

### Backend:
- PHP 8.x
- Arquitetura MVC própria
- Sistema de rotas simples
- Validação customizada (`ValidateTxt`)
- Gerenciamento de sessão (`Session`, `Csrf`)
- Paginação com Trait (`Paginate`)
- Sistema de pesquisa
- sistema de Login Usuários/admim

### Frontend:
- HTML5 + CSS3
- JavaScript 
- Ícones e animações simples (planejado)

### Banco de Dados:
- MySQL

## 📁 Estrutura do Projeto

ttrickingPHPSite/
├── app/
│ ├── controllers/
│ ├── models/
│ ├── views/
│ ├── validate/
│ ├── traits/
| ├── services/
| ├── functions/
│ └── classes/
├── core/
├── public/
│ └── assets/
  └── uploads/
  └── index.php
├── bootstrap.php


## ✅ Como rodar o projeto

1. Clone este repositório:
   ```bash
   git clone https://github.com/seu-usuario/ttrickingPHPSite.git
   cd ttrickingPHPSite



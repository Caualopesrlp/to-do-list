# 📝 To Do List - Laravel

Projeto simples de gerenciamento de tarefas (To Do List) desenvolvido com Laravel, com foco em aprendizado prático de arquitetura, validações e boas práticas de desenvolvimento.

---

## 📷 Demonstração

vou colocar o print aqui

---

## 📌 Funcionalidades

- Cadastro de tarefas
- Listagem com paginação
- Busca por tarefas
- Filtro por prioridade e status
- Edição de tarefas
- Exclusão de tarefas
- Marcar como concluída / pendente
- Validação com Form Requests

---

## 🧱 Arquitetura

O projeto foi estruturado com separação de responsabilidades:

- Controllers  
- Services  
- Repositories  
- Form Requests  
- Models  

---

## ⚙️ Tecnologias

- Laravel 12
- PHP 8+
- Blade
- MySQL / SQLite
- CSS puro

---

## 🚀 Como rodar o projeto

```bash
git clone https://github.com/Caualopesrlp/to-do-list
cd to-do-list

composer install

cp .env.example .env
php artisan key:generate

php artisan migrate

php artisan serve
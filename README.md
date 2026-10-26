# TalentFlow

Sistema de gestão de colaboradores e RH em Laravel, com três perfis de acesso (administrador, RH e colaborador), departamentos e convite de novos usuários por e-mail.

## Contexto

Projeto de estudo para praticar Laravel 11 com autenticação via Laravel Fortify, autorização com Gates, relacionamentos Eloquent, soft delete e envio de e-mails.

## Funcionalidades

- **Autenticação com Fortify**: login, logout, "esqueci a senha" e redefinição de senha.
- **Perfis de acesso** (`admin`, `rh`, `colaborator`): cada um é redirecionado à sua área após o login, e as rotas são protegidas com Gates.
- **Dashboard do administrador**: total de colaboradores ativos e removidos, folha salarial total e colaboradores/salários por departamento.
- **Departamentos**: criar, editar e excluir (com tela de confirmação).
- **Usuários de RH**: o admin cadastra, edita, remove e restaura.
- **Gestão de colaboradores pelo RH**: cadastro com dados pessoais, salário, data de admissão e departamento; edição, detalhes, remoção e restauração (soft delete).
- **Confirmação de conta por e-mail**: o novo colaborador recebe um link com token para definir a própria senha.
- **Perfil do usuário**: alteração de senha, dados pessoais e endereço.
- Listagens com DataTables.

## Stack

- PHP 8.2+ e Laravel 11
- Laravel Fortify
- Blade, Bootstrap 5, DataTables e Font Awesome
- SQLite por padrão (MySQL também funciona via `.env`)

## Como rodar localmente

```bash
git clone https://github.com/MatheusDiamantino/TalentFlow.git
cd TalentFlow
composer install
cp .env.example .env
php artisan key:generate

# banco SQLite padrão
touch database/database.sqlite
php artisan migrate
php artisan db:seed --class=AdminSeeder

php artisan serve
```

Acesse `http://localhost:8000` e entre com o usuário `admin@rhmangnt.com`, criado pelo `AdminSeeder` (a senha está definida no próprio seeder).

Com `MAIL_MAILER=log` (padrão do `.env.example`), o e-mail de confirmação de conta vai para `storage/logs/laravel.log`, onde fica o link de ativação.

## Estrutura

- `app/Http/Controllers`: Admin, RH, colaboradores, departamentos, perfil e confirmação de conta
- `app/Models`: `User`, `UserDetail`, `Department`
- `app/Mail/ConfirmAccountEmail.php`: e-mail de ativação
- `database/migrations` e `database/seeders/AdminSeeder.php`
- `resources/views`: telas Blade e componentes (layout, sidebar, perfil)

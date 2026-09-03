# CRUD API - Product, Customer e Order

Atividade de Programacao Orientada a Objetos para Web (TADS - 2026).

A API foi desenvolvida em Laravel e possui CRUD completo para Categories, Products, Customers e Orders.

## Requisitos aplicados

- Rotas REST com `Route::apiResources()`
- Controllers com `index`, `store`, `show`, `update` e `destroy`
- Validacao usando `FormRequest`
- Mass assignment usando `$fillable`
- Route Model Binding
- Relacionamentos Eloquent entre as entidades
- Migrations com chaves estrangeiras

## Executando

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```

Testes:

```bash
php artisan test
```

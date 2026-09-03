# CRUD API - Product, Customer e Order

Atividade de Programacao Orientada a Objetos para Web (TADS - 2026).

A API foi desenvolvida em Laravel e possui CRUD completo para:

- Categories
- Products
- Customers
- Orders

## Requisitos aplicados

- Rotas REST com `Route::apiResources()`
- Controllers com `index`, `store`, `show`, `update` e `destroy`
- Validacao usando `FormRequest`
- Mass assignment usando `$fillable`
- Route Model Binding
- Relacionamentos Eloquent entre as entidades
- Migrations com chaves estrangeiras

## Endpoints

| Metodo | Endpoint | Acao |
| --- | --- | --- |
| GET | `/api/categories` | Listar categorias |
| POST | `/api/categories` | Criar categoria |
| GET | `/api/categories/{category}` | Exibir categoria |
| PUT/PATCH | `/api/categories/{category}` | Atualizar categoria |
| DELETE | `/api/categories/{category}` | Excluir categoria |
| GET | `/api/products` | Listar produtos |
| POST | `/api/products` | Criar produto |
| GET | `/api/products/{product}` | Exibir produto |
| PUT/PATCH | `/api/products/{product}` | Atualizar produto |
| DELETE | `/api/products/{product}` | Excluir produto |
| GET | `/api/customers` | Listar clientes |
| POST | `/api/customers` | Criar cliente |
| GET | `/api/customers/{customer}` | Exibir cliente |
| PUT/PATCH | `/api/customers/{customer}` | Atualizar cliente |
| DELETE | `/api/customers/{customer}` | Excluir cliente |
| GET | `/api/orders` | Listar pedidos |
| POST | `/api/orders` | Criar pedido |
| GET | `/api/orders/{order}` | Exibir pedido |
| PUT/PATCH | `/api/orders/{order}` | Atualizar pedido |
| DELETE | `/api/orders/{order}` | Excluir pedido |

## Executando o projeto

Entre na pasta `laravel` e execute:

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```

Para rodar os testes:

```bash
php artisan test
```

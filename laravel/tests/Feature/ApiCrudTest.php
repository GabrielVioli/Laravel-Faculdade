<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ApiCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_complete_crud_flow_for_required_entities(): void
    {
        $category = $this->postJson('/api/categories', [
            'name' => 'Eletronicos',
            'description' => 'Produtos eletronicos',
        ])->assertCreated()->json();

        $product = $this->postJson('/api/products', [
            'category_id' => $category['id'],
            'name' => 'Teclado',
            'description' => 'Teclado mecanico',
            'price' => 250.00,
            'stock' => 10,
        ])->assertCreated()->json();

        $customer = $this->postJson('/api/customers', [
            'name' => 'Cliente Teste',
            'email' => 'cliente@example.com',
            'phone' => '(42) 99999-9999',
        ])->assertCreated()->json();

        $order = $this->postJson('/api/orders', [
            'customer_id' => $customer['id'],
            'product_id' => $product['id'],
            'quantity' => 2,
            'status' => 'pending',
        ])->assertCreated()->json();

        $this->getJson('/api/categories/'.$category['id'])->assertOk();
        $this->getJson('/api/products/'.$product['id'])->assertOk();
        $this->getJson('/api/customers/'.$customer['id'])->assertOk();
        $this->getJson('/api/orders/'.$order['id'])->assertOk();

        $this->patchJson('/api/products/'.$product['id'], [
            'stock' => 8,
        ])->assertOk()->assertJsonPath('stock', 8);

        $this->patchJson('/api/customers/'.$customer['id'], [
            'name' => 'Cliente Atualizado',
        ])->assertOk()->assertJsonPath('name', 'Cliente Atualizado');

        $this->patchJson('/api/orders/'.$order['id'], [
            'status' => 'paid',
        ])->assertOk()->assertJsonPath('status', 'paid');

        $this->deleteJson('/api/orders/'.$order['id'])->assertNoContent();
        $this->deleteJson('/api/products/'.$product['id'])->assertNoContent();
        $this->deleteJson('/api/customers/'.$customer['id'])->assertNoContent();
        $this->deleteJson('/api/categories/'.$category['id'])->assertNoContent();
    }
}

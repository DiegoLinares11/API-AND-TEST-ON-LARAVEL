<?php
use App\Models\Product;

test('example', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});



test('store creates a new product', function () {
    // Datos para crear un nuevo producto
    $data = [
        'name' => 'Banana',
        'description' => 'Fresh Banana',
        'price' => 50
    ];

    // Realizar una solicitud POST para crear un producto
    $response = $this->postJson('/api/products', $data);

    // Verificar que la respuesta sea exitosa (200)
    $response->assertStatus(200);

    // Verificar que el producto se haya guardado correctamente en la base de datos
    $this->assertDatabaseHas('products', ['name' => 'Banana']);
    $this->assertDatabaseHas('products', ['description' => 'Fresh Banana']);
    $this->assertDatabaseHas('products', ['price' => 50]);
});


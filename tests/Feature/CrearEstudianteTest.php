<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CrearEstudianteTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_crear_un_estudiante_con_todos_los_datos()
    {
        $response = $this->post('/estudiantes', [
            'apellidos' => 'Andrade',
            'nombres' => 'Marcelo',
            'fecha_de_nacimiento' => date_create('15 years ago')->format('Y-m-d'),
            'ciudad_de_nacimiento' => 'Tulcán',
        ]);

        $response->assertStatus(201);
    }

    public function test_crear_un_estudiante_mayor_de_edad()
    {
        $response = $this->post('/estudiantes', [
            'apellidos' => 'Andrade',
            'nombres' => 'Marcelo',
            'fecha_de_nacimiento' => date_create('20 years ago')->format('Y-m-d'),
            'ciudad_de_nacimiento' => 'Tulcán',
        ]);

        $response->assertStatus(422);
    }
}

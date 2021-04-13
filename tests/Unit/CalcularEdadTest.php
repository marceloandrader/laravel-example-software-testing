<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Estudiante;

class CalcularEdadTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_fecha_relativa()
    {
        $estudiante = new Estudiante();

        $estudiante->fecha_de_nacimiento = date_create('15 years ago');

        $this->assertEquals(15, $estudiante->getEdad());
    }

    public function test_fecha_fija()
    {
        $estudiante = new Estudiante();

        $estudiante->fecha_de_nacimiento = date_create_from_format('Y-m-d', '1980-08-05');

        $this->assertEquals(40, $estudiante->getEdad());
    }

    public function test_sin_fecha()
    {
        $estudiante = new Estudiante();

        $estudiante->fecha_de_nacimiento = null;

        $this->assertEquals(null, $estudiante->getEdad());
    }
}

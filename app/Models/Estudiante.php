<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    protected $casts = [
        'fecha_de_nacimiento' => 'date:Y-m-d',
    ];

    public function getEdad()
    {
        if ($this->fecha_de_nacimiento === null) {
            return null;
        }
        $today =  new \DateTime('now');
        $diff = $today->diff($this->fecha_de_nacimiento);
        return $diff->y;
    }
}

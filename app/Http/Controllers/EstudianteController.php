<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'apellidos' => 'required',
            'nombres' => 'required',
            'ciudad_de_nacimiento' => 'required',
            'fecha_de_nacimiento' => 'required|date:Y-m-d',
        ]);

        $estudiante = new Estudiante();
        $estudiante->apellidos = $data['apellidos'];
        $estudiante->nombres = $data['nombres'];
        $estudiante->fecha_de_nacimiento = $data['fecha_de_nacimiento'];
        $estudiante->ciudad_de_nacimiento = $data['ciudad_de_nacimiento'];

        $validator->after(function ($validator) use ($estudiante) {
            if ($estudiante->getEdad() > 18) {
                $validator->errors()->add('fecha_de_nacimiento', 'El estudiante ya es mayor de edad');
            }
        });

        if ($validator->fails()) {
            return response()
                ->json(['errors' => $validator->errors()], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $estudiante->save();

        return response()->noContent(Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function show(Estudiante $estudiante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function edit(Estudiante $estudiante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estudiante $estudiante)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estudiante $estudiante)
    {
        //
    }
}

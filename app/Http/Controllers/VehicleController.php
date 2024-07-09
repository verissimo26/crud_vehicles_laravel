<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    
    public function index()
    {
        $vehicles = Vehicle::all();

        return view('vehicles.index')->with('vehicles', $vehicles);;
    }

   
    public function create()
    {
        return view('vehicles.create');
        
    }

    
    public function store(Request $request)
    {
        $vehicle = new Vehicle();

        $vehicle->name = $request->input('name');
        $vehicle->year = $request->input('year');
        $vehicle->color = $request->input('color');

        $vehicle->save();

        $vehicles = Vehicle::all();
        return view('vehicles.index')->with('vehicles', $vehicles)
        ->with('msg', 'Veículo cadastrado com sucesso!');   
    }

   
    public function show(string $id)
    {
        $vehicle = Vehicle::find($id);
        if ($vehicle) {
            return view('vehicles.show')->with('vehicle', $vehicle);
        } else {
            //..senão, retorna a view com uma mensagem que será exibida.
            return view('vehicles.show')->with('msg', 'Veículo não encontrado!');
        }
    }

    
    public function edit(string $id)
    {
        $vehicle = Vehicle::find($id);
    //..se encontrar o veículo, retorna a view de ediçãcom com o objeto correspondente
    if ($vehicle) {
        return view('vehicles.edit')->with('vehicle', $vehicle);
    } else {
        //..senão, retorna a view de edição com uma mensagem que será exibida.
        $vehicles = Vehicle::all();            
        return view('vehicles.index')->with('vehicles', $vehicles)
            ->with('msg', 'Veículo não encontrado!');
    }
    }

    
    public function update(Request $request, string $id)
    {
        $vehicle = Vehicle::find($id);
        //..atualiza os atributos do objeto recuperado com os dados do objeto Request
        $vehicle->name = $request->input('name');
        $vehicle->year = $request->input('year');
        $vehicle->color = $request->input('color');
        //..persite as alterações na base de dados
        $vehicle->save();
        //..retorna a view index com uma mensagem
        $vehicles = Vehicle::all();
        return view('vehicles.index')->with('vehicles', $vehicles)
            ->with('msg', 'Veículo atualizado com sucesso!');
    }

    
    public function destroy(string $id)
    {
        $vehicle = Vehicle::find($id);
        //..exclui o recurso
        $vehicle->delete();
        //..retorna à view index.
        $vehicles = Vehicle::all();
        return view('vehicles.index')->with('vehicles', $vehicles)
            ->with('msg', "Veículo excluído com sucesso!");
    }
}

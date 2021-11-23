<?php

namespace App\Http\Controllers;


use App\Models\Car;
use Illuminate\Http\Request;
use App\Http\Requests\CreateCarRequest;
use App\Http\Requests\UpdateCarRequest;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::all();
        return response()->json($cars);
    }

    public function show(Car $car)
    {
        return response()->json($car);
    }

    public function store(CreateCarRequest $request)
    {
        $data = $request->validated();
        $car = Car::create($data);
        return response()->json($car, 201);
    }


    public function update(UpdateCarRequest $request, Car $car)
    {
        $data = $request->validated();
        $car->update($data);
        return response()->json($car);
    }

    public function delete(Car $car)
    {
        $car->delete();
        return response()->json($car);
    }
}

<?php

namespace App\Http\Controllers;


use App\Models\Car;
use Illuminate\Http\Request;
use App\Http\Requests\CreateCarRequest;
use App\Http\Requests\UpdateCarRequest;

class CarController extends Controller
{
    public function index(Request $request)
    {
        $per_page = $request->query('per_page', 8);
        $brand = $request->query('brand', '');
        $model = $request->query('model', '');

        $cars = Car::searchByBrand($brand)
            ->searchByModel($model)
            ->paginate($per_page);

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

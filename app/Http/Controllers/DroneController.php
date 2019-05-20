<?php

namespace App\Http\Controllers;

use App\Drone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DroneController extends Controller
{

    public function findAll() {
        //$drones = DB::select('select * from drones');
        $drones = Drone::all();
        return response()->json($drones);
    }

    public function create(Request $request) {
        foreach(['image', 'name', 'address', 'battery', 'max_speed', 'average_speed', 'status', 'fly'] as $field) {
            if (!$request->has($field)) {
                return "Erro, o campo " . $field . " é obrigatório";
            }
        }
        $drone = new Drone;
        $drone->fill($request->all());
        //$drone->image = $request->image;
        //$drone->name = $request->name;
        //$drone->address = $request->address;
        //$drone->battery = $request->battery;
        //$drone->max_speed = $request->max_speed;
        //$drone->average_speed = $request->average_speed;
        //$drone->status = $request->status;
        //$drone->fly = $request->fly;
        $drone->save();
        return response()->json($drone);
     }

    public function show($id) {
        $drone = Drone::find($id);
        return response()->json($drone);
    }


    public function update(Request $request, $id) {
        foreach(['image', 'name', 'address', 'battery', 'max_speed', 'average_speed', 'status', 'fly'] as $field) {
            if (!$request->has($field)) {
                return "Erro, o campo " . $field . " é obrigatório";
            }
        }
        $drone = Drone::find($id);
        $drone->fill($request->all());
        $drone->save();
        return response()->json($drone);
    }

    public function destroy($id) {
        $drone = Drone::find($id);
        $drone->delete();
        return response()->json('Drone removido com sucesso!');
    }

}

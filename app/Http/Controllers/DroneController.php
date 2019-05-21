<?php

namespace App\Http\Controllers;

use Validator;
use App\Drone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class DroneController extends Controller
{

    protected $rules = array(
        'image' => 'required',
        'name' => 'required',
        'address' => 'required',
        'battery' => 'required',
        'max_speed' => 'required',
        'average_speed' => 'required',
        'status' => 'required',
        'fly' => 'required',
    );

    // TODO falta tratar array (Ex: /drones?id=1&id=2)
    public function index(Request $request) {
        $drones = DB::table('drones');
        if ($request->has('name')) {
            $drones->where('name', $request->name);
        }
        if ($request->has('id')) {
            $drones->where('id', $request->id);
        }
        if ($request->has('status')) {
            $drones->where('status', $request->status);
        }
        if ($request->has('_sort')) {
            $ordem = 'asc';
            if ($request->has('_order')) {
                $ordem = $request->input('_order');
            }
            $drones->orderBy($request->input('_sort'), $ordem);
        }
        if ($request->has('_page') && $request->has('_limit')) {
            $offset = $request->input('_page');
            $limit = $request->input('_limit');
            $drones->skip($offset*$limit)->take($limit);
        } else if ($request->has('_limit') && $request->has('_limit')) {
            $drones->paginate($request->input('_limit'));
        }
        return response()->json($drones->get());
    }

    public function show($id) {
        try {
            $drone = Drone::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => ['message' => 'Drone com id ' . $id . ' nao encontrado']], 404);
        }
        return response()->json($drone);
    }

    public function create(Request $request) {
        $this->validate($request, $this->rules);
        $drone = new Drone;
        $drone->fill($request->all());
        $drone->save();
        return response()->json($drone);
     }

    public function update(Request $request, $id) {
        $this->validate($request, $this->rules);
        try {
            $drone = Drone::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => ['message' => 'Drone com id ' . $id . ' nao encontrado']], 404);
        }
        $drone->fill($request->all());
        $drone->save();
        return response()->json($drone);
    }

    public function destroy($id) {
         try {
            $drone = Drone::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => ['message' => 'Drone com id ' . $id . ' nao encontrado']], 404);
        }
        $drone->delete();
        return response()->json('Drone removido com sucesso!');
    }

}

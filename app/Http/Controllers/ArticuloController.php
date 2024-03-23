<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use Faker\Generator as Faker;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class ArticuloController extends Controller
{
    public function index(Request $request) {
        if ($request->has('id')) {
            $articulo = Articulo::with('user')->find($request->input('id'));
            return response()->json($articulo);
        }
        if ($request->has('fecha')) {
            $fecha = Carbon::parse($request->input('fecha'))->toDateString();
        
            $articulos = Articulo::with('user')->whereDate('created_at', $fecha)->get();
            return response()->json($articulos);
        }

        $articulos = Articulo::with('user')->get();
        return response()->json($articulos);
    }

    public function store(Request $request) {
        $validate = Validator::make($request->all(), [
            'user_id' => 'required',
            'title' => 'required',
            'content' => 'required'
        ]);
        if ($validate->fails()) {
            return response()->json($validate->errors());
        }
        if (!User::find($request->user_id))
            return response()->json(['message' => 'Usuario no encontrado'], 404);

        $faker = new Faker();
        $users = User::get()->pluck('id')->toArray();
        $request->merge([
            // 'user_id' => $users[array_rand($users)],
            'comments_count' => $faker->numberBetween(0, 100),
            'reactions_count' => $faker->numberBetween(0, 100),
            'reading_time_minutes' => $faker->numberBetween(1, 30)
        ]);
        
        $articulo = Articulo::create($request->all());

        return response()->json($articulo);
    }

    public function update(Request $request, $id) {
        $articulo = Articulo::find($id);
        if (!$articulo) {
            return response()->json(['message' => 'Artículo no encontrado'], 404);
        }
        $articulo->update($request->all());

        return response()->json($articulo);
    }

    public function destroy($id) {
        $articulo = Articulo::find($id);
        if (!$articulo) {
            return response()->json(['message' => 'Artículo no encontrado'], 404);
        }
        $articulo->delete();

        return response()->noContent();
    }
}

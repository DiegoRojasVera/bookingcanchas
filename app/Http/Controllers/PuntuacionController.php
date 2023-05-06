<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Puntuacion;
use Illuminate\Support\Facades\DB;
use App\Models\Client;


class PuntuacionController extends Controller
{
    public function store(Request $request)
    {
        $puntuacion = new Puntuacion();

        $puntuacion->calificacion = $request->calificacion;
        $puntuacion->stylist = $request->stylist;
        $puntuacion->comentario = $request->comentario;
        $puntuacion->nombre = $request->nombre;

        $puntuacion->save();

        return response()->json([
            'message' => 'Puntuación guardada correctamente'
        ]);
    }

    public function promedioPorStylist($stylist)
    {
        $promedio = DB::table('ratingbar')
            ->where('stylist', $stylist)
            ->avg('calificacion');

        return response()->json([
            'promedio' => $promedio
        ]);
    }

    public function index()
    {
        $puntuaciones = Puntuacion::all();

        return response()->json($puntuaciones);
    }

    public function listarPorStylist($stylist)
    {
        $puntuaciones = Puntuacion::where('stylist', $stylist)->get();
        return response()->json($puntuaciones);
    }
    //vamos a listar y saber si fue atenda por el stylis

    public function showStylistsAndServices($name)
{
    $stylistsAndServices = Client::select('stylist', 'service')
        ->where('name', $name)
        ->groupBy('stylist', 'service')
        ->get();

    return response()->json($stylistsAndServices);
}
}

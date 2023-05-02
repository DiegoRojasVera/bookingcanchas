<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PuntuacionController extends Controller
{
    public function store(Request $request)
    {
        $puntuacion = new Puntuacion();

        $puntuacion->calificacion = $request->calificacion;
        $puntuacion->stylist = $request->stylist;
        $puntuacion->comentario = $request->comentario;

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
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
use Illuminate\Http\Request;
use App\Models\Reporte;
use JWTAuth;
use App\User;

class ApiReporteController extends Controller
{
    public function index()
    {
        
        $reportes = Reporte::with('user')->get();

        return response()->json(
            $reportes
        );

    }

    public function store(Request $request)
    {

        $user = auth()->user()->id;
     
        $reporte = new Reporte();

        $reporte->tipo_incidente    = $request->tipo_incidente;
        $reporte->date_time         = $request->date_time;
        $reporte->descricao         = $request->descricao;
        $reporte->prioridade        = $request->prioridade;
        $reporte->latitude          = $request->latitude;
        $reporte->longitude         = $request->longitude;
        
        $reporte->user_id           = $user;

        $reporte->save();

        return response()->json([
            'success'   =>  true,
            'data'      =>  $reporte
        ],201);
    }

}

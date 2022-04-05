<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Función para el index del dashboard
    public function index(Request $request) {
        // En caso que no reciba un title, se asigna un valor por defecto

        return view('/test', [
            'title' => $request->query('title', 'Valor default')
        ]);
    }
}

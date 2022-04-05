<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Función para el index del dashboard
    public function index() {
        return view('/test', [
            'title' => 'Curso de platzi'
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Bicicleta;

class HomeController extends Controller
{
    public function index()
    {
        $bicicletes = Bicicleta::with('categories')
            ->where('disponible', true)
            ->take(6)
            ->get();
        return view('welcome', compact('bicicletes'));
    }

    public function dashboard()
    {
        $totalBicicletes = Bicicleta::count();

        return view('admin.dashboard', [
            'totalBicicletes' => $totalBicicletes,
        ]);
    }
}

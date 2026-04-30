<?php

namespace App\Http\Controllers;

use App\Models\Lloguer;
use App\Models\Bicicleta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LloguerController extends Controller
{
    public function index()
    {
        if (Auth::user()->isAdmin()) {
            $lloguers = Lloguer::with(['user', 'bicicleta'])->latest()->get();
        } else {
            $lloguers = Lloguer::with(['bicicleta'])
                ->where('user_id', Auth::id())
                ->latest()
                ->get();
        }
        return view('lloguers.index', compact('lloguers'));
    }

    public function show(Lloguer $lloguer)
    {
        if (!Auth::user()->isAdmin() && $lloguer->user_id !== Auth::id()) {
            abort(403);
        }
        $lloguer->load(['user', 'bicicleta']);
        return view('lloguers.show', compact('lloguer'));
    }

    public function create()
    {
        $bicicletes = Bicicleta::where('disponible', true)->get();
        return view('lloguers.create', compact('bicicletes'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'bicicleta_id' => 'required|exists:bicicletes,id',
            'data_inici'   => 'required|date|after_or_equal:today',
            'data_fi'      => 'required|date|after:data_inici',
        ]);

        $bicicleta = Bicicleta::findOrFail($data['bicicleta_id']);
        $dies = \Carbon\Carbon::parse($data['data_inici'])
            ->diffInDays(\Carbon\Carbon::parse($data['data_fi']));

        $data['user_id']    = Auth::id();
        $data['preu_total'] = $dies * $bicicleta->preu_dia;

        Lloguer::create($data);
        return redirect()->route('lloguers.index')->with('success', 'Lloguer creat correctament.');
    }

    public function destroy(Lloguer $lloguer)
    {
        if (!Auth::user()->isAdmin() && $lloguer->user_id !== Auth::id()) {
            abort(403);
        }
        $lloguer->delete();
        return redirect()->route('lloguers.index')->with('success', 'Lloguer eliminat.');
    }
}

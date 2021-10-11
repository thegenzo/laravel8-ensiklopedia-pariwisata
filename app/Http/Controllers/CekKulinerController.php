<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kuliner;

class CekKulinerController extends Controller
{
    public function index()
    {
        $kuliner = Kuliner::paginate(6);

        return view('pages.kuliner.index', compact('kuliner'));
    }

    public function show($id)
    {
        $kuliner = Kuliner::find($id);

        return view('pages.kuliner.show', compact('kuliner'));
    }

    public function search(Request $request)
    {
        $search = $request->get('search');

        $kuliner = Kuliner::where('nama_kuliner', 'LIKE', '%'. $search . '%')->get();

        return view('pages.kuliner.search', compact('kuliner'));
    }
}

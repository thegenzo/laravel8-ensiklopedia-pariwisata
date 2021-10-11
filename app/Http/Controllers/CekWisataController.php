<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wisata;

class CekWisataController extends Controller
{
    public function index()
    {
        $wisata = Wisata::paginate(6);

        return view('pages.wisata.index', compact('wisata'));
    }

    public function show($id)
    {
        $wisata = Wisata::find($id);

        return view('pages.wisata.show', compact('wisata'));
    }

    public function search(Request $request)
    {
        $search = $request->get('search');

        $wisata = Wisata::where('nama_wisata', 'LIKE', '%'. $search . '%')->get();

        return view('pages.wisata.search', compact('wisata'));
    }
}

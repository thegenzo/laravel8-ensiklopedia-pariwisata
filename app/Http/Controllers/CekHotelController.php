<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;

class CekHotelController extends Controller
{
    public function index()
    {
        $hotel = Hotel::paginate(6);
        return view('pages.hotel.index', compact('hotel'));
    }

    public function show($id)
    {
        $hotel = Hotel::find($id);

        return view('pages.hotel.show', compact('hotel'));
    }

    public function search(Request $request)
    {
        $search = $request->get('search');

        $hotel = Hotel::where('nama_hotel', 'LIKE', '%'. $search . '%')->get();

        return view('pages.hotel.search', compact('hotel'));
    }
}

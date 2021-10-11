<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use App\Models\Hotel;
use App\Models\HotelFoto;

use Validator;
use Illuminate\Validation\Rule;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotel = Hotel::all();

        return view('admin.pages.hotel.index', compact('hotel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.hotel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'sampul_hotel'          => 'required|image|mimes:jpeg,png,jpg,svg',
            'nama_hotel'            => 'required',
            'deskripsi'             => 'required',
            'harga_rata'            => 'required|numeric',
            'latitude'              => 'required',
            'longitude'             => 'required',
        ];

        $messages = [
            'sampul_hotel.required'          => 'Sampul Hotel wajib diisi',
            'sampul_hotel.mimes'             => 'Sampul Hotel harus berformat gambar (jpeg, png, jpg atau svg)',
            'nama_hotel.required'            => 'Nama Hotel wajib diisi',
            'deskripsi.required'             => 'Deskripsi wajib diisi',
            'harga_rata.required'            => 'Harga Rata-rata wajib diisi',
            'harga_rata.numeric'             => 'Harga Rata-rata harus berupa angka',
            'latitude.required'              => 'Koordinat Lokasi Latitude wajib diisi',
            'longitude.required'             => 'Koordinat Lokasi Longitude wajib diisi',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $data = $request->all();

        $image = $request->file('sampul_hotel');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('foto-hotel'),$imageName);

        $data['sampul_hotel'] = $imageName;
        $hotel = Hotel::create($data);

        if(count($request->hotel_foto) > 0) {
            foreach ($request->hotel_foto as $item=>$v) {
                $dataFoto=array(
                    'id_hotel'=>$hotel->id,
                    'foto'=>$request->hotel_foto[$item]
                );
                $foto = HotelFoto::create($dataFoto);
            }
        }

        Alert::success('Berhasil', 'Hotel Berhasil Ditambahkan');

        return redirect('/hotel');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hotel = Hotel::find($id);

        return view('admin.pages.hotel.show', compact('hotel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hotel = Hotel::find($id);

        return view('admin.pages.hotel.edit', compact('hotel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'sampul_hotel'          => 'required|image|mimes:jpeg,png,jpg,svg',
            'nama_hotel'            => 'required',
            'deskripsi'             => 'required',
            'harga_rata'            => 'required|numeric',
            'latitude'              => 'required',
            'longitude'             => 'required',
        ];

        $messages = [
            'sampul_hotel.required'          => 'Sampul Hotel wajib diisi',
            'sampul_hotel.mimes'             => 'Sampul Hotel harus berformat gambar (jpeg, png, jpg atau svg)',
            'nama_hotel.required'            => 'Gedung wajib diisi',
            'deskripsi.required'             => 'Deskripsi wajib diisi',
            'harga_rata.required'            => 'Harga Rata-rata wajib diisi',
            'harga_rata.numeric'             => 'Harga Rata-rata harus berupa angka',
            'latitude.required'              => 'Koordinat Lokasi Latitude wajib diisi',
            'longitude.required'             => 'Koordinat Lokasi Longitude wajib diisi',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $hotel = Hotel::find($id);
        $data = $request->all();

        if($request->file('sampul_hotel')) {
            $image = $request->file('sampul_hotel');
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('foto-hotel'),$imageName);
            $data['sampul_hotel'] = $imageName;
        }

        $hotel->update($data);

        if(count($request->id_hotel) > 0) {
            foreach ($request->id_hotel as $item=>$v) {
                $dataFoto=array(
                    'foto'=>$request->hotel_foto[$item]
                );
                $foto = HotelFoto::where('id', $request->id_hotel[$item])->first();
                $foto->update($dataFoto);
            }
        }

        Alert::success('Berhasil', 'Hotel Berhasil Diedit');

        return redirect('/hotel');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hotel = Hotel::find($id);
        unlink(public_path('foto-hotel').'/'.$hotel->sampul_hotel);
        $hotelFoto = HotelFoto::where('id_hotel', $hotel->id)->delete();
        $hotel->delete();

        Alert::success('Berhasil', 'Hotel Berhasil Dihapus');

        return redirect('/hotel');
    }
}

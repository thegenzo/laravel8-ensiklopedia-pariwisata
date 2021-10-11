<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use App\Models\Wisata;
use App\Models\WisataFoto;

use Validator;
use Illuminate\Validation\Rule;

class WisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wisata = Wisata::all();

        return view('admin.pages.wisata.index', compact('wisata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.wisata.create');
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
            'sampul_wisata'         => 'required|image|mimes:jpeg,png,jpg,svg',
            'nama_wisata'           => 'required',
            'deskripsi'             => 'required',
            'latitude'              => 'required',
            'longitude'             => 'required',
        ];

        $messages = [
            'sampul_wisata.required'          => 'Sampul Wisata wajib diisi',
            'sampul_wisata.mimes'             => 'Sampul Wisata harus berformat gambar (jpeg, png, jpg atau svg)',
            'nama_wisata.required'            => 'Nama Wisata wajib diisi',
            'deskripsi.required'              => 'Deskripsi wajib diisi',
            'latitude.required'               => 'Koordinat Lokasi Latitude wajib diisi',
            'longitude.required'              => 'Koordinat Lokasi Longitude wajib diisi',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $data = $request->all();

        $image = $request->file('sampul_wisata');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('foto-wisata'),$imageName);

        $data['sampul_wisata'] = $imageName;
        $wisata = Wisata::create($data);

        if(count($request->wisata_foto) > 0) {
            foreach ($request->wisata_foto as $item=>$v) {
                $dataFoto=array(
                    'id_wisata'=>$wisata->id,
                    'foto'=>$request->wisata_foto[$item]
                );
                $foto = WisataFoto::create($dataFoto);
            }
        }

        Alert::success('Berhasil', 'Destinasi Wisata Berhasil Ditambahkan');

        return redirect('/wisata');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $wisata = Wisata::find($id);

        return view('admin.pages.wisata.show', compact('wisata'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $wisata = Wisata::find($id);

        return view('admin.pages.wisata.edit', compact('wisata'));
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
            'sampul_wisata'         => 'required|image|mimes:jpeg,png,jpg,svg',
            'nama_wisata'           => 'required',
            'deskripsi'             => 'required',
            'latitude'              => 'required',
            'longitude'             => 'required',
        ];

        $messages = [
            'sampul_wisata.required'          => 'Sampul Wisata wajib diisi',
            'sampul_wisata.mimes'             => 'Sampul Wisata harus berformat gambar (jpeg, png, jpg atau svg)',
            'nama_wisata.required'            => 'Nama Wisata wajib diisi',
            'deskripsi.required'              => 'Deskripsi wajib diisi',
            'latitude.required'               => 'Koordinat Lokasi Latitude wajib diisi',
            'longitude.required'              => 'Koordinat Lokasi Longitude wajib diisi',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $wisata = Wisata::find($id);
        $data = $request->all();

        if($request->file('sampul_wisata')) {
            $image = $request->file('sampul_wisata');
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('foto-wisata'),$imageName);
            $data['sampul_wisata'] = $imageName;
        }

        $wisata->update($data);

        if(count($request->id_wisata) > 0) {
            foreach ($request->id_wisata as $item=>$v) {
                $dataFoto=array(
                    'foto'=>$request->wisata_foto[$item]
                );
                $foto = WisataFoto::where('id', $request->id_wisata[$item])->first();
                $foto->update($dataFoto);
            }
        }

        Alert::success('Berhasil', 'Destinasi Wisata Berhasil Diedit');

        return redirect('/wisata');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wisata = Wisata::find($id);
        unlink(public_path('foto-wisata').'/'.$wisata->sampul_wisata);
        $wisataFoto = WisataFoto::where('id_wisata', $wisata->id)->delete();
        $wisata->delete();

        Alert::success('Berhasil', 'Destinasi Wisata Berhasil Dihapus');

        return redirect('/wisata');
    }
}

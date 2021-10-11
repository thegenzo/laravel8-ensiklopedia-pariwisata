<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use App\Models\Kuliner;
use App\Models\KulinerFoto;

use Validator;
use Illuminate\Validation\Rule;

class KulinerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kuliner = Kuliner::all();

        return view('admin.pages.kuliner.index', compact('kuliner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.kuliner.create');
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
            'sampul_kuliner'          => 'required|image|mimes:jpeg,png,jpg,svg',
            'nama_kuliner'            => 'required',
            'deskripsi'               => 'required',
            'harga'                   => 'required|numeric',
        ]; 

        $messages = [
            'sampul_kuliner.required'        => 'Sampul Kuliner wajib diisi',
            'sampul_kuliner.mimes'           => 'Sampul Kuliner harus berformat gambar (jpeg, png, jpg atau svg)',
            'nama_kuliner.required'          => 'Nama Kuliner wajib diisi',
            'deskripsi.required'             => 'Deskripsi wajib diisi',
            'harga.required'                 => 'Harga Rata-rata wajib diisi',
            'harga.numeric'                  => 'Harga Rata-rata harus berupa angka',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $data = $request->all();

        $image = $request->file('sampul_kuliner');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('foto-kuliner'),$imageName);

        $data['sampul_kuliner'] = $imageName;
        $kuliner = Kuliner::create($data);

        if(count($request->kuliner_foto) > 0) {
            foreach ($request->kuliner_foto as $item=>$v) {
                $dataFoto=array(
                    'id_kuliner'=>$kuliner->id,
                    'foto'=>$request->kuliner_foto[$item]
                );
                $foto = KulinerFoto::create($dataFoto);
            }
        }


        Alert::success('Berhasil', 'Kuliner Berhasil Ditambahkan');

        return redirect('/kuliner');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kuliner = Kuliner::find($id);

        return view('admin.pages.kuliner.show', compact('kuliner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kuliner = Kuliner::find($id);

        return view('admin.pages.kuliner.edit', compact('kuliner'));
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
            'sampul_kuliner'          => 'required|image|mimes:jpeg,png,jpg,svg',
            'nama_kuliner'            => 'required',
            'deskripsi'               => 'required',
            'harga'                   => 'required|numeric',
        ]; 

        $messages = [
            'sampul_kuliner.required'        => 'Sampul Kuliner wajib diisi',
            'sampul_kuliner.mimes'           => 'Sampul Kuliner harus berformat gambar (jpeg, png, jpg atau svg)',
            'nama_kuliner.required'          => 'Nama Kuliner wajib diisi',
            'deskripsi.required'             => 'Deskripsi wajib diisi',
            'harga.required'                 => 'Harga Rata-rata wajib diisi',
            'harga.numeric'                  => 'Harga Rata-rata harus berupa angka',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $kuliner = Kuliner::find($id);
        $data = $request->all();

        if($request->file('sampul_kuliner')) {
            $image = $request->file('sampul_kuliner');
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('foto-kuliner'),$imageName);
            $data['sampul_kuliner'] = $imageName;
        }

        $kuliner->update($data);

        if(count($request->id_kuliner) > 0) {
            foreach ($request->id_kuliner as $item=>$v) {
                $dataFoto=array(
                    'foto'=>$request->kuliner_foto[$item]
                );
                $foto = KulinerFoto::where('id', $request->id_kuliner[$item])->first();
                $foto->update($dataFoto);
            }
        }

        Alert::success('Berhasil', 'Kuliner Berhasil Diedit');

        return redirect('/kuliner');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kuliner = Kuliner::find($id);
        unlink(public_path('foto-kuliner').'/'.$kuliner->sampul_kuliner);
        $kulinerFoto = KulinerFoto::where('id_kuliner', $kuliner->id)->delete();
        $kuliner->delete();

        Alert::success('Berhasil', 'Kuliner Berhasil Dihapus');

        return redirect('/kuliner');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class McController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('masterdata.mc.index', [
            'mc'     => Produk::where('kategori_id', '=', 6)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('masterdata.mc.create', [
            'title'     => 'Tambah Data',
            // 'kategoris' => Kategori::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $validateData = $request->validate([
            'name' => 'required',
            'harga' => 'required',
            'ketersediaan' => 'required',
            'gambar' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048|nullable',
            'deskripsi' => 'nullable'
        ]);

        if ($request->file('gambar')) {
            $validateData['gambar'] = $request->file('gambar')->store('produk-gambar');
        }

        $validateData['user_id'] = auth()->user()->id;
        $validateData['kategori_id'] = 6;

        Produk::create($validateData);
        return redirect('/mc')->with('success', 'Data berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $mc)
    {
        return view('masterdata.mc.show', [
            'title'     => 'Detail MC',
            'mc' => $mc
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $mc)
    {
        return view('masterdata.mc.edit', [
            'title'     => 'Edit Data',
            'kategori' => Kategori::all(),
            'mc' => $mc
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $mc)
    {
        $rules = [
            'kategori_id' => 'required',
            'name' => 'required',
            'harga' => 'required',
            'ketersediaan' => 'required',
            'gambar' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048|nullable',
            'deskripsi' => 'nullable'
        ];

        $validateData = $request->validate($rules);
        if ($request->file('gambar')) {
            if ($request->gambarlama) {
                Storage::delete($request->gambarlama);
            }
            $validateData['gambar'] = $request->file('gambar')->store('produk-gambar'); //setting penyimpanan .env = FILESYSTEM_DRIVER=public lalu cmd php artisan storage:link . maka dalam folder public akan ada folder storage blog-images . agar gambar bisa di akses public
        }

        Produk::where('id', $mc->id)->update($validateData);
        return redirect('/mc')->with('success', 'Data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $mc)
    {
        if ($mc->gambar) {
            Storage::delete($mc->gambar);
        }
        Produk::destroy($mc->id);
        return redirect('/mc')->with('success', 'Data berhasil di hapus');
    }
}

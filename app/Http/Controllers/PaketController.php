<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('masterdata.paket.index', [
            'pakets'     => Produk::where('kategori_id', '=', 1)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('masterdata.paket.create', [
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
        $validateData['kategori_id'] = 1;

        Produk::create($validateData);
        return redirect('/paket')->with('success', 'Data berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $paket)
    {
        return view('masterdata.paket.show', [
            'title'     => 'Detail Paket',
            'paket' => $paket
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $paket)
    {
        return view('masterdata.paket.edit', [
            'title'     => 'Edit Data',
            'kategori' => Kategori::all(),
            'paket' => $paket
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $paket)
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

        Produk::where('id', $paket->id)->update($validateData);
        return redirect('/paket')->with('success', 'Data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $paket)
    {
        if ($paket->gambar) {
            Storage::delete($paket->gambar);
        }
        Produk::destroy($paket->id);
        return redirect('/paket')->with('success', 'Data berhasil di hapus');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Produk;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cart.index', [
            'title' => "Detail Pesanan",
            'cart'     => Cart::where('user_id', '=', auth()->user()->id)->get(),
            'subtotal' => Cart::where('user_id', '=', auth()->user()->id)->sum('harga')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Produk $produk)
    {
        return view('cart.create', [
            'title' => 'Booking',
            'produk' => $produk
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Produk $produk)
    {
        $data = [
            'produk_id'          => $produk->id,
            'harga'  => $produk->harga,
            'user_id'       => auth()->user()->id,
        ];

        Cart::create($data);
        return redirect('/cart');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */

    public function destroy(Cart $cart)
    {
        Cart::destroy($cart->id);
        return redirect('/cart')->with('success', 'Data berhasil di hapus');
    }
}

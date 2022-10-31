<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\HeaderTransaksi;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function store(Request $request)
    {
        $cart = Cart::all();
        $subtotal = Cart::sum('harga');
        $KodeTransaksi = Transaksi::max('kode_transaksi');
        $urutan = (int) substr($KodeTransaksi, 5, 5);

        $urutan++;
        $huruf = "AR";
        $KodeTransaksi = $huruf . sprintf("%05s", $urutan);

        // dd($cart);
        $validateData = $request->validate([
            'tgl_acara' => 'required',
        ]);
        $dataHeaderTransaksi = [
            'kode_transaksi' => $KodeTransaksi,
            'user_id' => auth()->user()->id,
            'tgl_acara' => $validateData['tgl_acara'],
            'total_pembayaran' => $subtotal,
            'status' => 'pending',
            'read' => 1
        ];
        HeaderTransaksi::create($dataHeaderTransaksi);

        foreach ($cart as $row) {
            $dataTransaksi = [
                'kode_transaksi' => $KodeTransaksi,
                'user_id' => $row->user_id,
                'produk_id' => $row->produk_id,
                'harga' => $row->harga
            ];
            Transaksi::create($dataTransaksi);
        }
        Cart::where('user_id', auth()->user()->id)->firstorfail()->delete();
        return redirect('/cart')->with('success', 'Terima Kasih, Data anda sudah terkirim. Ditunggu informasi lebih lanjut, maksimal 2x24 Jam team kami akan menghubungi anda.');
    }

    public function indexTransaksiUser()
    {
        return view('user.transaksi', [
            'title' => 'Daftar Transaksi',
            'header_transaksi' => HeaderTransaksi::where('user_id', '=', auth()->user()->id)->get()
        ]);
    }
    public function detailTransaksiUser($kode_transaksi)
    {
        $header_transaksi = HeaderTransaksi::where('kode_transaksi', '=', $kode_transaksi)->get();
        $transaksi = Transaksi::where('kode_transaksi', '=', $kode_transaksi)->get();
        $subtotal = Transaksi::where('kode_transaksi', '=', $kode_transaksi)->sum('harga');
        return view('user.detail_transaksi', [
            'title'     => 'Detail Transaksi',
            'header_transaksi' => $header_transaksi,
            'transaksi' => $transaksi,
            'subtotal' => $subtotal
        ]);
    }

    public function indexTransaksiAdmin()
    {
        return view('admin.transaksi', [
            'title' => 'Daftar Transaksi',
            'header_transaksi' => HeaderTransaksi::orderBy('read')->get()
        ]);
    }

    public function detailTransaksi($kode_transaksi)
    {
        $header_transaksi = HeaderTransaksi::where('kode_transaksi', '=', $kode_transaksi)->get();
        $transaksi = Transaksi::where('kode_transaksi', '=', $kode_transaksi)->get();
        $subtotal = Transaksi::where('kode_transaksi', '=', $kode_transaksi)->sum('harga');

        $data = ['read' => 2];
        HeaderTransaksi::where('kode_transaksi', '=', $kode_transaksi)->update($data);

        return view('admin.detail_transaksi', [
            'title'     => 'Detail Transaksi',
            'header_transaksi' => $header_transaksi,
            'transaksi' => $transaksi,
            'subtotal' => $subtotal
        ]);
    }
    public function ubah_status(Request $request, $id)
    {
        $data = HeaderTransaksi::where('id', '=', $id)->get();;
        if ($data[0]->status == 'accept') {
            $dataTransaksi = [
                'status' => 'pending',
            ];
            HeaderTransaksi::where('id', $id)->update($dataTransaksi);
        } else {
            $dataTransaksi = [
                'status' => 'accept',
            ];
            HeaderTransaksi::where('id', $id)->update($dataTransaksi);
        }

        return response()->json($dataTransaksi);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Penjualan;
use App\Models\Pelanggan;
use App\Models\DetailPenjualan;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penjualans = Penjualan::with(['pelanggan', 'detailPenjualan.product'])->get();
        return view('penjualan.index', compact('penjualans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Produk::all();
        return view('penjualan.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:produks,id',
            'customer_name' => 'required',
            'address' => 'required',
            'no_phone' => 'required',
            'total_product' => 'required|integer|min:1',
        ]);

        $produk = Produk::findOrFail($request->product_id);

        $total_price = $produk->price * $request->total_product;

        $pelanggan = Pelanggan::create([
            'customer_name' => $request->customer_name,
            'address' => $request->address,
            'no_phone' => $request->no_phone,
        ]);

        $created_by_user_id = auth()->id();

        $penjualan = Penjualan::create([
            'sale_date' => now(),
            'total_price' => $total_price,
            'pelanggan_id' => $pelanggan->id,
            'created_by_user_id' => $created_by_user_id,
        ]);

        DetailPenjualan::create([
            'penjualan_id' => $penjualan->id,
            'produk_id' => $request->product_id,
            'total_product' => $request->total_product,
            'subtotal' => $total_price,
        ]);

        // Kurangi stok produk
        $produk->stock -= $request->total_product;
        $produk->save();

        return redirect()->route('sales.data')->with('success', 'Transaksi berhasil disimpan.');
    }
        

    /**
     * Display the specified resource.
     */
    public function show(Penjualan $penjualan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penjualan $penjualan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penjualan $penjualan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $penjualans = Penjualan::find($id);
        $penjualans->delete();
        return back()->with("mantap", "History deleted successfully.");
    }

    public function print()
    {
        $penjualans = Penjualan::with(['pelanggan', 'detailPenjualan.product'])->get();
        return view('penjualan.pdf', compact('penjualans'));
    }
}

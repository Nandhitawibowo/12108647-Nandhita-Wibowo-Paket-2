<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $products = Produk::where('product_name', 'like', '%'.$keyword.'%')->get();
        return view('produk.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Produk::all();
        return view('produk.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedProduct = $request->validate([
            'product_name' => 'required',
            'stock' => 'required',
            'price' => 'required',
            'product_img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Pastikan product_img adalah file gambar dengan format yang diizinkan dan maksimum ukuran 2MB
        ]);
    
        $imageName = '';
    
        if ($request->hasFile('product_img')) {
            $image = $request->file('product_img');
            $imageName = 'Product_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);
            $validatedProduct['product_img'] = $imageName;
        }
    
        Produk::create([
            'product_name' => $request->product_name,
            'stock' => $request->stock,
            'price' => $request->price,
            'product_img' => $imageName,
        ]);
    
        return redirect()->route('product.list')->with('success', 'Product created successfully.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $products = Produk::find($id);
        return view('produk.edit', compact('products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedProduct = $request->validate([
            'product_name' => 'required',
            'price' => 'required',
            'product_img' => 'required',
        ]);

        $imageName = ''; 

        if ($request->hasFile('product_img')) {
            $image = $request->file('product_img');
            $imageName = 'Product_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);
        }
        

        Produk::where('id', $id)->update([
            'product_name' => $request->product_name,
            'price' => $request->price,
            'product_img' => $imageName, 
        ]);


        return redirect('/list-product')->with('success', 'Product updated successfully.');
    }

    public function ubah(Request $request, $id)
    {
        $request->validate([
            'stock' => 'required',
        ]);
    

        Produk::where('id', $id)->update([
            'stock' => $request->stock,
        ]);


        return redirect('/list-product')->with('success', 'Stock updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $products = Produk::find($id);
        $products->delete();
        return back()->with("mantap", "Product deleted successfully.");
    }
}

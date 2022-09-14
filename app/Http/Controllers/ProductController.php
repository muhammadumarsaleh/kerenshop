<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\Admin\ProductRequest;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->get();
        return view('pages.admin.product.index', [
            'products'=> $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $request->request->add(['slug' => Str::slug($request->name, '-')]);
        $product = Product::create($request->all());
        if($request->hasFile('picture')){
            $path = $request->file('picture')->store('images');
            $product->picture = $path;
            $product->save(); 
 
            return Redirect::route('product.index')->with('sukses', 'Product berhasil ditambahkan');
        }

        // tampilkan error perintah masukkan gambar
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('pages.admin.product.edit', [
            'item' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $pathpoto = $product->picture;
        if($pathpoto != null || $pathpoto != ''){
            Storage::delete($pathpoto);
        }
        $product->update($request->all());
        $product['slug'] = Str::slug($request->name, '-');
        if($request->hasFile('picture')){
            $path = $request->file('picture')->store('images');
            $product->picture = $path;
            $product->save();
        }

        return redirect::route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $pathpoto = $product->picture;
        if($pathpoto != null || $pathpoto != ''){
            Storage::delete($pathpoto);
        }
        $product->delete();

        return redirect()->route('product.index');
    }
}

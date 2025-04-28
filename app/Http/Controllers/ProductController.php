<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get(); // dengan relasi kategori
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required|exists:categories,id',
            'stok' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'sold_at' => 'required|date',
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required|exists:categories,id',
            'stok' => 'required|integer|min:0',
            'price' => 'required|numeric',
            'sold_at' => 'required|date',
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus.');
    }

    public function chartData()
    {
        $products = Product::select('sold_at', 'price')
            ->orderBy('sold_at', 'asc')
            ->get()
            ->map(function ($product) {
                $product->sold_at = $product->sold_at->format('Y-m-d'); 
                $product->price = (float)$product->price;
                return $product;
            });
    
        return response()->json($products);
    }
    

    
}

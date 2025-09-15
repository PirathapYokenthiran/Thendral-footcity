<?php

namespace App\Http\Controllers;

use App\Models\product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function homeIndex()
    {
        $products = product::all();
        $today = Carbon::now('Asia/Colombo')->locale('ta');
        return view('welcome', compact('products', 'today'));
    }
    public function index()
    {
        $products = product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'unit' => 'nullable',
            'price' => 'required|numeric',
            'old_price' => 'nullable|numeric',
            'limit' => 'nullable|string',
            'category' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $fileName = time().'_'.$request->image->getClientOriginalName();
            $request->image->move(public_path('uploads'), $fileName);
            $data['image'] = $fileName;
        }

        Product::create($data);

        return redirect()->route('products.index')->with('success', 'Product Added Successfully');
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => 'required',
            'unit' => 'nullable',
            'price' => 'required|numeric',
            'old_price' => 'nullable|numeric',
            'limit' => 'nullable|string',
            'category' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $fileName = time().'_'.$request->image->getClientOriginalName();
            $request->image->move(public_path('uploads'), $fileName);
            $data['image'] = $fileName;
        }

        $product->update($data);

        return redirect()->route('products.index')->with('success', 'Product Updated Successfully');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product Deleted Successfully');
    }
}

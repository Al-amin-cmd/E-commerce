<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Color;
//use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $product = Product::all();
        return view('admin.product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        $color=Color::all();
        return view('admin.product.create', compact('category','color'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $imageName = time() . '.' . $request->image->extension();
        // Public Folder
        $request->image->move(public_path('product/'), $imageName);

       

        $data=[
             
            'name'=>$request->name,
            'category_id'=>$request->category_id,
            'weight'=>$request->weight,
             'info' =>$request->info,
            'price' =>$request->price,
             'image' =>$imageName 
            ];
        $product=Product::create($data);
        $product->color()->attach($request->color_id);

        return redirect()->route('product.index')->withMessage('Successfully inserted');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product, $id)
    {
        $product = Product::find($id);

        return view('admin.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product, $id)

    {
        $color=Color::all();
        $category = Category::all();
        $product = Product::find($id);
        return view('admin.product.edit', compact('product', 'category','color'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product, $id)
    {
        $product = Product::find($id);
        $product->name = $request->name;

        $imageName = time() . '.' . $request->image->extension();
        // Public Folder
        $request->image->move(public_path('product/'), $imageName);

        $product->image = $imageName;
        $product->weight = $request->weight;
        $product->info = $request->info;
        $product->price = $request->price;

        $product->category_id = $request->category_id;
        $product->save();
        $product->color()->sync($request->color_id);

        return redirect()->route('product.index')->withMessage('Successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, $id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('product.index')->withMessage('Successfully deleted');
    }
    public function trash()
    {
        $product = Product::onlyTrashed()->get();
        return view('admin.product.trash', compact('product'));
    }

    public function restore($id)
    {
        $product = Product::onlyTrashed()->find($id);
        $product->restore();
        return redirect()
            ->route('product.trash')
            ->withMessage('Successfully restore');
    }

    public function delete($id)
    {
        $product = Product::onlyTrashed()->find($id);
        $product->color()->detach();
        $product->forceDelete();
        
        return redirect()
            ->route('product.trash')
            ->withMessage('Successfully deleted');
    }
}

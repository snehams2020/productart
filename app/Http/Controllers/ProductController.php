<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::with('category')->simplePaginate(10);

        return view('product.index', compact('product', $product));
    }
    public function productCategories()
    {
        $product = Category::with('products')->get();
        return view('product.product-categories', compact('product', $product));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category   =   Category::all();
        return view('product.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
         'title'=>'required',
      ]);
        $product = Product::create([
            'title' => $request->title,
            'description' => $request->description,
            'category_id'=>$request->category_id

        ]);

        return redirect()->back()->with('success', 'product successfully stored.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category   =   Category::all();
        $product    =   Product::findOrFail($id);
        return view('product.edit')->with(['product'=>$product,'category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
         'title'=>'required',
      ]);
        $Product = Product::findOrFail($id);

        $Product->update([
            'title' => $request->title,
            'description' => $request->description,
            'category_id'=>$request->category_id
        ]);

        return redirect()->back()->with('success', 'Category successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::where('category_id',$id)->delete();
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->back()->with('success', 'Category successfully deleted.');
    }
}

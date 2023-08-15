<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderby('id', 'DESC')->with('category','author')->paginate(3);
        $param = [
            'products' => $products,
        ];
        return view('admin.product.index',$param);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        $authors = Author::get();
        $param = [
            'categories' =>  $categories,
            'authors' => $authors
        ];
        return view('admin.product.create',$param);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        try {
            $product = new Product();
            $product->name = $request->name;
            $product->author_id = $request->author_id;
            $product->isbn = $request->isbn;
            $product->category_id = $request->category_id;
            $product->page = $request->page;
            $product->year = $request->year;
            $product->save();
            alert()->success('Thêm sản phẩm thành công');
            return redirect()->route('products.index');
        } catch (\Exception $e) {
            alert()->success('Thêm sản phẩm thất bại');
            return back();
        }
       
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $categories = Category::get();
        $authors = Author::get();
        $product = Product::find($id);
        $param = [
            'product' => $product,
            'categories' =>  $categories,
            'authors' => $authors
        ];
        return view('admin.product.edit',$param);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, String $id)
    {
        try {
            $product = Product::find($id);
            $product->name = $request->name;
            $product->author_id = $request->author_id;
            $product->isbn = $request->isbn;
            $product->category_id = $request->category_id;
            $product->page = $request->page;
            $product->year = $request->year;
            $product->save();
            alert()->success('Sửa sản phẩm thành công');
            return redirect()->route('products.index');
        } catch (\Exception $e) {
            alert()->success('Sửa sản phẩm thất bại');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $product = Product::find($id);
        $product->delete();
        alert()->success('Đã đã xóa thành công!');
        return redirect()->route('products.index');
    }
    function search(Request $request){
        $search = $request->search;
        $products = Product::where('name',$search)
        ->orWhere('name',$search)
        ->orWhere('isbn',$search)
        ->orWhere('page',$search)
        ->orWhere('year',$search)
        ->paginate(3);
        return view('admin.product.search',compact('products'));
    }
}

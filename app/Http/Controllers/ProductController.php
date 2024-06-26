<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    //Show product page
    public function index() {
        $products = Product::orderBy('created_at', 'DESC')->get();
        return view('products.list', [
            'products' => $products
        ]);
    }

    //Show create product page
    public function create() {
        return view('products.create');
    }
    //Store the product in db
    public function store(Request $request) {
        $rules = [
            'name' =>'required|min:3',
            'sku' => 'required|min:3',
            'price' =>'required|numeric',
        ];

        if($request->image != "") {
            $rules["image"] = "image";
        }

        $validator = Validator::make($request -> all(),$rules);

        if($validator -> fails()) {
            return redirect() -> route('products.create')->withInput()->withErrors($validator);
        }

        //Will insert the product into db
        $product = new Product();
        $product->name = $request -> name;
        $product->sku = $request -> sku;
        $product->price = $request -> price;
        $product->description = $request -> description;
        $product->save();

        if($request->image != "") {
            //Will store image
            $image = $request -> image;
            $ext = $image->getClientOriginalExtension();
            $imageName = time().'.'.$ext; //Unique name
    
            //Save image into products directory
    
            $image->move(public_path('uploads/products'), $imageName);
    
            //Save image name into database
            $product->image = $imageName;
            $product->save();
        }      

        return redirect() -> route('products.index')->with('success', 'Product added succesfully!');
    }

    //Show edit product page
    public function edit($id) {
        $product = Product::findOrFail($id);
        return view('products.edit', [
            'product' => $product
        ]);
    }

    //Update the product in db
    public function update($id, Request $request) {
        $product = Product::findOrFail($id);

        $rules = [
            'name' =>'required|min:3',
            'sku' => 'required|min:3',
            'price' =>'required|numeric',
        ];

        if($request->image != "") {
            $rules["image"] = "image";
        }

        $validator = Validator::make($request -> all(),$rules);

        if($validator -> fails()) {
            return redirect() -> route('products.edit', $product->$id)->withInput()->withErrors($validator);
        }

        //Will update the product
        $product->name = $request -> name;
        $product->sku = $request -> sku;
        $product->price = $request -> price;
        $product->description = $request -> description;
        $product->save();

        if($request->image != "") {
            //Delete old image
            File::delete(public_path("uploads/products/".$product->image));

            //Will store image
            $image = $request -> image;
            $ext = $image->getClientOriginalExtension();
            $imageName = time().'.'.$ext; //Unique name
    
            //Store image into products directory
    
            $image->move(public_path('uploads/products'), $imageName);
    
            //Save image name into database
            $product->image = $imageName;
            $product->save();
        }      

        return redirect() -> route('products.index')->with('success', 'Product update succesfully!');
    }

    //Delete the product from db
    public function delete($id) {
        $product = Product::findOrFail($id);

        //Delete image
        File::delete(public_path("uploads/products/".$product->image));

        //Delete product from database
        $product->delete();

        return redirect() -> route('products.index')->with('success', 'Product deleted succesfully!');

    }
};

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    //Show product page
    public function index() {

    }

    //Show create product page
    public function create() {
        return view('products.create');
    }
    //Store the product in db
    public function store(Request $request) {
        $rules = [
            'name' =>'required|min:5',
            'sku' => 'required|min:3',
            'price' =>'required|numeric',
        ];
        $validator = Validator::make($request -> all(),$rules);
        if($validator -> fails()) {
            return redirect() -> route('products.create')->withInput()->withErrors($validator);
        }

        //Will insert the product into db
    }

    //Show edit product page
    public function edit() {

    }

    //Update the product in db
    public function update() {

    }

    //Delete the product from db
    public function delete() {

    }
};

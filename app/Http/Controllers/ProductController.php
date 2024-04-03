<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
    public function store() {

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

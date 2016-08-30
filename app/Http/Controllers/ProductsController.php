<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ProductsController extends Controller
{
    public function index($category = "", $category2 = "", $category3 = "")
	{
		if($category2) $category .= ','.$category2;
		if($category3) $category .= ','.$category3;
		

		return view('products.index')->with(compact('category'));
	}

	public function show($category = "",$category2 = "",$category3 = "", $codigo)
	{
    	//dd($category);
    	$category = $category.','.$category2.','.$category3;

    	return view('products.show')->with(compact('codigo','category'));
	}
}

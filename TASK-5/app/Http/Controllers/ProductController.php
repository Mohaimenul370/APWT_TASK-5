<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;


class ProductController extends Controller
{
    public function list()
    {
        return view('pages.products2')->with('products',Product::all());
    }

    public function store(Request $request)
    {
        $validator = Validator::make([], []);

        $request->validate([
            'name' => 'required|min:2|max:100',
            'code' => 'required|min:3|max:6',
            'description' => 'required|min:3|max:10',
            'price' => 'required|min:1|max:10000',
            
        ]);


        $p = new Product();
        $p->p_name = $request->name;
        $p->p_code = $request->code;
        $p->p_desc = $request->description;
        $p->p_category = $request->category;
        $p->p_price = $request->price;
        $p->p_quantity = $request->quantity;
        $p->p_stock_date = $request->stock_date;
        $p->p_rating = $request->rating;
        // $p->p_name = $request->name;
        // $p->p_name = $request->name;
        // $p->p_name = $request->name;
       //$p->save();

        if($p->save()) {
            return redirect()->route('product.add')->withSuccess(['Product Successfully added']);
        }
    }



    public function update(Request $request)
    {

        $validator = Validator::make([], []);

        $request->validate([
            'name' => 'required|min:2|max:100',
            'code' => 'required|min:3|max:6',
            'description' => 'required|min:3|max:10',
            'price' => 'required|min:1|max:10000',
            
        ]);

        $p = Product::find($request->id);
        
        $p->p_name = $request->name;

 
        $p->p_code = $request->code;
        $p->p_desc = $request->description;
        $p->p_category = $request->category;
        $p->p_price = $request->price;
        $p->p_quantity = $request->quantity;
        $p->p_stock_date = $request->stock_date;
        $p->p_rating = $request->rating;
        // $p->p_name = $request->name;
        // $p->p_name = $request->name;
      
        //$p->p_name = 'tt';
       $p->save();

       return redirect()->route('product.list');

        
    }

    public function view(Request $request)
    {
        $var = Product::where('id', $request->id)->first();


        return view('pages.product-details')->with('product', $var);
    }

    public function edit(Request $request)
    {
        $var = Product::where('id', $request->id)->first();


        return view('pages.product-edit')->with('product', $var);
    }

    public function delete(Request $request)
    {
        $var = Product::where('id', $request->id)->first();
        $var->delete();
        return redirect()->back();
    }
}

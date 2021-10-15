<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Redirect;
use Exception;
use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['product'] = Product::where('soft_delete',0)->get();
        return view('listing',$data);
    }

    public function product_response()
    {
        //echo 'here';exit;
        $product = Product::where('soft_delete',0)->get();
        return response()->json($product);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create_product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //print_r($request->all());
        try {
            $valid = [];
                
            $valid = [
                'title'=>'required',
                'description'=>'required',
                'price'=>'required'
            ];

            $validator = Validator::make($request->all(),$valid,
            [
                'required'  => 'The :attribute field is required.'
            ]);

           // echo 'her';exit;
            if($validator->fails()) 
                return Redirect::back()->withErrors($validator)->withInput();

            $product = new Product();
            $product->title = $request->title;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->save();
            return redirect('product/');
        } catch(Exception $ex)
        {
            echo $ex->getMessage();exit;
           //DB::rollBack();
           $request->session()->flash('alert-danger', 'There was an Issue. Please try again !');
           return redirect('product/create');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('edit_product', [
            'product'=>$product
          ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */

    public function update_product($id,Request $request)
    {
        // echo $id;
        // print_r($request->all());exit;
        try {
            $valid = [];
                
            $valid = [
                'title'=>'required',
                'description'=>'required',
                'price'=>'required'
            ];

            $validator = Validator::make($request->all(),$valid,
            [
                'required'  => 'The :attribute field is required.'
            ]);

           // echo 'her';exit;
            if($validator->fails()) 
                return Redirect::back()->withErrors($validator)->withInput();

            $product = Product::find($id);
            $product->title = $request->title;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->soft_delete = isset($request->soft_delete) && $request->soft_delete == 'on'?1:0;
            $product->save();
            return redirect('product/');
        } catch(Exception $ex)
        {
            echo $ex->getMessage();exit;
           //DB::rollBack();
           $request->session()->flash('alert-danger', 'There was an Issue. Please try again !');
           return redirect('product/create');
        }
    }


    public function update(Request $request, Product $product)
    {
    }


    public function delete($id)
    {
        $product = Product::where('id',$id)->update(['soft_delete'=>1]);
        return redirect('product');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}

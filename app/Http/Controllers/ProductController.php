<?php

namespace App\Http\Controllers;

use App\Models\CategoryProduct;
use App\Models\product;
use Illuminate\Http\Request;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $data=product::all();
        $data=Product::with(['allcategory' , 'category'])->get();
        //dd($data);
        return view('product.index', compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cdata=category::all(['id','name']);
        return view('product.create',compact('cdata'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
        $request->validate([
            'product_name'=>"required|min:3|max:50",
            'product_price'=>"required",
            'batch_number'=>"required",
            'discount'=>"required",
            
            
        ]);
        // dd($request->photo->getClientOriginalName);

        if($request->photo){
$fileName =  time() . '.'. $request->photo->getClientOriginalName();

         $request->photo->move(public_path('photo'), $fileName);
        };

        $info=[
            'product_name'=>$request->product_name,
            'product_price'=>$request->product_price,
            'batch_number'=>$request->batch_number,
            'discount'=>$request->discount,
            'photo'=>$fileName??""
        ];
        $obj=product::create($info);
        if(count($request->category_id)>0){
            foreach($request->category_id as $cid){
                $cpinfo=[
                    'category_id'=>$cid,
                    'product_id'=>$obj->id
                ];
                CategoryProduct::create($cpinfo);
            }
        }
        return redirect ('/product')->with('grt','Data Saved Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        //
        $product->delete();
        return redirect('/product')->with('err','Data Deleted');
    }
}

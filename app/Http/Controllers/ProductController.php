<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


// use GuzzleHttp\Psr7\Request;

class ProductController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_all_products()
    {
        $products = Product::get();
        return response()->json(['success'=>1,'data'=>$products], 200,[],JSON_NUMERIC_CHECK);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function save_products(Request $request)
    {
        $rules = array(
            'companyId' => 'required',
            'productName' => 'required',
        );
        $messages= array(
            'companyId' => 'company_id is Required',
            'productName' => 'product_name is Required',
        );

        $validator = Validator::make($request->all(),$rules,$messages );

        if($validator->fails()){
            return $this->errorResponse('test',422);
        }

        DB::beginTransaction();
        try {
            $product = new Product();
            $product->company_id = $request->input('companyId');
            $product->product_name = $request->input('productName');
            $product->Description = $request->input('description');
            $product->save();
            DB::commit();
            return $this->successResponse($product);
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->errorResponse($e);
        }

        // return response()->json(['success'=>1,'data'=>$product], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        //
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
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
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

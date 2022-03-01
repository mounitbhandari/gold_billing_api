<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


// use GuzzleHttp\Psr7\Request;

class ProductController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function get_all_products()
    {
        $products = Product::get();
        return $this->successResponse(ProductResource::collection($products));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return JsonResponse
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
            $product->description = $request->input('description');
            $product->in_force = true;
            $product->save();
            DB::commit();
            return $this->successResponse(new ProductResource($product));
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->errorResponse($e);
        }

        // return response()->json(['success'=>1,'data'=>$product], 200,[],JSON_NUMERIC_CHECK);
    }

}

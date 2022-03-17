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
    public function save_products(Request $request): JsonResponse
    {
        $companyId = $request->input('companyId');
        $rules = array(
            'companyId' => 'required|exists:companies,id',
            'productName' => 'required | unique:products,product_name,NULL,id,company_id,'.$companyId,
            'description' => 'max:255',
        );
        $messages= array(
            'companyId.required' => 'Company Id is Required',
            'companyId.exists' => 'Company Does not exists',
            'productName.required' => 'Product Name is Required',
            'description.max' => 'Should be within 255',
        );

        $validator = Validator::make($request->all(),$rules,$messages );

        if($validator->fails()){
            return $this->errorResponse($validator->getMessageBag(),422);
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
            // return $this->successResponse($product);
            return $this->successResponse(new ProductResource($product));
        } catch (\Exception $e) {
            DB::rollBack();
            if(in_array(1062,$e->errorInfo)){
                return $this->errorResponse($e,409);
            }
            return $this->errorResponse($e);
        }

        // return response()->json(['success'=>1,'data'=>$product], 200,[],JSON_NUMERIC_CHECK);
    }

}

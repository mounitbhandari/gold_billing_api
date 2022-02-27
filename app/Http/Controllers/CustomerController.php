<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends ApiController
{
    function saveCustomer(Request $request){
//        return $this->successResponse($request->input('companyId'));
        DB::beginTransaction();
        try {
            $customer = new Customer();

            $customer->company_id = $request->input('companyId');
            $customer->customer_name = $request->input('customerName');
            $customer->mailing_name = $request->input('mailingName');
            $customer->mobile1 = $request->input('mobile1');
            $customer->mobile2 = $request->input('mobile2');
            $customer->address = $request->input('address');
            $customer->opening_gold = $request->input('openingGold');
            $customer->opening_lc = $request->input('openingLc');
            $customer->save();
            DB::commit();
            return $this->successResponse($customer);
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->errorResponse($e);
        }

    }
    public function delete($id)
    {
        $customer = Customer::findOrFail($id)($id);
        $result = $customer->delete();
        return $this->successResponse($customer,'Deleted');
    }
}

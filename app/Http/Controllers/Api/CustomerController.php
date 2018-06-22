<?php

namespace App\Http\Controllers\Api;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return response()->json([
            'message' => 'Customer deleted.'
        ]);
    }
    
    /**
     * Restore the specified resource from storage.
     *
     * @param int $customerId
     * @return \Illuminate\Http\Response
     */
    public function restore($customerId)
    {
        Customer::whereId($customerId)->withTrashed()->restore();

        return response()->json([
            'message' => 'Customer restored.'
        ]);
    }
}

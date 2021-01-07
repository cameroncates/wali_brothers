<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Services\CustomerService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class CustomerController extends Controller
{
    
    protected $customerService;

    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }


    public function store(Request $request)
    {        
        $data = [
            'first_name' => $request->input("first_name"),
            'last_name' => $request->input("last_name"),
            'shop_name' => $request->input("shop_name"),
            'address' => $request->input("address"),
            'town_name' => $request->input("town_name"),
            'locality_name' => $request->input("locality_name"),
            'cnic' => $request->input("cnic"),
            'cnic_encrypted' => Crypt::encryptString($request->input("cnic")),
            'phone_number' => $request->input("phone_number"),
            'mobile_number' => $request->input("mobile_number"),
        ];
        
        $result = $this->customerService->createNewCustomer($data);

        return $result;

    }


}

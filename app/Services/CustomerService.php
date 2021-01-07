<?php

namespace App\Services;

use App\Models\Customer;
use App\Repositories\CustomerRepository;
use Illuminate\Support\Facades\Validator;

class CustomerService 
{
    protected $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function createNewCustomer($data)
    {
        $result = ['status' => 200];

        $validator = Validator::make($data, [
            'first_name' => ['required', 'string', 'min:3', 'max:255'],
            'last_name' => ['nullable', 'string', 'min:3', 'max:255'],
            'shop_name' => ['required', 'string', 'min:3', 'max:255'],
            'address' => ['required', 'string', 'min:3', 'max:255'],
            'town_name' => ['required', 'string', 'min:3', 'max:255'],
            'locality_name' => ['required', 'string', 'min:3', 'max:255'],
            'cnic' => ['required', 'integer', 'digits:13'],
            // 'cnic' => ['unique:customers'],
            'phone_number' => ['required', 'digits:11'],
            'mobile_number' => ['required', 'digits:11'],
            
        ]);

        if ($validator->fails()) {
            $result = [
                'status' => 500,
                'message' => $validator->errors()->first()
            ];
            return $result;

        } else if (Customer::getByCnic($data['cnic'])) {

            $result = [
                'status' => 500,
                'message' => "Cnic is already registerd"
            ];
            return $result;

        }


        $result = $this->customerRepository->save($data);

        return $result;

    }
 
 
}
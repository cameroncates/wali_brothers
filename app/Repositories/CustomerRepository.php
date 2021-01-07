<?php

namespace App\Repositories;

use App\Models\Customer;

class CustomerRepository 
{
    protected $customer;

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    public function save($data)
    {
        $customer = new $this->customer;


        $customer->first_name = $data['first_name'];
        $customer->last_name = $data['last_name'];
        $customer->shop_name = $data['shop_name'];
        $customer->address = $data['address'];
        $customer->town_name = $data['town_name'];
        $customer->locality_name = $data['locality_name'];
        $customer->cnic = $data['cnic_encrypted'];
        $customer->mobile_number = $data['mobile_number'];
        $customer->phone_number = $data['phone_number'];

        $customer->save();        

        $customer = $customer->fresh();

        return [
            'status' => 200,
            'message' => 'Customer Account Created Successfully',
            'data' => $customer
        ];        
    }


}
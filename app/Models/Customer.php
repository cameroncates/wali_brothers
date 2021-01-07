<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class Customer extends Model
{
    public static function getByCnic($cnic)
    {
        $customers = Customer::all();

        foreach ($customers as $customer) {

            $customer['cnic'] = Crypt::decryptString($customer['cnic']);

            if ($customer['cnic'] == $cnic) {
                return $customer;
            }
        }
        
        return false;
        
    }
}

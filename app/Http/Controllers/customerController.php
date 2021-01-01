<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class customerController extends Controller
{
    public function store(Request $request){


        $customer = new Customer;
        $customer->name ="Asif";
        $customer->email ="Asif@gmail.com";
        $customer->phone ="034525686252";

        $customer->save();

        print_r($customer->all());
       

    }
}

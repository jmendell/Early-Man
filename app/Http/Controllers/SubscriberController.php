<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Newsletter;

class SubscriberController extends Controller
{
    public static function store ($email) {
    
    	 Newsletter::subscribeOrUpdate($email);
    
    }
}

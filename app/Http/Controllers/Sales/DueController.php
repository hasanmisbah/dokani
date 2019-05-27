<?php

namespace App\Http\Controllers\Sales;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DueController extends Controller
{
    public function index(){
        return view('sales.due');
    }
}

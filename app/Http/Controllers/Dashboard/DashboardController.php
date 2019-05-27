<?php

namespace App\Http\Controllers\Dashboard;

use App\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        $table = DB::table('customer')->get();
        $table = Customer::all();
        return view('deshboard.dashbord')->with(['table' => $table]);
    }
}

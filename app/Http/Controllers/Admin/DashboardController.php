<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use App\Order;

class DashboardController extends Controller
{
    public function index()
    {
    	$tu = User::all()->count();
    	$to = Order::all()->count();

    	return view('admin.dashboard.index')->with(compact('tu','to'));
    }
}

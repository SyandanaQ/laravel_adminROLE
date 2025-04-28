<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalStock = Product::sum('stok');
        $totalUsers = User::count();

        return view('dashboard.index', compact('totalStock', 'totalUsers'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Mendapatkan data user dari database
        $users = User::all();
        return view('admin.index', compact('users'));
    }
}

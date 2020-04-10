<?php

namespace App\Http\Controllers;

use App\Invoice;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function customer(Invoice $invoice)
    {
        $role = Role::all();

        return view('homeCustomer', compact('invoice', 'role'));
    }
}


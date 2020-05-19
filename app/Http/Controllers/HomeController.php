<?php

namespace App\Http\Controllers;

use App\Invoice;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Contracts\Support\Renderable;
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
     * @param Invoice $invoice
     * @return Renderable
     */
    public function index(Invoice $invoice)
    {
        return view('home', compact('invoice'));
    }

    public function customer(Invoice $invoice)
    {
        $role = Role::all();

        return view('homeCustomer', compact('invoice', 'role'));
    }
}


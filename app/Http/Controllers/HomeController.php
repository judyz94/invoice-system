<?php

namespace App\Http\Controllers;

use App\Invoice;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Invoice $invoice)
    {
        $role = Role::all();

        return view('home', compact( 'invoice', 'role'));
    }

    public function customer(Invoice $invoice)
    {
        $role = Role::all();

        return view('homeCustomer', compact( 'invoice', 'role'));
    }
}


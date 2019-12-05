<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Product;

class AutocompleteController extends Controller
{
    function index()
    {
        return view('autocomplete');
    }
}

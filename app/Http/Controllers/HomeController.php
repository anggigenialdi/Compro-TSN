<?php

namespace App\Http\Controllers;

use App\Models\OurPrograms;
use App\Models\Partners;
use App\Models\Product;
use App\Models\User;
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
        $users = User::count();
        $products = Product::count();
        $partners = Partners::count();
        $programs = OurPrograms::count();

        $widget = [
            'users' => $users,
            'products' => $products,
            'partners' => $partners,
            'programs' => $programs,
        ];

        return view('home', compact('widget'));
    }
}

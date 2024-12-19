<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PageController extends Controller
{

    public function __construct()
    {
        $company = Company::first();
        $categories = Category::orderBy('position','asc')->get();
        View::share([
            'company' => $company,
            'categories' => $categories,
        ]);
    }

    public function home()
    {
        return view('frontend.home');
    }
}

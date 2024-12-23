<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\CompanyResource;
use App\Models\Category;
use App\Models\Company;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function categories()
    {
        $categories = Category::orderBy('position', 'asc')->get();
        return CategoryResource::collection($categories);
    }

    public function company()
    {
        $company = Company::first();
        return new CompanyResource($company);
    }
}

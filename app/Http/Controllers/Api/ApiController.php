<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\CompanyResource;
use App\Http\Resources\PostResource;
use App\Models\Category;
use App\Models\Company;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class ApiController extends Controller
{
    public function categories()
    {
        $categories = Category::orderBy('position', 'asc')->get();
        return CategoryResource::collection($categories);
    }

    public function trending_posts()
    {
        $trending_posts =  Post::orderBy('views', 'desc')->where('status', 'approved')->take(8)->get();
        return PostResource::collection($trending_posts);
    }


    public function category($slug)
    {
        $category = Category::where('slug', $slug)->first();
        return new CategoryResource($category);
    }

    public function company()
    {
        $company = Company::first();
        return new CompanyResource($company);
    }


    public function create_category(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nep_title' => 'required',
            'eng_title' => 'required',
        ]);


        if ($validator->fails()) {
            return response()->json([
                "status" => false,
                "message" => $validator->errors(),
            ]); 
        }

        $totalCategory = Category::count();

        $category = new Category();
        $category->nep_title = $request->nep_title;
        $category->eng_title = $request->eng_title;
        $category->slug = Str::slug($request->eng_title);
        $category->position = $totalCategory + 1;

        $category->save();

        return response()->json([
            "status" => true,
            "message" => "Category created successfully",
        ]);
    }
}

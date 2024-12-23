<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Advertise;
use App\Models\Category;
use App\Models\Company;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\View;
use Spatie\LaravelPdf\Facades\Pdf;

class PageController extends Controller
{

    public function __construct()
    {
        $company = Company::first();
        $categories = Category::orderBy('position', 'asc')->get();
        View::share([
            'company' => $company,
            'categories' => $categories,
        ]);
    }

    public function home()
    {
        $latest_post = Post::orderBy('id', 'desc')->where('status', 'approved')->first();
        $trending_posts = Post::orderBy('views', 'desc')->where('status', 'approved')->take(8)->get();
        return view('frontend.home', compact('latest_post', 'trending_posts'));
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $posts = $category->posts()->paginate(10);
        $advertises = Advertise::where('expire_date', '>=', date('Y-m-d'))->get();
        return view('frontend.category', compact('posts', 'advertises'));
    }

    public function news($id)
    {
        $news = Post::find($id);

        $cookie = Cookie::get("post$id");

        // check if there is cookie or not or cookie is equal to id
        if (!$cookie || $cookie != $id) {
            $news->increment('views');
            Cookie::queue(Cookie::make("post$id", $id, 0));
        }

        $advertises = Advertise::where('expire_date', '>=', date('Y-m-d'))->get();
        return view('frontend.news', compact('news', 'advertises'));
    }

    public function generatePdf($id)
    {
        $post = Post::find($id);
        return Pdf::view('pdf', compact('post'));
    }
}

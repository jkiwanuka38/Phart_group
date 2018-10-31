<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Slide;
use App\Project;
use Illuminate\Support\Facades\Mail;
use App\Mail\contactMessage;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('featured', true)->take(6)->inRandomOrder()->get();
        $slides = Slide::all();
        $categories = Category::all();

        return view('landing_page')->with([
          'products'=>$products,
          'slides'=>$slides,
          'categories'=>$categories,
        ]);
    }

    public function about()
    {
       return view('about');
    }

    public function gallery()
    {
      $projects = Project::all();
       return view('gallery')->with('projects', $projects);
    }

    public function contact()
    {
       return view('contact');
    }

    /**
     * Send a message.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sendMessage(Request $request)
    {
       Mail::send(new contactMessage($request));
       return back()->with(['message'=>'Your message has been sent','alert-type'=>'success']);
    }
}

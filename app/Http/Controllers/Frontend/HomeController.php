<?php

namespace App\Http\Controllers\Frontend;

use App\Brand;
use App\Business;
use App\Categories;
use App\Enquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Page;
use App\Product;
use Cache;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function ContactUsPage()
    {
        # code...
        $data['title'] = 'Contact Us';
        return view('frontend.contact-us', $data);
    }

    // Submit Contact Us Page
    public function submitContactUsPage(Request $request)
    {
        # code...

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);
        
        try {
            //code...
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->email,
                'subject' => $request->subject,
                'message' => $request->message,
            ];
   
            $enquiry = Enquiry::create($data);
            if($enquiry)
            return redirect()->back()->with('msg', 'You message received successfully.');

        } catch (\Throwable $th) {
            throw $th;
            return redirect()->back()->with('msg', 'error to send message. please try again.');
        }
        
        
    }

    // Single Page
    public function SinglePage($slug)
    {
        # code...
        $page = Page::where('slug', $slug)->first();
        if(empty($page)) {
            return view('errors.404'); 
        }
        $data['title'] = $page->name;
        $data['page'] = $page;
        return view('frontend.page', $data);
    }
 
}
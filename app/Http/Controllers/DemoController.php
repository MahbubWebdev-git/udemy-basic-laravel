<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DemoController extends Controller
{
    // Return an about page if view exists, otherwise a simple response
    public function about()
    {
        if (view()->exists('about')) {
            return view('about');
        }

        return response('About page placeholder', 200);
    }

    // Return a contact page if view exists, otherwise a simple response
    public function ContactMethode()
    {
        if (view()->exists('contact')) {
            return view('contact');
        }

        return response('Contact page placeholder', 200);
    }
}

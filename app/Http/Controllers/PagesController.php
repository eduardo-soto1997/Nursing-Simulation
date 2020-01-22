<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class PagesController extends Controller
{
    public function home()
    {
            return view('welcome', [
                'foo' => 'bar'
            ]);
    }

    public function about()
    {
            return view('about');
    }



    public function contact()
    {
            return view('contact');
    }

}

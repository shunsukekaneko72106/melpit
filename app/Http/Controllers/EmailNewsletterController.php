<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmailNewsletterController extends Controller
{
    public function sendEmailNewsletterForm()
    {
        return view('email-newsletter');
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SendVoiceDataController extends Controller
{
    public function sendVoiceDataForm()
    {
        return view('call-management');
    }
}

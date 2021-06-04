<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    /**
     * LanguageController constructor.
     */

    public function index(Request $request)
    {
        if (!Session::has('locale')) {
            Session::put('locale', $request->input('locale'));
        } else {
            Session::put('locale', $request->input('locale'));
        }
        return redirect()->back();
    }
}

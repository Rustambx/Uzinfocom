<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index ()
    {
        $this->view('dashboard');

        return $this->render();
    }

    public function changeLocal ($locale)
    {
        session(['locale' => $locale]);
        \App::setLocale($locale);
        return redirect()->back();
    }
}

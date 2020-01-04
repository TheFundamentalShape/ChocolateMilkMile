<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

class ManagementPageController extends Controller
{
    public function __construct()
    {
        $this->middleware('manager');
    }

    public function index()
    {
        return view('admin.home', [
            'events' => Event::all()
        ]);
    }

    public function registrants()
    {
        return view('admin.registrants', [
            'events' => Event::all()
        ]);
    }
}

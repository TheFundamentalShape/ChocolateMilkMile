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
            'events' => Event::all(),
            'totalRevenue' => 400 // call for total stripe balance from API... later lol.
        ]);
    }

    public function checkin()
    {
        return view('admin.checkin', [
            'events' => Event::all()
        ]);
    }
}

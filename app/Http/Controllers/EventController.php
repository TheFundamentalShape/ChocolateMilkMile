<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EventController extends Controller
{
    public function __construct()
    {
        return $this->middleware('manager');
    }

    public function create()
    {
        return view('admin.create-event');
    }

    public function post(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'fee' => 'required|integer',
            'location' => 'required|string',
            'date' => 'required'
        ]);

        Event::create([
            'title' => $request->title,
            'fee' => $request->fee,
            'location' => $request->location,
            'date' => Carbon::parse($request->date)
        ]);

        return redirect('/manager');
    }
}

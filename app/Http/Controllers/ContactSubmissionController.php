<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactSubmission;

class ContactSubmissionController extends Controller
{
    public function index(){
        return view('admin.support', [
            'supportRequests' => ContactSubmission::all()
        ]);
    }

    public function create() {
        return view('contact');
    }

    public function post(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        ContactSubmission::create($request->all());

        return back()->with('success', 'Your submission has been received! We will get back to you as soon as possible!');
    }

    public function delete(ContactSubmission $contactSubmission){
        $contactSubmission->delete();
        return back();
    }
}

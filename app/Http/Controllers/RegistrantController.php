<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Registration;

class RegistrantController extends Controller
{
    public function __construct()
    {
        return $this->middleware('manager');
    }

    public function index()
    {
        return view('admin.registrants', [
            'registrants' => Registration::confirmed()
        ]);
    }
}

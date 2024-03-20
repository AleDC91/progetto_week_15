<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    public function index()
    {
        if(Gate::allows('isAdmin')){

            return view('admin.admin', [
                'courses' => Course::all(),
                'users' => User::all()    
            ]);
        } 
        abort(403, "You're not admin");
    }
}

<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\BloodGroups;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $bloods= BloodGroups::all();
        return view("frontend.app.home",compact('bloods'));
    }
}

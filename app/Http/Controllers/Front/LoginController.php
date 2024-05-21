<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\BloodGroups;
use App\Models\DonateRecords;
use App\Models\Donors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
//    public function index()
//    {
//
//        return view('backend.auth.login');
//    }

    public function profile()
    {
        $bloods = BloodGroups::all();
        $donates = DonateRecords::where('user_id',auth()->user()->id)->orderBy('donate_date','desc')->get();
        $donor = Donors::where("user_id", auth()->user()->id)->first();
        return view('frontend.app.profile', compact('bloods', 'donor','donates'));
    }
    public function update_donor_date(Request $request)
    {
        $donateRecords = new DonateRecords();
        $donateRecords->user_id = auth()->user()->id;
        $donateRecords->donate_date = $request->date;
        $donateRecords->location = $request->loaction;
        if ($donateRecords->save()) {
            $donor = Donors::where("user_id", auth()->user()->id)->first();
            $donor->last_donate_date=$donateRecords->donate_date;
            $donor->save();
            return back()->with("update_date", "Successfully new date saved.");
        }
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], ($request->remember) ? true : false)) {
            return redirect()->intended('home');
        } else {
            throw ValidationException::withMessages([
                "msg" => [trans('auth.failed')],
            ]);
        }
    }
}
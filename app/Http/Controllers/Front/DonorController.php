<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Districts;
use App\Models\BloodGroups;
use App\Models\Donors;
use \App\Models\User;
use Illuminate\Support\Facades\Hash;


class DonorController extends Controller
{
    public function index($group)
    {
        $bloods = BloodGroups::all();
        $bloodGroups = BloodGroups::where('short', $group)->get();
        $donors = [];
        if ($bloodGroups) {
            $id = $bloodGroups[0]->id;
            $donors = Donors::where('blood_group_id', $id)->get();
        }
        return view("frontend.app.donors", compact('bloods', 'group', 'donors'));
    }
    public function donor_search(Request $request)
    {
        $name = $request->name;
        $mobile = $request->mobile;
        $email = $request->email;
        $blood_group_id = $request->blood_group_id;
        $district_id = $request->district_id;
        $area = $request->area;
        $bloods = BloodGroups::all();
        $group = '';
        $bloodGroups = BloodGroups::where('short', $blood_group_id)->get();
        // if($bloodGroups){
        //     $group = $bloodGroups[0]->name;
        // }dd($group);

        $donors = Donors::query()->where('blood_group_id', $blood_group_id);
        if ($district_id) {
            $donors = $donors->where('district_id', $district_id);
        }
        if ($area) {
            $donors = $donors->orWhere('area', 'like', '%' . $area . '%');
        }
        $donors = $donors->get();
        return view("frontend.app.donors", compact('bloods', 'group', 'donors'));
    }
    public function search()
    {

        $bloods = BloodGroups::all();

        $districts = Districts::orderBy("name", "asc")->get();
        return view("frontend.app.search", compact('districts', 'bloods'));
    }
    public function registration()
    {

        $bloods = BloodGroups::all();
        $districts = Districts::orderBy("name", "asc")->get();
        return view("frontend.app.registration", compact('districts', 'bloods'));
    }

    public function be_a_donor(Request $request)
    {
        $bloods = BloodGroups::all();
        $name = $request->name;
        $mobile = $request->mobile;
        $email = $request->email;
        $blood_group_id = $request->blood_group_id;
        $district_id = $request->district_id;
        $area = $request->area;
        $password = explode("@", $email)[0];

        $user = User::create([
            "name" => $name,
            "email" => $email,
            "user_type" => 2,
            "password" => Hash::make($password),
        ]);
        if ($user) {
            $donorId = 1000 + $user->id;
            $donorId = "D" . $donorId;
            $donor = Donors::create([
                "user_id" => $user->id,
                "donor_id" => $donorId,
                "name" => $name,
                "mobile" => $mobile,
                "email" => $email,
                "blood_group_id" => $blood_group_id,
                "district_id" => $district_id,
                "area" => $area
            ]);
            if ($donor) {
                auth()->login($user);
                return redirect("home");
            }
            else{
                back()->with("msg","Registration Failed!!!");
            }
        }
    }
}
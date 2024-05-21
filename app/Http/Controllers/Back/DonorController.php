<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DonateRecords;
use App\Models\ProfileModels;

class DonorController extends Controller
{

    public function donateHistoryPage(){
        //dd(auth()->user()->id);
        return view('backend.app.donate_history');
    }

    public function donateHistoryData(Request $request)
    {
        $columns = array(
            0 => 'id',
            1 => 'donate_date',
            2 => 'location'
        );

        $totalData = DonateRecords::query()
            ->where([
                "user_id"=>auth()->user()->id
            ])
            ->count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $posts = DonateRecords::query()
                ->where("user_id",auth()->user()->id)
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
        } else {
            $search = $request->input('search.value');

            $posts = DonateRecords::query()
                ->where("user_id",auth()->user()->id)
                ->where('location', 'LIKE', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = count($posts);
        }

        $data = array();
        if (!empty($posts)) {
            foreach ($posts as $key=>$post) {
                $nestedData = array();

                $nestedData[] = ($key+1);
                $nestedData[] = $post->donate_date;
                $nestedData[] = $post->location;
                $nestedData[] = '<div class="btn-group align-middle">'.
                    '<button  id=' .$post->id.  ' class="deleteData btn btn-danger btn-sm badge">'.
                    '<span class="ft-delete"></span> Del</button>' .
                    '</div>';
                $data[] = $nestedData;
            }
        }

        $json_data = [
            "draw" => intval($request->input('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data
        ];

        echo json_encode($json_data);
    }
    public function account(){
        return view('backend.app.donor_panel.account');
    }
    public function update(){
        $ProfileModels = new ProfileModels();
        $ProfileModels = update();
    } 
 
}

<?php

namespace App\Http\Controllers;

use App\Notification;
use App\Project;
use Illuminate\Http\Request;
use App\User;

class NotificatinController extends Controller
{
    public function notification(){
        return view('notification_tab.notification');
    }



    public function notifications(Request $request){
        $columns = array(
            5 => 'id',
            0 =>'project_name',
            1=> 'project_id',
            2=> 'option_id',
            3=> 'option_name',
            4=> 'uploaded_at',
            6 => 'file_url',

        );
        $totalData = Notification::count();
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        if(empty($request->input('search.value')))
        {
            $users = Notification::offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();

        }
        else {
            $search = $request->input('search.value');

            $users =  Notification::where('project_name','LIKE',"%{$search}%")
                ->orWhere('option_name', 'LIKE',"%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();

            $totalFiltered = count($users);
        }

        $data = array();
        if(!empty($users))
        {
            foreach ($users as $item)
            {
                $nestedData['id'] = $item->id;
                $nestedData['file_name'] = $item->project_name;
                $nestedData['project_name'] = Project::where('project_id', $item->project_id)->first()->project_name;
                $nestedData['option_name'] = $item->option_name;
                $nestedData['date'] = $item->uploaded_at;
                $nestedData['file_url'] = $item->file_url;
                $data[] = $nestedData;

            }
        }

        $json_data = array(
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data
        );

        return response()->json($json_data, 200);

    }


    public function remove(Request $request){
        $response = array('code'=>-1, 'message'=>'');
        $nID = $request->id;
        Notification::where('id', $nID)->delete();
        $response['code'] = 0;
        $response['message'] = 'success';
        return response()->json($response, 200);
    }



}

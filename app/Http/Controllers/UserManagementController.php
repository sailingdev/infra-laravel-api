<?php

namespace App\Http\Controllers;

use App\Project;
use App\ProjectPermission;
use App\User;
use Illuminate\Http\Request;
use DB;

class UserManagementController extends Controller
{
    public function users(Request $request){
        return view('users_tab.users');
    }



    public function getusers(Request $request){
        $columns = array(
            5 => 'id',
            0 =>'name',
            1=> 'user_name',
            2=> 'email',
            3=> 'company',
            4=> 'isActived',

        );
        $totalData = User::where('user_type', 1)->count();
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        if(empty($request->input('search.value')))
        {
            $users = User::offset($start)
                ->where('user_type', 1)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();

        }
        else {
            $search = $request->input('search.value');

            $users =  User::where('user_type', 1)
                ->where('name','LIKE',"%{$search}%")
                ->orWhere('user_name', 'LIKE',"%{$search}%")
                ->orWhere('email', 'LIKE',"%{$search}%")
               // ->orWhere('company', 'LIKE',"%{$search}%")
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
                $nestedData['user_id'] = $item->id;
                $nestedData['name'] = $item->name;
                $nestedData['username'] = $item->user_name;
                $nestedData['email'] = $item->email;
                $nestedData['company'] = $item->company;
                $nestedData['isActived'] = $item->isActived;
                $nestedData['time'] = $item->time;
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



    function isActive(Request $request){
        $response = array('code'=>-1, 'message'=>'');
        $userid = $request->id;

        $user = User::where('id', $userid);

        if ($user->first()->isActived > 0){
           $user->update([
               'isActived' => DB::raw('isActived - 1'),
           ]);
        }else{
            $user->update([
                'isActived' => DB::raw('isActived + 1'),
            ]);
        }
        $response['code'] = 0;
        $response['message'] = 'success';
        return response()->json($response, 200);
    }


    function remove(Request $request){
        $response = array('code'=>-1, 'message'=>'');
        $userid = $request->id;
        User::where('id', $userid)->delete();
        $response['code'] = 0;
        $response['message'] = 'success';
        return response()->json($response, 200);
    }


    public function project_permission($id){
        $user = User::where('id', $id)->first();
        $project_permissions = ProjectPermission::where('user_id', $user->id)->get();
        $projects = Project::all();

        foreach ($projects as $item){
            if (count($project_permissions) == 0){
                $item['status'] = 0;
            }
            $item['user_id'] = $user->id;
            $item['status'] = 0;
            foreach ($project_permissions as $project_permission){
                if ($item->project_id == $project_permission->project_id){
                    $item['status'] = 1;
                }
            }
        }

       // echo json_encode($projects); die();


        return view('users_tab.project_permission', ['projects' => $projects, 'user_name' => $user->user_name]);
    }



    public function user_project_permission(Request $request){
        $response = array('code'=>-1, 'message'=>'');
        $project_id = $request->project_id;
        $user_id = $request->user_id;
        $project = Project::where('project_id', $project_id)->first();
        $permission = ProjectPermission::where('user_id', $user_id)
                      ->where('project_id', $project_id)->first();
        if (isset($permission)){
            $permission->delete();
        }else{
            $project_permission = new ProjectPermission();
            $project_permission->user_id = $user_id;
            $project_permission->project_id = $project_id;
            $project_permission->project_name = $project->project_name;
            $project_permission->save();
        }
        $response['code'] = 0;
        $response['message'] = "success";
        return response()->json($response, 200);
    }


}
